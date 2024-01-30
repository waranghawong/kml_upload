<?php 
include '../classes/db.php';
include '../classes/locations.classes.php';
include '../classes/locationscntrl.classes.php';

$markers = new locationsCntrl();

if(isset($_POST['submit_button'])){
    $date = $_POST['date'];
    $company = $_POST['company'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $unit = $_POST['unit'];
    $selector_name = $_POST['selector_name'];
    $imsi = $_POST['imsi'];
    $imei = $_POST['imei'];
    $time = $_POST['time'];
    $lac_cid = $_POST['lac_cid'];
    $region_text = $_POST['region_text'];
    $province_text = $_POST['province_text'];
    $city_text = $_POST['city_text'];
    $barangay_text = $_POST['barangay_text'];
    $remarks = $_POST['remarks'];

    $address = $region_text.' '.$barangay_text.' '.$city_text.' '.$province_text;
    $markers->uploadKMS($_FILES['upload_kml'],$date, $company,$name, $position,$unit, $selector_name,$imsi, $imei,$time,$lac_cid, $address,$remarks);
}


if(isset($_POST['submit_rmd_button'])){
    $date = $_POST['date'];
    $time = $_POST['time'];
    $frequency = $_POST['frequency'];
    $clarity = $_POST['clarity'];
    $direction = $_POST['direction'];
    $subject = $_POST['subject'];
    $callsign = $_POST['callsign'];
    $reciever = $_POST['reciever'];
    $fc = $_POST['fc'];
    $src = $_POST['src'];
    $region_text = $_POST['region_text'];
    $province_text = $_POST['province_text'];
    $city_text = $_POST['city_text'];
    $barangay_text = $_POST['barangay_text'];
    $grid = $_POST['grid'];

    $address = $region_text.' '.$barangay_text.' '.$city_text.' '.$province_text;

    $markers->insertRMD($date, $time, $frequency,$clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $grid);
}