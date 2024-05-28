<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServicesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::apiResource('clients', ClientController::class);

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/{client}', [ClientController::class, 'show']);
Route::post('/clients', [ClientController::class, 'store']);
Route::put('/clients/{client}', [ClientController::class, 'update']);
Route::delete('/clients/{client}', [ClientController::class, 'destroy']);

Route::get('/services', [ServicesController::class, 'index']);
Route::get('/services/{services}', [ServicesController::class,'show']);
Route::put('/services/{services}', [ServicesController::class,'update']);
Route::post('/services', [ServicesController::class,'store']);
Route::delete('/services/{services}', [ServicesController::class,'destroy']);



