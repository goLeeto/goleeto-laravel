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

Route::get('/', 'HomeController@home');

Route::get('/products','HomeController@getProducts');

Route::get('/products/{id}','HomeController@getProductsById');

Route::get('/preview/{id}', 'HomeController@getPreview');

Route::get('/404', function() {
    return view('404');
});





Route::get('/about', 'HomeController@about');

Route::get('/login', function() {
    return view('loginPage')->with([
    	'className' => 'No Class'
    ]);
})->middleware('guest');


Route::get('/login/{id}', function($id) {
    return view('loginPage')->with([
    	'id' => $id,
     ]);
})->middleware('guest');

Route::get('/login/{id}/{id2?}', function($id, $id2) {
    return view('loginPage')->with([
    	'id' => $id,
    	'id2' => $id2
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


Route::post('/contact', 'HomeController@contact');



Route::group(['middleware' => 'auth'], function () {

		Route::post('/sendreview', 'SellerController@sendreview');


	    Route::get('/logout', 'AuthController@logOut');

	    Route::post('/sendmessage/{userid}', 'MessageController@sendmessage');
		



	
		Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {
	    
		});




	Route::group(['prefix' => 'seller','middleware'=>'seller'], function() {

		Route::get('/dashboard', 'SellerController@dashboard');

		Route::get('/userprofile', 'SellerController@profile');

		Route::get('/myproducts', 'SellerController@myproducts');

		Route::get('/statistics', 'SellerController@statistics');

		Route::get('/messages', 'SellerController@messages');

		Route::get('/messages/{id}', 'SellerController@messagesById');

		Route::get('myproducts/{id}', 'ProductController@getproduct');

		Route::get('/settings', 'SellerController@settings');

		Route::post('/updateinfo', 'SellerController@updateinfo');

		Route::post('/changepassword', 'SellerController@changepassword');

		Route::post('/addproduct','ProductController@addproduct');

		Route::post('/editproduct', 'ProductController@editproduct');

		Route::post('/discount', 'ProductController@discount');
	});




	Route::group(['prefix' => 'buyer','middleware'=>'buyer'], function() {
		
		Route::post('/changepassword', 'BuyerController@changepassword');
		
		Route::get('/dashboard', 'BuyerController@dashboard');

		Route::get('/userprofile', 'BuyerController@profile');

		Route::get('/myproducts', 'BuyerController@products');

		Route::get('/messages', 'BuyerController@messages');

		Route::get('/messages/{id}', 'BuyerController@messagesById');

		Route::post('/download/{user}/{theme}', 'BuyerController@download');

		Route::get('/shop', 'BuyerController@shop');

		Route::post('/removefromcart/{id}','BuyerController@removefromcart');

		Route::post('/removeallfromcart', 'BuyerController@removeallfromcart');

		Route::get('/settings', 'BuyerController@settings');
	    
	});

	Route::get('/addtocart/{id}', 'BuyerController@addtocart')->middleware('buyer');









});
















