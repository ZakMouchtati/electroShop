<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\checkOutController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProductController::class, 'index']);
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class)->only(['show']);
Route::resource('/panier', PanierController::class);
Route::get('/product-search', [ProductController::class, "search"])->name('search');
Route::resource('/checkout', checkOutController::class)->only(['create', 'store']);
Route::get('/viewcart', [checkOutController::class, 'index'])->name('viewcart.index');
Route::resource('/commande', CommandeController::class)->only(['store']);
Route::get('/confimration', function () {
    return view('checkout.thanks');
});
Route::resource('/comments', CommentController::class)->only(['store']);
Auth::routes();
