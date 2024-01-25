<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
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
    // return view('welcome');
    return view('pages.guest.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        // Product Admin
        Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

        // Category Admin
        Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');

        // Setting Admin
        Route::get('/setting/general', [SettingController::class, 'index'])->name('admin.setting.general.index');
    });

});

require __DIR__.'/auth.php';
