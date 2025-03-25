<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    // Viewing product

    public function index()
    {
        $getAllProducts = Product::all(); // Fetch all products from the database
        return view('product', compact('getAllProducts')); // Pass datla to the view
    }

}
