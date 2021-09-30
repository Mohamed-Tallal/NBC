<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpProductRequest;
use App\Models\Product;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use ImageTrait;
    public function index(Request $request){
        if ($request->search){
            $products = Product::where('name','like','%'.$request->search.'%')->orderBy('id','desc')->paginate(5);
        }else{
            $products= DB::table('products')->select('id','name','img')->orderBy('id','desc')->paginate(5);
        }
        return view('dashboard.Product.index',compact('products'));
    }

    public function store(ProductRequest $request){
        if ( $request->logo && $request->logo != null){
            $image = $this->SaveImage('uploads/product',$request->logo);
        }
        DB::table('products')->insert([
            'name' => $request->name,
            'img' => $image,
        ]);
        session()->flash('success' , 'You Add Project Successfully');
        return redirect()->route('product.index');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('dashboard.Product.edit',compact('product'));
    }

    public function update($id,UpProductRequest $request){
        $brand = Product::find($id);
        $brand->name = $request->name;
        if ( $request->logo && $request->logo != null){
            $image = $this->SaveImage('uploads/product',$request->logo);
            Storage::disk('public_image')->delete('/product/'.$brand->img);
            $brand->img = $image;
        }
        $brand->update();
        session()->flash('success','Project Update Successfully');
        return redirect()->route('product.index');
    }

    public function destroy($id){
        $brand = Product::find($id);
        Storage::disk('public_image')->delete('/product/'.$brand->img);
        $brand->delete();
        session()->flash('success','Project Delete Successfully');
        return redirect()-> back();
    }


}
