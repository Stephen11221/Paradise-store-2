@extends('weblayout.layout')

@section('content')

<div class="relative w-full h-[400px]">
    <!-- Background Image -->
    <img src="{{ asset('img/BOSS The Scent Le Parfum for Her 30ml.jpeg') }}" alt="Perfume Paradise" class="w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h3 class="text-white text-3xl font-bold animate-fade-in"></h3>
    </div>
</div>
    <h1 class="text-5xl text-center">Contact us </h1>

    <div class="max-w-lg mx-auto mt-8">
        <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Message</label>
                <textarea name="message" class="w-full border p-2 rounded" rows="4" required></textarea>
            </div>
            <button type="submit" class="bg-black  text-white px-4 py-2 rounded">Send</button>
        </form>
    </div>
@endsection
