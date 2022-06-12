<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(! auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Invalid login details');
        }
       
        // Log in
        return redirect()->route('dashboard');
    }
}
