<?php

namespace App\Http\Controllers;
use App\Models\About;

use Illuminate\Http\Request;

class ViewaboutController extends Controller
{
    //
    public function show()
    {

        $about = About::first(); // Fetch the first about section
        return view('about', compact('about'));}

}
