<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        $auth=Auth::attempt($credentials,true);
        if ($auth){
           return redirect()->route('dashboard');
        }
        else{
            return redirect()->back()->with('error','wrong credentials');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Successfully Logged Out!');
    }
}
