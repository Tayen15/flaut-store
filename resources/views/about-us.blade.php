
@section('title', 'About Us')
@extends('layouts.main')
@section('content')

{{-- About Us --}}
<section id="about-us" class="mt-10 bg-gray-100">
    <div class="text-center pt-20">
        <span class="text-gray-500 border-b-2 border-orange-600 uppercase">About us</span>
        <h2 class="my-4 font-bold text-3xl sm:text-4xl">About <span class="text-orange-600">Our Company</span></h2>
    </div>
    <div class="sm:flex items-center w-full">
        <div class="sm:w-1/2 p-10">
            <div class="image object-center text-center">
                <img src="assets/images/logo.png" alt="Flaut Image">
            </div>
        </div>
        <div class="about sm:w-1/2 p-5">
            <div class="text">
                <div class="sm:flex">
                    <p class="text-gray-700 sm:w-1/2 lg:pr-1">
                        Selamat datang di Flaut, destinasi fashion online yang memahami bahwa gaya adalah ungkapan dari keunikan diri. Flaut didirikan dengan visi untuk memberikan inspirasi fashion yang tak terlupakan, di mana setiap orang dapat menemukan gaya yang mencerminkan kepribadian pembeli.
                    </p>
                    <p class="text-gray-700 sm:w-1/2 lg:pl-2">
                        Flaut memberikan pengalaman berbelanja yang tak tertandingi dengan koleksi terbaru kami. Jelajahi ragam pilihan baju terkini yang dirancang untuk memenuhi segala kebutuhan gaya Anda. Berkualitas tinggi dan penuh perhatian, setiap produk kami dirancang dengan detail yang cermat untuk memberikan kenyamanan dan gaya tanpa kompromi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.newsletter')

@endsection