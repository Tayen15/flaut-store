@extends('layouts.blank')
@section('auth')

<div class="flex justify-center items-center h-screen bg-indigo-600">
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
            <div class="mt-3">
                <label for="password" class="block text-base mb-2">Password</label>
                <input type="password" name="password" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Enter Password" required/>
            </div>
            <div class="mt-3 flex justify-between items-center">
                <div>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="border-2 border-indigo-700 bg-indigo-700 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
index
