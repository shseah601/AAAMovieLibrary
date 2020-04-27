<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
      return view('login');
    }

    public function handleLogin(Request $request)
    {
      $this->validate($request,[
        'email' =>'required',
        'password' =>'required'
      ]);

      $data = $request->only('email', 'password');
      if(\Auth::attempt($data)){
        return redirect('/edit');
      }

      return back()->withInput()->withErrors(['email' => 'Email or password is invalid']);
    }

    public function logout()
    {
      \Auth::logout();
      return redirect('/login')->with('success','Successful logged out');
    }

}
