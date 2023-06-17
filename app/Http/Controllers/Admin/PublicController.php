<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getSlider(){
        $sliders = Slide::all();
        return view('admin.slides.index',compact('sliders'));
    }

    public function addSlide(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'img' => 'required',
        ]);
        Slide::create([
            'name' => $request->name,
            'description' => $request->description,
            'img'=>$request->img
        ]);
        session()->flash('Add','تم الاضافه بنجاج');
        return redirect()->back();
    }

    public function updateSlider(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'img' => 'required',
        ]);

        $slide= Slide::find($request->id);
        $slide->update([
            'name' => $request->name,
            'description' => $request->description,
            'img'=>$request->img
        ]);
        session()->flash('edit','تم التعديل بنجاج');
        return redirect()->back();
    }

    public function deleteSlide(Request $request){

        Slide::find($request->id)->delete();
        session()->flash('delete','تم الحذف بنجاج');
        return redirect()->back();
    }



    public function getProducts(){
        $product = Product::all();
        return view('admin.proudcts.index',compact('product'));
    }


    public function addProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'img'=>$request->img,
            'price'=>$request->price,
            'quantity'=>$request->quantity

        ]);
        session()->flash('Add','تم الاضافه بنجاج');
        return redirect()->back();
    }

    public function updateProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'img' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $Product= Product::find($request->id);
        $Product->update([
            'name' => $request->name,
            'description' => $request->description,
            'img'=>$request->img,
            'price'=>$request->price,
            'quantity'=>$request->quantity
        ]);
        session()->flash('edit','تم التعديل بنجاج');
        return redirect()->back();
    }

    public function deleteProduct(Request $request){

        Product::find($request->id)->delete();
        session()->flash('delete','تم الحذف بنجاج');
        return redirect()->back();
    }


}
