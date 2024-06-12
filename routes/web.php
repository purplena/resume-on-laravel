<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionsController;
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

Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');

Route::fallback(function () {
    return view('pages/error-page');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');;
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');
Route::get('login', [SessionsController::class, 'login']);
Route::post('sessions', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy']);

Route::get('admin', [AdminController::class, 'index'])->middleware('can:admin')->name('admin');
Route::get('admin/photos/upload', [AdminController::class, 'create'])->middleware('can:admin');
Route::post('admin/photos', [AdminController::class, 'store'])->middleware('can:admin');
Route::delete('admin/photos/{photo}', [AdminController::class, 'destroy'])->middleware('can:admin');
