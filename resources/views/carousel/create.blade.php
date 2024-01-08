<!-- resources/views/carousel/create.blade.php -->

@extends('layouts.main')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="bg-white p-10 rounded-md shadow-md mt-20">
        <h2 class="text-2xl font-bold mb-5">Create Carousel</h2>
        <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="name" name="name" required>
            </div>
    
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="image" name="image" accept="image/jpeg, image/png, image/jpg" required>
            </div>
    
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
            </button>
        </form>
    </div>
@endsection
