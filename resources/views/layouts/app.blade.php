<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
	<div id="app">
		<nav class="navbar" role="navigation" aria-label="main navigation">
			<div class="container">
				<div class="navbar-brand">
					<!-- navbar items, navbar burger... -->
					<a class="navbar-item" href="{{route('home')}}">
						<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28" alt="Bulma">
					</a>
				</div>
				<div class="navbar-menu">
					<div class="navbar-start">
						<!-- navbar items -->
						<a class="navbar-item is-tab">Learn</a>
						<a class="navbar-item is-tab">Modules</a>
						<a class="navbar-item is-tab">Discuss</a>
					</div>

					<div class="navbar-end">
						<!-- navbar items -->
						@if(Auth::guest())
						<a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
						<a href="{{route('register')}}" class="navbar-item is-tab">Join The Community</a>
						@else
						<div class="navbar-item has-dropdown is-hoverable">
							<a class="navbar-item">
								Hi {{Auth::user()->name}}
								<span class="icon">
									<i class="fa fa-caret-down" aria-hidden="true"></i>
								</span>
							</a>

							<div class="navbar-dropdown">
								<a class="navbar-item">
									<span class="icon">
										<i class="fa fa-user-circle-o" aria-hidden="true"></i>
									</span>
									Profiles
								</a>
								<a class="navbar-item">
									<span class="icon">
										<i class="fa fa-bell" aria-hidden="true"></i>
									</span>
									Notification
								</a>
								<a class="navbar-item">
									<span class="icon">
										<i class="fa fa-cog" aria-hidden="true"></i>
									</span>
									Settings
								</a>
								<hr class="navbar-divider">
								<a class="navbar-item">
									<span class="icon">
										<i class="fa fa-sign-out" aria-hidden="true"></i>
									</span>
									Logout
								</a>
								<hr class="navbar-divider">
								<div class="navbar-item">
									<span class="icon">
										<i class="fa fa-code-fork" aria-hidden="true"></i>
									</span>
									Version 0.6.1
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</nav>
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>