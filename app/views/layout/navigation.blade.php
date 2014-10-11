<nav>
	<ul>
			<li><a href="{{ URL::route('home')}}">Home</a></li>

			@if(Auth::check())
					<li><a href="{{URL::route('tabel')}}">TABEL</a></li>
					<li><a href="{{URL::route('account-logout')}}">Logout</a></li>	
			@else
					<li><a href="{{URL::route('account-login')}}">Login</a></li>
					<li><a href="{{URL::route('account-create')}}">Buat Akun</a></li>
			@endif
			
	</ul>	
</nav>