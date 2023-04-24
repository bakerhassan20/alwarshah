{{--

<?php
function getAddress($latitude, $longitude)
{
        //google map api url
        $url = "https://maps.google.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=AIzaSyBcSf3uNt-Znj-oGsQMpYmOBa79bGx2Gmc";

        // send http request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        dd($geocode);
        $address = $json->results[0]->formatted_address;
        return $address;
}
?>

<?php
// coordinates
$latitude = '40.6781784';
$longitude = '-73.9441579';
$result = getAddress($latitude, $longitude);
echo 'Address: ' . $result;

// produces output
// Address: 58 Brooklyn Ave, Brooklyn, NY 11216, USA
?>
 --}}



<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation API with Google Maps API</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <script>
    function getAddress (latitude, longitude) {
    return new Promise(function (resolve, reject) {
        var request = new XMLHttpRequest();

        var method = 'GET';
        var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitude + ',' + longitude + '&sensor=true';
        var async = true;

        request.open(method, url, async);
        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                if (request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    var address = data.results[0];
                    resolve(address);
                }
                else {
                    reject(request.status);
                }
            }
        };
        request.send();
    });
};

getAddress(27.0582595, 31.328217).then(console.log).catch(console.error);
    </script>
  </body>
</html>

