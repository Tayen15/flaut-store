
@section('title', 'Home')
    
@extends('layouts.main')
@section('content')

{{-- Carousel --}}
<section id="main-banner" class="relative">
    <div class="carousel-container flex flex-col h-screen items-center justify-center bg-no-repeat bg-cover" style="background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1192125787650932856/Flaut.jpg?ex=65a7f0a8&is=65957ba8&hm=c90f5a7586c6bffda6c1734f203e22aa8ffd82118b49aff1f0212d8113aae0fd&'); background-size: cover;">
        <div class="order-2 text-center text-white font-libre-baskerville">
            <h1 id="flaut" class="text-5xl font-bold mb-4 text-orange-600">F L A U T.</h1>
            <h2 id="heading" class="text-5xl font-bold mb-4">Welcome to flaut. fashion store </h2>
            <p id="subheading" class="text-xl mb-8">Discover many amazing fashions and more</p>
        </div>
    </div>
</section>

<section id="catalog" class="text-center my-12">
    <h2 class="text-2xl font-bold mb-4 uppercase">Collection</h2>

    <div class="relative max-w-screen-xl mx-auto">
        <div id="carousel" class="overflow-x-auto w-full">
            <div class="flex transition-transform ease-in-out duration-300 transform">
                @foreach ($catalogs as $catalog)
                    <div id="#{{ $catalog->id }}" class="w-full h-full md:w-1/2 lg:w-1/3 xl:w-full px-2 transform left-5 right-5">
                        <a href="{{ route('catalog.show', $catalog->id) }}">
                            <div class="mx-1 w-96 lg:w-[250px] transform overflow-hidden rounded-lg bg-white duration-300 hover:scale-105 hover:shadow-lg">
                                <img class="object-cover object-center w-full h-full lg:w-[250px] lg:h-[300px] md:h-[300px] xl:h-[350px]" src="{{ $catalog->image_url }}" alt="{{ $catalog->name }}">
                                <div class="p-4 pr-2">
                                    <h2 class="mb-2 text-lg sm:text-lg lg:text-base xl:text-lg font-medium text-gray-900">{{ $catalog->name }}</h2>
                                    <div class="flex items-center">
                                        <p class="mr-3 text-lg sm:text-lg lg:text-base xl:text-lg font-semibold text-orange-600">Rp {{ number_format($catalog->price, 0, ',', '.') }}</p>
                                        @php
                                            $discountTotal = $catalog->price * 1.20;
                                        @endphp
                                        <p class="text-lg sm:text-lg lg:text-base xl:text-lg font-medium text-gray-500 line-through">Rp {{ number_format($discountTotal, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Carousel Navigation --}}
        <button id="prevBtn" href="" class="hidden xl:inline absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-600 focus:outline-none">
            &#10094;
        </button>
        <button id="nextBtn" class="hidden xl:inline absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-600 focus:outline-none">
            &#10095;
        </button>
    </div>
</section>



<section id="banner" class="text-center mt-15">
    <h2 class="text-2xl font-bold my-7 uppercase">Our Style</h2>
    <div class="flex lg:px-1 py-3 justify-center items-center md:py-2 md:px-2 my-3">
        @foreach ($carouselImages as $image)
            <div class="max-w-xl rounded overflow-hidden mx-5">
                <img src="{{ $image->image_url }}" alt="{{ $image->name }}" class="w-full md:w-72 xl:w-full">
            </div>
        @endforeach
    </div>
</section>

{{-- Style Responsive --}}
<style>
    @media (max-width: 426px) {
        #flaut {
            font-size: 28px;
        }

        #heading {
            font-size: 24px;
        }

        #subheading {
            font-size: 14px;
        }
    }

    @media (max-width: 766px) {

        #banner .max-w-xl {
            width: 100%;
            margin-top: 7px;
        }
        #banner .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>

<script>
    let currentIndex = 0;
    const items = document.querySelectorAll('#carousel > div');
    const totalItems = items.length;

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    document.getElementById('nextBtn').addEventListener('click', () => {
        if (currentIndex < totalItems - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalItems - 1;
        }
        updateCarousel();
    });

    function updateCarousel() {
        const newTransformValue = -100 * currentIndex + '%';
        document.querySelector('#carousel > div').style.transform = `translateX(${newTransformValue})`;
    }

    // Toggle visibility of prev/next buttons based on screen size
    function updateBtnVisibility() {
        if (window.innerWidth >= 1024) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
        } else {
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'block';
        }
    }

    // Initial setup
    updateBtnVisibility();

    // Update visibility on window resize
    window.addEventListener('resize', updateBtnVisibility);
</script>
@endsection
