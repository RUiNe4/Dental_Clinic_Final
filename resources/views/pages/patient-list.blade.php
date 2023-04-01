@extends('layouts.admin')
@section('content')
	<main class="">
		<x-header title="Pending Appointments"></x-header>
		<div class="mt-3 px-2 patient-container">
			@forelse($patients as $patient)
				@include('profile.partials.patient-status')
			@empty
				<div class="text-center">
					<span class="font-bold">0</span> patients found
				</div>
			@endforelse
			<div class="mt-6">
				{{ $patients -> appends(['appointment' => request ()->query('appointment')]) -> links() }}
			</div>
		</div>
	</main>
@endsection
