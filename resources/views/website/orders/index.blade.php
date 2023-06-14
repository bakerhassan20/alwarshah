@extends('website.layouts.master')

@section('css')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{URL::asset('assets/website/css/orders.css')}}" rel="stylesheet">

<style>
.navbar-light.sticky-top {
    top:0px !important;
    transition: .5s;
}
.navbar-collapse.collapse {

    display: inline-flex !important;
}










</style>
@endsection
@section('content')

<?php
if(Auth::user()->driver_type == 'winch'){

    $type='winch';
}
if(Auth::user()->driver_type == 'fuel'){

       $type='fuel';
}
if(Auth::user()->driver_type == 'repair'){
       $type='repair';
}
if(Auth::user()->driver_type == 'wash'){

       $type='wash';
}

?>



<div class="container">
    <div class="page-header">
        <h1>Control your orders<span class="pull-right label label-default">:)</span></h1>
    </div>

</div>

<div class="container-fluid"style="padding:50px">
    <div class="row">
        <div class="col">
            <div class="panel with-nav-tabs panel-danger">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">



                              <li class="active"><a href="#tab1danger" data-toggle="tab">New Oreders</a></li>


                            <li><a href="#tab2danger" data-toggle="tab">Delivery Orders</a></li>


                             <li><a href="#tab3danger" data-toggle="tab">Done Orders</a></li>


                             <li><a href="#tab6danger" data-toggle="tab">Wash</a></li>

                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4danger" data-toggle="tab">Danger 4</a></li>
                                    <li><a href="#tab5danger" data-toggle="tab">Danger 5</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">


   <div class="tab-pane fade in active" id="tab1danger">

     {{-- /////////////////////// --}}

    @if ($type == 'winch')
    <?php $winchOrders = \App\Models\WinchOrder::where('status',0)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($winchOrders as $winchOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                            <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($winchOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Winch/{{ $winchOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/38824.jpg') }}"></span>
                                   </div>

                                     <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $winchOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $winchOrder->description }}
                            </div>

                        </div>
                    </div>
                @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif

          {{-- /////////////////////// --}}

     @if ($type == 'fuel')
    <?php $fuelOrders = \App\Models\FuelOrder::where('status',0)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($fuelOrders as $fuelOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                         <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($fuelOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Fuel/{{ $fuelOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/fuel.jpg') }}"></span>
                                   </div>

                                   <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>
                                   <div class="col-3">
                                 <p class="headtime">{{ $fuelOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $fuelOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif



{{-- ////////////////////////////////////// --}}


             @if ($type == 'repair')
    <?php $repairOrders = \App\Models\RepairOrder::where('status',0)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($repairOrders as $repairOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                            <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($repairOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Repair/{{ $repairOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/repair.avif') }}"></span>
                                   </div>

                                    <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $repairOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $repairOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif

      {{-- /////////////////////// --}}

             @if($type == 'wash')
    <?php $washOrders = \App\Models\WashOrder::where('status',0)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($washOrders as $washOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                                   <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($washOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Wash/{{ $washOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/wash.webp') }}"></span>
                                   </div>

                                        <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $washOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $washOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif

</div>

 <div class="tab-pane fade" id="tab2danger">


       {{-- /////////////////////// --}}

    @if ($type == 'winch')
    <?php $winchOrders = \App\Models\WinchOrder::where('status',1)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($winchOrders as $winchOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                            <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($winchOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Winch/{{ $winchOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/38824.jpg') }}"></span>
                                   </div>

                                     <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $winchOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $winchOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif

          {{-- /////////////////////// --}}

     @if ($type == 'fuel')
    <?php $fuelOrders = \App\Models\FuelOrder::where('status',1)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($fuelOrders as $fuelOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                         <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($fuelOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Fuel/{{ $fuelOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/fuel.jpg') }}"></span>
                                   </div>

                                   <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>
                                   <div class="col-3">
                                 <p class="headtime">{{ $fuelOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $fuelOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif



{{-- ////////////////////////////////////// --}}


             @if ($type == 'repair')
    <?php $repairOrders = \App\Models\RepairOrder::where('status',1)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($repairOrders as $repairOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                            <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($repairOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Repair/{{ $repairOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/repair.avif') }}"></span>
                                   </div>

                                    <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $repairOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $repairOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif

      {{-- /////////////////////// --}}

             @if($type == 'wash')
    <?php $washOrders = \App\Models\WashOrder::where('status',1)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($washOrders as $washOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                                   <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($washOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Wash/{{ $washOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/wash.webp') }}"></span>
                                   </div>

                                        <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $washOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $washOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif


 </div>

        <div class="tab-pane fade" id="tab3danger">



       {{-- /////////////////////// --}}

    @if ($type == 'winch')
    <?php $winchOrders = \App\Models\WinchOrder::where('status',2)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($winchOrders as $winchOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                            <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($winchOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Winch/{{ $winchOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/38824.jpg') }}"></span>
                                   </div>

                                     <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $winchOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $winchOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif

          {{-- /////////////////////// --}}

     @if ($type == 'fuel')
    <?php $fuelOrders = \App\Models\FuelOrder::where('status',2)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($fuelOrders as $fuelOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                         <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($fuelOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Fuel/{{ $fuelOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/fuel.jpg') }}"></span>
                                   </div>

                                   <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>
                                   <div class="col-3">
                                 <p class="headtime">{{ $fuelOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $fuelOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif



{{-- ////////////////////////////////////// --}}


             @if ($type == 'repair')
    <?php $repairOrders = \App\Models\RepairOrder::where('status',2)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($repairOrders as $repairOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                            <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($repairOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Repair/{{ $repairOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/repair.avif') }}"></span>
                                   </div>

                                    <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $repairOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $repairOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif

      {{-- /////////////////////// --}}

             @if($type == 'wash')
    <?php $washOrders = \App\Models\WashOrder::where('status',2)->where('driver_id',Auth::user()->id)->where('isdelete',0)->orderBy('id','desc')->get(); ?>

        <div class="container" style="margin-top:40px;margin-bottom: 60px;">
        <div class="row">
          @forelse ($washOrders as $washOrder )
                    <div class="col-md-6 mt-5">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="https://images.pexels.com/photos/1149831/pexels-photo-1149831.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" />
                            </div>
                                   <div class="card-heading">
                            <div class="row">
                                    <div class="col-9">
                                   <span style="margin-left:10px"> {{ \App\Models\User::find($washOrder->user_id)->name }}</span>
                                     <br>

                                </div>
                                    <div class="col">
                                <a href="/Orders/Wash/{{ $washOrder->id }}" class="btn btn-danger btn-sm"> Show Order</a>
                                </div>
                                  <div class="row">
                                    <div class="col-3">
                                   <span class="headicone"><img src="{{ URL::asset('assets/img/icon/wash.webp') }}"></span>
                                   </div>

                                        <div class="col-3">
                                {{-- <span class="headpay badge badge-success">@if($washOrder->payment == 0) Credit  @else Cash  @endif</span> --}}
                                </div>

                                   <div class="col-3">
                                 <p class="headtime">{{ $washOrder->created_at->format('Y-m-d h:i')}}</p>
                                 </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-text">
                                {{ $washOrder->description }}
                            </div>

                        </div>
                    </div>
               @empty
                  <h1>No Orders<span class="pull-right label label-default"></span></h1>
               @endforelse
        </div>
      </div>
    @endif




        </div>


        <div class="tab-pane fade" id="tab6danger">


        </div>

                        <div class="tab-pane fade" id="tab4danger">Danger 4</div>
                        <div class="tab-pane fade" id="tab5danger">Danger 5</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<br/>







@endsection


@section('js')

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
