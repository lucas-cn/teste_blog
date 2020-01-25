<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ---------- Login/Registro ---------- */
Route::get('/', function () {
    return view('post/list');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('logout', 'AuthController@logout');

/* ---------- Post ---------- */


/* ---------- Acesso restrito ---------- */
Route::get('post/add', function () {
    if(Auth::check()){
        return view('post/add');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito');
});

Route::get('post/edit', function () {
    if(Auth::check()){
        return view('post/edit');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito');
});