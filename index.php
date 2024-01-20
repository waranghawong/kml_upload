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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <table class="table" border = '1'>
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            
            <?php
            
            if($saved_locations->getKMS() == false){
                echo 'no data';
            }
            else{
                foreach($saved_locations->getKMS() as $row){
                    echo '<tr>';
                    echo ' <td>'.$row['name'].'</td>';
                    echo ' <td>'.$row['description'].'</td>';
                    echo '  <td><a href="sample.php?dir='.substr($row['location'], 3).'" target="_blank"><i class="fa fa-globe"></i>open</a></td>';
                    echo '</tr>';
                }
            }
            ?>
            <tr>
            </tr>
        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
		function getLocation(){
      
            console.log(event.target.id);
            $.ajax({
                type: "GET",
                url: "sample.php" ,
                data: {
                    "location": id_value
                },
                success : function(e) {
                        console.log(e);
                }
            });
         
        }
	</script>
</body>
</html>