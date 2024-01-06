@extends('layouts.main')
@section('content')


{{-- Carousel --}}
<section id="carousel">
    <div class="flex flex-col h-screen items-center justify-center bg-no-repeat bg-cover bg-fixed" style="background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1192125787650932856/Flaut.jpg?ex=65a7f0a8&is=65957ba8&hm=c90f5a7586c6bffda6c1734f203e22aa8ffd82118b49aff1f0212d8113aae0fd&'); background-size: cover;">
        <div class="order-2 text-center text-white font-libre-baskerville">
            <h1 id="flaut" class="text-5xl font-bold mb-4 text-orange-600">F L A U T.</h1>
            <h2 id="" class="text-5xl font-bold mb-4">Welcome to flaut. fashion store </h2>
            <p class="text-xl mb-8">Discover many amazing fashions and more</p>
        </div>
    </div>
</section>

{{-- About Us --}}
<section id="about-us" class="mt-10 mb-10">
    <div class="sm:flex items-center max-w-screen-xl">
        <div class="sm:w-1/2 p-10">
            <div class="image object-center text-center">
                <img src="https://cdn.discordapp.com/attachments/976824443743645696/1192365071083503636/flaut.1_2.png?ex=65a8cf82&is=65965a82&hm=f9183fea4ca358dcf057572f73030e26994e91bf27d7617cf0487ea80d910438&" alt="Flaut Image">
            </div>
        </div>
        <div class="about sm:w-1/2 p-5">
            <div class="text">
                <span class="text-gray-500 border-b-2 border-orange-600 uppercase">About us</span>
                <h2 class="my-4 font-bold text-3xl sm:text-4xl">About <span class="text-orange-600">Our Company</span></h2>
                <div class="sm:flex">
                    <p class="text-gray-700 sm:w-1/2 pr-2">
                        Selamat datang di Flaut, destinasi fashion online yang memahami bahwa gaya adalah ungkapan dari keunikan diri. Flaut didirikan dengan visi untuk memberikan inspirasi fashion yang tak terlupakan, di mana setiap orang dapat menemukan gaya yang mencerminkan kepribadian pembeli.
                    </p>
                    <p class="text-gray-700 sm:w-1/2 pl-2">
                        Flaut memberikan pengalaman berbelanja yang tak tertandingi dengan koleksi terbaru kami. Jelajahi ragam pilihan baju terkini yang dirancang untuk memenuhi segala kebutuhan gaya Anda. Berkualitas tinggi dan penuh perhatian, setiap produk kami dirancang dengan detail yang cermat untuk memberikan kenyamanan dan gaya tanpa kompromi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
