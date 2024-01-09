<!-- resources/views/news/edit.blade.php -->
@extends('layouts.main')

@section('content')
    <div class="bg-white mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 rounded-md shadow-md">
        <h1 class="text-3xl font-semibold mb-6">Edit News</h1>
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" class="form-input mt-1 block w-full" required>
                </div>
    
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-600">Content</label>
                    <textarea name="content" id="content" class="form-input mt-1 block w-full" rows="4">{{ old('content', $news->content) }}</textarea>
                </div>
    
                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-gray-600">Author</label>
                    <input type="text" name="author" id="author" value="{{ old('author', $news->author) }}" class="form-input mt-1 block w-full" required>
                </div>
    
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-600">Image</label>
                    <input type="file" name="image" id="image" class="form-input mt-1 block w-full">
                </div>
    
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update News
                </button>
            </div>

        </form>
    </div>
@endsection
