@extends('layouts.dashboard')
@section('title', 'Edit Profile')
@section('admin')
    <section class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
        <!-- Page Header -->
        <div class="bg-gray-800 pt-3">
            <div class="flex items-center justify-between rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Edit Profile</h1>
            </div>
        </div>

        {{-- Form Edit Profile --}}
        <div class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-2">
            <!-- Update Profile Form -->
            <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-black font-medium" for="name">Name <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                        <input id="name" name="name" value="{{ auth()->user()->name }}" type="text" autocomplete="organization-title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button class="px-3 py-2 leading-5 mx-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600" type="submit">Update Profile</button>
                    <a href="{{ route('dashboard.index') }}" class="px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-400 rounded-md hover:bg-gray-500 cursor-pointer focus:outline-none focus:bg-gray-600" type="submit">Cancel</a>
                </div>
            </form>


        </div>
        <div class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-2">
            <!-- Change Password Form -->
            <form action="{{ route('dashboard.profile.change-password') }}" method="POST">
                @csrf
                <div class="my-6">
                    <div>
                        <label class="text-black font-medium" for="password">New Password</label>
                        <input id="password" name="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-black font-medium" for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button class="px-3 py-2 leading-5 mx-5 text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-gray-600" type="submit">Change Password</button>
                </div>
            </form>
        </div>
    </section>
@endsection
