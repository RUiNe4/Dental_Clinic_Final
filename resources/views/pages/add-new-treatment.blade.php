@extends('layouts.admin')
@section('content')
    <main class="">
        <x-header>
            Register a new treatment Procedure
        </x-header>
        <div class="flex justify-center">
            <form class="my-4 border-b-2 border-black px-2 py-1" action="/admin/create/treatment-list" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="treatment_name" class="inline-block text-lg mb-2">Treatment name</label>
                    <input type="treatment_name" class="border border-gray-200 rounded p-2 w-full" name="treatment_name"
                           value="{{old('treatment_name')}}" placeholder="Enter a treatment name"/>
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
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price"
                           value="{{old('price')}}" placeholder="Enter price"/>
                </div>
                @error('price')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror


                <div class="mb-6">
                    <button type="submit" style="background-color: #4F9298"
                            class="text-white rounded py-2 px-4 hover:bg-black">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

