<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    public function register(Request $request){
        $this->validation($request);
        User::create([
            'role' => $request['role'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/register')->with('Status','Account registered successfully');
    }
    
    protected function validation(Request $request)
    {
        return $this->validate($request, [
            'role' => ['required', 'string', 'max:191'],
            'username' => ['required', 'string', 'unique:users', 'max:191'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }
}