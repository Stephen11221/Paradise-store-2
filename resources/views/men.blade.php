@extends('weblayout.layout')
@section('content')


   
<!-- Men's Perfume Section -->
<section class="bg-gray-100">
    <!-- Hero Banner -->
    <div class="relative h-[500px] md:h-screen flex items-center justify-center bg-cover bg-center rounded-lg shadow-lg"
         style="background-image: url('img/men.jpeg');">
      <div class="absolute inset-0 bg-black bg-opacity-60"></div>
      <div class="relative text-center text-white px-6">
        <h1 class="text-5xl md:text-6xl font-bold">Unleash Confidence in Every Scent</h1>
        <p class="text-lg md:text-xl mt-4">Premium colognes designed for the modern man.</p>
        <a href="{{ route('product.view') }}" class="mt-6 inline-block bg-white text-black px-8 py-3 rounded-full text-lg font-semibold hover:bg-gray-300 transition">Shop Now</a>
      </div>
    </div>
  
    <!-- Product Grid -->
    <div class="container mx-auto px-6 mt-12">
      <h2 class="text-4xl font-bold text-gray-400 text-center">Exclusive Collection</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-10">
        
        <!-- Product 1 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
          <img src="img/men1.jpeg" alt="Spicy Woods" class="w-full h-72 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-semibold">Spicy Woods</h3>
            <p class="text-gray-600">Bold, masculine, with a hint of cedar and spices.</p>
          </div>
        </div>
  
        <!-- Product 2 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
          <img src="img/oceanbreeze.jpeg" alt="Ocean Breeze" class="w-full h-72 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-semibold">Ocean Breeze</h3>
            <p class="text-gray-600">Refreshing aquatic scent with a touch of citrus.</p>
          </div>
        </div>
  
        <!-- Product 3 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
          <img src="img/BOSS The Scent Le Parfum for Her 30ml.jpeg" alt="Leather Intensity" class="w-full h-72 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-semibold">Leather Intensity</h3>
            <p class="text-gray-600">Deep, rich leather with a smoky undertone.</p>
          </div>
        </div>
  
      </div>
    </div>
  </section>
  
  <!-- Featured Cologne -->
  <section class="bg-white py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold text-gray-800">Cologne of the Month</h2>
      <div class="mt-10 flex flex-col md:flex-row items-center gap-8">
        
        <!-- Image -->
        <div class="w-full md:w-1/2">
          <img src="img/Best Arabic Perfumes for Men _ Sahari Perfumes _ Dubai Fragrances.jpeg" alt="Signature Oud" class="w-full h-96 object-cover rounded-lg shadow-lg">
        </div>
  
        <!-- Details -->
        <div class="w-full md:w-1/2 text-left">
          <h3 class="text-3xl font-semibold text-gray-700">Signature Oud</h3>
          <p class="text-gray-600 mt-4">A luxurious blend of oud, sandalwood, and spices. Perfect for evening wear.</p>
        </div>
  
      </div>
    </div>
  </section>
  
  <!-- Testimonials -->
  <section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold text-gray-800">What Our Customers Say</h2>
      
      <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Testimonial 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="text-gray-600 italic">"Signature Oud is absolutely incredible. The scent lasts all day and turns heads."</p>
          <h4 class="mt-4 font-semibold text-gray-800">- Mark T.</h4>
        </div>
  
        <!-- Testimonial 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="text-gray-600 italic">"Spicy Woods is my go-to cologne. It’s sophisticated, warm, and gets me compliments."</p>
          <h4 class="mt-4 font-semibold text-gray-800">- Daniel K.</h4>
        </div>
  
        <!-- Testimonial 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="text-gray-600 italic">"I love Ocean Breeze! It’s fresh, light, and perfect for summer."</p>
          <h4 class="mt-4 font-semibold text-gray-800">- James P.</h4>
        </div>
  
      </div>
    </div>
  </section>
  
  <!-- Newsletter Signup -->
  <section class="bg-blue-500 text-white py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold">Join Our Cologne Club</h2>
      <p class="text-lg mt-2">Sign up for exclusive offers and new arrivals.</p>
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

            
    </div>
  </section>

@endsection