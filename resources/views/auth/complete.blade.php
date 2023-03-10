@extends('layouts.master2')

@section('title')
Complete Your information
@stop


@section('css')
<!-- Sidemenu-respoansive-tabs css -->

<link href="{{URL::asset('assets/css/complete.css')}}" rel="stylesheet">


<style>

input .largerCheckbox {
    width : 50px !important;
    height :50px !important;
    margin-bottom: 12px !important;
    margin-left: 15px !important;
}
label span{
    position: absolute;
    bottom: 10px !important;
    right: 54px;
}
</style>
@endsection
@section('content')
    <div class="wave-login"></div>
      <div class="wave2-login"></div>
      <div class="wave3-login"></div>
      <div class="container-login"dir="ltr">
        <div class="img"></div>
      <div class="login-content">
        <form action="index.html">
          <h2 class="title-login">Complete Your information</h2>
    <ul>
      <li class="active current1"> <span class="span"> 1 </span> tab 1 </li>
      <li>  <span class="span"> 2 </span> tab 2 </li>
      <li>  <span class="span"> 3 </span> tab 3 </li>

    </ul>


    <div id="main">
        <div id="div1" class="first current">
              <div class="input-div one">
              <div class="i">
                <i class="fa-solid fa-house"></i>
              </div>
              <div class="div">
                <label>company Name</label>
                <input type="text" class="input" name="phone" required />
              </div>
            </div>



           <!--      <label>Service</label><br> -->
           <div class="col sele">
			<label>Choice Service</label><select class="form-control select2-no-search">
				<option label="Choose one"></option>
				<option value="Firefox">
					Service 1
					</option>
											<option value="Chrome">
												Service 2
											</option>
											<option value="Safari">
												Service 3
											</option>
											<option value="Opera">
												Service 4
											</option>
											<option value="Internet Explorer">
												Service 5
											</option>
										</select>
									</div><!-- col-4 -->

              </div>


        <div id="div2">
            <div class="row">

    <label class="checkbox  col-4  h5"style="">
      <span>value</span>
       <input class="icheck-green largerCheckbox"type="checkbox" name="permission[]" id="value" value="value">
        </label>
        <label class="checkbox  col-4  h5"style="">
      <span>value</span>
       <input class="icheck-green largerCheckbox"type="checkbox" name="permission[]" id="value" value="value">
        </label>
        <label class="checkbox  col-4  h5"style="">
      <span>value</span>
       <input class="icheck-green largerCheckbox"type="checkbox" name="permission[]" id="value" value="value">
        </label>
        <label class="checkbox  col-4  h5"style="">
      <span>value</span>
       <input class="icheck-green largerCheckbox"type="checkbox" name="permission[]" id="value" value="value">
        </label>
        <label class="checkbox  col-4  h5"style="">
      <span>value</span>
       <input class="icheck-green largerCheckbox"type="checkbox" name="permission[]" id="value" value="value">
        </label>
</div><br>
        </div>

        <div id="div3" class="last">
        <label style=" display: flex;
	justify-content: left;
	color: #999;
	font-size: 16px;
    margin-left: 13px;">Choice Photo</label>
		<div class="row row-sm">
		<div class="col-sm-7 col-md-6 col-lg-4">
		<div class="custom-file">
	<input class="custom-file-input" id="customFile" type="file"> <label class="custom-file-label" for="customFile">Choose file</label>
	</div>
		</div>
	</div><br>
          {{-- 4 --}}
                            <label style=" display: flex;
	justify-content: left;
	color: #999;
	font-size: 16px;
    margin-left: 13px;">Location</label>
                                <div class="mapform">
                            <div class="row input-group">

                                    <input type="text" class="form-control input-sm" placeholder="lat" name="lat" id="lat"required>

                                     <span class="input-group-btn" style="width:5px;"></span>
                                    <input type="text" class="form-control input-sm" placeholder="lng" name="lng" id="lng"required>

                            </div>

                          <div id="map" style="height:180px; width: 350px;" class="my-3"></div>

                <script>
                    let map;
                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: { lat: 27.1000, lng: 30.9000 },
                            zoom: 9,
                            scrollwheel: true,
                        });

                        const uluru = { lat: 27.18664288798674, lng: 31.1878050170455 };
                        let marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            draggable: true
                        });

                        google.maps.event.addListener(marker,'position_changed',
                            function (){
                                let lat = marker.position.lat()
                                let lng = marker.position.lng()
                                $('#lat').val(lat)
                                $('#lng').val(lng)
                            })

                        google.maps.event.addListener(map,'click',
                        function (event){
                            pos = event.latLng
                            marker.setPosition(pos)
                        })
                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                        type="text/javascript">
                </script>

            </div>

    </div>
    </div>

        <button id="prev"class="btn">Prev</button>

        <button id="next"class="btn">Next</button>
        <button id="submit" type="submit" class="btn btn-success submit text-center">Submit</button>

      </form>
    </div>
  </div>



@endsection
@section('js')
<script src="{{URL::asset('assets/js/complete.js')}}"></script>
@endsection


