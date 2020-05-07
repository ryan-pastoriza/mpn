<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;

class SearchController extends Controller
{
     public function searchStudent(Request $request)
    {
        return response()->json((new Query)->getStudent(
            $request->ssi_id,
            $request->stud_year,
            $request->stud_semester,
            $request->stud_term
        ));
    }
}