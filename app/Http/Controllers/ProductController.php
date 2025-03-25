<?php
 
 namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products in the dashboard
    public function index()
    {
        $getAllProducts = Product::all();
        $availableProducts  = Product::where('status', 'available')->count();
        $soldProductsCount  = Product::count();
    
            return view('dashboard-file.dashboard', compact('getAllProducts', 'availableProducts', 'soldProductsCount'));
      
    
    //    return view('product' , compact('getAllProducts'));
    }
    

    // Show create/edit product form
    public function create()
    {
        return view('dashboard-file.create-product');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard-file.editproduct', compact('product'));
    }

    // Store new product
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,coming_soon',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validatedData);
        return redirect()->route('dashboard')->with('success', 'Product added successfully.');
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:available,coming_soon',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validatedData);
        return redirect()->route('dashboard')->with('success', 'Product updated successfully.');
    }
    public function destroy($id)
{
    $product = Product::find($id);
    if ($product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    return redirect()->route('products.index')->with('error', 'Product not found.');
}

}
