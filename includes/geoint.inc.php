<?php
include '../classes/db.php';
include '../classes/geoint.classes.php';
include '../classes/geoint-cntrl.classes.php';

$geoint = new geoIntCntrller();

if(isset($_POST['submit_tol_area'])){
    $date = $_POST['date'];
    $role = $_POST['role'];
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

    $geoint->setTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml,$role);
}

if(isset($_POST['submit_edit_tol_area'])){
    $id = $_POST['tol_id'];
    $role = $_POST['role'];
    $date = $_POST['edit_date'];
    $time = $_POST['edit_time'];
    $uav = $_POST['uav'];
    $name = $_POST['edit_name'];
    $remarks = $_POST['edit_remarks'];
    $position = $_POST['edit_position'];
    $unit = $_POST['edit_unit'];
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



    $geoint->editTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml, $id,$role);
}

if(isset($_POST['submit_isr_button'])){
    $subject = $_POST['subject'];
    $isr_to = $_POST['isr_to'];
    $role = $_POST['role'];
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

    $geoint->setISR($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $role);
}

if(isset($_POST['submit_edit_isr_button'])){
    $id = $_POST['isr_id'];
    $role = $_POST['role'];
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

    $geoint->editIsrReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id,$role);
}

if(isset($_POST['submit_edit_prof_button'])){
    $id = $_POST['isr_id'];
    $role = $_POST['role'];
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

    $geoint->editProfReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id,$role);
}



if(isset($_POST['submit_prof_button'])){

    $role = $_POST['role'];
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

    $geoint->setProf($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $role);
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

if(isset($_GET['prof_id'])){
    $geoint->selectedProf($_GET['prof_id']);
}

if(isset($_POST['submit_uav'])){
    $role = $_POST['role'];
    $quantity = $_POST['quantity'];
    $type_of_drone = $_POST['type_of_drone'];
    $system_number = $_POST['system_number'];
    $drone_number = $_POST['drone_number'];
    $flight_details = $_POST['flight_details'];
    $battery_serial = $_POST['battery_serial'];
    $unit = $_POST['unit'];
    $remark = $_POST['remark'];

    $geoint->addUav($role, $quantity, $type_of_drone,$system_number, $drone_number, $flight_details, $battery_serial, $unit, $remark);
}
if(isset($_POST['submit_edit_uav_button'])){
    $role = $_POST['role'];
    $id = $_POST['uav_id'];
    $quantity = $_POST['quantity'];
    $type_of_drone = $_POST['type_of_drone'];
    $system_number = $_POST['system_number'];
    $drone_number = $_POST['drone_number'];
    $flight_details = $_POST['flight_details'];
    $battery_serial = $_POST['battery_serial'];
    $unit = $_POST['unit'];
    $remark = $_POST['remark'];

    $geoint->editUav($role, $quantity, $type_of_drone,$system_number, $drone_number, $flight_details, $battery_serial, $unit, $remark,$id);
}

if(isset($_GET['uav_id'])){
    $geoint->getUavId($_GET['uav_id']);
}

if(isset($_GET['delete_isr'])){
    $geoint->delCurrentIsr($_GET['delete_isr']);
}

if(isset($_GET['delete_prof'])){
    $geoint->delCurrentProf($_GET['delete_prof']);
}


?>