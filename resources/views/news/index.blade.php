@extends('layouts.main')
@section('content')
<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5 mt-20">
    @foreach($news as $article)
        <div class="rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ $article->image_url }}" alt="{{ $article->title }}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $article->title }}</div>
                <p class="text-gray-700 text-base">
                    {{ $article->content }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $article->category }}</span>
            </div>
        </div>
    @endforeach
</div>
@endsection
