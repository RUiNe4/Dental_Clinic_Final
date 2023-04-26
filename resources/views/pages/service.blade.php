@extends('layouts.master')
@section('title', 'Services')
@section('content')
	<main class="w-8/10 h-screen m-auto px-48">
		<div class="{{ $services->count() == 0 ? 'hidden' : '' }} text-center">
			<h1 style="color: black; font-size: 50px;">Our Services</h1>
			<p style="color: black;">Smile Line provides the best quality to all the customers !</p>
		</div>
		@if($services->count() == 0)
            <div class="absolute top-[50%] right-[40%] left-[40%] text-center">
                No service available
            </div>
            @else
            <div class="place-row text-center mt-10">
                @foreach($services as $service)
                    <a href="#">
                        <div class="card pic{{ $i++ }}">
                            <x-service-item :services="$service"/>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

	</main>
@endsection
