<?php

use App\Modules\Claim\Http\Controllers\ClaimController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'api/claims'

], function ($router) {
    Route::get('/', [ClaimController::class, 'index']);


});
