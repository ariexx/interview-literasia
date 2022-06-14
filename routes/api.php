<?php

use App\Http\Controllers\API\ContactController;
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

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contact/{id}', [ContactController::class, 'show']);
Route::post('/contact/add', [ContactController::class, 'store']);
Route::put('/contact/edit/{id}', [ContactController::class, 'update']);
Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy']);
