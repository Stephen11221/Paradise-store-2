@extends('weblayout.layout')

@section('content')
<section class="relative bg-gray-900 py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-white text-center mb-10">Our Fragrance Collection</h2>
    </div>
</section>
    <div class="flex gap-2 mt-9 jusify-center">
        <button onclick="openFullCart()" class="w-50 mx-auto px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white text-sm font-medium rounded transition-colors">
            View Full Cart
        </button>
    </div>
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($getAllProducts as $product)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
            
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                <p class="text-lg font-semibold text-gray-800 mb-4">
                    <span class="text-green-600">Kshs </span>{{ number_format($product->price, 2) }}
                </p>

                <div class="flex items-center mb-4">
                    <label for="quantity-{{ $product->id }}" class="block text-gray-700 mr-3">Qty:</label>
                    <div class="flex items-center border rounded-lg overflow-hidden">
                        <button type="button" onclick="decreaseQuantity({{ $product->id }})" 
                                class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-3 transition-colors">
                            -
                        </button>
                        <input type="number" id="quantity-{{ $product->id }}" min="1" value="1" 
                               class="w-12 border-x-0 border-gray-200 py-2 px-1 text-center focus:ring-0 focus:border-gray-300">
                        <button type="button" onclick="increaseQuantity({{ $product->id }})" 
                                class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-3 transition-colors">
                            +
                        </button>
                    </div>
                </div>

                <button onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})" 
                        class="w-full px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-medium rounded-lg shadow-md transition-all duration-300 hover:shadow-lg">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Toast Notification Popup -->
<div id="toast-popup" class="fixed bottom-4 right-4 z-50 hidden">
    <div class="flex items-center bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fade-in-up">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span id="toast-message"></span>
    </div>
</div>

<!-- Cart Popup Modal (appears when adding items) -->
<div id="cart-popup-modal" class="fixed bottom-4 right-4 z-50 hidden">
    <div class="w-full max-w-xs bg-white rounded-lg shadow-xl overflow-hidden border border-gray-200">
        <div class="flex justify-between items-center px-4 py-3 bg-gray-100 border-b">
            <h3 class="font-bold text-gray-900">Cart Updated</h3>
            <button onclick="closeCartPopup()" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div class="p-4">
            <div id="cart-popup-content" class="mb-3">
                <!-- Content will be inserted here by JavaScript -->
            </div>
            <button onclick="openFullCart()" class="w-full px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white text-sm font-medium rounded transition-colors">
                View Full Cart
            </button>
        </div>
    </div>
</div>

<!-- Full Cart Drawer -->
<div id="full-cart-drawer" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50" onclick="closeFullCart()"></div>
    <div class="absolute top-0 right-0 h-full w-full max-w-md bg-white shadow-xl transition-transform duration-300 transform translate-x-0">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-between p-6 border-b">
                <h3 class="text-xl font-bold text-gray-900">Your Shopping Cart</h3>
                <button onclick="closeFullCart()" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="flex-1 overflow-y-auto p-6">
                <ul id="cart-items-list" class="divide-y divide-gray-200"></ul>
            </div>
            
            <div class="p-6 border-t">
                <div class="flex justify-between mb-4">
                    <span class="font-medium text-lg">Total:</span>
                    <span id="cart-total" class="font-bold text-lg">Kshs 0.00</span>
                </div>
                <button class="w-full px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-medium rounded-lg transition-colors">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    let cartPopupTimeout;
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
        showToast(`${quantity} × ${productName} added to cart`);
        showCartPopup(productName, quantity, price);
    }

    function removeCartItem(productId) {
        delete cart[productId];
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        updateFullCart();
        showToast('Item removed from cart');
    }

    function updateCartCount() {
        let totalItems = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
        if (document.getElementById('cart-count')) {
            document.getElementById('cart-count').textContent = totalItems;
        }
    }

    function showToast(message) {
        const toast = document.getElementById('toast-popup');
        document.getElementById('toast-message').textContent = message;
        
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        
        setTimeout(() => {
            toast.classList.remove('flex');
            toast.classList.add('hidden');
        }, 30000);
    }

    function showCartPopup(productName, quantity, price) {
        const popup = document.getElementById('cart-popup-modal');
        const content = document.getElementById('cart-popup-content');
        
        // Update popup content
        content.innerHTML = `
            <p class="text-gray-700 mb-2">You added <span class="font-medium">${quantity} × ${productName}</span></p>
            <p class="text-gray-900 font-medium">Item Total: <span class="text-green-600">Kshs ${(quantity * price).toFixed(2)}</span></p>
        `;
        
        // Show popup
        popup.classList.remove('hidden');
        
        // Clear any existing timeout
        clearTimeout(cartPopupTimeout);
        
        // Auto-hide after 5 seconds
        cartPopupTimeout = setTimeout(() => {
            popup.classList.add('hidden');
        }, 50000);
    }

    function closeCartPopup() {
        const popup = document.getElementById('cart-popup-modal');
        popup.classList.add('hidden');
        clearTimeout(cartPopupTimeout);
    }

    function openFullCart() {
        closeCartPopup();
        const drawer = document.getElementById('full-cart-drawer'); 
        drawer.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        updateFullCart();
    }

    function closeFullCart() {
        const drawer = document.getElementById('full-cart-drawer');
        drawer.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function updateFullCart() {
        const cartList = document.getElementById('cart-items-list');
        cartList.innerHTML = '';
        
        let total = 0;
        
        for (let id in cart) {
            const item = cart[id];
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            
            const li = document.createElement('li');
            li.className = 'py-4';
            li.innerHTML = `
                <div class="flex justify-between items-center">
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">${item.name}</h4>
                        <p class="text-gray-600">${item.quantity} × Kshs ${item.price.toFixed()}</p>
                    </div>
                    <div class="flex items-center">
                        <span class="font-medium mr-4">Kshs ${itemTotal.toFixed(2)}</span>
                        <button onclick="removeCartItem(${id})" 
                                class="text-red-500 hover:text-red-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            cartList.appendChild(li);
        }
        
        document.getElementById('cart-total').textContent = `Kshs ${total.toFixed(2)}`;
        
        if (Object.keys(cart).length === 0) {
            cartList.innerHTML = '<li class="py-4 text-center text-gray-500">Your cart is empty</li>';
        }
    }
</script>

<style>
    .animate-fade-in-up {
        animation: fadeInUp 0.3s ease-out forwards;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection