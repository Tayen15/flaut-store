@extends('layouts.main')

@section('content')
<section id="detail-catalog" class="pt-16">
     <div class="container mx-auto mt-8">
          <div class="bg-white">
               <div class="max-w-6xl mx-auto px-3 sm:px-6 lg:px-8">
               <div class="flex flex-col md:flex-row -mx-1">
                    <div class="md:flex-1 px-">
                         <div class="h-[460px] rounded-lg bg-gray-300 aspect-square">
                              <img class="w-full h-full object-cover " src="{{ $catalog->image_url }}" alt="{{ $catalog->name }}">
                         </div>
                    </div>
                    <div class="md:flex-1 px-4 flex flex-col items-center justify-center">
                         <h2 class="text-2xl font-bold text-gray-800">{{ $catalog->name }}</h2>
                         <p class="text-gray-600">
                             {{ $catalog->description }}
                         </p>
                         <div class="flex mb-4">
                             <div class="mr-4">
                                 <span class="font-bold text-gray-700">Price:</span>
                                 <span class="text-gray-600">Rp {{ number_format($catalog->price, 0, ',', '.') }}</span>
                             </div>
                         </div>
                         <div class="mb-4">
                             <span class="font-bold text-gray-700">Select Size:</span>
                             <div class="flex items-center mt-2">
                                 <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">S</button>
                                 <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">M</button>
                                 <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">L</button>
                                 <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XL</button>
                                 <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XXL</button>
                             </div>
                         </div>
                         <div class="flex justify-center -mx-2 mb-4">
                            <a href="https://wa.me/087518811323" target="_blank" rel="noopener noreferrer">
                                <button class="bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">
                                    Buy
                                </button>
                            </a>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
          </div>
     </div>
</section>
@endsection