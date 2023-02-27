<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ingredients', 'Api\IngredientController@index');
Route::get('/ingredients/{id}', 'Api\IngredientController@show');
Route::post('/ingredients', 'Api\IngredientController@store');
Route::put('/ingredients/{id}', 'Api\IngredientController@update');
Route::delete('/ingredients/{id}', 'Api\IngredientController@delete');
