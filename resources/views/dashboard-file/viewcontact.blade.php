@extends('front-dashboard.layout')

@section('content')
    <h1 class="text-5xl text-center">View Contacts</h1>

    <div class="max-w-4xl overflow-x-auto   mt-8">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Message</th>
                    <th class="border p-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $index=> $contact)
                    <tr class="text-center">
                        <td class="border p-2">{{ $index + 1 }}</td>
                        <td class="border p-2">{{ $contact->name }}</td>
                        <td class="border p-2">{{ $contact->email }}</td>
                        <td class="border p-2">{{ $contact->message }}</td>
                        <td class="border p-2">{{ $contact->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
