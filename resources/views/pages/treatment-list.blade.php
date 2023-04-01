@extends('layouts.admin')
@section('content')
	<main class="">
		<x-header title="Treatment Procedures"/>
		<a href="/admin/create/treatment-list">
			<button
				class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-3 ml-2">
				Create a new treatment
			</button>
		</a>
		<div class="mt-3 px-2 patient-container">
			@forelse($treatments as $treatment)
				<div style="background-color: white"
						 class="px-3 py-2 rounded-lg parent-card flex justify-between items-center mb-3">
					<div class="left-section flex flex-col" style="color: #4F9298">
						<a href=" {{ url('/admin/treatment-list/' . $treatment->id) }}" class="font-bold">
							{{ $treatment->treatment_name }}
							<sup class="font-normal italic">
								#{{ $treatment->id }}
							</sup>
						</a>
						<div class="text-sm">
                            <p>Price: $ {{ $treatment->price }}</p>

						</div>
					</div>
					<div class="right-section text-white">
						<a href="/admin/treatment-list/{{ $treatment->id }}">
							<button
								class="bg-green-400 text-sm px-5 py-1 rounded-md mr-2 mb-2">
								Edit
							</button>
						</a>

						<form action="/admin/treatment-list/{{ $treatment->id }}" method="POST">
							@csrf
							@method('DELETE')
							<button class="bg-red-500 text-sm px-2 py-1 rounded-md mr-2 mb-2">
								Remove
							</button>
						</form>
					</div>
				</div>
			@empty
				<div class="text-center">
					<span class="font-bold">{{ count($treatments) }}</span> Treatments found
				</div>
			@endforelse
		</div>
	</main>
@endsection
