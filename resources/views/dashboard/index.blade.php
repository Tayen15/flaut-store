
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
                <div class="w-full md:w-1/2 lg:w-1/2 p-6 transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                        <a href="{{ route('dashboard.catalog.index') }}" class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600">
                                    <i class="fa fa-shopping-bag text-2xl text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total Catalog</h2>
                                <p id="totalCatalog" class="text-gray-600 text-lg">{{ \App\Models\Catalog::count() }}<span class="text-green-500 ml-2"><i id="catalogChangeIcon" class="fas fa-caret-up text-green-500"></i></span></p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Total News Card -->
                <div class="w-full md:w-1/2 lg:w-1/2 p-6 transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5 hover:bg-pink-100 hover:border-pink-500">
                        <a href="{{ route('dashboard.news.index') }}" class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-pink-600">
                                    <i class="fa fa-newspaper text-2xl text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-800">Total News</h2>
                                <p id="totalNews" class="text-gray-600 text-lg">{{ \App\Models\News::count() }}<span class="text-green-500 ml-2"><i id="newsChangeIcon" class="fas fa-caret-up text-green-500"></i></span></p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Total Banner Card -->
                <div class="w-full md:w-1/2 lg:w-1/2 p-6 transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-5 hover:bg-blue-100 hover:border-blue-500">
                        <a href="{{ route('dashboard.carousel.index') }}" class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600">
                                    <i class="fa fa-image text-2xl text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-800">Total Banner</h2>
                                <p id="totalBanner" class="text-gray-600 text-lg">{{ \App\Models\Carousel::count() }}<span class="text-green-500 ml-2"><i id="bannerChangeIcon" class="fas fa-caret-up text-green-500"></i></span></p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Total Users Card -->
                <div class="w-full md:w-1/2 lg:w-1/2 p-6 transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5 hover:bg-yellow-100 hover:border-yellow-500">
                        <a href="{{ route('dashboard.profile.index') }}" class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600">
                                    <i class="fa fa-user text-2xl text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-800">Total Users</h2>
                                <p id="totalUsers" class="text-gray-600 text-lg">{{ \App\Models\User::count() }}<span class="text-green-500 ml-2"><i id="userChangeIcon" class="fas fa-caret-up text-green-500"></i></span></p>
                            </div>
                        </a>
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

<script>
    function getRealTimeChanges() {
        $.ajax({
            url: '{{ route("dashboard.getRealTimeChanges") }}',
            method: 'GET',
            success: function(response) {
                // Update nilai pada halaman HTML dengan nilai dari response
                updateRealTimeChanges(response);
            },
            error: function(error) {
                console.error('Error fetching real-time changes:', error);
            }
        });
    }

    function updateRealTimeChanges(data) {
        // Update nilai pada setiap kartu dengan nilai dari response
        $('#totalCatalog').text(data.catalogCount);
        $('#totalNews').text(data.newsCount);
        $('#totalBanner').text(data.bannerCount);
        $('#totalUsers').text(data.userCount);

        // Update icon berdasarkan perubahan
        updateIcon('catalogChangeIcon', data.catalogChange);
        updateIcon('newsChangeIcon', data.newsChange);
        updateIcon('bannerChangeIcon', data.bannerChange);
        updateIcon('userChangeIcon', data.userChange);
    }

    function updateIcon(iconId, changeValue) {
        // Update ikon berdasarkan nilai perubahan
        var iconClass = (changeValue >= 0) ? 'fas fa-caret-up text-green-500' : 'fas fa-caret-down text-red-500';
        $('#' + iconId).attr('class', iconClass);
    }

    setInterval(getRealTimeChanges, 5000);
</script>

@endsection
