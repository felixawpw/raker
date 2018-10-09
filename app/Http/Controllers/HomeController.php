<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
            ]))
        {
            return redirect()->route('event.index');
        }
        return "failed";
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
