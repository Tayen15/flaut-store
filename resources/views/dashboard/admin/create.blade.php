<!-- resources/views/admin/create.blade.php -->

@section('title', 'Create admin')
@extends('layouts.dashboard')
@section('admin')
<section class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Page Header -->
    <div class="bg-gray-800 pt-3">
        <div class="flex items-center justify-between rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2">Create admin</h1>
        </div>
    </div>

    <div class="max-w-7xl p-6 mx-auto rounded-md mt-2">
        <form action="{{ route('dashboard.admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black font-medium" for="name">Name <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <input id="name" name="name" type="text" autocomplete="additional-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                </div>
                <div>
                    <label class="text-black font-medium" for="email">Email <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <input id="email" name="email" type="email" autocomplete="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                </div>
            </div>
            <div class="my-6 relative">
    <label class="text-black font-medium" for="password">Password <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
    <div class="relative">
        <input id="password" name="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>

        <!-- Tanda mata (eye icon) untuk menampilkan/sembunyikan kata sandi -->
        <div class="absolute inset-y-0 right-0 flex items-center h-full pr-2">
            <button type="button" onclick="togglePasswordVisibility()" class="text-gray-500 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3 5.5 10 5.5 10-5.5 10-5.5-3-5.5-10-5.5S2 12 2 12z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
    }
</script>


            <div class="my-6">
                <div>
                    <label class="text-black font-medium" for="level">Level <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <select id="level" name="level" class="block w-full px-4 py-2 mt-2 capitalize text-gray-700 bg-white border rounded-md focus:outline-none focus:ring appearance-none" required>
                        <option value="" autofocus></option>
                        <option value="1" >Admin</option>   
                        <option value="2">Manager</option>
                        <option value="3">Owner</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button class="px-6 py-2 leading-5 mx-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600" type="submit">Save</button>
                <a href="{{ route('dashboard.admin.index') }}" class="px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-400 rounded-md hover:bg-gray-500 cursor-pointer focus:outline-none focus:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>

</section>
@endsection
