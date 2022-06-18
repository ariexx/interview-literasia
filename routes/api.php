<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ContactController;

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


Route::prefix('user')->group(function () {
    Route::get('/all', [UserController::class, 'index']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy']);

    //posts
    Route::get('/{id}/posts', [UserController::class, 'posts']);
    Route::get('/posts/{id}', [UserController::class, 'post']);
});

//tags
Route::get('/{slug}/posts', [PostController::class, 'index']);
