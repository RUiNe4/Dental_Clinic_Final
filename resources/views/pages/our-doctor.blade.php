@extends('layouts.master')
@section('title', 'Our Doctors')
@section('content')
	<style>
      @media only screen and (max-width: 768px) {
          .doctor-container {
              grid-template-columns: repeat(2, 1fr);
          }
      }

      @media only screen and (max-width: 640px) {
          .doctor-container {
              grid-template-columns: repeat(1, 1fr);
          }
      }
	</style>
	<!-- Container for demo purpose -->
	<div class="container py-12 px-6 mx-auto">

		<!-- Meet our Doctor Title -->
		<section class="mb-32 text-gray-800 text-center">
			<h2 class="text-3xl font-bold mb-32">Meet our Dentists</h2>
		</section>
		<!-- Meet our Doctor Title -->

		<section class="mb-32 text-gray-800 text-center">
			@if (count($doctors) == 0)
				<label> No Doctor</label>
			@endif
			<div style="column-gap: 4rem" class="doctor-container grid grid-cols-3 gap-y-32 max-md:grid-cols-2">
				@foreach ($doctors as $doctor)
					<x-doctor.doctor-item :doctor="$doctor"/>
				@endforeach
			</div>
		</section>
	</div>
@endsection
