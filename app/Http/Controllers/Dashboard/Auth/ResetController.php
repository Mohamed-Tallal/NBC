<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetController extends Controller
{

    public function SendEmail(Request $request){
        if (!$this->ValidateEmail($request->email)){
            session()->flash('errors','{"error":[" We Can not found this email please check your email to reset your password ."]}');
            return redirect()->back();
        }else{
            $this->sendMail($request->email);
            session()->flash('success','please check your email');
            return redirect()->route('index.login');
        }
    }


    protected function sendMail($email)
    {
       $token = $this->generateToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token,$email));

    }

    protected function generateToken($email){
        $oldToken = DB::table('password_resets')->where('email',$email)->first();
        if ($oldToken){
            $token =  $oldToken->token;
        }else
        {
            $token =   $this->createToken($email);
        }
        return $token;

    }
    protected function createToken($email)
    {
        $token = Str::random(32);
        DB::table('password_resets')->insert([
            'email'  => $email,
            'token'  => $token,
            'created_at' => Carbon::now()
        ]);
        return $token ;
    }

    protected function ValidateEmail($email){
        return !! User::where('email' , $email)->get()->first();
    }

    public function resetPassword(ResetPasswordRequest $request){
        $user = DB::table('password_resets')->where('token',$request->token)->first();
        if ($user){
            DB::table('users')->update([
               'password' => bcrypt($request->password)
            ]);
            session()->flash('success','You change your email Successfully Pls Login');
            return redirect()->route('index.login');
        }
        return redirect()->back();
    }

    public function resetPasswordView(){
        return view('dashboard.auth.reset');
    }



    protected function responseError(){
        return response()->json([
           "error" =>[" Something is error Please check your email and  password."]
        ]);
    }



}
