<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Shop\ProductSearchController;
use App\Http\Controllers\ProfileController; // تأكد من استيراد هذا

Route::get('/', function () {
    return view('welcome');
});

// ✅ هذه routes يجب أن تبقى عامة للزوار (خارج مجموعة admin)
Route::get('/shop/categories', [CategoryController::class, 'publicIndex'])->name('shop.categories.index');
Route::get('/shop/categories/{category}', [CategoryController::class, 'showProducts'])->name('shop.categories.show');

// ✅ مجموعة المشرف
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('logout', function () {
        auth()->logout();
        return redirect('/');
    })->name('logout');

    Route::get('categories/{category}/products', [CategoryController::class, 'products'])->name('categories.products');
});

// ✅ مستخدم عادي
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ الضيف
Route::get('/guest-dashboard', function () {
    return view('guest.dashboard');
})->name('guest.dashboard');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/search', [ProductSearchController::class, 'search'])->name('shop.search');

require __DIR__.'/auth.php';
