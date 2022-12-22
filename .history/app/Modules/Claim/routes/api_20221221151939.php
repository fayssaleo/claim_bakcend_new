<?php

use App\Modules\Claim\Http\Controllers\ClaimController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'api/claims'

], function ($router) {
    Route::get('/indexClaims', [ClaimController::class, 'indexClaims']);
    Route::get('/indexIncidents', [ClaimController::class, 'indexIncidents']);
    Route::get('/{id}', [ClaimController::class, 'get']);
    Route::post('/treated', [ClaimController::class, 'treated']);
    Route::post('/closed', [ClaimController::class, 'closed']);
    Route::post('/create', [ClaimController::class, 'create']);
    Route::post('/update', [ClaimController::class, 'update']);
    Route::post('/delete', [ClaimController::class, 'delete']);
});
