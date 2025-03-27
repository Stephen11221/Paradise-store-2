@extends('weblayout.layout')

@section('content')
<section class="relative bg-gray-900 py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-white text-center mb-10">Our Products</h2>
        
    </div>
</section>


<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
}
</style>
 <!---
<section class="relative bg-gradient-to-r from-purple-700 via-pink-600 to-red-500 py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl font-extrabold text-white text-center mb-10 drop-shadow-lg">Luxury Perfume Collection</h2>

        <div x-data="{ 
                products: [
                    { id: 1, name: 'Rose Essence', image: '/assets/perfumes/rose-essence.jpg', price: 'KSh 1,500' },
                    { id: 2, name: 'Midnight Oud', image: '/assets/perfumes/midnight-oud.jpg', price: 'KSh 2,200' },
                    { id: 3, name: 'Vanilla Musk', image: '/assets/perfumes/vanilla-musk.jpg', price: 'KSh 1,800' },
                    { id: 4, name: 'Ocean Breeze', image: '/assets/perfumes/ocean-breeze.jpg', price: 'KSh 2,500' },
                    { id: 5, name: 'Jasmine Noir', image: '/assets/perfumes/jasmine-noir.jpg', price: 'KSh 3,000' },
                    { id: 6, name: 'Citrus Bloom', image: '/assets/perfumes/citrus-bloom.jpg', price: 'KSh 2,000' }
                ]
            }"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
    
            7Perfume Cards 
            <template x-for="product in products" :key="product.id">
                <div class="relative bg-white rounded-lg overflow-hidden shadow-lg transform transition hover:scale-105 animate-fade-in">
                    <img :src="product.image" class="w-full h-96 object-cover">
                    
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2" x-text="product.name"></h3>
                        <p class="text-xl text-gray-700 font-semibold" x-text="product.price"></p>
                        <button class="mt-4 px-6 py-2 bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full shadow-md transition hover:scale-110">
                            Buy Now
                        </button>
                    </div>
                </div>
            </template>

        </div>
    </div>
</section>-->
<div class="container mx-auto mt-5">
        <a href="{{ route('cart.view') }}" class="bg-black text-white py-2 px-3 rounded ">View cart list</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  mt-12 gap-6">
        @foreach($getAllProducts as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p class="text-gray-700 mt-2"><span class="text-green-400">Kshs </span> {{ number_format($product->price, 2) }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="bg-black hover:text-gray-400 text-white font-bold py-2 px-4 rounded">
                        Add to Cart
                    </button>
                </form>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
