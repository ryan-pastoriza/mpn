<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Query;

class RouteController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function login(){
        return view('Auth\login');
    }
    
    public function register(){
        return view('auth.register');
    }
    
    public function index()
    {
        return view('pages.dashboard.dashboard');
    }

    public function promissory()
    {
        return view('pages.promissory.promissory');
    }
    
    public function settings(){
        return view('pages.settings.settings');
    }

    public function inbox(){
        return view('pages.inbox.inbox');
    }
    
    public function notification(){
        return view('pages.notification.notification');
    }
    // Reports
    public function parent_guardian_report(){
        return view('pages.report.parent-guardian');
    }
    
    public function promissory_report(){
        return view('pages.report.promissory');
    }

    public function stat_report(){
        return view('pages.statistics.Stat');
    }

}