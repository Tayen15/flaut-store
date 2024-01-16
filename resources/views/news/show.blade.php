
@section('title', $news->title)
@extends('layouts.main')
@section('content')

<section id="top">
    <div class="container">
        <div class="relative overflow-hidden bg-cover w-full min-h-28 sm:min-h-48 md:min-h-80 lg:min-h-96" style="background-position: 50%; background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1192121409753849896/Flaut2.jpg?ex=65b12714&is=659eb214&hm=ee01196069ce783f7d807a7d3127eb63e9fbd897b1251d253b03e6edbb0451a1&'); background-size: cover;">
            <div class="hidden sm:block absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.432)">
                <div class="flex h-full items-center justify-center">
                </div>
            </div>
        </div>
    </div>
</section>



<div class="container mx-auto flex">
    <section id="articles" class="w-3/5 p-4 ml-16">
        <article class="bg-white p-4 md:p-8 flex flex-col items-center md:items-start">
            <img src="{{ $news->image_url }}" alt="Gambar Artikel" class="mb-4 rounded-lg w-full md:w-auto md:max-h-64 lg:max-h-80 xl:max-h-96 md:mr-8">
            
            <div>
                <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-3xl font-bold mb-4 uppercase">{{ $news->title }}</h1>

                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 mx-1 md:mx-1">
                        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z"/></svg>
                    </div>
                
                    <div class="mx-1 md:mx-1">
                        <p class="text-gray-600 mr-4 text-sm md:sm lg:text-sm xl:text-sm"> {{ $news->author }}</p>
                    </div>
                    &#128900;
                    <div class="flex-shrink-0 mx-2 md:mx-3">
                        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><path d="M15.09814,12.63379,13,11.42285V7a1,1,0,0,0-2,0v5a.99985.99985,0,0,0,.5.86621l2.59814,1.5a1.00016,1.00016,0,1,0,1-1.73242ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z"/></svg>
                    </div>
                
                    <div class="mx-1 md:mx-1">
                        <p class="text-gray-600 mr-2 text-sm md:sm lg:text-sm xl:text-sm">{{ \Carbon\Carbon::parse($news->created_at)->format('l, d F Y') }}</p>
                    </div>
                </div>
                

                <div class="prosa leading-7">
                    <p>{!! $news->content !!}</p>
                </div>

                <div class="mt-4 md:mt-8">
                    <h2 class="text-lg md:text-xl lg:text-2xl xl:text-lg font-semibold mb-2 uppercase"><span class="mr-2"><i class="fa-solid fa-chevron-right" style="color: #ea580c;"></i></span> You might also like</h2>
                    <ul class="list-none pl-1">
                        @foreach ($relatedArticles as $article)
                            <li class="mb-2">
                                <a href="#" class="text-blue-500 hover:underline">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </article>
    </section>

    <section class="w-1/4 p-4">
        <!-- Bagian kanan, dapat diisi dengan konten lainnya -->
    </section>
</div>





@endsection
