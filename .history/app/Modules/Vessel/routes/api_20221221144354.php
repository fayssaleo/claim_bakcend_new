<?php

use App\Modules\Vessel\Http\Controllers\VesselController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'api/vessels'

], function ($router) {
    Route::post('/createOrUpdateVessel', [VesselController::class, 'createOrUpdateVessel']);
    Route::get('/{claim_id}', [ContainerController::class, 'index']);
    Route::post('/delete', [VesselController::class, 'delete']);


});
