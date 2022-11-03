<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\ArchiveController;
use App\Http\Controllers\Frontend\AuthorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageSingleController;
use App\Http\Controllers\Frontend\PostSingleController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Artisan;
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


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


// Admin Routes
Route::middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin', [DashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth', 'XSS'])->prefix('admin')->group(function () {
    Route::get('clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->back()->with(['msg' => 'Cache Cleared', 'type' => 'success']);
    });
});

Route::middleware(['auth', 'XSS'])->prefix('admin')->group(function () {
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/change-password', [ProfileController::class, 'change_password_edit'])->name('profile.change_password_edit');
    Route::put('profile/change-password/update', [ProfileController::class, 'change_password_update'])->name('profile.change_password_update');

});


Route::middleware(['auth', 'XSS'])->prefix('admin')->group(function () {
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::put('category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::middleware(['auth', 'XSS'])->prefix('admin')->group(function () {
    Route::get('post', [PostController::class, 'index'])->name('post.index');
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('post/checkSlug', [PostController::class, 'checkSlug'])->name('post.checkSlug');
});

Route::middleware(['auth', 'XSS'])->prefix('admin')->group(function () {
    Route::get('page', [PageController::class, 'index'])->name('page.index');
    Route::get('page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('page', [PageController::class, 'store'])->name('page.store');
    Route::get('page/{id}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::put('page/{id}', [PageController::class, 'update'])->name('page.update');
    Route::delete('page/{id}', [PageController::class, 'destroy'])->name('page.destroy');
});

Route::middleware(['auth', 'XSS'])->prefix('admin')->group(function () {
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [SettingsController::class, 'store'])->name('settings.store');
    Route::put('settings/{id}', [SettingsController::class, 'update'])->name('settings.update');
});

Route::middleware(['auth', 'XSS'])->prefix('admin')->group(function () {
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
});

// FrontEnd Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

//Route::get('post', [PostSingleController::class, 'index'])->name('post.index');
Route::get('post/{slug}', [PostSingleController::class, 'single'])->name('post.single');

Route::get('/{page_slug}', [PageSingleController::class, 'single'])->name('page.single')->middleware('XSS');

Route::get('category/{category_slug}', [ArchiveController::class, 'archive'])->name('archive');

Route::get('author/{name}', [AuthorController::class, 'author'])->name('author');
