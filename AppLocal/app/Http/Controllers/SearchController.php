<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;

class SearchController extends Controller
{
     public function searchStudent(Request $request)
    {
        return response()->json((new Query)->getStudent($request->ssi_id));
    }
    
    public function parentGuardianRecord(Request $request)
    {
        return response()->json((new Query)->getParentGuardianRecord($request->ssi_id));
    }

    public function promissoryRecord(Request $request)
    {
        return response()->json((new Query)->getPromissoryRecord($request->ssi_id,$request->sy));
    }
}