<!-- resources/views/layouts/main.blade.php -->

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
            <a href="{{ route('news.create') }}" class="text-white bg-orange-600 duration-300 hover:bg-orange-700 px-4 py-2 rounded-md text-sm font-medium">Add News</a>
        </div>
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 gap-3 mt-5">
        @forelse($news as $item)
            <div class="group rounded overflow-hidden outline outline-1 outline-gray-300 max-w-xs relative flex flex-col">
                <div class="relative flex-grow">
                    <img class="w-full h-56 object-cover transition-transform transform group-hover:brightness-75" src="{{ $item->image_url }}" alt="{{ $item->title }}">
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <a href="{{ route('news.show', $item->id) }}" class="text-white font-light text-lg transition-transform transform hover:rounded-full px-7 py-1 bg-transparent border border-white duration-500 hover:bg-white hover:text-black">Read More</a>
                    </div>
                </div>
                <div class="px-6 py-2">
                    <div class="font-normal text-xl mb-2 text-center">{{ $item->title }}</div>
                    <div class="font-normal text-medium mb-2 text-center">{!! $item->content !!}</div>
                </div>
                <div class="flex justify-between items-center px-6 pt-3 pb-5">
                    <a href="{{ route('news.edit', $item->id) }}" class="text-white bg-orange-600 duration-300 hover:bg-orange-700 px-4 py-2 rounded-md text-sm font-medium">Edit</a>
                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-orange-600 duration-300 hover:bg-orange-700 px-4 py-2 rounded-md text-sm font-medium">Delete</button>
                    </form>
                </div>
            </div>
        
        @empty
            <p class="text-center text-xl font-bold mt-5">No updates available</p>  
            
            @endforelse
        </div>
        {{ $news->links() }}
    </div>
</section>


@endsection