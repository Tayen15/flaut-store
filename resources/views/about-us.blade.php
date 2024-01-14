@extends('layouts.main')
@section('content')

<section id="contact">
    <div class="relative flex items-top justify-center min-h-screen bg-slate-200 sm:items-center sm:pt-0 shadow-md">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 mr-2 bg-orange-600 sm:rounded-lg">
                        <h1 class="text-4xl sm:text-5xl text-white font-bold tracking-tight">
                            Get in touch
                        </h1>    
                        <div class="flex items-center mt-8 text-white">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold">
                                Flaut Store
                            </div>
                        </div>
    
                    <div class="flex items-center mt-4 text-white">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold">
                                +62 122111
                            </div>
                        </div>
    
                        <div class="flex items-center mt-2 text-white">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold">
                                info@flaut.com
                            </div>
                        </div>
                    </div>
    
                    <form class="p-6 flex flex-col justify-center">
                        <div class="flex flex-col">
                            <label for="name" class="sr-only">Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Full Name" class="w-full mt-2 py-3 px-3 rounded-lg bg-white focus:outline-none">
                        </div>
    
                        <div class="flex flex-col mt-2">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="w-full mt-2 py-3 px-3 rounded-lg bg-white focus:outline-none">
                        </div>
                        <div class="flex flex-col mt-2">
                                <label for="tel" class="hidden">Number</label>
                                <input type="tel" name="tel" id="tel" placeholder="Telephone Number" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white focus:outline-none">
                         </div>
    
                        <button type="submit" class="md:w-32 bg-orange-600 text-white font-bold py-3 px-6 rounded-md mt-3 hover:bg-orange-400 transition ease-in-out duration-300">
                         Submit
                        </button>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- About Us --}}
<section id="about-us" class="mt-10 mb-10 mx-16">
    <div class="sm:flex items-center max-w-screen-xl">
        <div class="sm:w-1/2 p-10">
            <span class="text-gray-500 border-b-2 border-orange-600 uppercase">About us</span>
            <h2 class="my-4 font-bold text-3xl sm:text-4xl">About <span class="text-orange-600">Our Company</span></h2>
            <div class="image object-center text-center">
                <img src="https://cdn.discordapp.com/attachments/976824443743645696/1192365071083503636/flaut.1_2.png?ex=65a8cf82&is=65965a82&hm=f9183fea4ca358dcf057572f73030e26994e91bf27d7617cf0487ea80d910438&" alt="Flaut Image">
            </div>
        </div>
        <div class="about sm:w-1/2 p-5">
            <div class="text">
                <div class="sm:flex">
                    <p class="text-gray-700 sm:w-1/2 pr-1">
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