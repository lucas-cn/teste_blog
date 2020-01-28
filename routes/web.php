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
Route::get('post/add', function () {
    return view('post/add');

    /* if(Auth::check()){
        return view('post/add');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito'); */
});

Route::get('post/admin', function () {
    return view('post/admin');

    if(Auth::check()){
        return view('post/admin');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito');
});

Route::get('post/{id}', function (App\Models\Post $posts, $id) {
    $data = $posts::where('id', $id)->with('category','autor')->get()->map(function ($post) {
        $post->img = $post->img();
        return $post;
    });
    return view('post/view')->with('data', $data[0]); 
    
    /* if(Auth::check()){
        return view('post/admin');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito'); */
});

Route::get('post/edit/{id}', function (App\Models\Post $posts, $id) {
    return view('post/edit')->with('data', $posts::find($id)); 
    
    /* if(Auth::check()){
        return view('post/admin');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito'); */
});

/* ---------- Categories ---------- */
Route::get('categoria', function () {
    return view('category/list');
});

Route::get('categoria/add', function () {
    return view('category/add');

    /* if(Auth::check()){
        return view('post/add');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito'); */
});

Route::get('categoria/{id}', function (App\Models\Category $categories, $id) {
    return view('category/view')->with('data', $categories::find($id));
    
    /* if(Auth::check()){
        return view('post/admin');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito'); */
});

Route::get('categoria/edit/{id}', function (App\Models\Category $categories, $id) {
    return view('category/edit')->with('data', $categories::find($id)); 
    
    /* if(Auth::check()){
        return view('post/admin');
    }
    return Redirect::to("login")->withSuccess('Acesso restrito'); */
});