@extends('layouts.main')
@section('content')

<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Recomendation Catalog</h2>
        <a href="{{ route('catalog.index') }}" class="text-sm text-gray-700 hover:text-gray-900">View All</a>
    
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach($catalogs as $catalog)
            <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
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
                    <p class="text-sm font-medium text-gray-900">${{ $catalog->price }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
