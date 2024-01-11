<!-- resources/views/news/edit.blade.php -->
@extends('layouts.main')

@section('content')
<section class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-20">
    <h1 class="text-xl font-bold text-black capitalize dark:text-black mb-5">Edit News</h1>
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-black font-medium" for="title">Title</label>
                <input id="title" type="text" autocomplete="organization-title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-black font-medium" for="author">Author</label>
                <input id="author" type="text" autocomplete="additional-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-black font-medium" for="passwordConfirmation">Text Area</label>
                <textarea id="content" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-black">
                Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span class="">Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                        </label>
                        <p class="pl-1 text-black font-normal">or drag and drop</p>
                    </div>
                    <p class="text-xs text-black">
                        PNG, JPG, JPEG up to 5MB
                    </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex justify-end mt-6">
            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-orange-600 rounded-md hover:bg-orange-700 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section>
@endsection
