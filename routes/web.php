<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Clientcntroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
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
});

// Route::prefix('home')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index');
    });


// });

Route::controller(Clientcntroller::class)->group(function () {
    Route::get('category', 'categoryPage')->name('category');
    Route::get('single-product', 'singleProduct')->name('singleProduct');
    Route::get('add-to-cart', 'AddCart')->name('addCart');
    Route::get('checkout', 'checkout')->name('checkout');
    Route::get('user-profile', 'userProfile')->name('userProfile');

    Route::get('new-release', 'newRelease')->name('newRelease');
    Route::get('todays-deal', 'todayDeal')->name('todayDeal');
    Route::get('costumer-service', 'costumerService')->name('costumerService');
});




Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('subCategory', SubCategoryController::class);
    Route::get('edit-product-img/{id}', [ProductController::class, 'EditProductImg'])->name('editProductImg');
    Route::put('edit-product-img/{id}', [ProductController::class, 'updateImgProduct'])->name('updateImgProduct');
});

require __DIR__ . '/auth.php';
