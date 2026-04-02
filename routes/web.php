<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PerfumeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/shop/details/{perfume}', [ShopController::class, 'details'])->name('shop.details');

Route::get('/register',[AuthController::class,'showRegister'])->name('auth.register');
Route::post('/register',[AuthController::class,'register']);

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'send'])->name('contact.send');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/products', PerfumeController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/orders', OrderController::class)->only(['index', 'show']);
        Route::get('/logs', [LogController::class, 'index'])->name('logs');
    });
Route::prefix('cart')
    ->middleware('auth')
    ->name('cart.')
    ->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add', [CartController::class, 'add'])->name('add');
        Route::post('/update', [CartController::class, 'update'])->name('update');
        Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    });
Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('auth')->name('checkout.store');

Route::get('/author',[AuthorController::class,'index'])->name('author.index');
