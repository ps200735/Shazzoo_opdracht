<?php

use App\Livewire\ProductsPages\Productdetails;
use App\Livewire\ProductsPages\Products;
use App\Livewire\ShopCart\ShopCartItems;
use Illuminate\Support\Facades\Route;

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

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', Products::class)->name('products');
Route::get('/product/{id}', Productdetails::class)->name('product.show');
Route::middleware('auth')->group(function () {

    Route::get('/winkelwagen', ShopCartItems::class)->name('cart');

});

require __DIR__.'/auth.php';
