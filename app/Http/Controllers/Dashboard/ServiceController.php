<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\UpServiceRequest;
use App\Models\Service;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    use ImageTrait;
    public function index(Request $request){
        if ($request->search){
            $services = Service::where('tittle','like','%'.$request->search.'%')->orderBy('id','desc')->paginate(5);
        }else{
            $services= DB::table('services')->select('id','tittle','img','small_desc')->orderBy('id','desc')->paginate(5);
        }
        return view('dashboard.Service.index',compact('services'));
    }

    public function store(ServiceRequest $request){
        if ( $request->logo && $request->logo != null){
            $image = $this->SaveImage('uploads/service',$request->logo);
        }
        DB::table('services')->insert([
            'tittle' => $request->tittle,
            'img' => $image,
            'small_desc' => $request->small_desc,
            'desc' => $request->desc
        ]);
        session()->flash('success' , 'You Add New Service Successfully');
        return redirect()->route('service.index');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('dashboard.Service.edit',compact('service'));
    }

    public function update($id,UpServiceRequest $request){
        $brand = Service::find($id);
        $brand->tittle = $request->tittle;
        $brand->small_desc = $request->small_desc;
        $brand->desc = $request->desc;
        if ( $request->logo && $request->logo != null){
            $image = $this->SaveImage('uploads/service',$request->logo);
            Storage::disk('public_image')->delete('/service/'.$brand->img);
            $brand->img = $image;
        }
        $brand->update();
        session()->flash('success','Service Update Successfully');
        return redirect()->route('service.index');
    }

    public function destroy($id){
        $brand = Service::find($id);
        Storage::disk('public_image')->delete('/service/'.$brand->img);
        $brand->delete();
        session()->flash('success','Service Update Successfully');
        return redirect()->back();

    }
}
