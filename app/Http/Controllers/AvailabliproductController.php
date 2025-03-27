<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AvailabliproductController extends Controller
{
    // view product

    public function index()
    {
        $getAllProducts = Product::all(); // Fetch all products from the database
        return view('dashboard-file.availableproduct', compact('getAllProducts')); // Pass datla to the view
    }

}
