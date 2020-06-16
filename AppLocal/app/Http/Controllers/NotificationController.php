<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;

class NotificationController extends Controller
{
    public function notifications()
    {
    	return response()->json((new Query)->getNofitications());
    }
}
