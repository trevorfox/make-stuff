<?php include "header.php";
  $title = "Day 1 of Many";
  $desc = "This is what I made on the first day plus a lot of meta data about it.";
  echo writeMetaData($title, $desc , "Today");
 ?>
<!-- THIS IS WHERE THE MAGIC HAPPENS -->
<style>
  #out {
  margin: 0;
  padding: 0;
  height: 100%;
  }
</style>
<script>
var lat, lon, antiLat, antiLon;
var map;

function initMap(output,lat,lon) {
  console.log(output);
  map = new google.maps.Map(output, {
    center: {lat: lat, lng: lon},
    zoom: 8
  });
}

  function success(position) {
    lat  = position.coords.latitude;
    lon = position.coords.longitude;
    antiLat = -1 * lat
    antiLon = lon > 0 ? lon - 180 : lon + 180;
    console.log([lat,lon])
    console.log([antiLat,antiLon]);
    //output.innerHTML = '<p>Latitude is ' + lat + '° <br>Longitude is ' + lon + '°</p><br>';
    initMap(output,antiLat,antiLon);
  };

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  };

  output.innerHTML = "<p>Locating…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}

jQuery(document).ready(function(){

});

</script>
<div id="out"></div>

<div class="container">
  <h1>Make Stuff Do Stuff</h1>
  <p>Antipode</p>
  <p><button onclick="geoFindMe()">Show my location</button></p>
  <p><?php echo $url?></p>
</div>
<!-- /container -->
<script src="https://maps.googleapis.com/maps/api/js"
        async defer></script>
<!-- END MAGIC -->
<?php include "footer.php"; ?>
