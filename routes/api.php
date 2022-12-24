<?php

use App\Http\Controllers\API\InstallationController;
use App\Http\Controllers\API\MainController;
use App\Http\Resources\InstallationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource("installations", InstallationController::class);

Route::get("clients", [MainController::class, "clients"]);

Route::get("installators", [MainController::class, "installators"]);
