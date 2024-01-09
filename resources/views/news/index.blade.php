@extends('layouts.main')

@section('content')

<section id="top">
    <div class="container">
        <div class="relative overflow-hidden bg-cover bg-no-repeat" style="background-position: 50%; background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1193144456120107098/1343c217cb27b58c.jpeg?ex=65aba55d&is=6599305d&hm=9590b881eb67d63d73f681e21b84ced2f6ccd4fbf5fddae90e30c1108fe2fdeb&'); height: 380px">
            <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.679)">
                <div class="flex h-full items-center justify-center">
                    <div class="px-4 text-center text-white md:px-12">
                        <h1 class="mb-4 text-3xl md:text-5xl font-bold">OUR LIFESTYLE</h1>
                        <h3 class="mb-8 text-lg md:text-3xl font-light">Get updates with your style</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="news">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 sm:py-14 lg:max-w-7xl">
        <div class="flex justify-center sm:justify-end items-center mb-2">
            <a href="{{ route('news.create') }}" class="text-white bg-orange-600 hover:bg-orange-700 px-3 py-2 rounded-md text-sm font-medium">Add News</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mt-5">
            @forelse($news as $item)
                <div class="group rounded overflow-hidden shadow-lg relative">
                    <div class="relative">
                        <img class="w-full h-56 object-cover transition-transform transform group-hover:brightness-75" src="{{ $item->image_url }}" alt="{{ $item->title }}">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <a href="#" class="text-white font-light text-sm md:text-lg transition-transform transform hover:rounded-full px-4 py-1 bg-transparent border border-white duration-500 hover:bg-white hover:text-black">Read More</a>
                        </div>
                    </div>
                    <div class="px-4 py-2">
                        <div class="font-bold text-xl mb-2">{{ $item->title }}</div>
                    </div>
                    <div class="flex justify-between px-4 pt-2 pb-1">
                        <a href="{{ route('news.edit', $item->id) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded-md text-sm font-medium">Edit</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-sm font-medium">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-lg font-bold mt-5">No updates available</p>  
            @endforelse
        </div>
    </div>
</section>

<div class="container mt-14 mx-auto md:px-6 p-8 bg-fixed" style="background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1193148201675526184/download.jpeg?ex=65aba8da&is=659933da&hm=b409f771292a711d2f621606e630ac3a40132c9d011acf468abf86d3129b6c99&')">
    <section class="mb-10 text-center lg:text-left" id="newsletter">
        <div class="flex flex-wrap justify-center">
            <div class="w-full sm:w-10/12 lg:w-11/12 xl:w-10/12">
                <div class="grid items-center gap-x-6 lg:grid-cols-2">
                    <div class="mb-6 lg:mb-0">
                        <h2 class="text-xl md:text-3xl lg:text-3xl font-bold dark:text-white">
                            Do not miss any updates.
                            <br />
                            <span class="text-primary dark:text-primary-400">Subscribe to the newsletter</span>
                        </h2>
                    </div>
            
                    <div class="flex-grow relative w-full md:mr-3 xl:w-96" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer block w-full rounded border-0 bg-white py-2 px-4 leading-5 outline-none transition-all duration-200 ease-linear dark:text-black dark:placeholder:text-black dark:peer-focus:text-primary focus:outline-none focus:ring focus:border-blue-300"
                            id="exampleFormControlInput2" />
                        <label for="exampleFormControlInput2"
                            class="pointer-events-none absolute top-0 left-3 max-w-[90%] origin-[0_0] truncate pt-1 leading-5 text-neutral-500 transition-all duration-200 ease-out dark:text-black dark:peer-focus:text-primary">Enter
                            your email
                        </label>
                        <button type="submit"
                        class="inline-block rounded bg-primary px-4 py-2 text-sm font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-600 focus:bg-primary-600 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50 dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] my-3"
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
