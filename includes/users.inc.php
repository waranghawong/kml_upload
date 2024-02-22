<?php 
date_default_timezone_set('Asia/Manila');

include_once '../classes/db.php';
include_once '../classes/users.classes.php';
include_once '../classes/users-contrl.classes.php';

$users = new usersController();

$users->setUsers();


if(isset($_GET['delete_user'])){
    $users->deleteUser($_GET['delete_user']);
    
}

if(isset($_GET['userid'])){
    $users->getUser($_GET['userid']);
    
}

if(isset($_POST['btn_edit_submit'])){
   $user_id = $_POST['user_id'];
   $name = $_POST['name'];
   $username = $_POST['username'];
   $password =$_POST['password'];
   $code = $_POST['code'];
   $unit = $_POST['unit'];
   $age = $_POST['age'];
   $sex = $_POST['sex'];



   $users->updateUSer($name, $username, $password, $code, $unit, $age, $sex,$user_id);
    
}


?>