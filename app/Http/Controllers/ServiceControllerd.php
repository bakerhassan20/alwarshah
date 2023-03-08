<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
       return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:services,name|max:255',
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
            'name.unique' =>'اسم القسم مسجل مسبقا',


        ]);

        Service::create([
                'name' => $request->name,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),

            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect('/admin/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Service $Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $Service)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $Service)
    {
       $id = $request->id;

       $validatedData= $request->validate([
        'name' => 'required|max:255|unique:services,name,'.$id,
        'description' => 'required',

       ],[

        'name.required' =>'يرجي ادخال اسم القسم',
        'name.unique' =>'اسم القسم مسجل مسبقا',
        'description.required' =>'يرجي ادخال البيان',

       ]);
       $Service = Service::find($id);
       $Service->update([
           'name' => $request->section_name,
           'description' => $request->description,
       ]);
       session()->flash('edit','تم تعديل القسم بنجاج');
       return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =$request->id;
        $Service = Service::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/services');
    }

    public function getproducts($id){

        $data = DB::table('sub_services')->where('service_id',$id)->pluck('name','id');
        return Json_encode($data);

    }
}
