<?php 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewProductController;

use App\Http\Controllers\AboutController;

// Public routes (accessible without authentication)
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/women', function () {
    return view('women');
})->name('women');

Route::get('/men', function () {
    return view('men');
})->name('men');

Route::get('/about', function () {
    return view('about');
})->name('about');
//

Route::get('/product', [ViewProductController::class, 'index'])->name('product.view');


Route::get('/brand', function () {
    return view('brand');
})->name('brand');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//  PROTECTED ROUTES (Only for authenticated users)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    // Product Management
    Route::resource('products', ProductController::class);

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product Actions
    Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('dashboard.createproduct');
    Route::post('/dashboard/products', [ProductController::class, 'store'])->name('dashboard.storeproduct');
    Route::get('/dashboard/products/edit/{id}', [ProductController::class, 'edit'])->name('dashboard.editproduct');
    Route::put('/dashboard/products/update/{id}', [ProductController::class, 'update'])->name('dashboard.updateproduct');
    Route::delete('/dashboard/products/delete/{id}', [ProductController::class, 'destroy'])->name('dashboard.deleteproduct');

    // about route




});
Route::middleware(['auth'])->group(function () {
    // GET route to show the create about form
    Route::get('/dashboard-file/createabout', [AboutController::class, 'create'])
        ->name('about.create');

    // POST route to store the new about entry (optional)
    Route::post('/dashboard-file/createabout', [AboutController::class, 'store'])
        ->name('about.store');

        // Show the edit form
Route::get('/dashboard-flie/viewabout/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');

// Handle the update form submission
Route::put('/dashboard-flie/viewabout/{id}', [AboutController::class, 'update'])->name('about.update');

});

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Default Laravel authentication routes
require __DIR__.'/auth.php';
