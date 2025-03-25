@extends('weblayout.layout')

@section('content')
<section class="relative bg-gray-900 py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-white text-center mb-10">Our Products</h2>
        
        <div x-data="{ activeSlide: 0, products: [
                { id: 1, name: 'Product 1', image: 'https://via.placeholder.com/400', price: 'KSh 1,200' },
                { id: 2, name: 'Product 2', image: 'https://via.placeholder.com/400', price: 'KSh 2,500' },
                { id: 3, name: 'Product 3', image: 'https://via.placeholder.com/400', price: 'KSh 3,000' }
            ] }"
            class="relative overflow-hidden w-full mx-auto max-w-4xl">
            
            <!-- Slides -->
            <div class="flex transition-transform duration-700 ease-in-out"
                 :style="'transform: translateX(-' + activeSlide * 100 + '%)'">
                <template x-for="(product, index) in products" :key="index">
                    <div class="relative min-w-full">
                        <img :src="product.image" class="w-full h-80 object-cover rounded-lg shadow-lg">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white px-6">
                            <h3 class="text-xl font-semibold mb-2" x-text="product.name"></h3>
                            <p class="text-lg" x-text="product.price"></p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Navigation Dots -->
            <div class="flex justify-center space-x-2 mt-4">
                <template x-for="(product, index) in products" :key="index">
                    <button class="w-3 h-3 rounded-full transition-all duration-300"
                            :class="activeSlide === index ? 'bg-white scale-110' : 'bg-gray-500'"
                            @click="activeSlide = index"></button>
                </template>
            </div>

            <!-- Buttons -->
            <button @click="activeSlide = (activeSlide > 0) ? activeSlide - 1 : products.length - 1"
                    class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                ◀
            </button>
            <button @click="activeSlide = (activeSlide < products.length - 1) ? activeSlide + 1 : 0"
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                ▶
            </button>
        </div>
    </div>
</section>

<div class="container mx-auto mt-5">


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($getAllProducts as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p class="text-gray-700 mt-2">${{ number_format($product->price, 2) }}</p>
                <form action="" method="POST" class="mt-4">
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
