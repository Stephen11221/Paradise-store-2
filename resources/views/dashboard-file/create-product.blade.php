@extends('front-dashboard.layout') <!-- Adjust based on your layout -->

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Create a Product</h1>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Product Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Brand</label>
            <input type="text" name="brand" class="w-full p-2 border rounded" required>
            </div>

        <div class="mb-4">
            <label class="block text-gray-700">Price (KSh)</label>
            <input type="number" name="price" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Product Image</label>
            <input type="file" name="image" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="available">Available</option>
                <option value="coming_soon'">coming_soon'</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>
    </form>
</div>
@endsection
