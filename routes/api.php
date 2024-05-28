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
Route::post('/clients/service', [ClientController::class, 'attach']);
Route::post('/clients/service/detach', [ClientController::class, 'detach']);



Route::get('/services', [ServicesController::class, 'index']);
Route::get('/services/{service}', [ServicesController::class,'show']);
Route::put('/services/{service}', [ServicesController::class,'update']);
Route::post('/services', [ServicesController::class,'store']);
Route::delete('/services/{service}', [ServicesController::class,'destroy']);
Route::post('/services/clients', [ServicesController::class, 'clients']);
//Route::post('/services/client/detach', [ServicesController::class, 'detach']);









