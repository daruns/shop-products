<?php

use App\Http\Controllers\CrudApisController;
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
Route::get("index", [CrudApisController::class, 'index']);

Route::post("store", [CrudApisController::class, 'store']);

Route::get("show/{id}", [CrudApisController::class, 'show']);

Route::put("update/{id}", [CrudApisController::class, 'update']);

Route::delete("delete/{id}",[CrudApisController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
