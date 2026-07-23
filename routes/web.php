<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NotificationController;

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
// orders
Route::get('/order', [OrderController::class, 'display_order'])->name('order.index');
// customers
Route::get('/customer', [Controller::class, 'customer_desplay'])->name('customer.index');
// Route::get('/admin/show{customer}', [Controller::class, 'show_customer'])->name('customer.show');
Route::get('/customer', [Controller::class,'customer_page_index'])->name('customer_page_index');
Route::get('/customer/{id}', [Controller::class, 'show_customer'])
    ->name('customer.show');
/* Route Reports*/
Route::controller(ReportController::class)->group(function () {
    Route::get('/reports', 'index')->name('reports.index');

});
// Route::get('/reports',ReportController::class);
Route::get('/reports/export/excel', [ReportController::class, 'exportExcel'])
    ->name('reports.export.excel');
Route::get('/settings',function(){
    return view('admin.settings.index');
})->name('settings.index');
// middleware admin
Route::middleware('admin')->group(function () {
    Route::get('/category/create_dash', function () {
        return view('admin.categories.create');
    })->name('create_category');
    Route::resource('category', CategoryController::class);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    // Route::get('/dashboard', [Controller::class, 'dashbaord'])->name('dashboard');
});
// middleware auth
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
    Route::resource('/order', OrderController::class);
    Route::get('/my_order', [OrderController::class, 'customer_index'])->name('customer_orders');
    Route::get('/order_details/{order}', [OrderController::class, 'show_details'])->name('order.details');
    Route::get('/order/{order}/invoice',[OrderController::class, 'invoice'])->name('order.invoice');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    // Notifications pages
    Route::get('/notifications', [NotificationController::class,'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationController::class,'read'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class,'readAll'])->name('notifications.readAll');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::delete('/notifications', [NotificationController::class, 'destroyAll'])->name('notifications.destroyAll');
    
});

require __DIR__ . '/auth.php';
