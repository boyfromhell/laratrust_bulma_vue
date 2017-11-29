<div class="side-menu m-t-8">
	<aside class="menu m-t-30 m-l-10">
		<p class="menu-label">General</p>
		<ul class="menu-list">
			<li>
				<a href="{{route('manage.dashboard')}}">Dashboard</a>
			</li>
		</ul>
		<p class="menu-label">Administration</p>
		<ul class="menu-list">
			<li>
				<a href="{{route('users.index')}}">Manage Users</a>
			</li>

			<p class="menu-label">Roles &amp; Permissions</p>

			<ul>
				<li>
					<a href="{{route('roles.index')}}">Roles</a>
				</li>
				<li>
					<a href="{{route('permissions.index')}}">Permissions</a>
				</li>
			</ul>
		</ul>
	</aside>
</div>