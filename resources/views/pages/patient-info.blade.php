@extends('layouts.admin')
@section('content')
	<x-header title=" {{ $appointment->firstName }} {{ $appointment->lastName }}"/>
	<div class="flex p-2">
		<div class="flex-1 bg-[#FFE2C8] rounded-2xl justify-center items-center p-5">
			{{--			<form action="/appointment/{{ $appointment->id }}/change">--}}
			<div style="font-family: monospace">
				<div class="mb-3 text-xl">Patient No: {{ $appointment->id }}</div>
				<hr class="mb-3 border-black">
				<div class="mb-3 text-xl">Phone Number:
					<input class="border-none rounded-md" type="tel" pattern="{8,12}"
								 title="Numbers Only from (8-12 digits)" placeholder=" {{ $appointment->phoneNum }}"
								 value=" {{ $appointment->phoneNum }}" name="phoneNum">
				</div>
				<div class="mb-3 text-xl">
					Email:
					<a class="hover:underline hover:cursor-pointer"
						 href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $appointment->email }}" target="_blank">
						{{ $appointment->email }}
					</a>
				</div>
				<div class="mb-3 text-xl">Date of Birth:
					{{ $appointment->birthday }}
				</div>
				<hr class="mb-3 border-black">
				<div class="mb-3 text-xl">Appointment Date:
					<div class="relative" style="display: inline-block">
						<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none hover:cursor-pointer">
							<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="" viewBox="0 0 20 20"
									 xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
											d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
											clip-rule="evenodd">
								</path>
							</svg>
						</div>
						<input type="text" datepicker datepicker-format="yyyy-mm-dd"
									 class="border-none text-gray-900 rounded-md block pl-10 p-2.5"
									 placeholder="{{ $appointment->appointmentDate }}" value="{{ $appointment->appointmentDate }}"
									 name="apntDate">
					</div>
				</div>
				<hr class="mb-3 border-black">
				<div class="mb-3 text-xl">Payment Status:
					@if($appointment->paid)
						<span class="text-green-700">Paid</span>
					@else
						<form action="/create/invoice" class="inline-block">
							<button type="submit" name="patient-id" value="{{ $appointment->id }}" class="text-amber-700 underline">
								Pending
							</button>
						</form>
					@endif
				</div>
			</div>
			{{--				<div class="text-white flex justify-center items-center p-5">--}}
			{{--					<button class="bg-green-500 md:w-40 lg:w-60 h-12 px-2 m-2 rounded-md" name="res" value="reschedule">--}}
			{{--						Reschedule--}}
			{{--					</button>--}}
			{{--					<button class="bg-red-500 md:w-40 lg:w-60 h-12 px-2 m-2 rounded-md" name="res" value="delete">Delete</button>--}}
			{{--				</div>--}}
			{{--			</form>--}}
			<div class="text-white">
			</div>
		</div>
		<div class="flex-1">
			@include('profile.partials.popup-invoice')
		</div>
		<div
			class="flex-1 relative w-full max-w-sm overflow-y-scroll bg-white border border-gray-100 rounded-lg dark:bg-gray-700 dark:border-gray-600 h-96">
			<ul>
				@foreach(auth()->user()->acc_type == "admin" ? \App\Models\Appointment::latest()->get() : $patients as $patient)
					@if($patient->id != $appointment->id)
						<x-patient.patient-list :patient="$patient"/>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
	

@endsection
