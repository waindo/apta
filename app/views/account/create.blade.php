@extends('layout.main')

@section('content')



  <form action="{{ URL::route('account-create-post') }}" method="post">
		  		
  		<div class="field">
  			Email : <br><input type="text" name="email" {{(Input::old('email')) ? 'value="'.e(Input::old('email')).'"':''}}>
  			<br>@if($errors->has('email'))
  				{{$errors->first('email')}}
  			@endif</br></br>
  		</div>
  		<div class="field">
  			Username : <br><input type="text" name="username"  {{(Input::old('username')) ? 'value="'.e(Input::old('username')).'"':''}}>
  			<br>@if($errors->has('username'))
  				{{$errors->first('username')}}
  			@endif</br></br>
  		</div>
  		<div class="field">
  			Password : <br><input type="password" name="password">
  			<br>@if($errors->has('password'))
  				{{$errors->first('password')}}
  			@endif</br></br>
  		</div>
  		<div class="field">
  			<br>Confirm Password : <br><input type="password" name="password2">
  			@if($errors->has('password2'))
  				{{$errors->first('password2')}}
  			@endif</br></br>
  		</div>

  		<input type="submit" value = "Buat Akun">
  		{{Form::token()}}
  </form>
@stop