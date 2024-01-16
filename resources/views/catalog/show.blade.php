
@section('title', $catalog->name)
@extends('layouts.main')
@section('content')
<section id="detail-catalog" class="pt-16 mt-5">
     <div class="bg-white py-8">
          <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="container mx-auto mt-8 flex">
                <!-- Bagian Kiri - Foto -->
                <div class="flex-shrink-0 w-1/2 pr-8 mr-10">
                    <img src="{{ $catalog->image_url }}" alt="{{ $catalog->name }}" class="w-full h-auto rounded-lg">
                </div>
            
                <!-- Bagian Kanan - Deskripsi -->
                <div class="flex-grow">
                    <!-- Nama Katalog -->
                    <h1 class="text-3xl font-semibold mb-2">{{ $catalog->name }}</h1>
            
                    <!-- Harga -->
                    <div class="flex mb-6 mt-4">
                        @php
                            $discountTotal = $catalog->price * 1.20;
                        @endphp
                        <p class="text-xl font-medium text-gray-800 mb-2 line-through">Rp {{ number_format($discountTotal, 0, ',', '.') }}</p>
                        <p class="text-xl font-medium text-orange-600  mb-2 mx-4">Rp {{ number_format($catalog->price, 0, ',', '.') }}</p>
                    </div>
            
                    <div class="my-4">
                        <label class="block text-sm font-medium text-gray-600 mb-2" id="check-size">Size: </label>
                        <div class="flex">
                            <div class="mr-1">
                                <input type="radio" name="size" id="sizeS" value="S" class="mr-2 hidden" />
                                <label for="sizeS" class="size-label w-10 h-10 text-sm border border-gray-900 rounded-md flex items-center justify-center cursor-pointer focus:border-orange-400">S</label>
                            </div>
                            
                            <div class="mx-1">
                                <input type="radio" name="size" id="sizeM" value="M" class="mr-2 hidden" />
                                <label for="sizeM" class="size-label w-10 h-10 text-sm border border-gray-300 rounded-md flex items-center justify-center cursor-pointer focus:outline-none focus:border-gray-800">M</label>
                            </div>
                            
                            <div class="mx-1">
                                <input type="radio" name="size" id="sizeL" value="L" class="mr-2 hidden" />
                                <label for="sizeL" class="size-label w-10 h-10 text-sm border border-gray-300 rounded-md flex items-center justify-center cursor-pointer focus:outline-none focus:border-gray-800">L</label>
                            </div>
                                
                            <div class="mx-1">
                                <input type="radio" name="size" id="sizeXL" value="XL" class="mr-2 hidden" />
                                <label for="sizeXL" class="size-label w-10 h-10 text-sm border border-gray-300 rounded-md flex items-center justify-center cursor-pointer focus:outline-none focus:border-gray-800">XL</label>
                            </div>
                                
                            <div class="mx-1">
                                <input type="radio" name="size" id="sizeXXL" value="XXL" class="mr-2 hidden" />
                                <label for="sizeXXL" class="size-label w-11 h-10 text-sm border border-gray-300 rounded-md flex items-center justify-center cursor-pointer focus:outline-none focus:border-gray-800">XXL</label>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Quantity Input -->
                    <div class="my-6">
                        <label for="quantity" class="block text-sm font-medium text-gray-600 mb-2">Quantity:</label>
                        <div class="flex items-center">
                            <button id="decrement" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">-</button>
                            <input type="number" id="quantity" min="1" max="15" name="quantity" class="mx-2 p-2 border border-gray-300 rounded-md w-20 focus:outline-none focus:ring focus:border-blue-300 text-center" value="1">
                            <button id="increment" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">+</button>
                        </div>
                        <p id="subtotal" class="text-xs text-gray-500 mt-1">Subtotal: Rp {{ number_format($catalog->price, 0, ',', '.') }}</p>
                    </div>
                  
            
                    <!-- Button WhatsApp -->
                    <a href="javascript:void(0);" id="orderButton" target="_blank" class="bg-green-500 text-white py-2 px-12 mt-8 rounded-md inline-block">Order via WhatsApp <i class="fa-brands fa-whatsapp ml-2"></i></a>
                </div>
            </div>
            
            <!-- Divider -->
            
            <!-- Deskripsi Katalog -->
            <div class="container mx-auto my-14">
                <h2 class="text-xl font-semibold mb-4 text-center">Description</h2>
                <hr class="my-5">
                <p class="text-gray-700">{!! $catalog->description !!}</p>
            </div>
          </div>
      </div>
      
</section>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .size-label {
    border-color: #ccc;
}

/* Tambahkan style berikut untuk memberikan efek saat terpilih */
.size-label input[type="radio"]:checked + label {
    border-color: #973636; /* Ubah warna sesuai keinginan Anda */
}
</style>

<script>
    const orderButton = document.getElementById('orderButton');
    const sizeLabels = document.querySelectorAll('.size-label');
    const quantityInput = document.getElementById("quantity");
    let selectedSize = '';
    let quantity = 1;

    sizeLabels.forEach(label => {
        label.addEventListener('click', () => {
            selectedSize = label.innerText;
            updateSubtotal();
            document.getElementById('check-size').innerText = `Size: ${selectedSize}`;
        });
    });

    document.getElementById('decrement').addEventListener('click', () => {
        if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;
            updateSubtotal();
        }
    });

    document.getElementById('increment').addEventListener('click', () => {
        if (quantity < 15) {
            quantity++;
            quantityInput.value = quantity;
            updateSubtotal();
        }
    });

    quantityInput.addEventListener("input", function () {
        quantity = parseInt(quantityInput.value) || 1;
        updateSubtotal();
    });

    function updateSubtotal() {
        const price = {{ $catalog->price }};
        const subtotal = price * quantity;
        document.getElementById('subtotal').innerText = `Subtotal: Rp ${subtotal.toLocaleString()}`;
    }

    orderButton.addEventListener('click', () => {
        const message = `Order ${encodeURI('{{ $catalog->name }}')}\nSize: ${selectedSize}\nQuantity: ${quantity}\nTotal: Rp ${subtotal.toLocaleString()}`;
        const whatsappLink = `https://wa.me/6282299950149?text=${encodeURIComponent(message)}`;
        window.location.href = whatsappLink;
    });
</script>
@endsection