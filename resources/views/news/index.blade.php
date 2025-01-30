<!-- resources/views/news/index.blade.php -->

@section('title', 'News')
@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-4 py-4">
        <h1 class="text-3xl font-bold text-orange-600 my-8">News</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($news as $item)
                <a href="{{ route('news.show', $item->id) }}">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->title }}"
                            class="w-full h-48 object-cover">
                        <div class="p-6">

                            <h2 class="text-xl font-semibold text-black mt-2">{{ $item->title }}</h2>
                            <p class="text-gray-700 mt-2">{!! Str::limit($item->content, 100) !!}</p>
                            <div class="mt-4 flex justify-start gap-3 items-center">
                                <span class="text-sm text-gray-600">By {{ $item->user->name }}</span>
                            <span class="text-sm text-gray-600">{{ $item->category->name }}</span>
                                <span class="text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($item->published_at)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
