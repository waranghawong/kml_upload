<?php 
include '../classes/db.php';
include '../classes/locations.classes.php';
include '../classes/locationscntrl.classes.php';

$markers = new locationsCntrl();

if(isset($_POST['upload_file'])){
    $kml_name = $_POST['kml_name'];
    $kml_description = $_POST['kml_description'];
    $markers->uploadKMS($_FILES['upload_kml'],$kml_name, $kml_description);
}