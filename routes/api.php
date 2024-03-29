<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('login');
Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::middleware(['auth:api'])->group(function () {
    Route::name('auth.')
        ->prefix('auth')
        ->group(function () {
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('me', [AuthController::class, 'me'])->name('me');
            Route::post('send-verification', [AuthController::class, 'sendVerification'])->name('send-verification');
            Route::get('verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify-email');
        });
    Route::name('category.')
        ->prefix('category')
        ->group(function () {
            Route::post('add', [CategoryController::class, 'store'])->name('store');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
        });
});
