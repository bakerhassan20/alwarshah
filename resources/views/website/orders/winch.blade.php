
@extends('website.layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{URL::asset('assets/website/css/winch.css')}}" rel="stylesheet">

@endsection
@section('content')

  <div class="card-container">
   <div class="wave-login"></div>
      <div class="wave2-login"></div>
      <div class="wave3-login"></div>
         <div class="container">
        <div class="row">
           <div style="" class="col-6">
           <h4>From :</<h4><br><br>
           <iframe  width="400" height="200" frameborder="0" scrolling="no"marginheight="0" marginwidth="0"
         src="https://maps.google.com/maps?q={{$winch->lat_from}},{{$winch->lag_from}}&hl=es&z=14&amp;output=embed">
            </iframe>
           </div>

        <div style="" class="col-6 location">
           <h4>To :</<h4><br><br>
            <iframe  width="400" height="200" frameborder="0" scrolling="no"marginheight="0" marginwidth="0" allow="fullscreen;"
         src="https://maps.google.com/maps?q={{$winch->lat_to}},{{$winch->lag_to}}&hl=es&z=14&amp;output=embed">
            </iframe>
        </div>
        </div>
         </div>
      <main class="main-content">


        <h4>Description: <span style="color:#999;font-size: 18px !important;">{{ $winch->description }}</span></<h4>
        <div class="flex-row">
        <div class="car-type">
         <h4>Car Type : <span style="color:#999;font-size: 18px !important;">{{ $winch->car_type }}</span></<h4>
        </div>
          <div class="coin-base">
          <span class="money"> <i class="fa-solid fa-money-bill-wave"></i></span>
          <span style="color:#999;font-size: 18px !important;">@if($winch->payment == 0) Credit  @else Cash  @endif</span>
          </div>
          <div class="time-left">
           <span class="time"> <i class="fa-solid fa-clock"></i></span>
           <span style="color:#999;font-size: 18px !important;">{{ $winch->created_at }}</span>
          </div>
        </div>
      </main>
      <div class="card-attribute">
        <img src="https://i.postimg.cc/SQBzNQf1/image-avatar.png" alt="avatar" class="small-avatar"/>
        <p>Order By : <span>{{ \App\Models\User::find($winch->user_id)->name }}</span></p>
        <span class="headicone"><img src="{{ URL::asset('assets/img/icon/38824.jpg') }}"></span>
      </div>

      <a href="#" style="margin-left: 380px;" class="btn btn-danger">Add Offer</a>
    </div>
</div>



@endsection

@section('js')


@endsection
