<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/add-product', [ProductController::class, 'addProduct']);

Route::post('/add-product', [ProductController::class, 'storeProduct'])->name('product.store');

Route::get('/all-products', [ProductController::class, 'products'])->name('products.all');

Route::get('/edit-product/{id}', [ProductController::class, 'editProduct']);

Route::post('/update-product', [ProductController::class,'updateProduct'])->name('product.update');

Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
