<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* --------- Login --------- */
Route::middleware('api')->post('/login', 'AuthController@login');
Route::middleware('api')->post('/registration', 'AuthController@createLogin');

/* --------- Post --------- */
Route::middleware('api')->get('/post', 'PostController@get');
Route::middleware('api')->post('/post', 'PostController@filter');
Route::middleware('api')->post('/post/save', 'PostController@save');
Route::middleware('api')->post('/post/save/{id}', 'PostController@save');
Route::middleware('api')->post('/post/delete', 'PostController@destroy');
Route::middleware('api')->get('/autor', 'PostController@getAutores');

/* --------- Categoria --------- */
Route::middleware('api')->get('/categoria', 'CategoryController@get');
Route::middleware('api')->post('/categoria', 'CategoryController@filter');
Route::middleware('api')->post('/categoria/save', 'CategoryController@save');
Route::middleware('api')->post('/categoria/save/{id}', 'CategoryController@save');
Route::middleware('api')->post('/categoria/delete', 'CategoryController@destroy');
