<?php


use App\Http\Controllers\HeaderController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [MainController::class, 'index'])->name('main');

// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/welcome', function() {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin.headers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // only admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('product-categories', ProductCategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('about-us', AboutUsController::class);
        Route::resource('headers', HeaderController::class);
    });
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
