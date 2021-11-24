<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
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



// Route::middleware('api/users')->group(function () {
//     Route::get('/', 'UserController@index');
//     Route::post('/create', 'UserController@store');
//     Route::put('/edit', 'UserController@edit');
//     Route::get('/show', 'UserController@show');



// });

// Route::middleware('auth:api')->get('/users', function (Request $request) {
//     return $request->user();
// });


// Route::middleware('api')->group(function () {
//     Route::resource('users', 'UserController');
// });

Route::get('/users/', [UserController::class, 'index']);
Route::post('/users/create/', [UserController::class, 'store']);
Route::get('/users/show/{id}', [UserController::class, 'show']);
Route::patch('/users/edit/{id}', [UserController::class, 'update']);
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy']);