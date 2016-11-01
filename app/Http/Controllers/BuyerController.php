<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Query\Builder;

use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function dashboard(){

    	$user = Auth::user();


    	$products =\DB::table('products')
                                ->join('sales','products.id','=','sales.productId')
                                ->where('sales.userId','=',$user->id);

    	$purchases = $products->count();

    	$spent = $products->sum('sales.value');

    	


    	return view('buyer.dashboard',[
    		'dashboardClass' => 'Dashboard',
    		'purchases' => $purchases,
    		'spent' => $spent
    	]);
    }

	public function changepassword(Request $request){
	        $data = $request->only('oldpass','newpass','rnewpass');

	        $user = Auth::user();
	        $user->details;
	        $user->details->addr;


	        if(Hash::check($data['oldpass'], $user->password)){
	            if ($data['newpass']==$data['rnewpass']) {
	            
	                $user->update([
	                    'password'=>bcrypt($data['newpass'])
	                ]);

	                $user->save();

	                return redirect('/buyer/userprofile');

	            }else{
	                return view('buyer.user',[
	                    'error'=>'Password didn\'t match',
	                    'user'=>$user,
	                    'dashboardClass'=>'User Profile'
	                ]);
	            }
	        }

	        return view('buyer.user',[
	            'error'=>'Old password didn\'t match',
	            'user'=>$user,
	            'dashboardClass'=>'User Profile'
	        ]);
	    }

    public function profile(){

    	$user = Auth::user();

    	$products =\DB::table('products')
                                ->join('sales','products.id','=','sales.productId')
                                ->where('sales.userId','=',$user->id);

    	$purchases = $products->count();

    	$spent = $products->sum('sales.value');



    	return view('buyer.user',[
    		'dashboardClass' => 'User Profile',
    		'user' => $user,
    		'purchases' => $purchases,
    		'spent' => $spent
    	]);
    }

    public function products(){

    	$products = App\Product::whereHas('sales',function($query){
    				$query->where('userId','=',Auth::user()->id);
    	})->get();



    	return view('buyer.myproducts',[
    		'dashboardClass' => 'My Products',
    		'products' => $products
    	]);
    }


    public function download($user,$theme){
    	if (Auth::user()->id == $user) {
    		
	    	$products = App\Product::whereHas('sales',function($query){
	    				$query->where('userId','=',Auth::user()->id);
	    	})->where('id',$theme)->get();

	    	foreach ($products as $product) {
	    		$product->details;
	    	}

	    	$pathToFile = storage_path().'/themes/'.$products[0]->name.'/'.$products[0]->name.'.zip';

	    	return response()->download($pathToFile);

    	}


    }

    public function messages(){

        $id = Auth::user()->id;

        $users = \DB::select(\DB::raw('
            SELECT `to` as id,`username` as UserName FROM ( 
            (SELECT `m`.`to`, `m`.`created_at`,`u`.`UserName` FROM messages m 
            INNER JOIN users u ON m.to=u.id 
            WHERE `from` = '.$id.') 
            union 
            (SELECT `m`.`from` , `m`.`created_at`, `u`.`UserName` 
            FROM messages m 
            inner join users u on m.from=u.id 
            WHERE `to` = '.$id.' ) 
            ORDER BY created_at desc )a 
            GROUP BY `to`, `username` 
            ORDER BY created_at desc'));

        foreach ($users as $user) {
            $messages[] = \DB::table('messages')
                                                ->orWhere(function($query)use($user){
                                                    $query->where('from',$user->id)
                                                    ->where('to',Auth::user()->id);
                                                })
                                                ->orWhere(function ($query)use($user){
                                                    $query->where('to',$user->id)
                                                    ->where('from',Auth::user()->id);
                                                })
                                                ->orderBy('created_at','desc')
                                                ->limit(1)
                                                ->get();
        }



        return view('buyer.messages',[
            'dashboardClass' => 'Messages',
            'users' => $users,
            'messages' => $messages
        ]);
    }

    public function messagesById($id){

        $user = App\User::find($id);

        $messages = \DB::table('messages')
                                        ->orWhere(function($query)use($id){
                                            $query->where('from',$id)
                                            ->where('to',Auth::user()->id);
                                        })
                                        ->orWhere(function ($query)use($id){
                                            $query->where('to',$id)
                                            ->where('from',Auth::user()->id);
                                        })
                                        ->orderBy('created_at','asc')
                                        ->get();

        return view('buyer.messagesbyid',[
            'dashboardClass' => 'Messages',
            'user' => $user,
            'messages' => $messages
        ]);

        return $messages;
    }

    

    


    public function addtocart($id){
        
        if (count(App\Cart::where('product_id',$id)->get())>0) {
            return redirect()->back();
        }
        try {
            $product = App\Product::find($id);

            if ($product->discount->validUntil >= date("Y-m-d")) {
                $price = $product->discount->value;
            }else {
                $price = $product->price;
            }
            $newcartElement = App\Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'value' => $price
            ]);
        } catch (Exception $e) {
            return redirect()->back();
        }
    

        return redirect()->back();

    }


    public function removefromcart($id){

        $cart = App\Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function removeallfromcart(){
        $carts = App\Cart::where('user_id',Auth::user()->id)->get();

        foreach ($carts as $cart) {
            $cart->delete();
        }
        return redirect()->back();
    }

    public function shop(){
        $carts = App\Cart::where('user_id',Auth::user()->id)->get();
        // return $cart;

        foreach ($carts as $cart) {
            $cart->product;
        }

        $total = $carts->sum('value');


        return view('buyer.shop',[
            'dashboardClass' => 'Shop',
            'carts' => $carts,
            'total' => $total
        ]);
    }

    











}
