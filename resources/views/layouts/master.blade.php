<!doctype html>
<html lang="en">
@include('profile.partials.master-head')
<body style="">
@include('profile.partials.nav-bar')
@yield('content')
@include('profile.partials.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<x-flash-message/>
@livewireScripts
</body>
</html>


