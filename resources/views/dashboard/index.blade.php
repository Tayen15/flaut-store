
@extends('layouts.dashboard')
@section('admin')
    <!-- Main Content Section -->
    <section class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
        <!-- Page Header -->
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Dashboard</h1>
            </div>
        </div>

        <!-- Analytics Cards Section -->
        <div class="flex flex-wrap">
            <!-- Total Catalog Card -->
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                <h2 class="font-bold text-xl mb-2 text-gray-800">Total Catalog</h2>
                <p class="text-gray-600 text-lg">
                        {{ \App\Models\Catalog::count() }} <!-- Assuming your Catalog model is in the "App\Models" namespace -->
                </p>
                </div>
            </div>

            <!-- Total News Card -->
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                <h2 class="font-bold text-xl mb-2 text-gray-800">Total News</h2>
                <p class="text-gray-600 text-lg">
                        {{ \App\Models\News::count() }} <!-- Assuming your News model is in the "App\Models" namespace -->
                </p>
                </div>
            </div>

            <!-- Total Users Card -->
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                <h2 class="font-bold text-xl mb-2 text-gray-800">Total Users</h2>
                <p class="text-gray-600 text-lg">
                        {{ \App\Models\User::count() }} <!-- Assuming your User model is in the "App\Models" namespace -->
                </p>
                </div>
            </div>
        </div>
    </section>
@endsection
