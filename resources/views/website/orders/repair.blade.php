
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
         src="https://maps.google.com/maps?q={{$repair->lat}},{{$repair->lag}}&hl=es&z=14&amp;output=embed">
            </iframe>
           </div>
        </div>
         </div>
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
          <span class="money"> <i class="fa-solid fa-money-bill-wave"></i></span>
          <span style="color:#999;font-size: 18px !important;">@if($repair->payment == 0) Credit  @else Cash  @endif</span>
          </div>
          <div class="time-left">
           <span class="time"> <i class="fa-solid fa-clock"></i></span>
           <span style="color:#999;font-size: 18px !important;">{{ $repair->created_at->format('Y-m-d h:i') }}</span>
          </div>
        </div>
      </main>
      <div class="card-attribute">
        <img src="https://i.postimg.cc/SQBzNQf1/image-avatar.png" alt="avatar" class="small-avatar"/>
        <p>Order By : <span>{{ \App\Models\User::find($repair->user_id)->name }}</span></p>
        <span class="headicone"><img src="{{ URL::asset('assets/img/icon/repair.avif') }}"></span>
      </div>

    <a  style="margin-left: 380px;" class="modal-effect btn btn-danger" class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8" data-bs-toggle="modal" data-bs-target="#modaldemo8">Add Offer</a>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modaldemo8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add offer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="/Orders/Repair/Offer" method="post">
        <div class="modal-body">
                {{csrf_field()}}
                <input type="hidden" class="form-control" id="id" name="id" value="{{  $repair->id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">price</label>
                        <input type="number" class="form-control" id="price" name="price">
                     </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>


@endsection

@section('js')


@endsection
