<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::name('akun.')->middleware('auth')->group(function () {
    Route::get('/akun', [AkunController::class, 'index'])->name('index');
    Route::get('/akun/delete/{id}', [AkunController::class, 'delete'])->name('delete');
    Route::get('/akun/edit/{id}', [AkunController::class, 'edit'])->name('edit');
    Route::post('/akun/update', [AkunController::class, 'update'])->name('update');
});

Route::name('product.')->middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('index');
    Route::get('/product/tambah', [ProductController::class, 'tambah'])->name('tambah');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/product/store', [ProductController::class, 'store'])->name('store');
    Route::post('/product/update', [ProductController::class, 'update'])->name('update');
});


Route::name('order.')->middleware('auth')->group(function () {
    Route::get('/order', [OrdersController::class, 'index'])->name('index');
    Route::get('/order/tambah', [OrdersController::class, 'tambah'])->name('tambah');
    Route::get('/order/delete/{id}', [OrdersController::class, 'delete'])->name('delete');
    Route::get('/order/edit/{id}', [OrdersController::class, 'edit'])->name('edit');
    Route::post('/order/store', [OrdersController::class, 'store'])->name('store');
    Route::post('/order/update', [OrdersController::class, 'update'])->name('update');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
