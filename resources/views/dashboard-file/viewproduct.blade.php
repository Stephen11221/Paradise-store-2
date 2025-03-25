@extends('front-dashboard.layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</a>

    <div class="grid grid-cols-4 gap-4 mt-4">
        @foreach($products as $product)
        <div class="border p-4 rounded-lg bg-white shadow">
            <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-48 object-cover rounded" alt="{{ $product->name }}">
            <h2 class="text-lg font-bold">{{ $product->name }}</h2>
            <p class="text-gray-600">{{ $product->brand }}</p>
            <p class="font-semibold">KSh{{ number_format($product->price, 2) }}</p>

            @if($product->status == 'sold_out')
                <span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Sold Out</span>
            @endif

            <div class="mt-2">
                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
