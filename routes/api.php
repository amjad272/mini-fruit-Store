<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fruitListController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/fruitlist/{id}', [fruitListController::class, 'show']);
    Route::get('/fruitlists', [fruitListController::class, 'index']);
    Route::post('/addfruit', [fruitListController::class, 'create']);
    Route::put('/updatefruit/{id}', [fruitListController::class, 'update']);
//Route::patch('/updatefruits/{id}',[fruitListController::class,'updatefruit2']);
    Route::delete('/removefruit/{id}', [fruitListController::class, 'destroy']);
});
