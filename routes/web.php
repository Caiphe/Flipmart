<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\SubSubCategoryController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login-form');
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

// Admin Routes
Route::get('/admin-logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin-profile', [AdminProfileController::class, 'profile'])->name('admin.profile');
Route::get('/admin-profile-edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin-profile-update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('/admin-change-password', [AdminProfileController::class, 'changePassword'])->name('admin.change.password');
Route::post('/admin-password-update', [AdminProfileController::class, 'passwordUpdate'])->name('admin.password.update');

// Admin Brands Routes
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'index'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/delete/{brand:id}', [BrandController::class, 'destroy'])->name('brand.delete');
    Route::get('/edit/{brand:brand_slug}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update/{brand}', [BrandController::class, 'update'])->name('brand.update');
});

// Admin Category Route
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'index'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/delete/{category:id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/edit/{category:slug}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{category:id}', [CategoryController::class, 'update'])->name('category.update');
});

// Addmin Sub Category Routes
Route::prefix('subcategory')->group(function(){
    Route::get('/view', [SubCategoryController::class, 'index'])->name('all.subcategory');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/delete/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');
    Route::get('/edit/{subcategory:slug}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/update/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategory.update');
});

// This route is getting the list of subcategory needed to create dependencies dropdown
Route::get('category/subcategory/ajax/{category:id}', [SubCategoryController::class, 'getSubcategory']);

// Addmin Sub Sub Category Routes
Route::prefix('subsubcategory')->group(function(){
    Route::get('/view', [SubSubCategoryController::class, 'index'])->name('all.subsubcategory');
    Route::post('/store', [SubSubCategoryController::class, 'store'])->name('subsubcategory.store');
    Route::get('/delete/{subsubcategory:id}', [SubSubCategoryController::class, 'destroy'])->name('subsubcategory.delete');
    Route::get('/edit/{subsubcategory:slug}', [SubSubCategoryController::class, 'edit'])->name('subsubcategory.edit');
    Route::post('/update/{subsubcategory}', [SubSubCategoryController::class, 'update'])->name('subsubcategory.update');
});

Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'index'])->name('add.product');
    // Route::post('/store', [SubSubCategoryController::class, 'store'])->name('subsubcategory.store');
    // Route::get('/delete/{subsubcategory:id}', [SubSubCategoryController::class, 'destroy'])->name('subsubcategory.delete');
    // Route::get('/edit/{subsubcategory:slug}', [SubSubCategoryController::class, 'edit'])->name('subsubcategory.edit');
    // Route::post('/update/{subsubcategory}', [SubSubCategoryController::class, 'update'])->name('subsubcategory.update');
});

// Non Admin Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user-profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user-profile-update', [IndexController::class, 'update'])->name('user.profile.update');
Route::get('/user-change-password', [IndexController::class, 'passwordChange'])->name('user.change.password');
Route::post('/user-update-password', [IndexController::class, 'passwordUpdate'])->name('user.password.update');
