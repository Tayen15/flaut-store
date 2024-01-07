@extends('layouts.main')

@section('content')

{{-- Carousel --}}
<section id="carousel" class="relative">
    <div class="carousel-container flex flex-col h-screen items-center justify-center bg-no-repeat bg-cover" style="background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1192125787650932856/Flaut.jpg?ex=65a7f0a8&is=65957ba8&hm=c90f5a7586c6bffda6c1734f203e22aa8ffd82118b49aff1f0212d8113aae0fd&'); background-size: cover;">
        <div class="order-2 text-center text-white font-libre-baskerville">
            <h1 id="flaut" class="text-5xl font-bold mb-4 text-orange-600">F L A U T.</h1>
            <h2 id="" class="text-5xl font-bold mb-4">Welcome to flaut. fashion store </h2>
            <p class="text-xl mb-8">Discover many amazing fashions and more</p>
        </div>
    </div>
</section>

{{-- Carousel Images from Database --}}
<section id="carousel-images" class="mt-10 mb-10">
    <div class="max-w-screen-xl mx-auto">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($carouselImages as $key => $carouselImages)
                    <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                        <img src="{{ $carouselImages->url }}" class="d-block w-100" alt="{{ $carouselImages->alt_text }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

@endsection
