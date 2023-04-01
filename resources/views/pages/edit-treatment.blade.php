@extends('layouts.admin')
@section('content')
	<main class="">
		<x-header title="Update Info: {{$treatment->treatment_name}} Procedure"/>
            <div class="mx-4">
                <form action="/admin/treatment-list/{{$treatment->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="treatment_name" class="inline-block text-lg mb-2">Treatment name</label>
                        <input type="treatment_name" class="border border-gray-200 rounded p-2 w-full" name="treatment_name" value="{{$treatment->treatment_name}}"/>
                        <!-- Error Example -->
                        @error('treatment_name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="price" class="inline-block text-lg mb-2">
                            Price ($)
                        </label>
                        <input type="price" class="border border-gray-200 rounded p-2 w-full" name="price" value="{{$treatment->price}}"/>
                    </div>
                    @error('price')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror


                    <div class="mb-6">
                        <button type="submit" style="background-color: #4F9298" class="text-white rounded py-2 px-4 hover:bg-black">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
	</main>
@endsection

