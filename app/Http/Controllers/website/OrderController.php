<?php

namespace App\Http\Controllers\Website;

use App\Models\Companies;
use App\Models\FcmNotification;
use App\Models\FuelOffer;
use App\Models\FuelOrder;
use App\Models\User;
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


    ////////////////////////////////////


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


    /////////////////////////////////////////////////

    public function addWinchOffer(Request $request){

        $order= WinchOrder::find($request->id);
        $order->status= $order->status + 1;
        $order->driver_id=Auth::user()->id;
        $order->save();

        if ($order->status == 1){
            $data=[];
            $data['message']= "Your order has been received from a driver";
            $data['booking_id']="The driver is coming on the roads";
        }elseif($order->status == 2){
            $data=[];
            $data['message']= "Your order has been completed";
            $data['booking_id'] = "Please rate the service";
        }

        $tokens = [];
        $tokens[] = User::find($order->user_id)->device_token;
        $response = $this->sendFirebasePush($tokens,$data);

        if($response){
            FcmNotification::create([
                'user_id'=>$order->user_id,
                'type'=>$order->type,
                'order_id'=>$order->id,
                'message'=>$data['message']
            ]);
        }
        return redirect()->route('getOrders');
    }

    public function addFuelOffer(Request $request){

        $order= FuelOrder::find($request->id);
        $order->status= $order->status + 1;
        $order->driver_id=Auth::user()->id;
        $order->save();

        if ($order->status == 1){
            $data=[];
            $data['message']= "Your order has been received from a driver";
            $data['booking_id']="The driver is coming on the roads";
        }elseif($order->status == 2){
            $data=[];
            $data['message']= "Your order has been completed";
            $data['booking_id'] = "Please rate the service";
        }

        $tokens = [];
        $tokens[] = User::find($order->user_id)->device_token;
        $response = $this->sendFirebasePush($tokens,$data);

        if($response){
            FcmNotification::create([
                'user_id'=>$order->user_id,
                'type'=>$order->type,
                'order_id'=>$order->id,
                'message'=>$data['message']
            ]);
        }

        return redirect()->route('getOrders');
    }

    public function addRepairOffer(Request $request){
        $order= RepairOrder::find($request->id);
        $order->status= $order->status + 1;
        $order->driver_id=Auth::user()->id;
        $order->save();

        if ($order->status == 1){
            $data=[];
            $data['message']= "Your order has been received from a driver";
            $data['booking_id']="The driver is coming on the roads";
        }elseif($order->status == 2){
            $data=[];
            $data['message']= "Your order has been completed";
            $data['booking_id'] = "Please rate the service";
        }

        $tokens = [];
        $tokens[] = User::find($order->user_id)->device_token;
        $response = $this->sendFirebasePush($tokens,$data);

        if($response){
            FcmNotification::create([
                'user_id'=>$order->user_id,
                'type'=>$order->type,
                'order_id'=>$order->id,
                'message'=>$data['message']
            ]);
        }

        return redirect()->route('getOrders');
    }

    public function addWashOffer(Request $request){

        $order= WashOrder::find($request->id);
        $order->status= $order->status + 1;
        $order->driver_id=Auth::user()->id;
        $order->save();


        if ($order->status == 1){
            $data=[];
            $data['message']= "Your order has been received from a driver";
            $data['booking_id']="The driver is coming on the roads";
        }elseif($order->status == 2){
            $data=[];
            $data['message']= "Your order has been completed";
            $data['booking_id'] = "Please rate the service";
        }

        $tokens = [];
        $tokens[] = User::find($order->user_id)->device_token;
        $response = $this->sendFirebasePush($tokens,$data);

        if($response){
            FcmNotification::create([
                'user_id'=>$order->user_id,
                'type'=>$order->type,
                'order_id'=>$order->id,
                'message'=>$data['message']
            ]);
        }

        return redirect()->route('getOrders');
    }


    public function sendFirebasePush($tokens, $data)
    {

        $serverKey='AAAAmqKZJQk:APA91bEm4Ypjakp5uTdVUvHi4NqCxMGRzSvs09IXysNcWhacEyQxkEJF2KnMgH-anPLh56nHB8jtWezzqDdP2TraLTgRM_wN6VgL8IL8vorjRaUeiEumkOjPVjjaIYrKxX-8wiujLoKT';

        // prep the bundle
        $msg = array
        (
            'message'   => $data['message'],
            'booking_id' => $data['booking_id'],
        );

        $notifyData = [

            "title"=> $data['message'],
            "body" => $data['booking_id'],
            "sound" => "default",
        ];

        $registrationIds = $tokens;

        if(count($tokens) > 1){
            $fields = array
            (
                'registration_ids' => $registrationIds, //  for  multiple users
                'notification'  => $notifyData,
                'data'=> $msg,
                'priority'=> 'high'
            );
        }
        else{

            $fields = array
            (
                'to' => $registrationIds[0], //  for  only one users
                'notification'  => $notifyData,
                'data'=> $msg,
                'priority'=> 'high'
            );
        }

        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $serverKey;

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        // curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        if ($result === FALSE)
        {
            die('FCM Send Error: ' . curl_error($ch));
        }

        curl_close( $ch );
        return $result;
    }

    ////////////////////////////////////////////

}


