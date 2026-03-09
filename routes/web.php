<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

// Auth Routes
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Existing Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [\App\Http\Controllers\CompanyController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\CompanyController::class, 'contact'])->name('contact');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/products/{product}/favorite', [FavoriteController::class, 'toggle'])->name('products.favorite')->middleware('auth');
Route::post('/products/{product}/review', [ReviewController::class, 'store'])->name('products.reviews.store')->middleware('auth');
Route::post('/products/{product}/buy', [OrderController::class, 'store'])->name('products.buy')->middleware('auth');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Shopping Cart Routes
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{cartItem}', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cartItem}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
});

Route::post('/inquiries', [\App\Http\Controllers\InquiryController::class, 'store'])->name('inquiries.store');

// Admin Routes
Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::get('inquiries', [\App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'show'])->name('inquiries.show');
    Route::delete('inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'destroy'])->name('inquiries.destroy');
});
