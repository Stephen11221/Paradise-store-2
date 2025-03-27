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

<div class="container mx-auto px-4 py-6">

    @if ($about)
        <div class="border p-4 rounded shadow-md bg-white">
            <h2 class="text-xl font-semibold">{{ $about->title }}</h2>
            <p class="text-gray-700 mt-2">{{ $about->description }}</p>
        </div>
    @else
        <p class="text-gray-600">No About section available.</p>
    @endif
</div>
@endsection

