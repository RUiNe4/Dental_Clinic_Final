@extends('layouts.master')
@section('title', 'ServiceSeeder')
@section('content')
	<main class="w-8/10 h-screen m-auto px-48">
		<div class=" text-center">
			<h1 style="color: black; font-size: 50px;">Our Services</h1>
			<p style="color: black;">Smile Line provides the best quality to all the customers !</p>
		</div>
		
		<div class="place-row text-center mt-10">
			@foreach($services as $service)
				<a href="#">
					<div class="card pic{{ $i++ }}">
						<x-service-item :services="$service"/>
					</div>
				</a>
			@endforeach
		</div>
	</main>
@endsection