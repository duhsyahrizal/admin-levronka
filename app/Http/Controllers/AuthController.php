<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $auth = array();
        $rules = [
            'username'              => 'required|string',
            'password'              => 'required|string|min:6'
        ];
 
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'username.string'       => 'Username tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
        ];
 
        Auth::guard('web')->attempt($data);
 
        if (Auth::check()) { 
            $auth['user'] = \Auth::user()->toArray();

            Session::put('auth', $auth);
            return redirect()->route('home');
 
        } else {
            
            Session::flash('error', "Username or password doesnt match in our records");
            return redirect()->route('login');
        }
 
    }

    public function logout()
    {
        Auth::logout();
        session(['wave' => null]);
        return redirect()->route('login');
    }
}
