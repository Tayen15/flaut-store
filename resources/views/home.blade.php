@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap">


<div class="flex flex-col h-screen items-center justify-center bg-no-repeat bg-cover bg-contain" style="background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1192125787650932856/Flaut.jpg?ex=65a7f0a8&is=65957ba8&hm=c90f5a7586c6bffda6c1734f203e22aa8ffd82118b49aff1f0212d8113aae0fd&'); background-size: cover;">
    <div class="order-2 text-center text-white font-libre-baskerville">
        <h1 class="text-5xl font-bold mb-4 text-orange-600">F L A U T.</h1>
        <h2 class="text-5xl font-bold mb-4">Welcome to flaut. fashion store </h2>
        <p class="text-xl mb-8">Discover amazing many of fashion and more</p>
    </div>
</div>


<style>
   .font-libre-baskerville {
       font-family: 'Libre Baskerville', serif;
       
   }
</style>



<div class="sm:flex items-center max-w-screen-xl mt-10 mb-10">
    <div class="sm:w-1/2 p-10">
        <div class="image object-center text-center">
            <img src="https://cdn.discordapp.com/attachments/976824443743645696/1192365071083503636/flaut.1_2.png?ex=65a8cf82&is=65965a82&hm=f9183fea4ca358dcf057572f73030e26994e91bf27d7617cf0487ea80d910438&">
        </div>
    </div>
    <div class="about sm:w-1/2 p-5">
        <div class="text">
            <span class="text-gray-500 border-b-2 border-orange-600 uppercase">About us</span>
            <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="text-orange-600">Our Company</span></h2>
            <div class="sm:flex">
                <p class="text-gray-700 sm:w-1/2 pr-2">
                    Dapatkan gaya yang tak tertandingi dengan koleksi terbaru kami! Jelajahi ragam pilihan baju terkini yang dirancang untuk memenuhi segala kebutuhan gaya Anda. Nikmati diskon spesial yang akan membuat pengalaman belanja Anda semakin menggembirakan. Kami memberikan layanan pengiriman gratis untuk setiap pembelian di atas jumlah tertentu. Belanja sepuasnya tanpa perlu khawatir ongkos kirim!
                </p>
                <p class="text-gray-700 sm:w-1/2 pl-2">
                    Berkualitas tinggi dan penuh perhatian, setiap produk kami dirancang dengan detail yang cermat untuk memberikan kenyamanan dan gaya tanpa kompromi. Dengan situs web dan aplikasi mobile kami yang user-friendly, belanja baju menjadi lebih mudah dan menyenangkan. Pilih, bayar, dan tunggu paket istimewa Anda tiba di depan pintu. Jangan lewatkan kesempatan ini untuk memperbarui lemari pakaian Anda dengan gaya yang selalu trendi dan terkini.
                </p>
            </div>
        </div>
    </div>
</div>


@endsection
