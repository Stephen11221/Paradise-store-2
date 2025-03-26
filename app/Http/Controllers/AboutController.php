<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About; // Example model if you're storing "about" info in the DB

class AboutController extends Controller
{
    // Show a form to create a new "About" entry
    public function create()
    {
        return view('/dashboard-file/createabout'); // Blade view with a form
    }

    // Store the newly created "About" entry in the database
    public function store(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Save to the database (assuming you have an About model)
        About::create($validatedData);

        // Redirect back or to a page
        return redirect()->route('about.create')->with('success', 'About section created successfully!');
    }

    // Other methods (index, show, edit, update, etc.)

    // to be continued 5am 
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('dashboard-file.viewabout', compact('about'));
    }

    // Handle the form submission for updating
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        // Validate the incoming data
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the record in the database
        $about->update($validatedData);

        // Redirect back or to a specific route
        return redirect()->route('dashboard-file.viewabout')->with('success', 'About updated successfully!');
    }

}
