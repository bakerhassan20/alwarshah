<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $subServices = SubService::all();
       return view('admin.sub_services.index',compact('services','subServices'));
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
        $validation = $request->validate([

            'name' => 'required|unique:sub_services,name|max:255',

        ],[
            'name.required' =>'يرجي ادخال اسم الخدمه',
            'name.unique' =>'اسم الخدمه مسجل مسبقا',
        ]);

        SubService::create([
            'name' => $request->name,
            'service_id' => $request->section_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', 'تم اضافة الخدمه بنجاح ');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Service::where('name', $request->section_name)->first()->id;

        $validatedData = $request->validate([

            'name' => 'required|max:255|unique:sub_services,name,'.$request->serv_id,
            'description' => 'required'
        ],[
            'name.required'  =>'يرجي ادخال اسم الخدمه',
            'name.unique' =>'اسم الخدمه موجود مسبقا',
            'description.required' =>'يرجي ادخال البيان',
        ]);


        $services = SubService::find($request->serv_id);

        $services->update([
        'name' => $request->name,
        'description' => $request->description,
        'service_id' => $id,
        ]);

        session()->flash('Edit', 'تم تعديل الخدمه بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $services = SubService::findOrFail($request->serv_id);
        $services->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return redirect('/admin/sub_services');
    }
}
