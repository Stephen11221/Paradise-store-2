@extends('front-dashboard.layout')

@section('content')

    <h2 class="mb-4">Subscribers List</h2><table class="w-full border border-gray-300 rounded-lg shadow-md">
    <thead class="bg-black  text-white">
        <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Email</th>
            <th class="px-4 py-2 border">Created At</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($subscribers as $index => $subscriber)
            <tr class="hover:bg-gray-100 transition">
                <td class="px-4 py-2 border text-center">{{ $index +1 }}</td>
                <td class="px-4 py-2 border">{{ $subscriber->email }}</td>
                <td class="px-4 py-2 border text-center">{{ $subscriber->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection