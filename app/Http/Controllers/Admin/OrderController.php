<?php

namespace App\Http\Controllers\Admin;

use App\Models\FuelOrder;
use App\Models\WashOrder;
use App\Models\UserRepair;
use App\Models\WinchOrder;
use App\Models\RepairOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function AllWinchOrder(){
        $Orders = WinchOrder::all();
        return view('admin.orders.winsh',compact('Orders'));

    }

    public function AllFuelOrder(){
        $Orders = FuelOrder::all();
        return view('admin.orders.fuel',compact('Orders'));

    }


    public function AllRepairOrder(){
        $Orders = RepairOrder::all();
        return view('admin.orders.repair',compact('Orders'));
    }

    public function AllWashOrder(){
        $Orders = WashOrder::all();
        return view('admin.orders.wash',compact('Orders'));

    }
}
