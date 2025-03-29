<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product; // Ensure Product model is imported

class CartController extends Controller
{
    // Show the cart
    public function index()
    {
        $cartItems = Cart::content(); // Get all cart items
        $total = Cart::total(); // Get cart total
        return view('cart', compact('cartItems', 'total'));
    }

    // Add item to cart
    public function add(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:products,id',
            'quantity' => 'sometimes|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        $product = Product::find($validated['id']); // Fetch product

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $validated['quantity'] ?? 1,
            'price' => $product->price,
            'options' => ['image' => $product->image], // Store image in options
        ]);
        

        return response()->json(['message' => 'Item added to cart']);
    }

    // Remove item from cart
    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Clear all cart items
    public function clearCart()
    {
        Cart::destroy();
        return redirect()->back()->with('success', 'Cart cleared!');
    }
}
