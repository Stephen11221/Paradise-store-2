@extends('weblayout.layout')

@section('content')


    <!-- Brand Collection Section -->
    <section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto text-center">
      
      <!-- Animated Brand Title -->
      <h2 id="animatedBrandText" class="text-4xl font-bold mb-6"></h2>
  
      <p class="text-lg text-gray-300 mb-12">Discover the world’s most luxurious perfume brands, curated just for you.</p>
  
      <!-- Brand Grid -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-4">
        
        <!-- Brand 1 -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
          <img src="img/CHANEL INTERLOCKING CC RUBER THONG SLIDES - 39 _ PINK-WHITE.jpeg" alt="Chanel" class="w-24 h-24 mx-auto">
          <h3 class="text-xl font-semibold mt-4">Chanel</h3>
          <p class="text-gray-400 mt-2">Timeless elegance with classic French fragrances.</p>
          <a href="#" class="text-yellow-400 mt-4 inline-block hover:underline">Explore</a>
        </div>
  
        <!-- Brand 2 -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
          <img src="img/dior.jpeg" alt="Dior" class="w-24 h-24 mx-auto">
          <h3 class="text-xl font-semibold mt-4">Dior</h3>
          <p class="text-gray-400 mt-2">Luxury and sophistication in every scent.</p>
          <a href="#" class="text-yellow-400 mt-4 inline-block hover:underline">Explore</a>
        </div>
  
        <!-- Brand 3 -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
          <img src="img/Los 17 Mejores Perfumes De Gucci Para Hombres.jpeg" alt="Gucci" class="w-24 h-24 mx-auto">
          <h3 class="text-xl font-semibold mt-4">Gucci</h3>
          <p class="text-gray-400 mt-2">Modern, bold, and innovative fragrances.</p>
          <a href="#" class="text-yellow-400 mt-4 inline-block hover:underline">Explore</a>
        </div>
  
        <!-- Brand 4 -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:scale-105 transition transform duration-300">
          <img src="img/Tom Ford logo.jpeg" alt="Tom Ford" class="w-24 h-24 mx-auto">
          <h3 class="text-xl font-semibold mt-4">Tom Ford</h3>
          <p class="text-gray-400 mt-2">Sensual and bold scents for every occasion.</p>
          <a href="#" class="text-yellow-400 mt-4 inline-block hover:underline">Explore</a>
        </div>
        
      </div>
    </div>
  </section>

  <!-- Include Swiper.js -->



@endsection