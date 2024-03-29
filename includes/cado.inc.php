<?php
include '../classes/db.php';
include '../classes/cado.classes.php';
include '../classes/cado-cntrl.classes.php';

$cado = new cadoCntrller();

if(isset($_POST['submit_osint'])){
    $role = $_POST['role'];
    $date = $_POST['date'];
    $acc = $_POST['acc'];
    $pers = $_POST['personalities'];
    $issues = $_POST['issues'];
    $others = $_POST['others_data'];

    $cado->setOsint($date, $acc, $pers, $issues, $others, $role);
}

if(isset($_POST['submit_wacom'])){
    $role = $_POST['role'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $alias = $_POST['alias'];
    $bday = $_POST['bday'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $affil = $_POST['affil'];
    $others = $_POST['others'];
    $picture = $_FILES['picture'];

    $full_name = $first_name.' '.$last_name;
    var_dump($role);

     $cado->setWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$picture, $role);
}

if(isset($_POST['edit_submit_osint'])){
    
    $role = $_POST['user_role'];
    $id = $_POST['osint_id'];
    $date = $_POST['date'];
    $acc = $_POST['acc'];
    $pers = $_POST['personalities'];
    $issues = $_POST['issues'];
    $others = $_POST['others_data'];

    $cado->editOsint($date, $acc, $pers, $issues, $others,$role, $id);
}

if(isset($_POST['edit_submit_wacom'])){
    $id = $_POST['wacom_id'];
    $role = $_POST['user_role'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $alias = $_POST['alias'];
    $bday = $_POST['bday'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $affil = $_POST['affil'];
    $others = $_POST['others'];
    $picture = $_FILES['picture'];

    $full_name = $first_name.' '.$last_name;

    $cado->editWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$picture,$role, $id);
}

if(isset($_GET['osint_id'])){

     $cado->getCurrentOsint($_GET['osint_id']);
}
if(isset($_GET['wacom_id'])){
    $cado->getCurrentWacom($_GET['wacom_id']);
}

if(isset($_GET['delete_osint'])){

    $cado->delCurrentOsint($_GET['delete_osint']);
}
if(isset($_GET['delete_wacom'])){
   $cado->delCurrentWacom($_GET['delete_wacom']);
}



?>