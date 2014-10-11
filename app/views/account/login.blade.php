
@extends('layout.main')

@section('content')
	
	<form align = "center" action = "{{URL::route('account-login-post')}}" method = "post">
		<div class="field">
			<input type="text" placeholder="Email" name="email"{{(Input::old('email')) ? 'value="'.Input::old('email').'"':''}}>
			<br>@if($errors->has('email'))
			{{$errors->first('email')}}
			@endif</br>
		</div>
		<div class="field">
			<input type="password" placeholder="Password" name="password">
			<br>@if($errors->has('password'))
			{{$errors->first('password')}}
			@endif</br>
		</div>
		
		<input type="submit" value="Login">
		{{ Form::token() }}
	</form>

@stop