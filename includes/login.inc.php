<?php 
include "../classes/session.class.php";
include '../classes/db.php';
include '../classes/login.classes.php';
include '../classes/logincntrl.classes.php';

if(isset($_POST["btn_submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = new LoginContr($username, $password);
    $login->loginUser();
}




?>