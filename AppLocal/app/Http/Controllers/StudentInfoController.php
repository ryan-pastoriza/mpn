<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;

class StudentInfoController extends Controller
{
    public function loadInfo(Request $request)
    {
        return response()->json((new Query)->loadStudents());
    }
}