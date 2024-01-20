<?php
include 'classes/db.php';
include 'classes/locations.classes.php';
include 'classes/locationscntrl.classes.php';
$saved_locations = new locationsCntrl();
// $saved_locations->getAllMarkers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KML FILE UPLOAD</title>
</head>
<body>
    UPLOAD KML HERE
    <form method="POST" action="includes/upload_kml.inc.php" enctype="multipart/form-data">
       <input type="text" name="kml_name" placeholder="kml name">
       <input type="text" name="kml_description" placeholder="kml description">
       <input type="file" name="upload_kml">
       <input type="submit" name="upload_file" value="UPLOAD">
    </form>
    <br>
    <br>
    <table class="" border = '1'>
        <thead>
            <th>Name</th>
            <th>Description</th>
        </thead>
        <tbody>
            
            <?php
            
            if($saved_locations->getKMS() == false){
                echo 'no data';
            }
            else{
                foreach($saved_locations->getKMS() as $row){
                    echo '<tr>';
                    echo ' <td><a href="'.$row['location'].'">'.$row['name'].'</a></td>';
                    echo ' <td>'.$row['description'].'</td>';
                    echo '</tr>';
                }
            }
            ?>
            <tr>
            </tr>
        </tbody>
    </table>

    <script>
		load() 
		function load() 
			{
			var map;
			var geoXml;

			if (GBrowserIsCompatible()) 
			{
				map = new GMap2(document.getElementById('map'));
				map.addControl(new GSmallMapControl());
				map.addControl(new GMapTypeControl());
				geoXml = new GGeoXml('samplekml.kml');
				map.addOverlay(geoXml);
				map.setCenter(new GLatLng(47.613976,-122.345467), 13);
			}
			}
	</script>
</body>
</html>