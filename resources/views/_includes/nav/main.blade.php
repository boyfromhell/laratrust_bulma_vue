<nav class="navbar bd-special-shadow" role="navigation" aria-label="main navigation">
	{{--
	<div id="" class="bd-special-shadow"></div> --}}
	<div class="container">
		<div class="navbar-brand">
			<!-- navbar items, navbar burger... -->
			<a class="navbar-item" href="{{route('home')}}">
				<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28" alt="Bulma">
			</a>
			@if (Request::segment(1)=="manage")
			<a class="navbar-item" id="admin-slideout-button"><span class="icon"><i class="fa fa-arrow-circle-o-right"></i></span></a>
			@endif
			<button class="button navbar-burger">
				<span></span>
				<span></span>
				<span></span>
			</button>
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
						<a class="navbar-item" href="{{route('manage.dashboard')}}">
							<span class="icon">
								<i class="fa fa-cog" aria-hidden="true"></i>
							</span>
							Manage
						</a>
						<hr class="navbar-divider">
						<a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
							<span class="icon">
								<i class="fa fa-fw fa-sign-out m-r-5"></i>
							</span>
							Logout
						</a>
						@include('_includes.forms.logout')
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