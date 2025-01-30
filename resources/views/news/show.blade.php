
@section('title', $news->title)
@extends('layouts.main')
@section('content')

<section id="top">
    <div class="relative overflow-hidden bg-cover bg-no-repeat h-52 lg:h-96" style="background-position: 50%; background-image: url('https://cdn.discordapp.com/attachments/976824443743645696/1192121409753849896/Flaut2.jpg?ex=65b12714&is=659eb214&hm=ee01196069ce783f7d807a7d3127eb63e9fbd897b1251d253b03e6edbb0451a1&');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.44)">
        </div>
    </div>
</section>

<div class="container mx-auto px-4 py-8">
    <!-- Judul Berita -->
    <h1 class="text-4xl font-bold text-orange-600 mb-4">{{ $news->title }}</h1>

    <!-- Informasi Creator, Tanggal, dan Kategori -->
    <div class="flex items-center text-sm text-gray-600 mb-6">
        <span>By {{ $news->user->name }}</span>
        <span class="mx-2">•</span>
        <span>{{ \Carbon\Carbon::parse($news->updated_at)->format('d F Y') }}</span>
        <span class="mx-2">•</span>
        <div class="flex space-x-2">
            @foreach (explode(',', $news->tags) as $tag)
                <span class="bg-orange-600 text-white px-2 py-1 rounded-full text-xs">{{ trim($tag) }}</span>
            @endforeach
        </div>
        <span class="mx-2">•</span>
        <span class="text-gray-600">{{ $news->view_count }} views</span>
    </div>

    <!-- Gambar Berita -->
    <div class="mb-8">
        <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" class="w-full h-96 object-cover rounded-lg shadow-lg">
    </div>

    <!-- Deskripsi Lengkap -->
    <div class="prose max-w-none mb-8 prosa">
        {!! $news->content !!}
    </div>

    <!-- Tombol Share ke Media Sosial -->
    <div class="flex items-center space-x-4 mb-8">
        <span class="text-gray-600">Share:</span>
        <a href="#" class="text-gray-500 hover:text-orange-600">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="#" class="text-gray-500 hover:text-orange-600">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-gray-500 hover:text-orange-600">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="text-gray-500 hover:text-orange-600">
            <i class="fab fa-linkedin"></i>
        </a>
    </div>

    <!-- Related News -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-orange-600 mb-6">Related News</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($relatedArticles as $related)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $related->image_url) }}" alt="{{ $related->title }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm text-gray-600">{{ $related->category->name }}</span>
                    <h3 class="text-xl font-semibold text-black mt-2">{{ $related->title }}</h3>
                    <p class="text-gray-700 mt-2">{{ Str::limit($related->content, 100) }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-gray-600">By {{ $related->user->name }}</span>
                        <span class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($related->published_at)->format('d F Y') }}</span>
                    </div>
                    <a href="{{ route('news.show', $related->id) }}" class="mt-4 inline-block text-orange-600 hover:underline">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Komentar (Opsional) -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-orange-600 mb-6">Comments</h2>
        <div class="space-y-4">
            <!-- Form Komentar -->
            <form action="#" method="POST" class="mb-6">
                @csrf
                <textarea name="comment" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Add a comment..."></textarea>
                <button type="submit" class="mt-2 px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">Submit</button>
            </form>

            <!-- Daftar Komentar -->
            {{-- <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                    <div>
                        <span class="font-semibold">John Doe</span>
                        <span class="text-sm text-gray-600">• 2 days ago</span>
                    </div>
                </div>
                <p class="mt-2 text-gray-700">This is a great article! Thanks for sharing.</p>
            </div> --}}
        </div>
    </div>
</div>

<style>
    .prosa ol {
        list-style-type: decimal;
        margin-left: 30px;
    }

    .prosa ul {
        list-style-type: disc; 
        color: black; 
        margin-left: 30px;
    }
    .prosa li {
        display: list-item;
    }
</style>
@endsection
