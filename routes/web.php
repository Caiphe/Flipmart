<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login-form');
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Routes
Route::get('/admin-logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin-profile', [AdminProfileController::class, 'profile'])->name('admin.profile');
Route::get('/admin-profile-edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin-profile-update', [AdminProfileController::class, 'update'])->name('admin.profile.update');

// Normal users
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
