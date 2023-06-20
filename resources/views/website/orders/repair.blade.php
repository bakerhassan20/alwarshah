
@extends('website.layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{URL::asset('assets/website/css/winch.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<style>
    body {
        margin: 0;
        padding: 0;
    }

    #map {
        width: 100%;
        height: 80vh;
    }
</style>
@endsection
@section('content')

  <div class="card-container">
   <div class="wave-login"></div>
      <div class="wave2-login"></div>
      <div class="wave3-login"></div>
{{--         <div class="container">--}}
{{--        <div class="row">--}}
{{--           <div style="margin-left: 90px;margin-bottom: 13px;" class="col">--}}
{{--           <h4>Location :</<h4><br><br>--}}
{{--           <iframe  width="700" height="240" frameborder="0" scrolling="no"marginheight="0" marginwidth="0"--}}
{{--         src="https://maps.google.com/maps?q={{$repair->lat}},{{$repair->lag}}&hl=es&z=14&amp;output=embed">--}}
{{--            </iframe>--}}
{{--           </div>--}}
{{--        </div>--}}
{{--         </div>--}}

      <div id="map"></div>
      <main class="main-content">

        <div class="row"style="margin-bottom: 10px;">
        @foreach ($userRepair as $uRe)
          <div class="col-3">
              <h4><span style="color:#999;font-size: 18px !important;">{{App\Models\RepairService::find($uRe->repair_service_id )->name}}</span></<h4>
            </div>
        @endforeach
        </div>


        <h4>Description: <span style="color:#999;font-size: 18px !important;">{{ $repair->description }}</span></<h4>
        <div class="flex-row">
        <div class="car-type">
         <h4>Car Type : <span style="color:#999;font-size: 18px !important;">{{ $repair->car_type }}</span></<h4>
        </div>
          <div class="coin-base">

          </div>
          <div class="time-left">
           <span class="time"> <i class="fa-solid fa-clock"></i></span>
           <span style="color:#999;font-size: 18px !important;">{{ $repair->created_at->format('Y-m-d h:i') }}</span>
          </div>
        </div>
      </main>
      <div class="card-attribute">
        <img src="{{\App\Models\User::find($repair->user_id)->avatar}}" alt="avatar" class="small-avatar"/>
          <p>Order By  <span>{{ \App\Models\User::find($repair->user_id)->name }}</span></p>
          <p>Phone  <span>{{ \App\Models\User::find($repair->user_id)->phone }}</span></p>
        <span class="headicone"><img src="{{ URL::asset('assets/img/icon/repair.avif') }}"></span>
      </div>

      @if($repair->status == 0)
     <a  style="margin-left: 380px;" class="modal-effect btn btn-danger" class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" data-bs-toggle="modal" data-bs-target="#modaldemo8">Accept Order</a>
     @elseif ($repair->status == 1)
      <a  style="margin-left: 380px;" class="modal-effect btn btn-danger" class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" data-bs-toggle="modal" data-bs-target="#modaldemo8">Delivery Order</a>
     @endif
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modaldemo8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        @if($repair->status == 0)
     <h5 class="modal-title" id="exampleModalLabel">Accept Order</h5>
    @elseif ($repair->status == 1)
      <h5 class="modal-title" id="exampleModalLabel">Delivery Order</h5>
    @endif
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="/Orders/Repair/Offer" method="post">
        <div class="modal-body">
                {{csrf_field()}}
                <input type="hidden" class="form-control" id="id" name="id" value="{{  $repair->id }}">
                   @if($repair->status == 0)
                <h4>Do you want to accept this Order ?</h4>
                @elseif ($repair->status == 1)
               <h4>Do you want to finsh this Order ?</h4>
                @endif

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">@if($repair->status == 0)
                Accept
                @elseif ($repair->status == 1)
               Finsh
                @endif</button>
        </div>
    </form>
    </div>
  </div>
</div>


@endsection

@section('js')

    <!-- leaflet js  -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Map initialization
        var map = L.map('map').setView([27.154325,31.209059], 13);

        //osm layer
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);

        L.marker([{{$repair->lat}}, {{$repair->lag}}]).addTo(map)
            .bindPopup('هنا')
            .openPopup();
    </script>

@endsection
