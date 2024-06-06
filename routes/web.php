<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product_table_controller;
use App\Http\Controllers\user_table_controller;
use App\Http\Controllers\review_table_controller;

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

Route::get('/', [product_table_controller::class, 'index']);

Route::get('/', [product_table_controller::class, 'index'])->name('index');

Route::post('/product_table_route', [product_table_controller::class, 'product_table'])->name('product_table');

Route::get('/dashboard', [product_table_controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('delete_product_route/{id}', [product_table_controller::class, 'delete_product'])->name('delete_product');
Route::post('rent_product_route/{id}', [product_table_controller::class, 'rent_product'])->name('rent_product');
Route::post('accept_product_route/{id}', [product_table_controller::class, 'accept_product'])->name('accept_product');
Route::post('decline_product_route/{id}', [product_table_controller::class, 'decline_product'])->name('decline_product');

Route::get('/admin', [user_table_controller::class, 'admin'])->middleware(['auth', 'verified'])->name('admin');
Route::post('delete_user_route/{id}', [user_table_controller::class, 'delete_user'])->name('delete_user');

Route::post('/review_table_route', [review_table_controller::class, 'review_table'])->name('review_table');

Route::get('/images/{imageName}', [ImageController::class, 'show'])->name('image_show');


require __DIR__.'/auth.php';
