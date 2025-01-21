<!-- resources/views/news/index.blade.php -->

@section('title', 'News')
@extends('layouts.main')

@section('content')

<section id="top">
    <div class="relative overflow-hidden bg-cover bg-no-repeat" style="background-position: 50%; background-image: url('assets/images/bg-news.jpg'); height: 380px;">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.679)">
            <div class="flex h-full items-center justify-center">
                <div class="px-6 text-center text-white md:px-12">
                    <h1 class="mb-6 text-5xl font-bold">OUR LIFESTYLE</h1>
                    <h3 class="mb-8 text-3xl font-light">Get updates with your style</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pencarian -->
<section id="search">
    <div class="max-w-7xl mx-auto p-4 sm:p-6 md:p-8 mt-10">
        <div class="relative">
            <form action="{{ route('news.index') }}" method="GET">
                <input type="text" name="search" class="border border-solid outline-none focus:border-gray-800 text-gray-700 px-4 py-2 rounded-md w-full transition-all duration-400 ease-in-out focus:placeholder:opacity-0" placeholder="Search">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-3">
                    <svg class="" fill="#000000" width="20px" height="20px" viewBox="-2.5 -2.5 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="jam jam-search"><path d='M8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12zm6.32-1.094l3.58 3.58a1 1 0 1 1-1.415 1.413l-3.58-3.58a8 8 0 1 1 1.414-1.414z'/></svg>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Pemisah -->
<div class="w-full bg-gray-300 h-px"></div>

<section id="news">
    <div class="p-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 md:gap-5 lg:grid-cols-2 xl:grid-cols-3 gap-3">
    @forelse($news as $item)
        <div class="group rounded overflow-hidden outline outline-1 outline-gray-300 relative flex flex-col">
            <div class="relative">
                <div class="relative">
                    <img class="w-full h-80 object-cover transition-transform transform group-hover:brightness-75" src="{{ $item->image_url }}" alt="{{ $item->title }}">
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <a href="{{ route('news.show', $item->id) }}" class="text-white font-light text-lg transition-transform transform hover:rounded-full px-7 py-1 bg-transparent border border-white duration-500 hover:bg-white hover:text-black">Read More</a>
                    </div>
                </div>
            </div>
            <div class="lg:px-6 py-2">
                <div class="font-normal text-xl mb-2 text-center">{{ $item->title }}</div>
                <div class="font-normal text-medium mb-2 text-center">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 50) }}</div>
            </div>
        </div>
    @empty
        <p class="text-center text-xl font-bold mt-5">No updates available</p>  
    @endforelse
    </div>
</section>

@endsection