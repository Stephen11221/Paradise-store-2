@extends('weblayout.layout')

@section('content')
<!-- Women's Perfume Section -->
<section class="bg-gray-100 ">
    <div class="relative h-[500px] md:h-screen flex items-center justify-center bg-cover bg-center rounded-lg shadow-lg"
         style="background-image: url('img/roseEssence.jpg');">
      <div class="absolute inset-0 bg-black bg-opacity-60"></div>
      <div class="relative text-center text-white px-6">
        <h1 class="text-5xl md:text-6xl font-bold">Discover Elegance in Every Scent</h1>
        <p class="text-lg md:text-xl mt-4">Luxury fragrances crafted for the modern woman.</p>
        <a href="{{ route('product.view') }}" class="mt-6 inline-block bg-white text-black px-8 py-3 rounded-full text-lg font-semibold hover:bg-gray-300 transition">Shop Now</a>
      </div>
    </div>
  
    <!-- Product Grid -->
    <div class="container mx-auto px-6 mt-12">
      <h2 class="text-4xl font-bold text-gray-800 text-center">Our Signature Collection</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-10">
        
        <!-- Product 1 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
          <img src="img/rose11.jpeg" alt="Rose Elegance" class="w-full h-72 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-semibold">Rose Elegance</h3>
            <p class="text-gray-600">A floral masterpiece with delicate rose essence.</p>
          </div>
        </div>
  
        <!-- Product 2 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
          <img src="img/vanila.jpeg" alt="Vanilla Desire" class="w-full h-72 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-semibold">Vanilla Desire</h3>
            <p class="text-gray-600">Warm and sweet, a scent that lingers beautifully.</p>
          </div>
        </div>
  
        <!-- Product 3 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
          <img src="img/flora.jpeg" alt="Floral Bliss" class="w-full h-72 object-cover">
          <div class="p-6">
            <h3 class="text-2xl font-semibold">Floral Bliss</h3>
            <p class="text-gray-600">A bouquet of freshness with a citrusy hint.</p>
          </div>
        </div>
  
      </div>
    </div>
  </section>
  <!-- Featured Perfume Section -->
<section class="bg-white py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold text-gray-800">Featured Perfume of the Month</h2>
      <div class="mt-10 flex flex-col md:flex-row items-center gap-8">
        
        <!-- Image -->
        <div class="w-full md:w-1/2">
          <img src="img/🌸 Love Floral Fragrances_ 🌸 Immerse yourself in….jpeg" alt="Luxury Blossom" class="w-full h-96 object-cover rounded-lg shadow-lg">
        </div>
  
        <!-- Details -->
        <div class="w-full md:w-1/2 text-left">
          <h3 class="text-3xl font-semibold text-gray-700">Luxury Blossom</h3>
          <p class="text-gray-600 mt-4">An enchanting fragrance with a blend of floral and citrus notes, perfect for any occasion.</p>
        </div>
  
      </div>
    </div>
  </section>
  
  <!-- Testimonials Section -->
  <section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold text-gray-800">What Our Customers Say</h2>
      
      <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Testimonial 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="text-gray-600 italic">"Luxury Blossom is my all-time favorite! The scent is elegant and lasts all day."</p>
          <h4 class="mt-4 font-semibold text-gray-800">- Sarah M.</h4>
        </div>
  
        <!-- Testimonial 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="text-gray-600 italic">"Absolutely in love with the floral notes. I get compliments every time I wear it!"</p>
          <h4 class="mt-4 font-semibold text-gray-800">- Jessica R.</h4>
        </div>
  
        <!-- Testimonial 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="text-gray-600 italic">"A luxurious fragrance that makes me feel confident and feminine."</p>
          <h4 class="mt-4 font-semibold text-gray-800">- Emily L.</h4>
        </div>
  
      </div>
    </div>
  </section>
  
  <!-- Newsletter Signup -->
  <section class="bg-pink-500 text-white py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold">Join Our Fragrance Family</h2>
      <p class="text-lg mt-2">Sign up for exclusive offers and new arrivals.</p>
      <form class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
        <input type="email" placeholder="Enter your email" class="px-4 py-3 rounded-lg text-gray-900 w-full sm:w-80">
        <button type="submit" class="bg-black px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-800 transition">Subscribe</button>
      </form>
    </div>
  </section>
  

@endsection