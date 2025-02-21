<?php

use App\Http\Controllers\Api\Auth\CategoryController;
use App\Http\Controllers\Api\Auth\User\UserAuthController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LiveScoreController;
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
Route::controller(UserAuthController::class)->group(function(){
    Route::post("register","register");


});
Route::post('login', [UserAuthController::class, 'login']);

Route::middleware('auth:sanctum')->put('profile', [UserAuthController::class, 'profile']);

Route::get('categories', [CategoryController::class, 'index']);
Route::post('addToCart/{id}', [CartController::class, 'addToCart'])->middleware('auth:sanctum');
















Route::get('/live-scores', [LiveScoreController::class, 'showLiveScores']);