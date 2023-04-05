@extends('layouts.master')
@section('title', 'Make an Appointment')
@section('headerName', 'Book an Appointment')
@section('content')
	<section class="mt-3">
		<x-header	title="Make an Appointment" />
	</section>
{{--	default view--}}
	<main class="flex md:flex-row lg:flex-row xl:flex-row mt-3 md:px-5 max-sm:flex-col">
		<div class="flex-1 md:mx-5">
			@include('profile.partials.request-form')
		</div>
		<div class="flex-1 mx-5 flex justify-center pt-5">
			@include('profile.partials.address')
		</div>
	</main>
{{--		for responsive--}}
{{--	<main class="lg:hidden md:hidden max-sm:hidden flex-col p-3">--}}
{{--		<div class="flex-1">--}}
{{--			@include('profile.partials.request-form')--}}
{{--		</div>--}}
{{--		<div class="flex-1 flex justify-center">--}}
{{--			@include('profile.partials.address')--}}
{{--		</div>--}}
{{--	</main>--}}
@endsection