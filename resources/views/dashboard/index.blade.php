
@section('title', 'Dashboard')
@extends('layouts.dashboard')
@section('admin')
    <!-- Main Content Section -->
    <section class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
        <!-- Page Header -->
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-orange-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Dashboard</h1>
            </div>
        </div>

        <div class="">
            @if (!isset($searchKeyword) || !$searchKeyword)
                <!-- Displayed when there's no search -->

                <!-- Analytics Cards Section -->
                <div class="flex flex-wrap">
                    <!-- Total Catalog Card -->
                    <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                            <h2 class="font-bold text-xl mb-2 text-gray-800">Total Catalog</h2>
                            <p class="text-gray-600 text-lg">
                                {{ \App\Models\Catalog::count() }} <!-- Assuming your Catalog model is in the "App\Models" namespace -->
                            </p>
                        </div>
                    </div>
    
                    <!-- Total News Card -->
                    <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                        <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                            <h2 class="font-bold text-xl mb-2 text-gray-800">Total News</h2>
                            <p class="text-gray-600 text-lg">
                                {{ \App\Models\News::count() }} <!-- Assuming your News model is in the "App\Models" namespace -->
                            </p>
                        </div>
                    </div>
    
                    <!-- Total Users Card -->
                    <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                            <h2 class="font-bold text-xl mb-2 text-gray-800">Total Users</h2>
                            <p class="text-gray-600 text-lg">
                                {{ \App\Models\User::count() }} <!-- Assuming your User model is in the "App\Models" namespace -->
                            </p>
                        </div>
                    </div>
    
                    <!-- Total Banner Card -->
                    <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                        <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-5">
                            <h2 class="font-bold text-xl mb-2 text-gray-800">Total Banner</h2>
                            <p class="text-gray-600 text-lg">
                                {{ \App\Models\Carousel::count() }} <!-- Assuming your Carousel model is in the "App\Models" namespace -->
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Displayed when there's a search -->
                <div class="w-full p-6">
                    <h2 class="font-bold text-xl mb-2 text-gray-800">Search Results: </h2>

                    <!-- Table for Catalog -->
                    @if ($catalogs->count() > 0)
                        <h3 class="text-lg font-semibold my-4">Catalogs<i class="fa-solid fa-sort-down ml-3"></i></h3>
                        <table class="w-full border">
                            <!-- Table header -->
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Category</th>
                                    <th class="border px-4 py-2">Action</th>
                                    <!-- Add more columns as needed -->
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($catalogs as $catalog)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $catalog->name }}</td>
                                        <td class="border px-4 py-2">{{ $catalog->category }}</td>
                                        <td class="border px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('dashboard.catalog.edit', $catalog->id) }}">
                                                    <button class="relative align-middle select-none font-medium text-center uppercase transition-all w-8 h-8 md:w-10 md:h-10 rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20" type="button">
                                                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4 md:h-5 md:w-5">
                                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <!-- Table for News -->
                    @if ($news->count() > 0)
                        <h3 class="text-lg font-semibold my-4">News<i class="fa-solid fa-sort-down ml-3"></i></h3>
                        <table class="w-full border">
                            <!-- Table header -->
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Title</th>
                                    <th class="border px-4 py-2">Author</th>
                                    <th class="border px-4 py-2">Action</th>
                                    <!-- Add more columns as needed -->
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($news as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->title }}</td>
                                        <td class="border px-4 py-2">{{ $item->author }}</td>
                                        <td class="border px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('dashboard.news.edit', $item->id) }}">
                                                    <button class="relative align-middle select-none font-medium text-center uppercase transition-all w-10 h-10 md:w-12 md:h-12 rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20" type="button">
                                                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4 md:h-5 md:w-5">
                                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <!-- Table for Users -->
                    @if ($users->count() > 0)
                        <h3 class="text-lg font-semibold my-4">Users</h3>
                        <table class="w-full border">
                            <!-- Table header -->
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Email</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            @endif
        </div>
    </section>
@endsection
