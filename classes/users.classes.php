<?php

class userClass extends DB{

    protected function addUser($name, $username, $password,  $code, $unit, $age, $sex){
        $datetimetoday = date("Y-m-d H:i:s");
        $password = md5($password);
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO users (name, username, password, role, code, age, sex, created_at) VALUES (?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$name, $username, $password,  $unit, $code, $age, $sex, $datetimetoday])){
            $stmt = null;
            header("location: ../administrator/index.php?errors=stmtfailed");
            exit();
        }
            header("location: ../administrator/users.php");

        
    }

    protected function listofUsers(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM users WHERE role != 0" );
        $stmt->execute();

        $users = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $users;
        }
        else{
            return false;
        }
    }

    protected function delAdmin($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function subAdmin($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function editSubAdmin($first_name, $last_name, $password, $email, $address, $account_restriction, $subject_restriction, $records_restriction, $sms_restriction, $barcode_restriction, $id){
        $connection = $this->dbOpen();
        if($password != ''){
            $password = md5($password);
            $stmt = $connection->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, address = ?, password = ?, accounts_settings = ?, subject_setting = ?,  records_setting = ?, sms_setting = ?,barcode_setting = ? WHERE id = ?");
            if(!$stmt->execute([$first_name, $last_name, $email,  $address, $password ,$account_restriction, $subject_restriction, $records_restriction, $sms_restriction, $barcode_restriction, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
                header("location: ../admin_page/users.php?success=1");

        }
        else{
   
            $stmt = $connection->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, address = ?, accounts_settings = ?, subject_setting = ?,  records_setting = ?, sms_setting = ?,barcode_setting = ? WHERE id = ?");
            if(!$stmt->execute([$first_name, $last_name, $email,  $address, $account_restriction, $subject_restriction, $records_restriction, $sms_restriction, $barcode_restriction, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
                header("location: ../admin_page/users.php?success=1");

        }

     
    }

    protected function getCurrentSchoolYear(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT school_year FROM school_year ORDER BY id DESC LIMIT 1");
        $stmt->execute();

        $data = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
    }



}



?>