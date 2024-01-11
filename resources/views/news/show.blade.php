@extends('layouts.main')
@section('content')
<section id="articles" class="pt-16 mt-5 mx-24">

    <div class="container mx-auto p-4">
        <article class="bg-white p-8 rounded-lg shadow-md">
            <img src="{{ $news->image_url }}" alt="Gambar Artikel" class="mb-4 rounded-lg">
            <h1 class="text-3xl font-bold mb-4 uppercase">{{ $news->title }}</h1>
            
            <div class="flex items-center mb-4">
                <div class="mx-2">
                    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><path d="M15.09814,12.63379,13,11.42285V7a1,1,0,0,0-2,0v5a.99985.99985,0,0,0,.5.86621l2.59814,1.5a1.00016,1.00016,0,1,0,1-1.73242ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z"/></svg>
                </div>
                <p class="text-gray-600 mr-4">11 Januari 2024</p>•

                <div class="mx-2 ml-3">
                    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z"/></svg>
                </div>
                <p class="text-gray-600"> {{ $news->author }}</p>
            </div>

            <div class="prosa leading-7">
                <p>{!! $news->content !!}</p>
            </div>

            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Tulisan Terkait</h2>
                <ul class="list-none pl-0">
                    <li class="mb-2">
                        <a href="#" class="text-blue-500 hover:underline">Artikel Terkait 1</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-blue-500 hover:underline">Artikel Terkait 2</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-blue-500 hover:underline">Artikel Terkait 3</a>
                    </li>
                </ul>
            </div>
        </article>
    </div>
</section>

@endsection
