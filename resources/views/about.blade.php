@extends('weblayout.layout')

@section('content')
<div class="relative w-full h-[400px]">
    <!-- Background Image -->
    <img src="{{ asset('img/BOSS The Scent Le Parfum for Her 30ml.jpeg') }}" alt="Perfume Paradise" class="w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h3 class="text-white text-3xl font-bold animate-fade-in">Welcome to Perfume Paradise</h3>
    </div>
</div>

<!-- Content Section with Loading Effect -->
<div class="p-6 max-w-4xl mx-auto">
    <p class="text-gray-700 opacity-0 animate-fade-in delay-200">
        Welcome to <span class="font-bold">Perfume Paradise</span>, where luxury meets individuality in every exquisite bottle. We believe that fragrance is more than just a scent—it is an experience, a signature, and an expression of one’s essence. Our mission is to curate an enchanting collection of the finest perfumes, ensuring that each fragrance tells a story as unique as the person who wears it.
    </p>

    <p class="text-gray-700 opacity-0 animate-fade-in delay-400 mt-4">
        At Perfume Paradise, we source from the most renowned perfume houses and emerging artisan brands around the world, bringing you a diverse selection of timeless classics and modern masterpieces. Whether you seek a delicate floral whisper, a bold oriental allure, or a fresh citrus breeze, our expertly curated range offers something for every personality and occasion.
    </p>

    <p class="text-gray-700 opacity-0 animate-fade-in delay-600 mt-4">
        Beyond our passion for fine fragrances, we take pride in delivering an exceptional shopping experience. Our knowledgeable fragrance consultants are dedicated to helping you discover the perfect scent that resonates with your style and soul. Every visit to Perfume Paradise is an invitation to indulge in sophistication, artistry, and olfactory bliss.
    </p>

    <p class="text-gray-700 opacity-0 animate-fade-in delay-800 mt-4">
        Step into our world and let your senses embark on a journey through the art of perfumery. Discover your signature scent at Perfume Paradise—where elegance and enchantment await.
    </p>
</div>

<!-- Tailwind CSS Animations -->
<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in {
    animation: fade-in 1s ease-out forwards;
}
</style>
@endsection
