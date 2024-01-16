
@section('title', $catalog->name)
@extends('layouts.main')
@section('content')
<section id="detail-catalog" class="pt-16 mt-5">
     <div class="bg-white py-8">
          <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex flex-col md:flex-row -mx-4">
                  <div class="md:flex-1 px-4">
                      <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4 aspect-square">
                          <img class="w-full h-full object-cover" src="{{ $catalog->image_url  }}" alt="{{ $catalog->name }}">
                      </div>
                  </div>
                  <div class="md:flex-1 px-4">
                      <h2 class="text-2xl font-bold text-gray-800">{{ $catalog->name }}</h2>
                      <p class="text-gray-600 text-sm mb-4">
                          {!! $catalog->description !!}
                      </p>
                      <div class="flex mb-4 mt-5">
                          <div class="mr-4">
                              <span class="font-bold text-gray-700">Price:</span>
                              <span class="text-gray-600">Rp {{ number_format($catalog->price, 0, ',', '.') }}</span>
                          </div>
                      </div>
                      <div class="mb-4">
                          <span class="font-bold text-gray-700">Select Size:</span>
                          <div class="flex items-center mt-2">
                              <button class="bg-orange-600  text-gray-700 dark:text-white py-2 px-4 rounded-md font-bold mr-2 hover:bg-orange-700">S</button>
                              <button class="bg-orange-600  text-gray-700 dark:text-white py-2 px-4 rounded-md font-bold mr-2 hover:bg-orange-700">M</button>
                              <button class="bg-orange-600  text-gray-700 dark:text-white py-2 px-4 rounded-md font-bold mr-2 hover:bg-orange-700">L</button>
                              <button class="bg-orange-600  text-gray-700 dark:text-white py-2 px-4 rounded-md font-bold mr-2 hover:bg-orange-700">XL</button>
                              <button class="bg-orange-600  text-gray-700 dark:text-white py-2 px-4 rounded-md font-bold mr-2 hover:bg-orange-700">XXL</button>
                          </div>
                      </div>
                      <div class="flex -mx-2 mb-2 my-10">
                         <div class="w-1/2 px-2">
                              <a href="https://wa.me/087518811323" target="_blank" rel="noopener noreferrer">
                                   <button class="w-full uppercase bg-orange-600 text-white py-2 px-4 rounded-md font-bold hover:bg-orange-700">Buy to Whatsapp</button>
                              </a>
                         </div>
                     </div>
                  </div>
              </div>
          </div>
      </div>
      
</section>
@endsection