<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auths.login');
    }

    public function loginpost(Request $request)
    {
    	if(Auth::attempt($request->only('email', 'password'))){
            // Alert::success("Selamat Datang!");
            return redirect()->route('dashboard');
    	}

        // Alert::error("Perhatian","Email atau password SALAH!");
    	return redirect()->route('login');
    }

    public function gloginpost(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('welcome');
        }
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
