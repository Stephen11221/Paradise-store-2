<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
    // View Cart Page
    public function viewCart()
    {
        $cartItems = Cart::content();
        return view('cart', compact('cartItems'));
    }

    // Add to Cart
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'attributes' => ['image' => $product->image]
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart!',
            'productName' => $product->name,
            'cartCount' => Cart::count() // Get updated cart count
        ]);
    }

    // Remove from Cart
    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Product removed from cart!');
    }

    // Update Cart
    public function updateCart(Request $request, $rowId)
    {
        Cart::update($rowId, $request->quantity);
        return back()->with('success', 'Cart updated successfully!');
    }
}
