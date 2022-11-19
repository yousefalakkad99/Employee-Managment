<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
 
    public function getlogin()
    {
        return view('login');

    }

    public function login(LoginRequest $request)
    {
      //make validation

      $remember_token=$request->has('remember_token') ? true : false;
    /*  if(auth()->guard('admin')->attempt(['username' => $request->input("username"),'password' => $request->input("password")]))
      {
        return redirect()->route('admin.dashboard');
      }*/
       if(auth()->guard('web')->attempt(['username' => $request->input("username"),'password' => $request->input("password")]))
      {
        return redirect()->route('dashboard');

      }
      else
      {
        return redirect()->back()->with(['error'=>'اسم المستخدم او كلمة المرور غير صحيحة']);

      }






    }
}
