<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pedidos', [\App\Http\Controllers\Api\PedidosController::class, 'index']);
Route::get('pedidos/{id}', [\App\Http\Controllers\Api\PedidosController::class, 'show']);
Route::post('pedidos', [\App\Http\Controllers\Api\PedidosController::class, 'store']);
Route::match(['put', 'patch'], 'pedidos/{id}', [\App\Http\Controllers\Api\PedidosController::class, 'update']);
Route::delete('pedidos/{id}', [\App\Http\Controllers\Api\PedidosController::class, 'destroy']);

