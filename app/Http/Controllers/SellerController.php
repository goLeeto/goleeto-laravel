<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use App;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Query\Builder;

class SellerController extends Controller
{



    public function dashboard(){

		$user = Auth::user();

        $themes = \DB::table('products')
                                ->where('userId','=',$user->id)
                                ->count();


        $sales =\DB::table('products')
                                ->join('sales','products.id','=','sales.productId')
                                ->where('products.userId','=',$user->id);
        
        $revenue = $sales->sum('sales.value');

        $saleNo = $sales->count();

        $uniqueUsers = $sales
                        ->select('sales.userId')
                        ->groupBy('sales.userId')
                        ->get()
                        ->count();


		//return $user;
    	return view('dashboard.dashboard')->with([
            'dashboardClass'=>'Dashboard',
            'themes'=>$themes,
            'revenue'=>$revenue,
            'sales'=>$saleNo,
            'uniqueUsers'=>$uniqueUsers
        ]);
    }




    public function profile(){
        $user = Auth::user();
		$user->details;
        $user->details->addr;


        $themes = \DB::table('products')
                                ->where('userId','=',$user->id)
                                ->count();


        $sales =\DB::table('products')
                                ->join('sales','products.id','=','sales.productId')
                                ->where('products.userId','=',$user->id);
        
        $revenue = $sales->sum('sales.value');

        $saleNo = $sales->count();

    	return view('dashboard.user')->with([
            'user'=>$user,
            'dashboardClass'=>'User Profile',
            'themes' => $themes,
            'revenue' => $revenue,
            'saleNo' => $saleNo
        ]);
    }




    public function myproducts(){
        $products=Auth::user()->products;

        $details= [];

        foreach ($products as $product) {
            $product->details;
        }

        $features= App\Feature::all();
        $categories = App\Category::all();

        //return $products;

        return view('dashboard.myproducts')->with([
            'products'=>$products,
            'dashboardClass'=>'My Products',
            'features'=>$features,
            'categories'=>$categories
        ]);
    }


    public function statistics(){

            return view('dashboard.statistics',
                ['dashboardClass' => 'Statistics'
            ]);
    }

    

//to do performance fix
    public function updateinfo(Request $request){
        $data = $request->only('street','country','city','zip');
        $user = Auth::user();
        $user->details;
        
        $address = $user->details->addr;

        $defaultAddress =  App\Address::find(1);

        if ($defaultAddress['Street']==$data['street'] && $defaultAddress['Country'] == $data['country'] && $defaultAddress['City']==$data['city'] && $defaultAddress['Zip']==$data['zip']) {

            $themes = \DB::table('products')
                                ->where('userId','=',$user->id)
                                ->count();
            $sales =\DB::table('products')
                                ->join('sales','products.id','=','sales.productId')
                                ->where('products.userId','=',$user->id);

            $revenue = $sales->sum('sales.value');

            $saleNo = $sales->count();

            return view('dashboard.user',[
                'error'=>'Deffault address!',
                'user'=>$user,
                'dashboardClass'=>'User Profile',
                'themes' => $themes,
                'saleNo' => $saleNo,
                'revenue' =>$revenue
            ]);


        }elseif ($address['Street']==$data['street'] && $address['Country'] == $data['country'] && $address['City']==$data['city'] && $address['Zip']==$data['zip'] && $address['id']!=1) {

            $themes = \DB::table('products')
                                ->where('userId','=',$user->id)
                                ->count();

            $sales =\DB::table('products')
                                ->join('sales','products.id','=','sales.productId')
                                ->where('products.userId','=',$user->id);

            $revenue = $sales->sum('sales.value');

            $saleNo = $sales->count();

            return view('dashboard.user',[
                'error'=>'Custom address! No Changes!!',
                'user'=>$user,
                'dashboardClass'=>'User Profile',
                'themes' =>$themes,
                'saleNo' => $saleNo,
                'revenue' =>$revenue
            ]);


        }elseif (!($address['Street']==$data['street'] && $address['Country'] == $data['country'] && $address['City']==$data['city'] && $address['Zip']==$data['zip']) && $address['id']!=1) {


            Auth::user()->details->addr->update([
                'Country'=>$data['country'],
                'City'=>$data['city'],
                'Street'=>$data['street'],
                'Zip'=>$data['zip']
            ]);

            $address->save();

            return redirect('/seller/userprofile');

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

            return redirect('/seller/userprofile');

        }
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

                return redirect('/seller/userprofile');

            }else{
                return view('dashboard.user',[
                    'error'=>'Password didn\'t match',
                    'user'=>$user,
                    'dashboardClass'=>'User Profile'
                ]);
            }
        }

        return view('dashboard.user',[
            'error'=>'Old password didn\'t match',
            'user'=>$user,
            'dashboardClass'=>'User Profile'
        ]);
    }

    public function settings(){
        return view('dashboard.settings',[
            'dashboardClass'=>'Settings'
        ]);
    }

    public function sendreview(Request $request){
        $review = $request['review'];
        $pid = $request['pid'];

        if (App\ProductComment::where('productId',$pid)->where('userId',Auth::user()->id)->count()>0) {
            return back()->withErrors(['1 comment allowed']);
        }else{



        $comment = App\ProductComment::create([
            'userId' => Auth::user()->id,
            'productId' => $pid,
            'comment' => $review,
        ]);
        }

        return back();
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

        return view('dashboard.messages',[
            'dashboardClass' => 'Messages',
            'users' => $users,
            'messages' => $messages
        ]);
    }

    public function messagesById($id){
       if ($id==Auth::user()->id) {
            return redirect()->back();
        }
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


        $msgupdate = \DB::table('messages')
                                        ->orWhere(function($query)use($id){
                                            $query->where('from',$id)
                                            ->where('to',Auth::user()->id);
                                        })
                                        ->orderBy('created_at','asc');

        $msgupdate->update(['read'=>0]);

        return view('dashboard.messagesbyid',[
            'dashboardClass' => 'Messages',
            'user' => $user,
            'messages' => $messages
        ]);

        return $messages;
    }

    






}
