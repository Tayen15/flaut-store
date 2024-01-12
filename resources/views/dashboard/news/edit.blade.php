<!-- resources/views/news/edit.blade.php -->
@extends('layouts.dashboard')

@section('admin')
<section class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Page Header -->
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2">Edit News</h1>
        </div>
    </div>

    <div class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-2">
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black font-medium" for="title">Title</label>
                    <input id="title" name="title" value="{{ $news->title }}" type="text" autocomplete="organization-title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-black font-medium" for="author">Author</label>
                    <input id="author" name="author" type="text" value="{{ $news->author }}" autocomplete="additional-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
                </div>

            </div>
            <div class="my-6">
                <textarea id="content" name="content" type="textarea" class="block w-full px-4 py-10 mt-2 text-gray-700 bg-white bo rder rounded-md focus:outline-none focus:ring">{{ $news->content }}</textarea>
            </div>

            <div class="flex justify-end mt-6">
                <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-orange-600 rounded-md hover:bg-orange-700 focus:outline-none focus:bg-gray-600" type="submit">Save</button>
            </div>
        </form>
    </div>
</section>
@endsection
