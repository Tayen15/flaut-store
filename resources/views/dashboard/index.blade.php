
@extends('layouts.dashboard')
@section('admin')
    <main>
        <div class="flex flex-col md:flex-row">
            <!-- Navigation Sidebar -->
            <nav aria-label="alternative nav">
                <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">
                    <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                        <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                            <li class="mr-3 flex-1">
                                <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                    <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dashboard</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="{{ route('dashboard.news') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">News</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="{{ route('dashboard.catalog') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Catalog</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="{{ route('dashboard.carousel') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Banner</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

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
        </div>
    </main>
@endsection
