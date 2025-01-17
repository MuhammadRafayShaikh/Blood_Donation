<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GroupController;

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
});

Route::apiResource('city', CityController::class);

Route::get('user', [CityController::class, 'users']);

Route::apiResource('group', GroupController::class);

Route::apiResource('donor', DonorController::class);

Route::get('searchDonor', [FrontController::class, 'searchDonor']);
