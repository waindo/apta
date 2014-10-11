<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>WEBSITE</title>
		<link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('zocial/zocial.css')}}" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
		<script src="{{ URL::asset('assets/js/jquery-1.11.0.min.js')}}"></script>
		<script src="{{ URL::asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
		<style type="text/css">
			.zocial{
				width: 220px;
				margin-bottom: 20px;
			}
			
			.zocial a:hover{
				text-decoration:none;
				margin-bottom: 20px;
			}
		</style>
			
	</head>
	<body>
			<section id="content">
				@if($errors->has())
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">
						×
					</button>
					@foreach ($errors->all() as $error)
					<li>
						{{ $error }}
					</li>
					@endforeach
				</div>
				@endif

			@if( Session::has('global') )
				<p>{{ Session::get('global') }}</p>
			@endif

			@include('layout.navigation')
			
			@yield('content')
			</section>	
		
	</body>
</html>