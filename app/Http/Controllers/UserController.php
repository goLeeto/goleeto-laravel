<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

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
        $products=Auth::user()->products;

        $details= [];

        foreach ($products as $product) {
            $details[] = $product->details;
        }

        return view('dashboard.myproducts')->with(['products'=>$products,'details'=> $details]);
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

            $userdetails = Auth::user()->details;
            $address = $userdetails->addr;

            $address->update([
                'Country'=>$data['country'],
                'City'=>$data['city'],
                'Street'=>$data['street'],
                'Zip'=>$data['zip']
            ]);

            $address->save();

            return redirect('/userprofile');

        }else{

            $address = \App\Address::create([
                'Country'=>$data['country'],
                'City'=>$data['city'],
                'Street'=>$data['street'],
                'Zip'=>$data['zip']
            ]);

            $userdetails = Auth::user()->details;

            $userdetails->update([
                'address'=>$address->id
            ]);

            $userdetails->save();

            return redirect('/userprofile');

        }
    }




    public function changepassword(Request $request){
        $data = $request->only('oldpass','newpass','rnewpass');

        $user = Auth::user();
        $userdetails = Auth::user()->details;
        $address = $userdetails->addr;


        if(Hash::check($data['oldpass'], $user->password)){
            if ($data['newpass']==$data['rnewpass']) {
            
                $user->update([
                    'password'=>bcrypt($data['newpass'])
                ]);

                $user->save();

                return redirect('/userprofile');

            }else{
                return view('dashboard.user',['error'=>'Password didn\'t match','userdetails'=> $userdetails,'user'=>$user,'address'=>$address]);
            }
        }

        return view('dashboard.user',['error'=>'Old password didn\'t match','userdetails'=> $userdetails,'user'=>$user,'address'=>$address]);
    }






    
}
