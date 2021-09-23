<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home/register', [App\Http\Controllers\HomeController::class, 'register'])->name('home.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products/index', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');

Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

Route::get('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');

Route::get('/products/show', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');

Route::post('/products/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');

Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/category/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');

Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');

Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');

Route::post('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/cart/index', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

Route::post('/cart/store', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');

Route::get('/cart/show', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');

Route::get('/cart/total', [App\Http\Controllers\CartController::class, 'total'])->name('cart.total');

Route::get('/cart/list', [App\Http\Controllers\CartController::class, 'list'])->name('cart.list');

Route::get('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::get('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout/index', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');

Route::post('/checkout/store', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/checkout/getCountry', [App\Http\Controllers\CheckoutController::class, 'getCountry'])->name('checkout.getCountry');

Route::post('/checkout/getState', [App\Http\Controllers\CheckoutController::class, 'getState'])->name('checkout.getState');

Route::post('/checkout/getCity', [App\Http\Controllers\CheckoutController::class, 'getCity'])->name('checkout.getCity');

Route::get('/order/show', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');

Route::post('/order/update-status', [App\Http\Controllers\CartController::class, 'updateStatus'])->name('order.updateStatus');

Route::get('/export', [App\Http\Controllers\OrderController::class, 'Export'])->name('export');

Route::post('/import', [App\Http\Controllers\ProductController::class, 'Import'])->name('import');