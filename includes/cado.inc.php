<?php
include '../classes/db.php';
include '../classes/cado.classes.php';
include '../classes/cado-cntrl.classes.php';

$cado = new cadoCntrller();

if(isset($_POST['submit_osint'])){
    $date = $_POST['date'];
    $acc = $_POST['acc'];
    $pers = $_POST['personalities'];
    $issues = $_POST['issues'];
    $others = $_POST['others_data'];

    $cado->setOsint($date, $acc, $pers, $issues, $others);
}

if(isset($_POST['submit_wacom'])){
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

    $cado->setWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$picture);
}

if(isset($_POST['edit_submit_osint'])){
    $id = $_POST['osint_id'];
    $date = $_POST['date'];
    $acc = $_POST['acc'];
    $pers = $_POST['personalities'];
    $issues = $_POST['issues'];
    $others = $_POST['others_data'];

    $cado->editOsint($date, $acc, $pers, $issues, $others, $id);
}

if(isset($_POST['edit_submit_wacom'])){
    $id = $_POST['wacom_id'];
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

    $cado->editWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$picture, $id);
}

if(isset($_GET['osint_id'])){

     $cado->getCurrentOsint($_GET['osint_id']);
}
if(isset($_GET['wacom_id'])){
    $cado->getCurrentWacom($_GET['wacom_id']);
}


?>