<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PlanController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware("auth")->group(function () {
    Route::get('/', [ProductController::class, 'list'])->name('products-list');
    Route::get('/product/{id}/{slug}', [ProductController::class, 'detail']);
    Route::post('/purchase/{id}', [PlanController::class, 'purchase'])->name('purchase');
    Route::get('/success', [PlanController::class, 'success'])->name('success');
});
