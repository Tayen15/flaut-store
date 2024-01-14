<!-- resources/views/carousel/edit.blade.php -->
@extends('layouts.main')

@section('content')
<section class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-20">
    <h1 class="text-xl font-bold text-black capitalize dark:text-black mb-5">Edit carousel</h1>
    <form action="{{ route('carousel.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-black font-medium" for="name">Title <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                        <input id="name" name="name" type="text" autocomplete="organization-title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                    </div>

                    <div>
                        <label class="text-black font-medium" for="image">Image <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                        <input id="image" name="image" type="file" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                    </div>
                </div>

        <div class="flex justify-end mt-6">
            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-orange-600 rounded-md hover:bg-orange-700 focus:outline-none focus:bg-gray-600" type="submit">Save</button>
        </div>
    </form>
</section>
@endsection
