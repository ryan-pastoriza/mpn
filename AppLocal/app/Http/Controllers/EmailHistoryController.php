<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;

class EmailHistoryController extends Controller
{
	public function accounts()
    {
    	return response()->json((new Query)->getToEmailAccounts());
    }
 	public function email_history()
    {
    	return response()->json((new Query)->getEmailHistory());
    }
}