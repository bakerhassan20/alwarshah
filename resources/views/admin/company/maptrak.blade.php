
@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الشركات</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    <!-- row -->
    <div class="row" style="margin-top: 100px">
        <div id="map"></div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>



        function addToMap(locations,center){
            var map = L.map('map',{
                center:center,
                zoom:12
            });


        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);

        var customTitle = '';
        console.log(locations);
        for (var i=0;i<locations.length;i++){
            customTitle=i.toString();
            if(i==(locations.length - 1)){
                customTitle='هنا';
            }
            marker= new L.marker([locations[i][0],locations[i][1]])
                .addTo(map)
                .bindPopup(customTitle)
                .openPopup();
        }
        }


        var arr=[];
        $.ajax({

            url:'{{route('tracking')}}',
            type:'GET',
            dataType:'json',
            success:function (data){
                addToMap(data,data.slice(-1)[0]);
            },
            error:function (request,error){
                alert('Request:' + JSON.stringify(request));
            }

        });
    </script>


@endsection
