<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('index');
});
Route::get('/table', [UserController::class, 'list'])->name('user.table');
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/create', [UserController::class, 'store'])->name('user.store');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/edit/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/createproduct', [UserController::class, 'create_product'])->name('product.create');
Route::post('/createproduct', [UserController::class, 'store_product'])->name('product.store');
Route::get('/editproduct/{id}', [UserController::class, 'edit_product'])->name('product.edit');
Route::put('/editproduct/{id}', [UserController::class, 'update_product'])->name('product.update');
Route::delete('/productdelete/{id}', [UserController::class, 'product_destroy'])->name('product.destroy');
