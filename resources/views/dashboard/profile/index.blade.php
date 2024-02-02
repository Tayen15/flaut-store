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

                <div class="my-6">
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
                <div class="my-6 relative">
                    <label class="text-black font-medium" for="password">Password <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <div class="relative">
                        <input id="password" name="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>

                        <!-- Tanda mata (eye icon) untuk menampilkan/sembunyikan kata sandi -->
                        <div class="absolute inset-y-0 right-0 flex items-center h-full pr-2">
                            <button type="button" onclick="togglePasswordVisibility()" class="text-gray-500 focus:outline-none">
                                <svg class="h-6 w-6" id="eye" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>

                                <svg id="eye-slash" class="h-6 w-6 hidden text-blue-900" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.87317 17.129C5.02774 15.8181 3.56791 14.1146 2.74375 13.039C2.26944 12.4199 2.26856 11.5813 2.74283 10.9622C4.23598 9.01321 7.81823 5 12 5C13.8755 5 15.6305 5.80728 17.1305 6.87355" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.1292 9.88664C13.5857 9.33907 12.8325 9 12 9C10.3431 9 9 10.3431 9 12C9 12.8324 9.339 13.5856 9.88646 14.1291" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 20L19.9999 4" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 18.7037C10.6462 18.8923 11.3151 19 12 19C16.1818 19 19.764 14.9868 21.2572 13.0378C21.7314 12.4187 21.7302 11.5795 21.2558 10.9605C20.843 10.4217 20.2707 9.72547 19.5704 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="my-6 relative">
                    <label class="text-black font-medium" for="password_confirmation">Confirm Password <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
    
                        <!-- Tanda mata (eye icon) untuk menampilkan/sembunyikan kata sandi -->
                        <div class="absolute inset-y-0 right-0 flex items-center h-full pr-2">
                            <button type="button" onclick="togglePasswordConfirmVisibility()" class="text-gray-500 focus:outline-none">
                                <svg class="h-6 w-6" id="eye-confirm" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>

                                <svg id="eye-slash-confirm" class="h-6 w-6 hidden text-blue-900" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.87317 17.129C5.02774 15.8181 3.56791 14.1146 2.74375 13.039C2.26944 12.4199 2.26856 11.5813 2.74283 10.9622C4.23598 9.01321 7.81823 5 12 5C13.8755 5 15.6305 5.80728 17.1305 6.87355" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.1292 9.88664C13.5857 9.33907 12.8325 9 12 9C10.3431 9 9 10.3431 9 12C9 12.8324 9.339 13.5856 9.88646 14.1291" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4 20L19.9999 4" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 18.7037C10.6462 18.8923 11.3151 19 12 19C16.1818 19 19.764 14.9868 21.2572 13.0378C21.7314 12.4187 21.7302 11.5795 21.2558 10.9605C20.843 10.4217 20.2707 9.72547 19.5704 9" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="px-3 py-2 leading-5 mx-5 text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-gray-600" type="submit">Change Password</button>
                </div>
            </form>
        </div>

    </section>

    <script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.getElementById('eye');
        var eyeSlashIcon = document.getElementById('eye-slash');

        var type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        if (type === 'password') {
            eyeIcon.style.display = 'block';
            eyeSlashIcon.style.display = 'none';
        } else {
            eyeIcon.style.display = 'none';
            eyeSlashIcon.style.display = 'block';
        }
    }
    
    function togglePasswordConfirmVisibility() {
        var passwordInput = document.getElementById('password_confirmation');
        var eyeIcon = document.getElementById('eye-confirm');
        var eyeSlashIcon = document.getElementById('eye-slash-confirm');

        var type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        if (type === 'password') {
            eyeIcon.style.display = 'block';
            eyeSlashIcon.style.display = 'none';
        } else {
            eyeIcon.style.display = 'none';
            eyeSlashIcon.style.display = 'block';
        }
    }
    </script>
@endsection
