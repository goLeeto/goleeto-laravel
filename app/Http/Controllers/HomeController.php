<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

class HomeController extends Controller
{
    public function getProducts(){
    	$products = \App\Product::all()->sortByDesc('price');

    	foreach ($products as $product) {
    		$product->details;
    		$product->sales;
    		$product->images;
    		$product->images;
    		$product->productCategorys;
    		$product->productFeatures;
    	}

    	return view('products',[
    		'className' => 'products',
    		'products' => $products
    	]);
    }











}
