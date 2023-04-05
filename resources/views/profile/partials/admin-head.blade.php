<!DOCTYPE HTML>
<html lang="">
<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="keywords"/>
	<script type="application/x-javascript"> addEventListener("load", function () {
          setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
          window.scrollTo(0, 1);
      } </script>
	{{--	flowbite css--}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/datepicker.min.js"></script>
	<!-- Bootstrap Core CSS -->
	<link href="{{ asset ('css/bootstrap.css') }}" rel='stylesheet' type='text/css'/>

	<!-- Custom CSS -->
	<link href="{{ asset ('css/style.css') }}" rel='stylesheet' type='text/css'/>

	<!-- font-awesome icons CSS -->
	<link href="{{ asset ('css/font-awesome.css') }}" rel="stylesheet">
	<!-- //font-awesome icons CSS-->

	<!-- side nav css file -->
	<link href='{{ asset ('css/SidebarNav.min.css') }}' media='all' rel='stylesheet' type='text/css'/>
	<!-- //side nav css file -->

	<!-- js-->
	<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/modernizr.custom.js') }}"></script>

	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
				rel="stylesheet">
	<!--//webfonts-->

	<!-- Metis Menu -->
	<script src="{{ asset ('js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
	<!--//Metis Menu -->

	{{--	Tailwind Css--}}
	@vite('resources/css/app.css')
	<script src="//unpkg.com/alpinejs" defer></script>
	@livewireStyles
</head>
