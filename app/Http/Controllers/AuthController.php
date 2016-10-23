<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\ResetsPasswords;

class AuthController extends Controller
{


    use ResetsPasswords;
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */


    protected $redirectTo = '/';

    
    public function login(Request $request)
    {   $data = $request->only('username','password','id','page');
        $username = $data['username'];
        $password = $data['password'];
        $id=$data['id'];
        $page = $data['page'];
        
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            if ($id!=NULL) {
                return redirect()->intended('/'.$page.'/'.$id);
            }
            return redirect()->intended(strtolower(Auth::user()->type->type).'/dashboard');
        }else{
            return redirect()->intended('/');
        }
    }
    public function register(Request $request){
        $data = $request->only('firstname','lastname','username','password','email','birthdate','accType');

        $user = \App\User::create([
           'UserName' => $data['username'],
           'FirstName' => ucfirst($data['firstname']),
           'LastName' => ucfirst($data['lastname']),
           'email' => $data['email'],
           'UserType' => $data['accType'],
           'password' => bcrypt($data['password']),
       ]);
        
        $userdetails = \App\UserDetail::create([
            'UserId' => $user->id,
            'birthdate' => $data['birthdate']
        ]);

        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            
            return redirect()->intended(strtolower(Auth::user()->type->type).'/dashboard');
        }

        return redirect()->intended('/');
    }

    public function logOut(){
        Auth::logout();
        return redirect()->intended('/');
    }


















}