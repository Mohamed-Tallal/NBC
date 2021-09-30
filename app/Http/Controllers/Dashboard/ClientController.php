<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Offers;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{

    use ImageTrait;
    public function index(Request $request){
        if ($request->search){
            $clients = Offers::where('name','like','%'.$request->search.'%')->select('id','type','email','name','cost_from','cost_to')->orderBy('id','desc')->paginate(5);
        }else{
            $clients = DB::table('offers')->select('id','type','email','name','cost_from','cost_to')->orderBy('id','desc')->paginate(5);
        }
        return view('dashboard.Client.index',compact('clients'));
    }

    public function show($id){
        $offer = Offers::find($id);
        if ($offer->readable == 1){
            $offer->readable = 0;
            $offer->update();
        }
        return view('dashboard.Client.show',compact('offer'));
    }

    public function destroy($id){
        $brand = Offers::find($id);
        Storage::disk('public_image')->delete('/offer/'.$brand->files);
        $brand->delete();
        session()->flash('success','Offer Delete Successfully');
        return redirect()->back();

    }
}
