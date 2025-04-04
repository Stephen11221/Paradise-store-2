@extends('weblayout.layout')

@section('content')
<div class="relative w-full h-[400px]">
    <!-- Background Image -->
    <img src="{{ asset('img/BOSS The Scent Le Parfum for Her 30ml.jpeg') }}" alt="Perfume Paradise" class="w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h3 class="text-white text-3xl font-bold animate-fade-in">Welcome to Perfume Siren's perfumes  </h3>
    </div>
</div>

<div class="container mx-auto px-4 py-6">

    @if ($about)
        <div class="border p-4 rounded shadow-md bg-white">
            <h2 class="text-xl font-semibold">{{ $about->title }}</h2>
            <p class="text-gray-700 mt-2">{{ $about->description }}</p>
        </div>
    @else
        <p class="text-gray-600">No About section available.</p>
    @endif
    <ul class="mt-4 mb-8 space-y-3">
        <li class="ml-4"><strong>Luxurious & Unique Blends</strong> – Handpicked ingredients for unforgettable fragrances.</li>
        <li class="ml-4"><strong>Alluring & Mystical Aesthetics</strong> – Bottles designed to mesmerize, just like the sirens of legend.</li>
        <li class="ml-4"><strong>For Every Personality</strong> – From fierce and daring to delicate and dreamy.</li>
        <li class="ml-4"><strong>Ethically Crafted</strong> – Cruelty-free, sustainably sourced, and made with passion.</li>
    </ul>
</div>
@endsection

