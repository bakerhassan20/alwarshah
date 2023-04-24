<?php

namespace App\Http\Controllers\Website;

use App\Models\WinchOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function getOrders(){
        $orders = WinchOrder::where('status',0)->where('isdelete',0)->get();
        return view('website.orders.index',compact('orders'));

      }

      public function getWinshOrders($id){

        $winch = WinchOrder::find($id);

        return view('website.orders.winch',compact('winch'));

      }
}
