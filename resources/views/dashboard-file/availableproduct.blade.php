@extends('front-dashboard.layout')

@section('content')
<div class="container">
    <h2>Available product</h2>
    <div>

    </div>
    <div class="overflow-x-auto max-h-800 border border-gray-300 rounded-lg">
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
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-blue-700 text-center">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                </a>

                                <!-- Delete Product -->
                                <form action="{{ route('dashboard.deleteproduct', $product->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 w-full sm:w-auto">
                                      <i class="fa fa-window-close" aria-hidden="true"></i>   Delete
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
@endsection