<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ApplianceController;
use App\Http\Controllers\API\SchedulingController;
use App\Http\Controllers\API\UserController;


Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
        
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('appliance', ApplianceController::class);
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('user', UserController::class);
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('scheduling', SchedulingController::class);
});
  
  
