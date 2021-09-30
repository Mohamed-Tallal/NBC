<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


use App\Http\Requests\UpUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  use ImageTrait;
    public function index(Request $request){
        if ($request->search){
            $users = User::where('name','like','%'.$request->search.'%')->where('email','!=',auth()->user()->email)->orderBy('id','desc')->paginate(5);
        }else{
            $users= DB::table('users')->select('id','name','email','image')->where('email','!=',auth()->user()->email)->orderBy('id','desc')->paginate(5);
        }
        return view('dashboard.User.index',compact('users'));
    }


    public function store(UserRequest $request){
        if ( $request->logo && $request->logo != null){
            $image = $this->SaveImage('uploads/users',$request->logo);
        }
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $image,
        ]);
        session()->flash('success' , 'You Add Admin Successfully');
        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = User::find($id);
        return view('dashboard.User.edit',compact('user'));
    }


    public function update($id ,UpUserRequest $request){
        $brand = User::find($id);
        $brand->name = $request->name;
        $brand->email = $request->email;

        if ($brand->password != null){
            $brand->password = bcrypt($request->password);
        }
        if ( $request->logo && $request->logo != null){
            $image = $this->SaveImage('uploads/users',$request->logo);
            if ($brand->logo != '132.png') {
                Storage::disk('public_image')->delete('/users/'.$brand->image);
            }
            $brand->image = $image;
        }

        $brand->update();
        session()->flash('success','User Update Successfully');
        return redirect()->back();
    }


    public function destroy($id){
        $brand = user::find($id);
        if ($brand->image != '132.png') {
            Storage::disk('public_image')->delete('/users/'.$brand->image);
        }        $brand->delete();
        session()->flash('success','Admin Delete Successfully');
        return redirect()->back();

    }
}
