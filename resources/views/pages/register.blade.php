<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="mb-48">
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account for doctors</p>
            </header>

            <form action="/register/user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">
                        Title
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title') ? old('title') : 'Dr.'}}"/>
                </div>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}"/>
                </div>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}"/>
                    <!-- Error Example -->
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">
                        Confirm Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full"
                        name="password_confirmation" />
                </div>
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-6">
                    <label for="specialist" class="inline-block text-lg mb-2">
                        Specialist
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="specialist" value="{{old('specialist')}}"/>
                </div>
                @error('specialist')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
                <label for="description" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-6">
                    <label for="work_experience" class="inline-block text-lg mb-2">
                        Work Experience
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="work_experience" value="{{old('work_experience')}}"/>
                </div>
                @error('work_experience')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-6">
                    <label for="photo" class="inline-block text-lg mb-2">
                        Photo(4x6)
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="photo" />
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Sign Up
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="/login" class="text-laravel">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


