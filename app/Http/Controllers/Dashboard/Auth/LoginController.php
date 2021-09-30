<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('dashboard.auth.login');
    }


    public function login(LoginRequest $request)
    {
        $remmber_me =  $request->remmber_me != null ? true : false ;
        if (!auth()->guard('web')->attempt(['email' => $request->email , 'password' => $request->password],$remmber_me)){
            session()->flash('errors','{"error":[" Something is error Please check your email and  password."]}');
            return redirect()->back();
        }else{
            session()->flash('success','Welcome  ' .auth()->user()->name);
            return redirect()->route('dashboard.index');
        }
    }
    public function logout(){
       $user = auth()->user()->name ;
        auth()->logout();
        session()->flash('success','Good Bye  ' . $user);
        return redirect()->route('index.login');
    }
}
