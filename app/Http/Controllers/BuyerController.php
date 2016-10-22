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

    	



    	// \DB::table('products')
    	// 								->join('sales','products.id','sales.productId')
    	// 								->get();


    	//return $products;

    	return view('buyer.myproducts',[
    		'dashboardClass' => 'My Products',
    		'products' => $products
    	]);
    }



    
}
