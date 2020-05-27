<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmail extends Controller
{
    function send(Request $request)
    {
    	$data = array(
    		'email' => $request->email,
    		'message' => $request->message
    	);
        $response = null;
        $message = ""
        system("ping -c 1 google.com", $response);
        if($response == 0)
        {
            // Mail::to($request->email)->send(new SendMail($data));
            $message = "You are connected to the Internet";
        }else{
            $message = "You are NOT connected to the Internet";
        }
    	return $message;
    }
