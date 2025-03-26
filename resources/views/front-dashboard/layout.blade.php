<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-5">
            <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
            <p class="text-gray">{{ Auth::user()->email }}</p>
            <nav class="mt-5">
                <a href="{{ route('dashboard') }}" class="block py-2 px-3 hover:bg-blue-700 rounded">Home</a>
                <a href="{{ route('dashboard.createproduct') }}" class="block py-2 px-3 hover:bg-blue-700 rounded">Add Products</a>
                <a href="" class="block py-2 px-3 hover:bg-red-200 hover:text-black ">Edit about</a>
                
                <a href="" class="block py-2 px-3 hover:bg-blue-700 rounded">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                    <button type="submit" class="block py-2 px-3 hover:bg-blue-600 rounded">Logout</button>
                </form>

            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
