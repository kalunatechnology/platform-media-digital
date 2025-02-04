<?php

use App\Http\Controllers\PortalController;
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


Route::get('/', [PortalController::class, 'index'])->name('home');
Route::get('/detailberita', [PortalController::class, 'detailberita'])->name('home');
Route::get('/author', [PortalController::class, 'author'])->name('home');
Route::get('/category', [PortalController::class, 'category'])->name('category');
Route::get('category/detailcategory', [PortalController::class, 'detailcategory'])->name('detailcategory');
