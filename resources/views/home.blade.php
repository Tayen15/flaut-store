
@section('title', 'Home')
    
@extends('layouts.main')
@section('content')

{{-- Carousel --}}
<section id="main-banner" class="relative">
    <div class="carousel-container flex flex-col h-screen items-center justify-center bg-no-repeat bg-cover" style="background-image: url('https://cdn.discordapp.com/attachments/889302084095197199/1237631826617569301/Flautt.jpg?ex=663c59f5&is=663b0875&hm=5a9135943cc12d162cdf86d7c2d301f8a8ee08bf86bb7762c490aa5147c14510&'); background-size: cover;">
        <div class="order-2 text-center text-white font-libre-baskerville">
            <h1 id="flaut" class="text-4xl md:text-4xl 2xl:text-5xl font-bold mb-4 text-orange-600">F L A U T.</h1>
            <h2 id="heading" class="text-4xl md:text-4xl 2xl:text-5xl font-bold mb-4">Welcome to flaut. fashion store </h2>
            <p id="subheading" class="text-base md:text-xl 2xl:text-xl mb-8">Discover many amazing fashions and more</p>
        </div>
    </div>
</section>

<section id="catalog" class="text-center my-14">
    <h2 class="text-xl lg:text-2xl font-bold mb-10 uppercase "><span class="line-through text-gray-800">Collection</span></h2>

    <div class="relative max-w-screen-xl mx-auto">
        <div id="carousel" class="overflow-x-auto xl:overflow-hidden w-full">
            <div class="flex transition-transform ease-in-out duration-300 transform">
                @foreach ($catalogs as $catalog)
                    <div id="#{{ $catalog->id }}" class="w-full h-full xl:h-[370px]  md:w-1/2 lg:w-1/3 xl:w-full px-2 transform left-5 right-5">
                        <a href="{{ route('catalog.show', $catalog->id) }}">
                            <div class="mx-1 w-96 lg:w-[250px] transform overflow-hidden rounded-lg bg-white duration-300 hover:scale-105 hover:shadow-lg">
                                <img class="object-cover object-center w-full h-full lg:w-[250px] lg:h-[300px] md:h-[300px] xl:h-[250px]" src="{{ $catalog->image_url }}" alt="{{ $catalog->name }}">
                                <div class="p-4 pr-2">
                                    <h2 class="mb-2 text-lg sm:text-lg lg:text-base xl:text-lg font-medium text-gray-900 2xl:text-sm">{{ \Illuminate\Support\Str::limit(strip_tags($catalog->name), 30) }}</h2>

                                    <div class="flex justify-center">
                                        <p class="mr-3 text-lg sm:text-lg lg:text-base xl:text-lg font-semibold text-orange-600 2xl:text-base">Rp {{ number_format($catalog->price, 0, ',', '.') }}</p>
                                        @php
                                            $discountTotal = $catalog->price * 1.20;
                                        @endphp
                                        <p class="text-lg sm:text-lg lg:text-base xl:text-lg font-medium text-gray-500 line-through 2xl:text-base">Rp {{ number_format($discountTotal, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="banner" class="text-center mt-15 w-full mt-2">
    <h2 class="text-2xl font-bold my-7 uppercase">Our Style</h2>
    <div class="flex flex-wrap lg:flex-nowrap lg:flex-none md:px-2 lg:px-1 py-3 justify-center items-center md:py-2  my-3">
        @foreach ($carouselImages as $image)
            <div class="w-full mt-3 lg:max-w-xl rounded overflow-hidden mx-2">
                <img src="{{ $image->image_url }}" alt="{{ $image->name }}" class="w-full md:w-full xl:w-full">
            </div>
        @endforeach
    </div>
</section>
@endsection
