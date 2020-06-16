<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Api\Query;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function send(Request $request)
    {
        $data = array('message' => $request->message,);
        try{
            Mail::to($request->email)->send(new SendMail($data));
            if (Mail::failures()){
                return response()->json('error');
            }else{
                return (new Query)->add_email_history($request->history_id,$request->message);
            }
        }catch(GuzzleHttp\Exception\ServerException $error){
            return response()->json('error');
        }
    }
}