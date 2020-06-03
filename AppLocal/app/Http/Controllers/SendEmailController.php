<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function send(Request $request)
    {
    	// $this->validate($request,[
    	// 	'email'		=>	'required|email',
    	// 	'message'	=>	'required'
    	// ]);
        try{
            $data = array(
                'message' => $request->message,
            );
            Mail::to($request->email)->send(new SendMail($data));
            return "Success";
        }catch(Exception $e){
            return response()->view('errors.custom', [], 500);
        }
    }
}