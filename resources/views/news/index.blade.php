@extends('layouts.main')

@section('content')

<section id="top">
    <div class="container">
        <div class="relative overflow-hidden bg-cover bg-no-repeat" style="background-position: 50%; background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1193144456120107098/1343c217cb27b58c.jpeg?ex=65aba55d&is=6599305d&hm=9590b881eb67d63d73f681e21b84ced2f6ccd4fbf5fddae90e30c1108fe2fdeb&'); height: 380px">
            <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.679)">
                <div class="flex h-full items-center justify-center">
                    <div class="px-6 text-center text-white md:px-12">
                        <h1 class="mb-6 text-5xl font-bold">OUR LIFESTYLE</h1>
                        <h3 class="mb-8 text-3xl font-light">Get updates with your style</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="news">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 sm:py-14 lg:max-w-7xl ">
        <div class="flex justify-between items-center mb-2">
            <a href="{{ route('catalog.create') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md text-sm font-medium">Add News</a>
        </div>
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 gap-3 mt-5">
            @forelse($news as $item)
                <div class="rounded overflow-hidden shadow-lg max-w-xs">
                    <img class="w-full h-56 object-cover" src="{{ $item->image_url }}" alt="{{ $item->title }}">
                    <div class="px-6 py-2">
                        <div class="font-bold text-xl mb-2">{{ $item->title }}</div>
                        <p class="text-gray-700 text-base">{{ $item->content }}</p>
                    </div>
                    <div class="px-4 pt-3 pb-1">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $item->category }}</span>
                    </div>
                </div>
            @empty
                <p class="text-center text-xl font-bold mt-5">No updates available</p>        
            @endforelse
        </div>
    </div>
</section>


<div class="container mt-14 mx-auto md:px-6 p-8 bg-fixed" style="background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1193148201675526184/download.jpeg?ex=65aba8da&is=659933da&hm=b409f771292a711d2f621606e630ac3a40132c9d011acf468abf86d3129b6c99&')">
    <section class="mb-32 text-center lg:text-left" id="newsletter">
        <div class="flex flex-wrap justify-center">
            <div class="w-full shrink-0 grow-0 basis-auto px-3 md:w-10/12 lg:w-11/12 xl:w-10/12">
                <div class="grid items-center gap-x-6 lg:grid-cols-2">
                    <div class="mb-10 lg:mb-0">
                        <h2 class="text-3xl font-bold dark:text-white">
                            Do not miss any updates.
                            <br />
                            <span class="text-primary dark:text-primary-400">Subscribe to the newsletter</span>
                        </h2>
                        </div>
            
                        <div class="mb-6 flex-row md:mb-0 md:flex">
                        <div class="relative mb-3 w-full md:mr-3 md:mb-0 xl:w-96" data-te-input-wrapper-init>
                            <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-white py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-black dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput2" placeholder="Enter your email" />
                            <label for="exampleFormControlInput2"
                            class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-black dark:peer-focus:text-primary">Enter
                            your email
                            </label>
                        </div>
                        <button type="submit"
                            class="inline-block rounded bg-primary px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
