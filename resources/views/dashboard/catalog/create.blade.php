<!-- resources/views/catalog/create.blade.php -->
@extends('layouts.dashboard')

@section('admin')
    <section id="create-catalog" class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
        <!-- Page Header -->
        <div class="bg-gray-800 pt-3">
            <div class="flex items-center justify-between rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Create Catalog</h1>
            </div>
        </div>

        <div class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-2">
            <form action="{{ route('dashboard.catalog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-black font-medium" for="name">Name <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                        <input id="name" name="name" type="text" autocomplete="organization-title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                    </div>

                    <div>
                        <label class="text-black font-medium" for="category">Category <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                        <input id="category" name="category" type="text" autocomplete="category" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-black font-medium" for="price">Price <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                        <input id="price" name="price" type="text" autocomplete="price" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                    </div>

                    <div>
                        <label class="text-black font-medium" for="image">Image</label>
                        <input id="image" name="image" type="file" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
                    </div>
                </div>

                <div class="my-6">
                    <label for="description" class="pb-2"><span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <textarea id="description" name="description" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring default-height"></textarea>
                </div>

                <div class="flex justify-end mt-6">
                    <button class="px-6 py-2 leading-5 mx-5 text-white transition-colors duration-200 transform bg-orange-600 rounded-md hover:bg-orange-700 focus:outline-none focus:bg-gray-600" type="submit">Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection
