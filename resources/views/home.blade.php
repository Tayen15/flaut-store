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


<section id="banner" class="text-center">
    <h2 class="text-3xl font-bold mb-4 mt-10">Our Style</h2>

    <div class="flex px-3 py-3 justify-center items-center">
        @foreach ($carouselImages as $image)
            <div class="max-w-sm rounded overflow-hidden">
                <img src="{{ $image->image_url }}" alt="" class="w-full">
            </div>
        @endforeach
    </div>
</section>


@endsection
