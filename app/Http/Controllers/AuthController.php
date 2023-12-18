<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    //
    function login(){
        return view('login');
    }
    function authenticating(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)){
            if(Auth::user()->role_id == 1){
                return redirect('sidebar');
            }
            if(Auth::user()->role_id == 2){
                return redirect('sidebar');
            }
        }
        Session::flash('message', 'login infalid');
        return redirect('/login');

        }
        function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
}
