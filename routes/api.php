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

/* --------- Categoria --------- */
Route::middleware('api')->get('/categoria', 'CategoriaController@get');
Route::middleware('api')->post('/categoria', 'CategoriaController@save');

Route::post('post/adicionar', function () {
    if(Auth::check()){
        return view('post/add');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito');
});
