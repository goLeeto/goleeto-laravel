<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

Use DB;

use Mail;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home(){

        if(Auth::check()){
            $items = \App\Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $items = '';
        }


        $categories = App\Category::all();


        foreach ($categories as $category) {
            $products[] = \DB::table('products')
                                            ->leftJoin('sales','products.id','=','sales.productId')
                                            ->join('productCategorys','products.id','=','productCategorys.product_id')
                                            ->join('categorys','productCategorys.category_id','=','categorys.id')
                                            ->where('categorys.name','=',$category->name)
                                            ->limit(4)
                                            ->select('products.*')
                                            ->get();
        }


        foreach ($products as $category) {
            $photo = array();
            foreach ($category as $product) {

                $photo[] = \DB::table('productImages')
                                                    ->where('productId',$product->id)
                                                    ->limit(1)
                                                    ->get();
            }
            $photos[] = $photo;
            unset($photo);
        }

        return view('home',[
            'className' => 'home',
            'items' => $items,
            'products' => $products,

        ]);
    }

    public function about() {
        if(Auth::check()){
            $items = \App\Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $items = '';
        }

        return view('about',[
            'className' => 'about',
            'items' =>$items
            ]);
    }
    

    public function getProducts(){
    	$products = \App\Product::all()->sortByDesc('price');
        if(Auth::check()){
            $items = \App\Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $items = '';
        }



    	foreach ($products as $product) {
    		$product->details;
    		$product->sales;
    		$product->images;
    		$product->images;
    		$product->productCategorys;
    		$product->productFeatures;
            $product->discount;
    	}

    	return view('products',[
    		'className' => 'products',
    		'products' => $products,
            'items' => $items
    	]);
    }

    public function getProductsById($id){
        if(Auth::check()){
            $items = \App\Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $items = '';
        }


        $product = \App\Product::find($id);
        $product->details;
        $product->sales;
        $product->images;
        $product->productCategorys;
        $product->productFeatures;
        $product->discount;
        $categories = App\Category::all();

        
        foreach ($product->comments as $comment) {
            $comment->user;
        }



        //return $product;
        return view('productbyid',[
            'className'=>'products',
            'product' =>$product,
            'categories'=>$categories,
            'items' => $items
        ]);
    }


    public function search(Request $request){
        if(Auth::check()){
            $items = \App\Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $items = '';
        }

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
            'products' => $products,
            'items' => $items
        ]);


        return $products;
    }


    public function getUser($id){
        if(Auth::check()){
            $items = \App\Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $items = '';
        }

        if (Auth::check() &&  Auth::user()->id == $id) {
            return redirect()->intended(url('/').'/'.strtolower(Auth::user()->type->type).'/userprofile');
        }

        
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
            'className' => 'No Class',
            'user' => $user,
            'items' => $items
        ]);

    }

public function contact(Request $request){

    $data = $request->only('name','email','message');

}


public function getPreview($id){
    if(Auth::check()){
        $items = \App\Cart::where('user_id',Auth::user()->id)->count();
    }else{
        $items = '';
    }
    

    $product = App\Product::find($id);

    

    if(file_exists($product->themePath.'/index.html')){
        $src = url('/').'/'.$product->themePath.'/index.html';
    }else if(file_exists($product->themePath.'/index.php')){
        $src = url('/').'/'.$product->themePath.'/index.php';
    }else{
        $src = '/404';
    }

    return view('preview',[
        'src' => $src,
        'className' => 'No Class',
        'productId' => $id,
        'productName' => $product->name,
        'items' => $items
    ]);
}









}
