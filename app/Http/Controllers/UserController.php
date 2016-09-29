<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use App;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Query\Builder;

class UserController extends Controller
{



    public function dashboard(){

		$user = Auth::user();

        $themes = \DB::table('products')->where('userId','=',$user->id)->count();

		//return $user;
    	return view('dashboard.dashboard')->with([
            'dashboardClass'=>'Dashboard',
            'themes'=>$themes
        ]);
    }




    public function profile(){
    	//return Auth::user();
		$userdetails = Auth::user()->details;
		$user = Auth::user();
        $address = $userdetails->addr;

    	return view('dashboard.user')->with([
            'userdetails'=> $userdetails,
            'user'=>$user,
            'address'=>$address,
            'dashboardClass'=>'User Profile'
        ]);
    }




    public function myproducts(){
        $products=Auth::user()->products;

        $details= [];

        foreach ($products as $product) {
            $details[] = $product->details;
        }

        $features= App\Feature::all();
        $categories = App\Category::all();


        return view('dashboard.myproducts')->with([
            'products'=>$products,
            'details'=> $details,
            'dashboardClass'=>'My Products',
            'features'=>$features,
            'categories'=>$categories
        ]);
    }


    public function statistics(){

            return 'These are statistics!';
    }

    


    public function updateinfo(Request $request){
        $data = $request->only('street','country','city','zip');
        $userdetails = Auth::user()->details;
        $user = Auth::user();
        $address = $userdetails->addr;

        $defaultAddress =  App\Address::find(1);

        if ($defaultAddress['Street']==$data['street'] && $defaultAddress['Country'] == $data['country'] && $defaultAddress['City']==$data['city'] && $defaultAddress['Zip']==$data['zip']) {


            return view('dashboard.user',[
                'error'=>'Deffault address!',
                'userdetails'=> $userdetails,
                'user'=>$user,
                'address'=>$address,
                'dashboardClass'=>'userprofile'
            ]);


        }elseif ($address['Street']==$data['street'] && $address['Country'] == $data['country'] && $address['City']==$data['city'] && $address['Zip']==$data['zip'] && $address['id']!=1) {


            return view('dashboard.user',[
                'error'=>'Custom address! No Changes!!',
                'userdetails'=> $userdetails,
                'user'=>$user,
                'address'=>$address,
                'dashboardClass'=>'userprofile'
            ]);


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
                return view('dashboard.user',[
                    'error'=>'Password didn\'t match',
                    'userdetails'=> $userdetails,
                    'user'=>$user,
                    'address'=>$address
                ]);
            }
        }

        return view('dashboard.user',[
            'error'=>'Old password didn\'t match',
            'userdetails'=> $userdetails,
            'user'=>$user,
            'address'=>$address
        ]);
    }

    public function addproduct(Request $request){
        $data = $request->only('name','price','categories','features');
        

        //To Do validate input



        //Get Theme Preview

        //To Do convert image to jpg, Resize image to a specific resolution

        $previews=$request->file('preview');
        $i=0;
        foreach ($previews as $preview) {
            $previewName=$data['name'].$i.'.'.$preview->guessExtension();
            $previewPath='themes/'.$data['name'].'/themePreviews';
            $preview->move($previewPath,$previewName);
            $i++;
        }

        

        //Get Theme Archive

        $archive=$request->file('archive');
        $archiveName = $data['name'].'.'.$archive->guessExtension();
        $archivePath = 'themes/'.$data['name'];
        $archive->move($archivePath,$archiveName);

        // Unzip theme

        $archivePathName = $archivePath.'/'.$archiveName;
        $zip = new \ZipArchive;
        $zip->open($archivePathName);
        $zip->extractTo($archivePath);
        $zip->close();


        return redirect($previewPath.'/'.$previewName);

        //To Do insert into database 


    }











}
