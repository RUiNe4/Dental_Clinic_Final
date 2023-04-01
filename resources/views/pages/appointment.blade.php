@extends('layouts.master')
@section('title', 'Make an Appointment')
@section('headerName', 'Book an Appointment')
@section('content')
	<section class="mt-3">
		<x-header	title="Make an Appointment" />
	</section>
{{--	default view--}}
	<main class="flex mt-3 px-5 max-sm:hidden">
		<div class="flex-2 mx-5 flex justify-center pt-5">
			@include('profile.partials.address')
		</div>
		<div class="flex-1 mx-5">
			@include('profile.partials.request-form')
		</div>
	</main>
{{--		for responsive--}}
	<main class="sm:hidden flex-col p-3">
		<div class="flex-1">
			@include('profile.partials.request-form')
		</div>
		<div class="flex-2 flex justify-center">
			@include('profile.partials.address')
		</div>
	</main>
@endsection