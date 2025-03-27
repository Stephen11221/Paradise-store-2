@extends('front-dashboard.layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">About Section</h1>

    @if ($about)
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Description</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-2">{{ $about->title }}</td>
                    <td class="border p-2">{{ $about->description }}</td>
                    <td class="border p-2 text-center">
                        <a href="{{ route('about.edit', $about->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No About section found.</p>
    @endif
</div>
@endsection
