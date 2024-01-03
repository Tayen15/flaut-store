@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap">


<div class="flex flex-col h-screen items-center justify-center bg-no-repeat bg-cover bg-contain" style="background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1192125787650932856/Flaut.jpg?ex=65a7f0a8&is=65957ba8&hm=c90f5a7586c6bffda6c1734f203e22aa8ffd82118b49aff1f0212d8113aae0fd&'); background-size: cover;">
    <div class="order-2 text-center text-white font-libre-baskerville">
        <h1 class="text-5xl font-bold mb-4">F L A U T</h1>
        <h2 class="text-5xl font-bold mb-4">Welcome to Our Website</h2>
        <p class="text-xl mb-8">Discover amazing features and more</p>
        <a href="#" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full">Get Started</a>
    </div>
</div>


<style>
   /* Tambahkan gaya font untuk elemen dengan class font-libre-baskerville */
   .font-libre-baskerville {
       font-family: 'Libre Baskerville', serif;
   }
</style>



<div class="sm:flex items-center max-w-screen-xl">
    <div class="sm:w-1/2 p-10">
        <div class="image object-center text-center">
            <img src="https://cdn.discordapp.com/attachments/976824443743645696/1192114617116266607/WbQnbas.png?ex=65a7e641&is=65957141&hm=0a918bfbf1f86862de9502a7c159061239e6300c28265580b9c589b058545431&">
        </div>
    </div>
    <div class="about">
    <div class="sm:w-1/2 p-5">
        <div class="text">
            <span class="text-gray-500 border-b-2 border-orange-600 uppercase">About us</span>
            <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="text-orange-600">Our Company</span>
            </h2>
            <p class="text-gray-700">
            Dapatkan gaya yang tak tertandingi dengan koleksi terbaru kami! Jelajahi ragam pilihan baju terkini yang dirancang untuk memenuhi segala kebutuhan gaya Anda. Nikmati diskon spesial yang akan membuat pengalaman belanja Anda semakin menggembirakan. 
            Kami memberikan layanan pengiriman gratis untuk setiap pembelian di atas jumlah tertentu. Belanja sepuasnya tanpa perlu khawatir ongkos kirim!
             Berkualitas tinggi dan penuh perhatian, setiap produk kami dirancang dengan detail yang cermat untuk memberikan kenyamanan dan gaya tanpa kompromi.
             Dengan situs web dan aplikasi mobile kami yang user-friendly, belanja baju menjadi lebih mudah dan menyenangkan. Pilih, bayar, dan tunggu paket istimewa Anda tiba di depan pintu.
            Jangan lewatkan kesempatan ini untuk memperbarui lemari pakaian Anda dengan gaya yang selalu trendi dan terkini. 
            </p>
        </div>
    </div>
</div>
</div>

@endsection
