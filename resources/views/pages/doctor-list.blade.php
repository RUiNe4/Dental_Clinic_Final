@extends('layouts.admin')
@section('content')
	<main class="">
		<x-header>
			Our Dentists
		</x-header>
		<a href="/register">
			<button
				class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-3 ml-2">
				Register a new doctor
			</button>
		</a>
		<div class="mt-3 px-2 patient-container">
			@forelse($doctors as $doctor)
				<div style="background-color: white"
						 class="px-3 py-2 rounded-lg parent-card flex justify-between items-center mb-3">
					<div class="left-section flex flex-col" style="color: #4F9298">
						<a href=" {{ url('/admin/doctor-list/' . $doctor->id) }}" class="font-bold">
							{{ $doctor->title }} {{ $doctor->name }}
							<sup class="font-normal italic">
								#{{ $doctor->id }}
							</sup>
						</a>
						<div class="text-sm">
							<a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $doctor->email }}" target="_blank"
								 class="text-sm hover:underline hover:cursor-pointer">
								{{ $doctor->email }}
								<i class="fa fa-mail-reply"> </i>
							</a>
						</div>
					</div>
					<div class="right-section text-white">
						<a href="/admin/doctor-list/{{ $doctor->id }}">
							<button
								class="bg-green-400 text-sm px-5 py-1 rounded-md mr-2 mb-2">
								Edit
							</button>
						</a>
						
						<form action="/admin/doctor-list/{{ $doctor->id }}" method="POST">
							@csrf
							@method('DELETE')
							<button class="bg-red-500 text-sm px-2 py-1 rounded-md">
								Remove
							</button>
						</form>
					</div>
				</div>
			@empty
				<div class="text-center">
					<span class="font-bold">{{ count($doctors) }}</span> Doctors found
				</div>
			@endforelse
			<div class="mt-6">
				{{ $doctors->links() }}
			</div>
		
		</div>
	</main>
@endsection
