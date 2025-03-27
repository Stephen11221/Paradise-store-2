<?php 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ViewaboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AvailabliproductController;


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

Route::get('/about', [ViewaboutController::class, 'show'])->name('about.view');
//

Route::get('/product', [ViewProductController::class, 'index'])->name('product.view');


Route::get('/brand', function () {
    return view('brand');
})->name('brand');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



//add catt

// Cart Routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.view');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

//PROTECTED ROUTES (Only for authenticated users)
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


    Route::get('dashboard-file/viewcontact', [ContactController::class, 'index'])->name('contact.index');

    // about routes
    Route::get('dashboard-file/viewabout', [AboutController::class, 'index'])->name('about.index');

    Route::get('/dashboard-file/editabout/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/dashboard-file/updateabout/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::get('/dashboard-file/availableproduct', [AvailabliproductController::class, 'index'])->name('product-view');

 




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
