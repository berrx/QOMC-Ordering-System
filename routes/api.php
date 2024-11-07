<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;

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

Route::post('/cart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'getCart']);
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/users', [UserController::class, 'create']);
Route::post('/pay', [OrdersController::class, 'pay']);
Route::get('/orders/{id}', [OrdersController::class, 'show']);
Route::get('/orders', [OrdersController::class, 'index']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {

//     return $request->user();
// });
