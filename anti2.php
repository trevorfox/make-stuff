<?php include "header.php";
$url = $_SERVER['REQUEST_URI'];
$name = "Trevor Fox | On the Web... on the Web";
$title = "Day 1 of Many";
$desc = "This is what I made on the first day plus a lot of meta data about it.";
echo writeMetaData($url, $name, $title, $desc , "Today");
include "navbar.php"
?>
<!-- THIS IS WHERE THE MAGIC HAPPENS -->
<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #map {
    height: 100%;
  }
</style>
<div class="container">
  <div id="map"></div>
</div>  
<script>

var map;
function initMap() {
map = new google.maps.Map(document.getElementById('map'), {
center: {lat: -34.397, lng: 150.644},
zoom: 8
});
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
    async defer></script>
</div> <!-- /container -->
<!-- END MAGIC -->
<?php include "footer.php"; ?>
