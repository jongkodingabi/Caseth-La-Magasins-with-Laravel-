<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BoquetteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CasingController;
use App\Http\Controllers\PhoneStrapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Pages
Route::get('/casing', [CasingController::class, 'index']);
Route::get('/phoneStrap', [PhoneStrapController::class, 'index']);
Route::get('/boquette', [BoquetteController::class, 'index']);
Route::get('/cart', [CartController::class, 'index']);



Route::get('/casing', [ProductController::class, 'showCasing'])->name('products.casing');

Route::get('/phoneStrap', [ProductController::class, 'showPhoneStrap'])->name('products.phoneStrap');

Route::get('/boquette', [ProductController::class, 'showBoquette'])->name('products.boquette');

//Cart Routes
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/cart/apply-discount', [CartController::class, 'applyDiscount'])->name('cart.apply-discount');
Route::post('/cart', [CartController::class, 'checkCost'])->name('cart.checkCost');






require __DIR__.'/auth.php';
