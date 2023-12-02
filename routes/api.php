<?php

use App\Http\Controllers\Api\V1\Auth\ForgetPasswordApiController;
use App\Http\Controllers\Api\V1\Auth\RessetPasswordApiController;
use App\Http\Controllers\Api\V1\ProfileApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\Auth;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    Route::post('update_profile', [ProfileApiController::class, 'update']);

});

Route::post('auth/login', Auth\LoginController::class);
Route::post('auth/register', Auth\RegisterController::class);
Route::post('auth/logout', Auth\LogoutController::class);

Route::post('forget_password', [ForgetPasswordApiController::class, 'forget_password']);
Route::post('check_otp', [RessetPasswordApiController::class, 'check_otp']);
Route::post('reset_password', [RessetPasswordApiController::class, 'passwordReset']);





