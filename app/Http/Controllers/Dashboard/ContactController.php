<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = ContactUs::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.Contact.index',compact('contact'));
    }

    public function show($id){
        $offer = ContactUs::find($id);
        if ($offer->readable == 1){
            $offer->readable = 0;
            $offer->update();
        }
        return view('dashboard.Contact.show',compact('offer'));
    }


    public function destroy($id){
        $brand = ContactUs::find($id);
        $brand->delete();
        session()->flash('success','Mail Delete Successfully');
        return redirect()-> back();
    }
}
