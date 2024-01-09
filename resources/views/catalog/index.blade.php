@extends('layouts.main')
@section('content')

<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Recommendation Catalog</h2>
            <a href="{{ route('catalog.create') }}" class="text-white bg-orange-600 duration-300 hover:bg-orange-700 px-4 py-2 rounded-md text-sm font-medium">Add Catalog</a>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach($catalogs as $catalog)
            <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:overflow-hidden group-hover:shadow-xl lg:h-80">
                    <img src="{{ $catalog->image_url }}" alt="{{ $catalog->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $catalog->name }}
                            </a>
                        </h3>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('catalog.edit', $catalog->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('catalog.destroy', $catalog->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                    <p class="text-sm font-medium text-gray-900">Rp{{ number_format($catalog->price, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
