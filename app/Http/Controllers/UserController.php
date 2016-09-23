<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
		$user = Auth::user()->details;
		//return $user;
    	return view('dashboard.dashboard')->with(['user'=> $user]);
    }

    public function profile(){
    	//return Auth::user();
		$userdetails = Auth::user()->details;
		$user = Auth::user();
        $address = $userdetails->addr;

    	return view('dashboard.user')->with(['userdetails'=> $userdetails,'user'=>$user,'address'=>$address]);
    }

    public function myproducts(){
        return view('dashboard.myproducts');
    }


    public function updateinfo(Request $request){
        $data = $request->only('street','country','city','zip');
        $userdetails = Auth::user()->details;
        $user = Auth::user();
        $address = $userdetails->addr;

        $defaultAddress =  App\Address::find(1);

        if ($defaultAddress['Street']==$data['street'] && $defaultAddress['Country'] == $data['country'] && $defaultAddress['City']==$data['city'] && $defaultAddress['Zip']==$data['zip']) {


            return view('dashboard.user',['error'=>'Deffault address!','userdetails'=> $userdetails,'user'=>$user,'address'=>$address]);


        }elseif ($address['Street']==$data['street'] && $address['Country'] == $data['country'] && $address['City']==$data['city'] && $address['Zip']==$data['zip'] && $address['id']!=1) {


            return view('dashboard.user',['error'=>'Custom address! No Changes!!','userdetails'=> $userdetails,'user'=>$user,'address'=>$address]);


        }elseif (!($address['Street']==$data['street'] && $address['Country'] == $data['country'] && $address['City']==$data['city'] && $address['Zip']==$data['zip']) && $address['id']!=1) {


            
            //Need to update address

            return redirect('/userprofile');

        }else{

            //Need to insert new address

            return redirect('/userprofile');

        }



        return $data;

        
    }





    
}
