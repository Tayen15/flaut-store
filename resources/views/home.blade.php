
@section('title', 'Home')
    
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

{{-- <section id="catalog" class="text-center mt-10">
    <h2 class="text-2xl font-semibold mb-4 uppercase">Recommendation Style</h2>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Recommendation Catalog</h2>
                <a href="{{ route('catalog.create') }}" class="text-white bg-orange-600 duration-300 hover:bg-orange-700 px-4 py-2 rounded-md text-sm font-medium">Add Catalog</a>
            </div>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($catalogs as $catalog)
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:overflow-hidden group-hover:shadow-xl lg:h-80">
                            
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('catalog.show', $catalog->id) }}">
                                        {{ $catalog->name }}
                                    </a>
                                </h3>
                            </div>
                            <p class="text-sm font-medium text-gray-900">Rp{{ number_format($catalog->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}


<section id="banner" class="text-center mt-10">
    <h2 class="text-2xl font-bold mb-4 uppercase">Our Style</h2>
    <div class="flex px-3 py-3 justify-center items-center">
        @foreach ($carouselImages as $image)
            <div class="max-w-xl rounded overflow-hidden mx-5">
                <img src="{{ $image->image_url }}" alt="{{ $image->name }}" class="w-full">
            </div>
        @endforeach
    </div>
</section>



@endsection
