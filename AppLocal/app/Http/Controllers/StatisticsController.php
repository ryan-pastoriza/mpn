<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;

class StatisticsController extends Controller
{
    public function load_statistics_data()
    {
        try{return response()->json((new Query)->getPromissoryNoteStatistics());}
        catch (Exception $exception) {}
    }
}