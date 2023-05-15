<?php

namespace App\Http\Controllers\Website;

use App\Models\Companies;
use App\Models\FuelOffer;
use App\Models\FuelOrder;
use App\Models\WashOffer;
use App\Models\WashOrder;
use App\Models\UserRepair;
use App\Models\WinchOffer;
use App\Models\WinchOrder;
use App\Models\RepairOffer;
use App\Models\RepairOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function getOrders(){
        $orders = WinchOrder::where('status',0)->where('isdelete',0)->get();
        return view('website.orders.index',compact('orders'));

      }

      public function getWinchOrders($id){

        $winch = WinchOrder::find($id);

        return view('website.orders.winch',compact('winch'));

      }

      public function getFuelOrders($id){

        $fuel = FuelOrder::find($id);

        return view('website.orders.fuel',compact('fuel'));

      }

      public function getRepairOrders($id){

        $repair = RepairOrder::find($id);
        $userRepair = UserRepair::where('repair_order_id',$id)->get();
        return view('website.orders.repair',compact('repair','userRepair'));

      }

      public function getWashOrders($id){
        $wash = WashOrder::find($id);
        return view('website.orders.wash',compact('wash'));

      }


      public function addWinchOffer(Request $request){

        $validator = Validator::make($request->all(),[
            'price'=>'required',
        ]);

        $company=Companies::where('user_id', Auth::user()->id)->first();

        WinchOffer::create([
            'order_id'=>$request->id,
            'user_id'=>Auth::user()->id,
            'company_id'=>$company->id,
            'company_name'=>$company->name,
            'price'=>$request->price,
            'notes'=>$request->notes,
        ]);

        return redirect()->back();
      }

      public function addFuelOffer(Request $request){

        $validator = Validator::make($request->all(),[
            'price'=>'required',
        ]);

        $company=Companies::where('user_id', Auth::user()->id)->first();

        FuelOffer::create([
            'order_id'=>$request->id,
            'user_id'=>Auth::user()->id,
            'company_id'=>$company->id,
            'company_name'=>$company->name,
            'price'=>$request->price,
            'notes'=>$request->notes,
        ]);

        return redirect()->back();
      }

      public function addRepairOffer(Request $request){

        $validator = Validator::make($request->all(),[
            'price'=>'required',
        ]);

        $company=Companies::where('user_id', Auth::user()->id)->first();

        RepairOffer::create([
            'order_id'=>$request->id,
            'user_id'=>Auth::user()->id,
            'company_id'=>$company->id,
            'company_name'=>$company->name,
            'price'=>$request->price,
            'notes'=>$request->notes,
        ]);

        return redirect()->back();
      }

      public function addWashOffer(Request $request){

        $validator = Validator::make($request->all(),[
            'price'=>'required',
        ]);

        $company=Companies::where('user_id', Auth::user()->id)->first();

        WashOffer::create([
            'order_id'=>$request->id,
            'user_id'=>Auth::user()->id,
            'company_id'=>$company->id,
            'company_name'=>$company->name,
            'price'=>$request->price,
            'notes'=>$request->notes,
        ]);

        return redirect()->back();
      }



}



