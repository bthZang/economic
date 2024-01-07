<?php

use App\Http\Controllers\APIs\Admin\CategoryController;
use App\Http\Controllers\APIs\Admin\ProductController;
use App\Http\Controllers\APIs\Admin\UserController;
use App\Http\Controllers\APIs\Auth\SocialiteController;
use App\Http\Controllers\APIs\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [UserController::class, 'store'])->name('user.store');
Route::post('login', [AuthenticationController::class, 'store'])->name('user.store');

Route::post('auth', [SocialiteController::class, 'store'])->name('user.store');
// Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::put('{id}/category', [CategoryController::class, 'update'])->name('category.update');
Route::delete('{id}/category', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('{id}/category/descendants', [CategoryController::class, 'getAllDescendantsAndSelf'])->name('category.get-all-descendants-and-self');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::put('{id}/product', [ProductController::class, 'update'])->name('product.update');
Route::delete('{id}/product', [ProductController::class, 'delete'])->name('product.delete');

    // Route::group(['middleware' => 'auth:api'], function () {
    //     Route::get('auth-user', [SocialiteController::class, 'authUser'])->name('socialite.auth-user');
    // });