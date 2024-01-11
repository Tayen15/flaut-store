<!-- resources/views/news/edit.blade.php -->
@extends('layouts.main')

@section('content')
<section class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-20">
    <h1 class="text-xl font-bold text-black capitalize dark:text-black mb-5">Edit News</h1>
    <form action="{{ route('catalog.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-black font-medium" for="name">catalog name</label>
                <input id="name" name="name" value="{{ $catalog->name }}" type="text" autocomplete="organization-title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-black font-medium" for="author">price</label>
                <input id="price" name="price" type="number" value="{{ $catalog->price }}" autocomplete="additional-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-black font-medium" for="passwordConfirmation">description</label>
                <textarea id="description" name="description" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">{{ $catalog->description }}</textarea>
            </div>

            <div>
                <label class="text-black font-medium" for="author">category</label>
                <input id="category" name="category" type="text" value="{{ $catalog->category }}" autocomplete="additional-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
            </div>

        </div>

        <div class="flex justify-end mt-6">
            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-orange-600 rounded-md hover:bg-orange-700 focus:outline-none focus:bg-gray-600" type="submit">Save</button>
        </div>
    </form>
</section>
@endsection
