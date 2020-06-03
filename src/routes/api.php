<?php

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

Route::post('records/create', RecordCreateController::class);
Route::put('records/{record}', RecordUpdateController::class);
Route::delete('records/{record}', RecordDeleteController::class);
Route::get('records/search', RecordSearchController::class);
