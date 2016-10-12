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

    public function getProductsById($id){
        $product = \App\Product::find($id);
        $product->details;
        $product->sales;
        $product->images;
        $product->productCategorys;
        $product->productFeatures;
        $categories = App\Category::all();

        
        foreach ($product->comments as $comment) {
            $comment->user;
        }


        //return $product;
        return view('productbyid',[
            'className'=>'products',
            'product' =>$product,
            'categories'=>$categories
        ]);
    }


    public function search(Request $request){
        $name = $request['search'];

        $products =\App\Product::where('name','like','%'.$name.'%')->get();

        foreach ($products as $product) {
            $product->details;
            $product->sales;
            $product->images;
            $product->images;
            $product->comments;
            $product->productCategorys;
            $product->productFeatures;
        }


        return view('products',[
            'className' => 'products',
            'products' => $products
        ]);


        return $products;
    }


    public function getUser($id){
        
        $user = App\User::findOrFail($id);

        $user->details;
        $user->products;
        $user->sales;

        foreach ($user->products as $product) {
            $product->details;
            $product->sales;
            $product->productFeatures;
            $product->productCategorys;
        }


        return view('userprofile',[
            'className' => 'No Class'
        ]);



    }











}
