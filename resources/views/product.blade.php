@extends('weblayout.layout')

@section('content')
<section class="relative bg-gray-900 py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-white text-center mb-10">Our Products</h2>
    </div>
</section>

<div class="container mx-auto mt-5">
    <a href="" class="bg-black text-white py-2 px-3 rounded" onclick="toggleCartPopup(event)">View Cart (<span id="cart-count">{{ Cart::count() }}</span>)</a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-12 gap-6">
        @foreach($getAllProducts as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p class="text-gray-700 mt-2"><span class="text-green-400">Kshs </span> {{ number_format($product->price, 2) }}</p>

                <label for="quantity-{{ $product->id }}" class="block text-gray-700">Quantity:</label>
                <button type="button" onclick="decreaseQuantity({{ $product->id }})" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-3 rounded">-</button>
                <input type="number" id="quantity-{{ $product->id }}" min="1" value="1" class="w-16 border rounded py-1 px-2 text-center">
                <button type="button" onclick="increaseQuantity({{ $product->id }})" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-3 rounded">+</button>

                <button onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})" class="mt-4 px-6 py-2 bg-black text-white font-bold rounded shadow-md transition hover:scale-110">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Popup Notification -->
<div id="cart-popup" class="hidden fixed bottom-10 right-10 bg-black text-white py-3 px-5 rounded shadow-lg transition-opacity duration-300">
    <p id="popup-text"></p>
</div>

<!-- Cart Items Popup -->
<div id="cart-items-popup" class="hidden fixed top-20 right-10 bg-white w-64 shadow-lg rounded p-4">
    <h3 class="text-lg font-bold mb-2">Cart Items</h3>
    <ul id="cart-items-list" class="text-gray-700"></ul>
    <button onclick="toggleCartPopup()" class="mt-4 px-4 py-2 bg-red-500 text-white font-bold rounded">Close</button>
</div>

<script>
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    updateCartCount();

    function increaseQuantity(productId) {
        let quantityInput = document.getElementById(`quantity-${productId}`);
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }

    function decreaseQuantity(productId) {
        let quantityInput = document.getElementById(`quantity-${productId}`);
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }

    function addToCart(productId, productName, price) {
        let quantity = parseInt(document.getElementById(`quantity-${productId}`).value);
        if (cart[productId]) {
            cart[productId].quantity += quantity;
        } else {
            cart[productId] = { name: productName, quantity: quantity, price: price };
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        showPopup("Product added to cart!");
        showCartItems();
    }

    function removeCartItem(productId) {
        delete cart[productId];
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        showCartItems();
    }

    function updateCartCount() {
        let totalItems = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
        document.getElementById('cart-count').textContent = totalItems;
    }

    function showPopup(message) {
        let popup = document.getElementById('cart-popup');
        document.getElementById('popup-text').textContent = message;
        popup.classList.remove('hidden');
        setTimeout(() => popup.classList.add('hidden'), 2000);
    }

    function toggleCartPopup(event) {
        if (event) event.preventDefault();
        let popup = document.getElementById('cart-items-popup');
        showCartItems();
        popup.classList.toggle('hidden');
    }

    function showCartItems() {
        let popup = document.getElementById('cart-items-popup');
        let cartList = document.getElementById('cart-items-list');
        cartList.innerHTML = '';
        for (let id in cart) {
            let item = cart[id];
            let li = document.createElement('li');
            li.innerHTML = `${item.name}: ${item.quantity} x Kshs ${item.price.toFixed(2)} 
                <button onclick="removeCartItem(${id})" class="ml-2 px-2 py-1 bg-red-500 text-white rounded">Remove</button>`;
            cartList.appendChild(li);
        }
        popup.classList.remove('hidden');
    }
</script>
@endsection
