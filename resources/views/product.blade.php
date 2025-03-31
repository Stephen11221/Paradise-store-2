@extends('weblayout.layout')

@section('content')
<section class="relative bg-gray-900 py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-white text-center mb-10">Our Products</h2>
    </div>
</section>

<div class="container mx-auto mt-5">
    <a href="z" class="bg-black text-white py-2 px-3 rounded">View Cart (<span id="cart-count">{{ Cart::count() }}</span>)</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-12 gap-6">
        @foreach($getAllProducts as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p class="text-gray-700 mt-2"><span class="text-green-400">Kshs </span> {{ number_format($product->price, 2) }}</p>

                <label for="quantity-{{ $product->id }}" class="block text-gray-700">Quantity:</label>
                <button type="button" onclick="decreaseQuantity({{ $product->id }})" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-3 rounded">-</button>
                <input type="number" id="quantity-{{ $product->id }}" min="1" value="1" class="w-16 border rounded py-1 px-2 text-center">
                <button type="button" onclick="increaseQuantity({{ $product->id }})" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-3 rounded">+</button>

                <button onclick="addToCart({{ $product->id }})" class="mt-4 px-6 py-2 bg-black text-white font-bold rounded shadow-md transition hover:scale-110">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Popup Notification -->
<div id="cart-popup" class="hidden fixed bottom-10 right-10 bg-black text-white py-3 px-5 rounded shadow-lg transition-opacity duration-300">
    <p id="popup-text"></p>
</div>

<script>
    
</script>
@endsection
