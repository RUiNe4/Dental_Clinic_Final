{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"--}}
{{--        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">--}}
{{--    @vite('resources/css/app.css')--}}
{{--    <script src="//unpkg.com/alpinejs" defer></script>--}}
{{--    <title>Document</title>--}}
{{--</head>--}}

@include('profile.partials.admin-head')

<body class="mb-48">
<main>
	<div class="mx-4">
		<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
			<header class="text-center">
				<h2 class="text-2xl font-bold uppercase mb-1">
					Register
				</h2>
				<p class="mb-4">Create an account to post gigs</p>
			</header>
			
			<form action="/admin/doctor-list/{{$user->id}}/password/set" method="POST">
				@csrf
				@method('PUT')
				<div class="mb-6">
					<label for="password0" class="inline-block text-lg mb-2">
						Old Password
					</label>
					<input type="password" class="border border-gray-200 rounded p-2 w-full" name="oldPassword"/>
				</div>
				@error('oldPassword')
				<p class="text-red-500 text-xs mt-1">
					{{ $message }}
				</p>
				@enderror
				<div class="mb-6">
					<label for="password" class="inline-block text-lg mb-2">
						Password
					</label>
					<input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"/>
				</div>
				@error('password')
				<p class="text-red-500 text-xs mt-1">
					{{ $message }}
				</p>
				@enderror
				
				<div class="mb-6">
					<label for="password2" class="inline-block text-lg mb-2">
						Confirm Password
					</label>
					<input type="password" class="border border-gray-200 rounded p-2 w-full"
								 name="password_confirmation"/>
				</div>
				
				{{-- <div class="mb-6">
						<label for="photo" class="inline-block text-lg mb-2">
								Photo(4x6)
						</label>
						<input type="file" class="border border-gray-200 rounded p-2 w-full" name="photo" />
				</div> --}}
				
				<div class="mb-6">
					<button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
						Confirm
					</button>
				</div>
			</form>
		</div>
	</div>

</main>
<x-flash-message/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
</body>

</html>
