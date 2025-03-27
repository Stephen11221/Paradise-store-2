@extends('front-dashboard.layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">{{ isset($product) ? 'Edit Product' : 'Create a Product' }}</h1>

    <!-- Debugging: Show Data 
    <div class="bg-gray-100 p-4 mb-4 text-sm rounded">
        <p><strong>Product Data:</strong></p>
        <pre class="text-gray-700">{{ print_r($product ?? 'No Product Data', true) }}</pre>
    </div> -->

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <form 
        action="{{ isset($product) ? route('dashboard.updateproduct', $product->id) : route('products.store') }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="bg-white p-6 rounded shadow-md">
        
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700">Product Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Brand</label>
            <input type="text" name="brand" class="w-full p-2 border rounded" value="{{ old('brand', $product->brand ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Price (KSh)</label>
            <input type="number" name="price" class="w-full p-2 border rounded" value="{{ old('price', $product->price ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Product Image</label>
            <input type="file" name="image" class="w-full p-2 border rounded">
            @if(isset($product) && $product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-32 h-32 rounded shadow-lg">
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="available" {{ isset($product) && $product->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="coming_soon" {{ isset($product) && $product->status == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
            </select>
        </div>

        <button type="submit" class="bg-black  text-white px-4 py-2 rounded">
            <i class="fa fa-pencil" aria-hidden="true"></i>    {{ isset($product) ? 'Update Product' : 'Add Product' }}
        </button>
    </form>
</div>
@endsection
