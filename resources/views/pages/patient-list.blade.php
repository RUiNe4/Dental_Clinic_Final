@extends('layouts.admin')
@section('content')
	<main class="">
		<x-header title="Pending Appointments"></x-header>
		<div class="{{ auth ()->user ()->acc_type == 'admin' ? 'hidden' : '' }}">
			<x-filter-form :sort="$sort"/>
		</div>
		<div class="px-2 mt-3 patient-container">
			@forelse($patients as $patient)
				@include('profile.partials.patient-status')
			@empty
				<div class="text-center">
					<span class="font-bold">0</span> patients found
				</div>
			@endforelse
			<div class="mt-6">
				@if(request ()['filter'])
					{{ $patients -> appends(['filter' => request ()['filter']]) -> links() }}
				@else
					{{ $patients -> appends(['appointment' => request ()->query('appointment')]) -> links() }}
				@endif
			</div>
		</div>
	</main>
@endsection
