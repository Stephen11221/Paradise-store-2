@extends('weblayout.layout')

@section('content')

    <!-- Slider Container -->
    <div class="relative w-full overflow-hidden">
        <div class="flex transition-transform duration-700 ease-in-out" id="slider">
            <!-- Slide 1 -->
            <div class="min-w-full relative">
                <img src="{{ asset('img/slide2.jpg') }}" class="w-full h-[500px] object-cover" alt="Perfume 1">
                <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white p-8">
                    <h2 class="text-4xl font-bold">NEW ARRIVALS</h2>
                    <p class="text-lg mt-2">Discover our latest luxury perfumes!</p>
                    <a href="{{ route('product.view') }}" class="mt-4 bg-black text-white px-4 py-2 rounded">SHOP NOW!</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="min-w-full relative">
                <img src="{{ asset('img/slide.jpg') }}" class="w-full h-[500px] object-cover" alt="Perfume 2">
                <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white p-8">
                    <h2 class="text-4xl font-bold">EXCLUSIVE SCENTS</h2>
                    <p class="text-lg mt-2">A perfect fragrance for every moment.</p>
                    <a href="{{ route('product.view') }}" class="mt-4 bg-black text-white px-4 py-2 rounded">SHOP NOW!</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="min-w-full relative">
                <img src="{{ asset('img/pexels-didsss-1190829.jpg') }}" class="w-full h-[500px] object-cover" alt="Perfume 3">
                <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white p-8">
                    <h2 class="text-4xl font-bold">ELEGANCE IN A BOTTLE</h2>
                    <p class="text-lg mt-2">Unleash your inner charm with our collection.</p>
                    <a href="{{ route('product.view') }}" class="mt-4 bg-black text-white px-4 py-2 rounded">SHOP NOW!</a>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button onclick="prevSlide()" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black text-white px-3 py-2 rounded-full">‹</button>
        <button onclick="nextSlide()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black text-white px-3 py-2 rounded-full">›</button>
    </div>

    <!-- Offers Section -->
    <section class="flex flex-wrap justify-center gap-6 p-6">
        <div class="bg-white p-6 text-center shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold">50% <span class="text-pink-500">TODAY’S SALE</span></h2>
            <img src="{{ asset('img/sales.jpg') }}" alt="Sale Perfume" class="w-48 h-48 object-cover mx-auto">
            <a href="{{ route('product.view') }}" class="mt-4 bg-black text-white px-4 py-2 rounded">SHOP NOW!</a>
        </div>

        <div class="bg-white p-6 text-center shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold">GIFT <span class="text-pink-500">SETS</span></h2>
            <img src="{{ asset('img/gift.jpg') }}" alt="Gift Sets" class="w-48 h-48 object-cover mx-auto">
            <a href="{{ route('product.view') }}" class="mt-4 bg-black text-white px-4 py-2 rounded">SHOP NOW!</a>
        </div>

        <div class="bg-white p-6 text-center shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold">FREE <span class="text-pink-500">SHIPPING</span></h2>
            <img src="{{ asset('img/ship.jpg') }}" alt="Free Shipping" class="w-48 h-48 object-cover mx-auto">
            <a href="{{ route('product.view') }}" class="mt-4 bg-black text-white px-4 py-2 rounded">SHOP NOW!</a>
        </div>
    </section>

    <section class="p-6">
        <!-- Featured Perfumes -->
        <h2 class="text-3xl font-bold text-center mb-6">🌟 Best Sellers</h2>
        <div class="flex overflow-x-scroll space-x-6 scrollbar-hide">
            <!-- Product Card -->
            <div class="w-64 bg-white shadow-lg rounded-lg p-4">
                <div class="bg-gray-200 animate-pulse w-full h-40 rounded-lg"></div> <!-- Loading Effect -->
                <h3 class="text-lg font-semibold mt-4 bg-gray-200 w-3/4 h-6 animate-pulse"></h3> 
                <p class="text-gray-500 mt-2 bg-gray-200 w-1/2 h-4 animate-pulse"></p>
                <button class="mt-4 bg-black text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </div>
        </div>
    </section>

    <section class="p-6 bg-gray-100">
        <!-- Customer Reviews -->
        <h2 class="text-3xl font-bold text-center mb-6">💬 What Our Customers Say</h2>
        <div class="relative w-full max-w-lg mx-auto overflow-hidden">
            <div class="flex transition-transform duration-700 ease-in-out" id="reviewSlider">
                <!-- Review 1 -->
                <div class="w-full p-6 bg-white rounded-lg shadow-lg text-center">
                    <p class="text-lg italic">"Absolutely love this scent! Long-lasting and elegant."</p>
                    <h3 class="font-semibold mt-2">- Sarai Mukutuku</h3>
                </div>
                <!-- Review 2 -->
                <div class="w-full p-6 bg-white rounded-lg shadow-lg text-center">
                    <p class="text-lg italic">"Perfect for special occasions. I get compliments all the time!"</p>
                    <h3 class="font-semibold mt-2">- Mark Tene.</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="p-6 text-center">
        <!-- Subscribe & Discount -->
        <h2 class="text-3xl font-bold">📩 Get 10% OFF!</h2>
        <p class="text-gray-500">Subscribe to get exclusive discounts and updates.</p>
        <div class=" text-white p-6 text-center mt-10">
    <p class="mb-3">Subscribe to our newsletter for updates</p>
    
    @if(session('success'))
        <p class="text-green-400">{{ session('success') }}</p>
    @endif

    <form action="{{ route('subscribe') }}" method="POST" class="mt-2">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required
            class="p-2 border rounded w-64 text-black">
        <button type="submit" class="bg-gray-800 hover:bg-red-600 text-white p-2 rounded">
            Subscribe
        </button>
    </form>
</div>

    </section>

@endsection
