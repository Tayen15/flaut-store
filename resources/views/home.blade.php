@section('title', 'Home')

@extends('layouts.main')
@section('content')

    {{-- Hero section --}}
    <section id="hero" class="mt-24 p-4">
        <div class="relative overflow-hidden mx-auto mt-3 max-w-7xl">
            <div id="carousel" class="flex transition-transform">
                @foreach ($carouselImages as $item)
                    <div class="min-w-full h-64 flex items-center justify-center text-2xl ">
                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}"
                            class="h-full w-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="flash-sale-catalog" class="py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <p class="text-base font-semibold uppercase tracking-wide text-red-600">
                    Limited Time Offers
                </p>
                <h2 class="font-heading mb-4 font-bold tracking-tight text-black text-3xl sm:text-5xl">
                    Flash Sale Catalog
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-500">
                    Don't miss out on our limited-time offers and exclusive deals.
                </p>
            </div>
            <div class="relative w-full h-auto rounded-2xl bg-cover bg-center flex items-center justify-center">
                <div class="flex items-center justify-center gap-4">
                    <div class="timer">
                        <div
                            class="rounded-xl bg-white backdrop-blur-sm py-3 min-w-[96px] flex items-center justify-center flex-col gap-1 px-3">
                            <h3
                                class="countdown-element days font-manrope font-semibold text-2xl text-black text-center">
                            </h3>
                            <p class="text-lg uppercase font-normal text-black mt-1 text-center w-full">Days</p>
                        </div>
                    </div>
                    <div class="timer">
                        <div
                            class="rounded-xl bg-white backdrop-blur-sm py-3 min-w-[96px] flex items-center justify-center flex-col gap-1 px-3">
                            <h3
                                class="countdown-element hours font-manrope font-semibold text-2xl text-black text-center">
                            </h3>
                            <p class="text-lg uppercase font-normal text-black mt-1 text-center w-full">Hours</p>
                        </div>
                    </div>
                    <div class="timer">
                        <div
                            class="rounded-xl bg-white backdrop-blur-sm py-3 min-w-[96px] flex items-center justify-center flex-col gap-1 px-3">
                            <h3
                                class="countdown-element minutes font-manrope font-semibold text-2xl text-black text-center">
                            </h3>
                            <p class="text-lg uppercase font-normal text-black mt-1 text-center w-full">Minutes</p>
                        </div>
                    </div>
                    <div class="timer">
                        <div
                            class="rounded-xl bg-white backdrop-blur-sm py-3 min-w-[96px] flex items-center justify-center flex-col gap-1 px-3">
                            <h3
                                class="countdown-element seconds font-manrope font-semibold text-2xl text-black text-center">
                            </h3>
                            <p class="text-lg uppercase font-normal text-black mt-1 text-center w-full">Seconds</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-y-10 gap-x-14 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($catalogs as $product)
                    <div class="bg-white shadow-md rounded-xl duration-500 hover:shadow-xl">
                        <a href="{{ route('catalog.show', $product->id) }}">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                class="h-80 w-full object-cover rounded-t-xl" />
                            <div class="p-4">
                                <span class="text-gray-400 uppercase text-xs">{{ $product->brand }}</span>
                                <p class="text-lg font-bold text-black truncate">{{ $product->name }}</p>
                                <div class="flex items-center mt-2">
                                    <p class="text-lg font-semibold text-black">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                    @if ($product->discount_price)
                                        <del class="ml-2 text-sm text-gray-600">Rp
                                            {{ number_format($product->original_price, 0, ',', '.') }}</del>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
