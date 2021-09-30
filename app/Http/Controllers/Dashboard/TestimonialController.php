<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Testmonial;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    use ImageTrait;
    public function index(Request $request){
        if ($request->search){
            $testimonial = Testmonial::where('name','like','%'.$request->search.'%')->orderBy('id','desc')->paginate(5);
        }else{
            $testimonial= DB::table('testmonials')->select('id','name','rate','message')->orderBy('id','desc')->paginate(5);
        }
        return view('dashboard.Testimonial.index',compact('testimonial'));
    }

    public function store(Request $request){

        DB::table('testmonials')->insert([
            'name' => $request->name,
            'rate' =>$request->rate,
            'message' => $request->message
        ]);
        session()->flash('success' , 'You Add New Testimonial Successfully');
        return redirect()->route('testimonial.index');
    }

    public function edit($id){
        $testimonial = Testmonial::find($id);
        return view('dashboard.Testimonial.edit',compact('testimonial'));
    }

    public function update($id,Request $request){
        $brand = Testmonial::find($id);
        $brand->name = $request->name;
        $brand->rate = $request->rate;
        $brand->message = $request->message;
        $brand->update();
        session()->flash('success','Testimonial Update Successfully');
        return redirect()->route('testimonial.index');
    }

    public function destroy($id){
        $brand = Testmonial::find($id);
        $brand->delete();
        session()->flash('success','Testimonial Delete Successfully');
        return redirect()->back();

    }
}
