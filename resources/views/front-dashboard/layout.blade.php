<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-black  text-white p-5">

        <div class="flex justify-center mb-6">
                    <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="h-16 rounded-full   w-16">
            </div>

        <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
            <p class="text-gray">{{ Auth::user()->email }}</p>

            <nav class="mt-5">
                <a href="{{ route('dashboard') }}" class="block py-2 px-3 hover:bg-gray-700 rounded"> Home</a>
                <a href="{{ route('dashboard.createproduct') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Add Products</a>
                <a href="{{ route('product-view') }}" class="block py-2 px-3  hover:bg-gray-700">Available Product </a>
                <a href="{{ route('about.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded ">View About</a>
                <a href="{{ route('contact.index') }}" class="block py-2 px-3 hover:bg-gray-700">View Contact</a>
                <a href="{{ route('showsubs') }}" class="block px-3  py-2 hover:bg-blue-700">Subscribers </a>
                <a href="" class="block py-2 px-3 hover:bg-gray-700 rounded mt-32">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                    <button type="submit" class="bw-12 lock py-2 px-3 hover:bg-blue-600 rounded">Logout</button>
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
