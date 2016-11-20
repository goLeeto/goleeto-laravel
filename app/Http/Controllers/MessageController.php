<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App;

class MessageController extends Controller
{
    public function sendmessage($userid, Request $request){

    	if ($userid==Auth::user()->id) {
    		return redirect()->back();
    	}

    	$data = $request->only('message');

    	$message = App\Message::create([
    		'from' => Auth::user()->id,
    		'to' => $userid,
    		'message' => $data['message'],
    		'read' => 1
    	]);

    	return redirect()->back();
    }

    
}
