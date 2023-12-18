<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use  Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('landing');
        }
        return redirect()->back(); 
    }
  function logout(){
    Auth::logout();
    return redirect('/');
    
  }
}
