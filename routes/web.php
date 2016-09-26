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

Route::get('/login', function() {
    return view('loginPage');
});

Route::get('/cookies', function() {
    return view('cookies',['className' => 'none']);
});



Route::post('/login', 'AuthController@login');

Route::post('/register', 'AuthController@register');

Route::get('/get', 'AuthController@getAuth');



Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/logout', 'AuthController@logOut');

	Route::get('/dashboard', 'UserController@dashboard');

	Route::get('/userprofile', 'UserController@profile');

	Route::get('/myproducts', 'UserController@myproducts');


	Route::post('/updateinfo', 'UserController@updateinfo');




});
















