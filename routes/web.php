<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'product_desplay']);
// Route::get('/',function(){ return view('auth.register');});
Route::get('/shop/product', [ProductController::class, 'shop'])->name('shop.product');
Route::get('/product/search', [ProductController::class, 'search_product'])->name('search');
Route::get('/shop/category', [CategoryController::class, 'shop'])->name('shop.category');
Route::get('category/product/{id}', [ProductController::class, 'show_cate_product'])->name('category.product');
Route::get('/contact', function () {
    return view('/contact');
})->name('contact_us');
Route::get('/card', function () {
    return view('/card');
})->name('card');
Route::get('login', function () {
    return view('auth/login');
})->name('login');
// products pages 
Route::resource('/products', ProductController::class);
// categories page
Route::get('/category/dash', [CategoryController::class, 'index'])->name('category.index');


// orders
Route::get('/order', [OrderController::class,'display_order'])->name('order.index');

// customers
Route::get('/customer', [Controller::class, 'customer_desplay'])->name('customer.index');
// middleware

Route::middleware('admin')->group(function () {
    Route::get('/category/create', function () {
        return view('admin.categories.create');
    })->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/dashboard',[Controller::class,'dashbaord'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    // card
    Route::get('/card/{prod}', [CardController::class, 'add_item'])->name('add_card');
    Route::get('/card', [CardController::class, 'index'])->name('card.index');
    Route::patch('/card/{item}/decrease', [CardController::class, 'decrease'])->name('decrease_item');
    Route::patch('/card/{item}/increment', [CardController::class, 'increment'])->name('increment_item');
    Route::delete('/card/{item}/delete', [CardController::class, 'delete'])->name('delete_item');
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // orders
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/my_order', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order_details/{order}', [OrderController::class, 'show_details'])->name('order.details');
});

require __DIR__ . '/auth.php';
