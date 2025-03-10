{{-- resources/views/catalog/index.blade.php --}}

@section('title', 'Catalog')
@extends('layouts.main')

@section('content')
<div class="w-max-7xl mx-auto p-4 sm:p-6 md:p-8 mt-16">
    <!-- Pencarian -->
    <div class="mb-4 relative">
        <form action="{{ route('catalog.index') }}" method="GET">
            <input type="text" name="search" class="border border-solid outline-none focus:border-gray-800 text-gray-700 px-4 py-2 rounded-md w-full transition-all duration-400 ease-in-out focus:placeholder:opacity-0" placeholder="Search">
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-3">
                <svg class="" fill="#000000" width="20px" height="20px" viewBox="-2.5 -2.5 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="jam jam-search"><path d='M8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12zm6.32-1.094l3.58 3.58a1 1 0 1 1-1.415 1.413l-3.58-3.58a8 8 0 1 1 1.414-1.414z'/></svg>
            </button>
        </form>
    </div>

    <!-- Pemisah -->
    <div class="w-full bg-gray-300 h-px my-2 md:my-8 sm:my-10"></div>

    <!-- Card-Card -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @forelse($catalogs as $catalog)
            <div class="group relative">
                <a href="{{ route('catalog.show', $catalog->id) }}">
                <div class="mx-3 md:w-full lg:w-full transform overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-lg">
                    <img class="w-full h-96 sm:h-72 xl:h-80 2xl:h-[250px] object-cover object-center" src="{{ $catalog->image_url }}" alt="{{ $catalog->name }}" />
                    <div class="p-4 pr-2 ">
                        <h2 class="mb-2 text-center text-base sm:text-lg font-medium text-gray-900 2xl:text-sm">{{ \Illuminate\Support\Str::limit(strip_tags($catalog->name), 35) }}</h2>
                        <div class="flex justify-center">
                            <p class="mr-2 text-lg sm:text-xl md:text-sm xl:text-xl font-semibold text-orange-600 2xl:text-base">Rp {{ number_format($catalog->price, 0, ',', '.') }}</p>
                            @php
                                $discountTotal = $catalog->price * 1.20;
                            @endphp
                            <p class="text-lg sm:text-xl md:text-sm font-medium xl:text-xl text-gray-500 line-through 2xl:text-base">Rp {{ number_format($discountTotal, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        @empty
            <p class="text-center uppercase border border-solid border-orange-600">Can't find the catalog you are looking for</p>
        @endforelse
    </div>
</div>
@endsection