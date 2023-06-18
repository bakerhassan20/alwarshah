
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
           <div style="margin-left: 90px;margin-bottom: 13px;" class="col">
           <h4>Location :</<h4><br><br>
           <iframe  width="700" height="240" frameborder="0" scrolling="no"marginheight="0" marginwidth="0"
         src="https://maps.google.com/maps?q={{$fuel->lat}},{{$fuel->lag}}&hl=es&z=14&amp;output=embed">
            </iframe>
           </div>
        </div>
         </div>
      <main class="main-content">

        <div class="row"style="margin-bottom: 10px;">

        @if ($fuel->b80 )
            <div class="col-3">
              <h4>B80: <span style="color:#999;font-size: 18px !important;">{{ $fuel->b80 }}</span></<h4>
            </div>
        @endif
        @if ($fuel->b92)
            <div class="col-3">
              <h4>B92: <span style="color:#999;font-size: 18px !important;">{{ $fuel->b92 }}</span></<h4>
            </div>
        @endif
        @if ($fuel->b95 )
            <div class="col-3">
              <h4>B95: <span style="color:#999;font-size: 18px !important;">{{ $fuel->b95 }}</span></<h4>
            </div>
        @endif
        @if ($fuel->electricity == 1)
            <div class="col-3">
              <h4>Electricity: <span style="color:#17a517;font-size:22px !important;"><i class="fa-solid fa-square-check"></i></span></<h4>
            </div>
        @endif

        </div>


        <h4>Description: <span style="color:#999;font-size: 18px !important;">{{ $fuel->description }}</span></<h4>
        <div class="flex-row">
        <div class="car-type">
         <h4>Car Type : <span style="color:#999;font-size: 18px !important;">{{ $fuel->car_type }}</span></<h4>
        </div>
          <div class="coin-base">

          </div>
          <div class="time-left">
           <span class="time"> <i class="fa-solid fa-clock"></i></span>
           <span style="color:#999;font-size: 18px !important;">{{ $fuel->created_at->format('Y-m-d h:i') }}</span>
          </div>
        </div>
      </main>
      <div class="card-attribute">
        <img src="https://i.postimg.cc/SQBzNQf1/image-avatar.png" alt="avatar" class="small-avatar"/>
          <p>Order By  <span>{{ \App\Models\User::find($fuel->user_id)->name }}</span></p>
          <p>Phone  <span>{{ \App\Models\User::find($fuel->user_id)->phone }}</span></p>
        <span class="headicone"><img src="{{ URL::asset('assets/img/icon/fuel.jpg') }}"></span>
      </div>

       @if($fuel->status == 0)
     <a  style="margin-left: 380px;" class="modal-effect btn btn-danger" class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" data-bs-toggle="modal" data-bs-target="#modaldemo8">Accept Order</a>
     @elseif ($fuel->status == 1)
      <a  style="margin-left: 380px;" class="modal-effect btn btn-danger" class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" data-bs-toggle="modal" data-bs-target="#modaldemo8">Delivery Order</a>
     @endif
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modaldemo8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        @if($fuel->status == 0)
     <h5 class="modal-title" id="exampleModalLabel">Accept Order</h5>
    @elseif ($fuel->status == 1)
      <h5 class="modal-title" id="exampleModalLabel">Delivery Order</h5>
    @endif
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="/Orders/Fuel/Offer" method="post">
        <div class="modal-body">
                {{csrf_field()}}
                <input type="hidden" class="form-control" id="id" name="id" value="{{  $fuel->id }}">
                @if($fuel->status == 0)
                <h4>Do you want to accept this Order ?</h4>
                @elseif ($fuel->status == 1)
               <h4>Do you want to finsh this Order ?</h4>
                @endif

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><input type="hidden" class="form-control" id="id" name="id" value="{{  $fuel->id }}">
                @if($fuel->status == 0)
                Accept
                @elseif ($fuel->status == 1)
               Finsh
                @endif</button>
        </div>
    </form>
    </div>
  </div>
</div>

@endsection

@section('js')


@endsection
