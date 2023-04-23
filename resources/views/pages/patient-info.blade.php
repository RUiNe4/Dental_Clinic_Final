@extends('layouts.admin')
@section('content')
    <x-header>
        {{ $appointment->firstName.' '.$appointment->lastName }}
    </x-header>
    <div class="flex p-2 gap-x-3">
        <div class="w-full">

            <div style="font-family: monospace"
                 class="border-[#4F9298] bg-[#E5FDFF] text-[#222D32] rounded-2xl justify-center items-center p-5">
                <div class="mb-3 text-xl">Patient No: {{ $appointment->id }}</div>
                <hr class="mb-3 border-black">
                <div class="mb-3 text-xl">Phone Number:
                    {{ $appointment->phoneNum }}
                </div>
                <div class="mb-3 text-xl">
                    Email:
                    <a class="hover:underline hover:cursor-pointer underline"
                       href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $appointment->email }}"
                       target="_blank">
                        {{ $appointment->email }}
                    </a>
                </div>
                <div class="mb-3 text-xl">Date of Birth:
                    {{ $appointment->birthday }}
                </div>
                <hr class="mb-3 border-black">
                <div class="mb-3 text-xl">Appointment Count:
                    {{ count($invoices) }}
                </div>

                <form action="/create/invoice/{{ $appointment->id }}">
                    <div class="mb-3 text-xl">Payment Status:
                        @if($appointment->paid)
                            <span class="text-green-700">Paid</span>
                        @else
                            @csrf
                            <button type="submit" name="patient-id" value="paid"
                                    class="text-amber-700 underline">
                                Pending
                            </button>
                        @endif
                    </div>
                </form>
                <hr class="mb-3 border-black">
                <form action="/appointment/{{ $appointment->id }}/change">
                    <div class="mb-3 text-xl">
                        Next Appointment
                        <div class="relative" style="display: inline-block">
                            <div
                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none hover:cursor-pointer">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill=""
                                     viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                          clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                            <input type="text" datepicker datepicker-format="yyyy-mm-dd"
                                   class="border-2 border-[#4F9298] text-gray-900 bg-[#E5FDFF] hover:cursor-pointer rounded-md block pl-10 p-2.5"
                                   placeholder="{{ $appointment->appointmentDate }}"
                                   value="{{ $appointment->appointmentDate }}"
                                   name="apntDate">
                        </div>
                    </div>
                    <hr class="mb-3 border-black">
                    <div>
                        <div class="text-white flex text-xl">
                            <button class="bg-[#E9870F] md:w-40 lg:w-60 h-12 px-2 m-2 rounded-md" name="res"
                                    value="reschedule">
                                Reschedule
                            </button>
                            <button class="bg-red-500 md:w-40 lg:w-60 h-12 px-2 m-2 rounded-md" name="res"
                                    value="delete">Delete
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="">
                @include('profile.partials.popup-invoice')
            </div>
        </div>
        <div
            {{--            dark:bg-gray-700 dark:border-gray-600--}}
            class="relative w-full overflow-y-scroll bg-white border border-gray-100 bg-[#E5FDFF] h-96">
            <ul class="border-l-4 border-[#4F9298]">
                @foreach(auth()->user()->acc_type == "admin" ? \App\Models\Appointment::latest()->get() : $patients as $patient)
                    @if($patient->id != $appointment->id)
                        <x-patient.patient-list :patient="$patient"/>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

@endsection
