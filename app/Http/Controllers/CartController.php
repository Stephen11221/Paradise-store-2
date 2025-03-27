<?php

namespace App\Http\Controllers;  

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::items();
        $total = Cart::total();
        
        return view('cart', compact('cartItems', 'total'));
    }

    // Add item to cart
    public function addToCart(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|exists:products,id',
        'quantity' => 'sometimes|integer|min:1',
        'price' => 'required|numeric|min:0'
    ]);

    Cart::add([
        'id' => $validated['id'],
        'quantity' => $validated['quantity'] ?? 1,
        'price' => $validated['price']
    ]);
    return response()->json(['message'=>'item added']);
}   

    // View cart items
    public function viewCart()
    {
        $cartItems = Cart::content();
        return view('cart', compact('cartItems'));
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
