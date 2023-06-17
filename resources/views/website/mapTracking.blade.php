
@extends('website.layouts.master')

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
@section('content')

    <div class="card-container">

        <div id="map"></div>

    </div>

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
