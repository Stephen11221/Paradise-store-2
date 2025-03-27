@extends('front-dashboard.layout')

@section('content')

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-center p-4 text-white dark:bg-gray-800 overflow-hidden shadow-sm cursor-pointer  sm:rounded-lg">
                <h4>Paradise store</h4>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <!-- Available Products Card -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700">Available Products</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $availableProducts }} </p>
    </div>

    <!-- Sold Products Card -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700">Sold Products</h2>
        <p class="text-3xl font-bold text-red-600 mt-2"></p>
    </div>
</div>
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Available Products</h2>
    
    <!-- Show Data Source Information -->
    <p class="text-sm text-gray-500 mb-2">
        Data fetched from: <strong>Products Table</strong> (Model: <code>Product</code>)
    </p>

    <!-- Responsive Table Container -->
    <div class="overflow-x-auto max-h-96 border border-gray-300 rounded-lg">
        <table class="w-full min-w-max border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Image</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left hidden sm:table-cell">Brand</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getAllProducts as $index => $product)
                    <tr class="border-b">
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <img src="{{ asset('storage/' . $product->image) }}" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 hidden sm:table-cell">{{ $product->brand }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-green-600 font-semibold">
                            KSh {{ number_format($product->price, 2) }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex flex-col sm:flex-row gap-2">
                                <!-- Edit Product -->
                                <a href="{{ route('dashboard.editproduct', $product->id) }}" 
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 text-center">
                                    Edit
                                </a>

                                <!-- Delete Product -->
                                <form action="{{ route('dashboard.deleteproduct', $product->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 w-full sm:w-auto">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</div>
 
@endsection