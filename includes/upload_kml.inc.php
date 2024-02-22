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

if(isset($_GET['rmdid'])){
    $markers->getRmdId($_GET['rmdid']);
}

if(isset($_GET['selector_id'])){
    $markers->getSelectorId($_GET['selector_id']);
}
if(isset($_GET['mia_id'])){
    $markers->getMiaId($_GET['mia_id']);
}

if(isset($_GET['liberty_id'])){
    $markers->getLibertyId($_GET['liberty_id']);
}


if(isset($_POST['mia_submit_button'])){
    $target_name = $_POST['target_name'];
    $phone_number = $_POST['phone_number'];
    $msisdn = $_POST['msisdn'];
    $imei = $_POST['imei'];
    $imsi = $_POST['imsi'];
    $tmsi = $_POST['tmsi'];
    $operator = $_POST['operator'];
    $call = $_POST['call'];
    $sms = $_POST['sms'];
    $identities = $_POST['identities'];
    $event = $_POST['event'];
    $last_activity = $_POST['last_activity'];


    $markers->insertMIA($target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity);
}

if(isset($_POST['liberty_submit_button'])){
    $name = $_POST['name'];
    $sim = $_POST['sim'];
    $supplier = $_POST['supplier'];
    $imsi = $_POST['imsi'];
    $imei = $_POST['imei'];
    $model = $_POST['model'];
    $phone_number = $_POST['phone_number'];

    $markers->insertLiberty($name, $sim, $supplier,$imsi, $imei,$model, $phone_number);
}

if(isset($_POST['mia_edit_submit_button'])){
    $id = $_POST['mia_id'];
    $target_name = $_POST['target_name'];
    $phone_number = $_POST['phone_number'];
    $msisdn = $_POST['msisdn'];
    $imei = $_POST['imei'];
    $imsi = $_POST['imsi'];
    $tmsi = $_POST['tmsi'];
    $operator = $_POST['operator'];
    $call = $_POST['call'];
    $sms = $_POST['sms'];
    $identities = $_POST['identities'];
    $event = $_POST['event'];
    $last_activity = $_POST['last_activity'];


    $markers->editMia($target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity,$id);
}

if(isset($_POST['liberty_edit_submit_button'])){
    $id = $_POST['liberty_id'];
    $name = $_POST['name'];
    $sim = $_POST['sim'];
    $supplier = $_POST['supplier'];
    $imsi = $_POST['imsi'];
    $imei = $_POST['imei'];
    $model = $_POST['model'];
    $phone_number = $_POST['phone_number'];

    $markers->editLiberty($name, $sim, $supplier,$imsi, $imei,$model, $phone_number,$id);
}


if(isset($_POST['edit_selector_submit_button'])){
    $selector_id = $_POST['selector_id'];
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
    $address = '';

    if($region_text = ''){
        $address='';
    }
    else{
        $address = $region_text.' '.$barangay_text.' '.$city_text.' '.$province_text;
    }


    $markers->editSelector($_FILES['upload_kml'],$date, $company,$name, $position,$unit, $selector_name,$imsi, $imei,$time,$lac_cid, $address,$remarks, $selector_id);
}

if(isset($_POST['submit_edit_rmd_button'])){
    $id = $_POST['rmd_id'];
    $date = $_POST['edit_date'];
    $time = $_POST['edit_time'];
    $frequency = $_POST['edit_frequency'];
    $clarity = $_POST['edit_clarity'];
    $direction = $_POST['edit_direction'];
    $subject = $_POST['edit_subject'];
    $callsign = $_POST['edit_callsign'];
    $reciever = $_POST['edit_reciever'];
    $fc = $_POST['edit_fc'];
    $src = $_POST['edit_src'];
    $grid = $_POST['edit_grid'];
    $region_text = $_POST['region_text'];
    $province_text = $_POST['province_text'];
    $city_text = $_POST['city_text'];
    $barangay_text = $_POST['barangay_text'];
    $address = '';

    if($region_text = ''){
        $address='';
    }
    else{
        $address = $region_text.' '.$barangay_text.' '.$city_text.' '.$province_text;
    }


    $markers->editRmd($date, $time, $frequency,$clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $grid, $id);
}

if(isset($_GET['delete_selector'])){
    $markers->deleteCurrentSelector($_GET['delete_selector']);
}

if(isset($_GET['delete_rmd'])){
    $markers->deleteCurrentRmd($_GET['delete_rmd']);
}
if(isset($_GET['delete_mia'])){
    $markers->deleteCurrentMia($_GET['delete_mia']);
}

if(isset($_GET['delete_liberty'])){
    $markers->deleteCurrentLiberty($_GET['delete_liberty']);
}


