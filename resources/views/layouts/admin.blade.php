@auth
	<!doctype html>
<html lang="en">
@include('profile.partials.admin-head')
<body class="cbp-spmenu-push">
@include('profile.partials.admin-header')
@include('profile.partials.sidebar')
<div id="page-wrapper">
	<div class="main-page">
		@yield('content')
	</div>
</div>
@livewireScripts
</body>
@include('profile.partials.adminJs')

</html>
@else
	@include('pages.login');
@endauth
