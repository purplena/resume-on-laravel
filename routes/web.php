<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;



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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('login', [SessionsController::class, 'login']);
Route::post('sessions', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy']);

Route::get('admin', [AdminController::class, 'index'])->middleware('can:admin');
