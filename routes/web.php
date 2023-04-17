<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashHome;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashHome::Class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/receipt',function(){return view('receipt');});
Route::middleware('auth')->group(function () {
    Route::get('/receipt/{id}',[DashHome::class,'receipt']);
    Route::get('/products',function(){return view('product');});
    Route::get('/pembelian', function () { return view('pembelian');});
    Route::get('/cart',function(){return view('cart');});
    Route::get('/order',function(){return view('order');});
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
