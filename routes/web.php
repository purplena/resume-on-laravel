<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IllustrationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProjectController;
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

Route::post('/set-theme', function () {
    $request = request();
    $newColor = $request->input('color');
    $request->session()->put('theme_color', $newColor);

    return response()->json(['success' => true, 'color' => $newColor]);
});

Route::get('/get-theme', function () {
    $request = request();
    $themeColor = session()->get('theme_color');
    $userTheme = $request->query('userTheme');

    return response()->json(['color' => $themeColor ?? $userTheme]);
});

Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');

Route::fallback(function () {
    return view('pages/error-page');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project');
Route::get('/projects', [ProjectController::class, 'showAll'])->name('projects');
Route::get('/illustrations', [IllustrationController::class, 'showAll'])->name('gallery');
Route::get('/illustrations/{genre:name}', [IllustrationController::class, 'showFilteredIllustrations'])->name("filter.illustrations");
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.us.store');
Route::get('/login', [SessionsController::class, 'login'])->name('login');
Route::post('/sessions', [SessionsController::class, 'store'])->name('session.store');

Route::group(['middleware' => 'auth'], function () {
    Route::middleware('can:admin')->group(function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        Route::post('logout', [SessionsController::class, 'destroy'])->withoutMiddleware(['auth']);

        Route::get('/admin/illustrations', [IllustrationController::class, 'index'])->name('admin.illustrations');
        Route::post('/admin/illustrations', [IllustrationController::class, 'store'])->name('illustration.store');
        Route::delete('admin/illustrations', [IllustrationController::class, 'destroyAll'])->name('illustrations.destroyAll');
        Route::delete('admin/illustrations/{project}', [IllustrationController::class, 'destroy'])->where('id', '[0-9]+');
        Route::delete('admin/illustrations/destroy/selected', [IllustrationController::class, 'destroySelected'])->name('illustrations.destroySelected');
        Route::patch('admin/illustrations/{project}', [IllustrationController::class, 'update'])->name('illustration.update');

        Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects');
        Route::post('/admin/projects', [ProjectController::class, 'store'])->name('project.store');
        Route::patch('/admin/projects/{project}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('admin/projects', [ProjectController::class, 'destroyAll'])->name('projects.destroyAll');
        Route::delete('admin/projects/destroy/selected', [ProjectController::class, 'destroySelected'])->name('projects.destroySelected');
        Route::delete('admin/projects/{project}', [ProjectController::class, 'destroy'])->where('id', '[0-9]+');

        Route::delete('admin/projects/medias/{media}', [MediaController::class, 'destroy'])->where('id', '[0-9]+');
    });
});
