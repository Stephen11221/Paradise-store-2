@extends('front-dashboard.layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit About Section</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('about.update', $about->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Title</label>
            <input type="text" name="title" class="w-full p-2 border rounded" value="{{ $about->title }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Description</label>
            <textarea name="description" rows="5" class="w-full p-2 border rounded">{{ $about->description }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
