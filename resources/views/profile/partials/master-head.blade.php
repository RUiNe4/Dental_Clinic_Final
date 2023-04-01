<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Smile Line - @yield('title')</title>
	{{--	Tailwind css--}}
	@vite('resources/css/app.css')
	{{--	flowbite css--}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/datepicker.min.js"></script>
	{{--	//flowbite css--}}
{{--	<link rel="stylesheet" href="{{ asset ('assets/styles/detail.css') }}">--}}
	{{--	alpine js--}}
	<script src="//unpkg.com/alpinejs" defer></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	{{--	fontawesome--}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	{{--	//fontawesome--}}

	{{--	footer css--}}
	<link rel="stylesheet" href="{{asset('assets/styles/footer.css')}}"/>
	{{--	//footer css--}}
	<link
		href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,700&family=Montserrat:wght@100;300;400;500;600;700&display=swap"
		rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/footer.css') }}">
	@livewireStyles
</head>
