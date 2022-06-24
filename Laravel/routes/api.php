<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogPredictController;

Route::group(['prefix' => 'v1'], function () {


    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });


    Route::controller(LogPredictController::class)->group(function () {
        Route::post('predict', 'predict');
    });
});
