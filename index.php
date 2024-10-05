<?php

include_once 'src/Place.php';

const LAT_NORTH_BOUNDARY = 51.00000000000001;
const LAT_SOUTH_BOUNDARY = 45.00000000000001;
const LON_WEST_BOUNDARY = 8.0000000000001;
const LON_EAST_BOUNDARY = 20.0000000000001;


function generateRandomPlaceWithinBoundaries(): Place
{
    $lat = random_int(
            (int)(LAT_SOUTH_BOUNDARY * 100000000000000),
            (int)(LAT_NORTH_BOUNDARY * 100000000000000)
        ) / 100000000000000;

    $lon = random_int(
            (int)(LON_WEST_BOUNDARY * 100000000000000),
            (int)(LON_EAST_BOUNDARY * 100000000000000)
        ) / 100000000000000;

    return new Place($lat, $lon);
}

$googleMapsApiKey = file_get_contents('google-maps-api.key');
$place = generateRandomPlaceWithinBoundaries();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Random Place on Google Map</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleMapsApiKey; ?>"></script>
    <script>
        function initMap() {
            var place = {lat: <?php echo $place->getLatitude(); ?>, lng: <?php echo $place->getLongitude(); ?>};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: place
            });
            var marker = new google.maps.Marker({
                position: place,
                map: map
            });
        }
    </script>
</head>
<body onload="initMap()">
    <h1>Random Place on Google Map: <?php echo "{$place->getLatitude()}, {$place->getLongitude()}" ?> </h1>
    <a target="_blank" href="https://www.google.com/maps/place/<?php echo "{$place->getLatitude()}, {$place->getLongitude()}" ?>">Open in Google Maps</a>
    <div id="map" style="height: 800px; width: 100%;"></div>
</body>
</html>