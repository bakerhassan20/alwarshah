<?php

namespace App\Http\Controllers\Api;

use App\Models\FuelOrder;
use App\Models\WashOrder;
use App\Models\UserRepair;
use App\Models\WinchOrder;
use App\Models\RepairOrder;
use Illuminate\Http\Request;
use App\Models\RepairService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class OrderController extends Controller
{
    public function MakeWinchOrder(Request $request){

        $validator = Validator::make($request->all(),[
            'car_type'=>'required',
            'lag_from'=>'required|between:-180,180',
            'lat_from'=>'required|between:-90,90',
            'lag_to'=>'required|between:-180,180',
            'lat_to'=>'required|between:-90,90',
            'city_from'=>'required',
            'city_to'=>'required',

        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }

        $winchOrder = WinchOrder::create([
            'user_id'=>Auth::user()->id,
            'type'=>'winch',
            'car_type'=>$request->car_type,
            'city_from'=>$request->city_from,
            'city_to'=>$request->city_to,
            'lag_from'=>$request->lag_from,
            'lat_from'=>$request->lat_from,
            'lag_to'=>$request->lag_to,
            'lat_to'=>$request->lat_to,
            'status'=>0,
            'description'=>$request->description,
        ]);

        return response()->json(['message' => ['Order sent successfully'], 'order'=>$winchOrder], 200);

    }


    public function MakeWashOrder(Request $request){

        $validator = Validator::make($request->all(),[
            'car_type'=>'required',
            'lag'=>'required|between:-180,180',
            'lat'=>'required|between:-90,90',

        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }

        $washOrder = WashOrder::create([
            'user_id'=>Auth::user()->id,
            'type'=>'wash',
            'car_type'=>$request->car_type,
            'city'=>$request->city,
            'lag'=>$request->lag,
            'lat'=>$request->lat,
            'status'=>0,
            'description'=>$request->description,
        ]);

        $url = URL::temporarySignedRoute('map-tracking',now()->addSecond(30),[
            'map' =>$washOrder->id
        ]);

        return response()->json(['message' => ['Order sent successfully'], 'order'=>$washOrder], 200);

        return response()->json(['message' => ['Order sent successfully'], 'order'=>$washOrder,'tracking'=>$url], 200);


    }


    public function MakeFuelOrder(Request $request){

        $validator = Validator::make($request->all(),[
            'car_type'=>'required',
            'lag'=>'required|between:-180,180',
            'lat'=>'required|between:-90,90',
            'electricity'=>'integer|between:0,1',
        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }

        $fuelOrder = FuelOrder::create([
            'user_id'=>Auth::user()->id,
            'car_type'=>$request->car_type,
            'city'=>$request->city,
            'type'=>'fuel',
            'lag'=>$request->lag,
            'lat'=>$request->lat,
            'b80'=>$request->b80,
            'b92'=>$request->b92,
            'b95'=>$request->b95,
            'electricity'=>$request->electricity,
            'status'=>0,
            'description'=>$request->description,
        ]);

        return response()->json(['message' => ['Order sent successfully'], 'order'=>$fuelOrder], 200);

    }

    public function MakeRepairOrder(Request $request){


        $validator = Validator::make($request->all(),[

            'car_type'=>'required',
            'lag'=>'required|between:-180,180',
            'lat'=>'required|between:-90,90',

        ]);

        if($validator->fails()){
            return response(['message'=>$validator->errors()->all()], 422);
        }

        $repairOrder = RepairOrder::create([
            'user_id'=>Auth::user()->id,
            'type'=>'repair',
            'car_type'=>$request->car_type,
            'city'=>$request->city,
            'lag'=>$request->lag,
            'lat'=>$request->lat,
            'status'=>0,
            'description'=>$request->description,
        ]);

        if($request->RepairService){
            foreach ($request->RepairService as $RepairService) {

                UserRepair::create([
                    'repair_order_id'=>$repairOrder->id,
                    'repair_service_id'=>$RepairService,

                ]);
            }

        }

        $Service = UserRepair::leftJoin('repair_services', 'repair_services.id','=','user_repairs.repair_service_id')->select(['repair_services.name'])->where('user_repairs.repair_order_id',$repairOrder->id)->get();
        return response()->json(['message' => ['Order sent successfully'], 'order'=>$repairOrder,'services'=>$Service], 200);


    }

    public function RepairService(){
        $repairService = RepairService::all();
        return response()->json(['repairService'=>$repairService], 200);
    }


    public function AllUserOrder(){
        $user = auth('sanctum')->user();
       if($user){
        $WashOrder = WashOrder::where('user_id',$user->id)->get();
        $WinchOrder = WinchOrder::where('user_id',$user->id)->get();
        $RepairOrder = RepairOrder::where('user_id',$user->id)->get();
        $FuelOrder = FuelOrder::where('user_id',$user->id)->get();

        $array = array_merge($WashOrder->toArray(), $WinchOrder->toArray(),$FuelOrder->toArray(),$RepairOrder->toArray());
            return response()->json(['Order' =>collect($array)->sortBy('created_at')->values(),'Status'=>200]);
        }else{
            return response()
        ->json(['message' => ['data not found']], 404);
        }
    }
}
