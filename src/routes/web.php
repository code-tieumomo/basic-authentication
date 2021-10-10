<?php

use CodeTieumomo\BasicAuthentication\Http\Controllers\AuthController;
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

Route::group(['middleware' => ['web']], function () {
    Route::get(config('basic-authentication.loginShowUri'), [AuthController::class, 'loginShow'])->name(config('basic-authentication.loginShowName'));
    Route::post(config('basic-authentication.loginStoreUri'), [AuthController::class, 'loginStore'])->name(config('basic-authentication.loginStoreName'));

    Route::get(config('basic-authentication.registerShowUri'), [AuthController::class, 'registerShow'])->name(config('basic-authentication.registerShowName'));
    Route::post(config('basic-authentication.registerStoreUri'), [AuthController::class, 'registerStore'])->name(config('basic-authentication.registerStoreName'));

    Route::get(config('basic-authentication.logoutShowUri'), [AuthController::class, 'logout'])->name(config('basic-authentication.logoutShowName'));
});
