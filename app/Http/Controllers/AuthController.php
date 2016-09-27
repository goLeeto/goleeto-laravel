<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function login(Request $request)
    {   $data = $request->only('username','password');
        $username = $data['username'];
        $password = $data['password'];
        
        if (Auth::attempt(['username' => $username, 'password' => $password])) {

            return redirect()->intended('/dashboard');
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
           'UserType' => $data['accType'],
           'password' => bcrypt($data['password']),
       ]);
        
        $userdetails = \App\UserDetail::create([
            'UserId' => $user->id,
            'email' => $data['email'],
            'birthdate' => $data['birthdate']
        ]);
        return redirect()->intended('/dashboard');
    }

    public function logOut(){
        Auth::logout();
        return redirect()->intended('/');
    }


    public function getAuth(){
        if (Auth::check()) {
            return 'po';
        }else{
            return 'jo';
        }
    }



















}