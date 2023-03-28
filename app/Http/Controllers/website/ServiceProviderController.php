<?php

namespace App\Http\Controllers\website;

use App\Models\Companies;
use App\Models\SubService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CompanyServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{
   public function profile(){
    return view('website.profile');
   }

   public function getSubService($id){
        $subservice = SubService::where('service_id',$id)->get();
        $data = [];
        foreach ($subservice as $subserv){
            array_push($data,$subserv);
        }
        return response()->json($data);

   }

   public function storeInfo(Request $request){

    $request->validate([
        'name'=>"required|min:3|max:190",
        'services'=>"required",
        'lat'=>"required",
        'lng'=>"required",
    ]);


    Companies::create([
        'name' =>$request->name,
        'user_id' =>Auth::user()->id,
        'service_id' =>$request->services,
        'latitude' =>$request->lat,
        'longitude' =>$request->lng,
    ]);

    $company=Companies::where('user_id', Auth::user()->id)->first();
     foreach($request->sub_service as $sub){

        CompanyServices::create([
           'company_id' =>$company->id,
           'sub_service_id' =>$sub,
        ]);
     }

    if ($request->hasFile('img')) {
        $file = $request->file('img');

                // upload
                $avatar = Str::uuid() . "." . $file->extension();
                $update = Companies::where('user_id', Auth::user()->id)->update(['img' => $avatar]);
                $file->storeAs('assets/img/company/', $avatar);

    }
    return redirect()->route('service_provider.home');

   }
}
