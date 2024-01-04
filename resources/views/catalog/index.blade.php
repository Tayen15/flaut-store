@extends('layouts.main')
@section('content')
    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->

<div class="bg-white">
     <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
       <h2 class="text-2xl font-bold tracking-tight text-gray-900">Catalog</h2>
 
       <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
         <div class="group relative">
           <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
             <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
@endsection