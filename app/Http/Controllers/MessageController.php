<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App;

class MessageController extends Controller
{
    public function sendmessage($userid, Request $request){

    	$data = $request->only('message');

    	$message = App\Message::create([
    		'from' => Auth::user()->id,
    		'to' => $userid,
    		'message' => $data['message']
    	]);

    	return redirect()->back();
    }

    
}
