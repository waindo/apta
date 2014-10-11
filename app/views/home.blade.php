@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>Hello, {{Auth::user()->username}}</p>

	@else
		<p>Anda Tidak Login</p>

	@endif

@stop