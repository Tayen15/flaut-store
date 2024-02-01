

@section('title', 'Login Dashboard Panel - Flaut.')
@extends('layouts.blank')
@section('auth')

<div class="flex justify-center items-center h-screen bg-blue-900">
    <div class="w-96 p-6 shadow-lg bg-white rounded-md">
        <h1 class="text-3xl block text-center font-semibold"><i class="fa-solid fa-user"></i> Login Admin</h1>
        <hr class="mt-3">

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif

        <form method="POST" action="{{ route('auth') }}">
            @csrf
            <div class="mt-3">
                <label for="username" class="block text-base mb-2">Email</label>
                <input type="text" name="email" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" value="{{ old('email') }}" placeholder="Enter Email" required/>
            </div>
            <div class="my-6 relative">
                    <label class="text-black font-medium" for="password">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" placeholder="Enter Password" required>

                        <!-- Tanda mata (eye icon) untuk menampilkan/sembunyikan kata sandi -->
                        <div class="absolute inset-y-0 right-0 flex items-center h-full pr-2">
                            <button type="button" onclick="togglePasswordVisibility()" class="text-gray-500 focus:outline-none">
                                <svg class="h-6 w-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3 5.5 10 5.5 10-5.5 10-5.5-3-5.5-10-5.5S2 12 2 12z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            {{-- <div class="mt-3 flex justify-between items-center">
                <div>
                    <a href="{{ route('home') }}" class="text-base hover:underline underline-offset-2 hover:text-indigo-700">Back to home</a>
                </div>
            </div> --}}
            <div class="mt-5">
                <button type="submit" class="border-2 border-blue-900 bg-blue-900 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-blue-900 transition duration-500 ease-in-out font-semibold"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;Login</button>
            </div>
        </form>
    </div>
</div>
<script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
        }
        </script>
@endsection
