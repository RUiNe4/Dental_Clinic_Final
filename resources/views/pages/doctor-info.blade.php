@extends('layouts.master')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles:wght@700&family=Montserrat&display=swap');

    * {
        font-family: 'Montserrat', sans-serif;
    }

    html {
        scroll-behavior: smooth;
    }

    .container {
        /* border: 1px solid red; */
        height: 100vh;
        width: 100%;
    }

    .title {
        margin: 10px;
        /* border: 1px solid blue; */
        background-color: #75C4CB;
    }

    .title h1 {
        font-family: 'Fuzzy Bubbles', cursive;
        text-align: center;
    }

    .container2 {
        /*margin: 10px;*/
        display: flex;
        align-items: center;
        /*margin: 50px;*/
    }

    .left-col, .right-col {
        padding-left: 20px;
        margin: 5px;
        flex-basis: auto;
    }

    .left-col {
        width: 35%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .right-col {
        width: 65%;
    }

    .profile {
        width: 80%;
        /* justify-content: center;
				align-items: center; */
    }

    .profile img {
        max-width: 100%;
        /*border-radius: 50%;*/
    }

    .container3 {
        /* border: 1px solid blue; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container3 button.appoint {
        cursor: pointer;
        display: block;
        background-color: #75C4CB;
        padding: 15px;
        border-radius: 20px;
        border: none;
    }

    .mainContainer2 {
        width: 100%;
        height: 100vh;
    }

    input {
        width: 97%;
        background: #C0F3F7;
        margin: 2px;
        padding: 6px;
        border-radius: 5px;
        border: none;
    }

    textarea {
        background: #C0F3F7;
        border-radius: 5px;
        margin: 2px;
        padding: 6px;
        border: none;
    }

    .btn {
        display: flex;
        justify-content: center;
    }

    .btn button.submit {
        margin-top: 10px;
        background: #75C4CB;
        padding: 15px;
        border-radius: 20px;
        border: none;
    }

    .container4 {
        display: flex;
    }

    form, .right-col2 {
        flex-basis: 50%;
        /* border: 1px solid red; */
    }

    .right-col2 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>
@section('content')
	<x-header title="{{ $user->title }} {{ $user->name }}"/>
	<main style="padding: 0 250px;" class="">
		<div class="container2">
			<div class="left-col profile">
				<img class="rounded-md" alt="" style="object-fit: cover"
						 src="{{$user->photo ? asset('storage/' .$user->photo) : asset ('assets/image/1.jpg') }}" alt="">
			</div>
			<div class="right-col">
				<div class="font-bold">Specialty</div>
				<p>&emsp; {{ $user->specialist }}</p>
				<div class="font-bold">Language Spoken</div>
				<p>&emsp; Khmer, Korean, English</p>
				<div class="font-bold">Qualifiaction</div>
				<p>&emsp; {{ $user->work_experience }}</p>
				<div class="font-bold">Short Description</div>
				<p>&emsp; {{ $user->description }} </p>
				<a id="" href="#makeAppointment" class="container3">
					<button class="appoint">Make Appointment</button>
				</a>
			</div>
		</div>
		<div id="makeAppointment"></div>
		<div class="container3 p-5">
			<div class="flex-1">
				@include('profile.partials.request-form')
			</div>
		</div>
	</main>
	
	{{--	</section>--}}
@endsection

