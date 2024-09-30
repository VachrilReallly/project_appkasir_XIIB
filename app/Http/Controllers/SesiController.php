<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
         return view('login');
    }
    function login(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required',
        ],[
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        $infologin=[
            'email' =>$request->email,
            'password' =>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'operator'){
                return redirect('/dashboard/operator');
            }elseif (Auth::user()->role == 'keuangan'){
                return redirect('/dashboard/keuangan');
            }elseif (Auth::user()->role == 'marketing'){
                return redirect('/dashboard/marketing');
            }
            return redirect('/dashboard');
        }else{
            return redirect('/')->withErrors('Email atau Password salah')->withInput();
        }
    }

    function Logout()
    {
        Auth::logout();
        return redirect('');
    }
}
