<?php
include '../classes/db.php';
include '../classes/geoint.classes.php';
include '../classes/geoint-cntrl.classes.php';

$geoint = new geoIntCntrller();

if(isset($_POST['submit_tol_area'])){
    $date = $_POST['date'];
    $time = $_POST['time'];
    $uav = $_POST['uav'];
    $name = $_POST['name'];
    $remarks = $_POST['remarks'];
    $position = $_POST['position'];
    $unit = $_POST['unit'];
  
    $region_text = $_POST['region_text'];
    $province_text = $_POST['province_text'];
    $city_text = $_POST['city_text'];
    $barangay_text = $_POST['barangay_text'];

    $upload_kml = $_FILES['geoint'];
    

    $address = $region_text.' '.$barangay_text.' '.$city_text.' '.$province_text;

    $geoint->setTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml);
}

if(isset($_POST['submit_edit_tol_area'])){
    $id = $_POST['tol_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $uav = $_POST['uav'];
    $name = $_POST['name'];
    $remarks = $_POST['remarks'];
    $position = $_POST['position'];
    $unit = $_POST['unit'];
    $address = '';
  
    $region_text = $_POST['region_text'];
    $province_text = $_POST['province_text'];
    $city_text = $_POST['city_text'];
    $barangay_text = $_POST['barangay_text'];

    $upload_kml = $_FILES['geoint'];
    if($region_text == ''){
        $address = null;
    }
    else{
        $address = $region_text.' '.$barangay_text.' '.$city_text.' '.$province_text;
    }



    $geoint->editTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml, $id);
}

if(isset($_POST['submit_isr_button'])){
    $subject = $_POST['subject'];
    $isr_to = $_POST['isr_to'];
    $reference = $_POST['reference'];
    $background = $_POST['background'];
    $flight_details = $_POST['flight_details'];
    $result = $_POST['result'];
    $analysis = $_POST['analysis'];
    $assessment = $_POST['assessment'];
    $lesson_learned = $_POST['lesson_learned'];
    $best_practices = $_POST['best_practices'];
    $issues_concern = $_POST['issues_concern'];
    $recommendation = $_POST['recommendation'];

    $geoint->setISR($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation);
}

if(isset($_POST['submit_edit_isr_button'])){
    $id = $_POST['isr_id'];
    $subject = $_POST['subject'];
    $isr_to = $_POST['isr_to'];
    $reference = $_POST['reference'];
    $background = $_POST['background'];
    $flight_details = $_POST['flight_details'];
    $result = $_POST['result'];
    $analysis = $_POST['analysis'];
    $assessment = $_POST['assessment'];
    $lesson_learned = $_POST['lesson_learned'];
    $best_practices = $_POST['best_practices'];
    $issues_concern = $_POST['issues_concern'];
    $recommendation = $_POST['recommendation'];

    $geoint->editIsrReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id);
}

if(isset($_GET['tol_record'])){
    $geoint->deleteTolRecord($_GET['tol_record']);
}

if(isset($_GET['userid'])){
    $geoint->selectedTol($_GET['userid']);
}

if(isset($_GET['isr_id'])){
    $geoint->selectedIsr($_GET['isr_id']);
}


?>