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

Auth::routes();

Route::get('/', function () {
    return view('home',['className' => 'home']);
});

Route::get('/products','HomeController@getProducts');

Route::get('/products/{id}','HomeController@getProductsById');




Route::get('/about', function() {
    return view('about',['className' => 'about']);
});

Route::get('/login', function() {
    return view('loginPage')->with([
    	'className' => 'No Class'
    ]);
})->middleware('guest');


Route::get('/login/user/{id}', function($id) {
    return view('loginPage')->with([
    	'id' => $id,
    	'page' => 'user'
     ]);
})->middleware('guest');





Route::get('/cookies', function() {
    return view('cookies',['className' => 'none']);
});




Route::post('/login', 'AuthController@login');


Route::post('/register', 'AuthController@register');

Route::get('/get', 'AuthController@getAuth');

Route::get('/search', 'HomeController@search');

Route::get('user/{id}', 'HomeController@getUser');



Route::group(['middleware' => 'auth'], function () {

		Route::post('/sendreview', 'UserController@sendreview');


	    Route::get('/logout', 'AuthController@logOut');
		



	
		Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
	    
		});




	Route::group(['prefix' => 'seller','middleware'=>'seller'], function() {

		Route::get('/dashboard', 'UserController@dashboard');

		Route::get('/userprofile', 'UserController@profile');

		Route::get('/myproducts', 'UserController@myproducts');

		Route::get('/statistics', 'UserController@statistics');

		Route::get('myproducts/{id}', 'ProductController@getproduct');

		Route::get('/settings', 'UserController@settings');

		Route::post('/updateinfo', 'UserController@updateinfo');

		Route::post('/changepassword', 'UserController@changepassword');

		Route::post('/addproduct','ProductController@addproduct');

		Route::post('/editproduct', 'ProductController@editproduct');
	});




	Route::group(['prefix' => 'buyer','middleware'=>'buyer'], function() {
	    
	});








});
















