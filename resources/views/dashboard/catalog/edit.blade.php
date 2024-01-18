

@section('title', 'Edit ' . $catalog->name)
@extends('layouts.dashboard')
@section('admin')
<section class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Page Header -->
    <div class="bg-gray-800 pt-3">
        <div class="flex items-center justify-between rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2">Edit Catalog</h1>
        </div>
    </div>

    {{-- Form Edit Catalog --}}
    <div class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-2">
        <form action="{{ route('catalog.update', $catalog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black font-medium" for="name">Name <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <input id="name" name="name" value="{{ $catalog->name }}" type="text" autocomplete="organization-title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                </div>

                <div>
                    <label class="text-black font-medium" for="category">Category <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <div class="relative">
                        <select id="category" name="category" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring appearance-none" required>
                            <option value="" autofocus></option>
                            <option value="t-shirt" {{ $catalog->category == 't-shirt' ? 'selected' : '' }}>T-Shirt</option>
                            <option value="shirt" {{ $catalog->category == 'shirt' ? 'selected' : '' }}>Shirt</option>
                            <option value="pants" {{ $catalog->category == 'pants' ? 'selected' : '' }}>Pants</option>
                            <option value="accessories" {{ $catalog->category == 'accessories' ? 'selected' : '' }}>Accessories</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black font-medium" for="price">Price <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <input id="price" name="price" type="text" maxlength="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{ $catalog->price }}" autocomplete="price" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                </div>

                <div>
                    <label class="text-black font-medium" for="image">Image <span class="font-light ml-2 text-xs text-red-600">Optional</span></label>
                    <input id="image" name="image" type="file" accept="image/jpg, image/png, image/jpeg" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
                </div>
            </div>

            <div class="my-6">
                <label for="description" class="pb-2"><span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                <textarea id="description" name="description" required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring default-height">{{ $catalog->description }}</textarea>
            </div>

            <div class="flex justify-end mt-6">
                <button class="px-6 py-2 leading-5 mx-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600" type="submit">Save</button>
                <a href="{{ route('dashboard.catalog.index') }}" class="px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-400 rounded-md hover:bg-gray-500 cursor-pointer focus:outline-none focus:bg-gray-600" type="submit">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("input", function() {
            const textarea = document.getElementById("description");
            textarea.style.height = "auto";
            textarea.style.height = (textarea.scrollHeight) + "px";
        });
    </script>
</section>
@endsection