@section('title', $news->title)
@extends('layouts.main')
@section('content')

    <div class="container mx-auto px-4 py-8 mt-20">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Kolom Kiri (Content Berita dan Komentar) -->
            <div class="lg:col-span-3">
                <!-- Judul Berita -->
                <h1 class="text-3xl sm:text-4xl font-bold text-orange-600 mb-4">{{ $news->title }}</h1>

                <!-- Gambar Berita -->
                <div class="mb-8">
                    <img src="{{ asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}"
                        class="w-full h-64 sm:h-96 object-cover rounded-lg shadow-lg">
                </div>

                <!-- Deskripsi Lengkap -->
                <div class="prose max-w-none mb-8 text-gray-600">
                    {!! $news->content !!}
                </div>

                <!-- Garis Pembatas -->
                <hr class="my-8 border-t-2 border-gray-300">

                <!-- Informasi Penulis dan Tanggal Terbit -->
                <div class="flex flex-col sm:flex-row items-center justify-between mb-8 gap-4">
                    <div class="text-sm text-gray-600">
                        <span>Created by {{ $news->user->name }}</span>
                        <span class="mx-1">•</span>
                        <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }}</span>
                    </div>

                    <!-- Tombol Share ke Media Sosial -->
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Share:</span>
                        <a href="#" class="text-gray-500 hover:text-orange-600 transition duration-300">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-orange-600 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-orange-600 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-orange-600 transition duration-300">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- Related News -->
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-orange-600 mb-6">Related News</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($relatedArticles as $related)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden">
                                <a href="{{ route('news.show', $related->slug) }}">
                                    <img src="{{ asset('storage/' . $related->image_url) }}" alt="{{ $related->title }}"
                                        class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold text-black hover:text-orange-600">
                                            {{ $related->title }}</h3>
                                        <p class="mt-2 text-gray-600">{{ Str::limit(strip_tags($related->content), 100) }}
                                        </p>
                                        <div class="mt-4 flex flex-wrap gap-1 text-sm text-gray-600">
                                            <span>By {{ $related->user->name }},</span>
                                            <span>{{ \Carbon\Carbon::parse($related->published_at)->diffForHumans() }} / </span>
                                            @foreach (explode(',', $related->tags) as $tag)
                                                <span class="text-orange-600">{{ trim($tag) }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </a>
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
                            <textarea name="comment" rows="3"
                                class="w-full p-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-600"
                                placeholder="Add a comment..."></textarea>
                            <button type="submit"
                                class="mt-2 px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition duration-300">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan (Search, Postingan Terbaru, Popular Post) -->
            <div class="lg:col-span-1">
                <!-- Search -->
                <div class="mb-8">
                    <form action="{{ route('news.search') }}" method="GET">
                        <div class="relative">
                            <input type="text" name="query" placeholder="Search here..."
                                class="w-full text-sm px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-600">
                            <button type="submit" class="absolute right-2 top-2 text-gray-500 hover:text-orange-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Postingan Terbaru -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-orange-600 mb-4">Postingan Terbaru</h3>
                    <ul class="space-y-2">
                        @foreach ($recentPosts as $post)
                            <li>
                                <a href="{{ route('news.show', $post->slug) }}"
                                    class="text-gray-600 hover:text-orange-600 transition duration-300">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Popular Post -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-orange-600 mb-4">Popular Post</h3>
                    <ul class="space-y-2">
                        @foreach ($popularPosts as $post)
                            <li>
                                <a href="{{ route('news.show', $post->slug) }}"
                                    class="text-gray-600 hover:text-orange-600 transition duration-300">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .prose ol {
            list-style-type: decimal;
            margin-left: 1.5rem;
        }

        .prose ul {
            list-style-type: disc;
            margin-left: 1.5rem;
        }

        .prose li {
            margin-bottom: 0.5rem;
        }
    </style>

@endsection
