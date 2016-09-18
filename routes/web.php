<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home',['className' => 'home']);
});

Route::get('/products', function() {
    return view('products',['className' => 'products']);
});

Route::get('/about', function() {
    return view('about',['className' => 'about']);
});