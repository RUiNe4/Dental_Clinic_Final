@extends('layouts.master')
@section('title', 'Make an Appointment')
@section('headerName', 'Book an Appointment')
@section('content')
    <section class="mt-3">
        <x-header>
            Make an Appointment
            @error('message')
                <p class="text-green-500 font-bold text-sm">
                    Appointment Successfully Booked
                </p>
            @enderror
        </x-header>
    </section>
    {{--	default view--}}
    <main class="flex md:flex-row lg:flex-row xl:flex-row mt-3 md:px-5 max-sm:flex-col">
        <div class="flex-1 md:mx-5">
            <form action="/appointment/create" method="POST">
                @include('profile.partials.request-form')
            </form>
        </div>
        <div class="flex-1 mx-5 flex justify-center pt-5">
            @include('profile.partials.address')
        </div>
    </main>
@endsection
