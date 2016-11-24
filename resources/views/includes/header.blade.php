<a href="{{ route('admin.login') }}" title="">Admin</a>

@if(Auth::check())
	<a href="{{ route('admin.logout') }}" title="">LogOut</a>
@endif