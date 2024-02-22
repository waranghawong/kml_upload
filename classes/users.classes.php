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

    protected function removeCurrentUser($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function getCurrentUser($id){
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

    protected function setUpdateUser($name, $username, $password, $code, $unit, $age, $sex,$user_id){
        $connection = $this->dbOpen();
        if($password != ''){
            $password = md5($password);
            $stmt = $connection->prepare("UPDATE users SET name = ?, username = ?, password = ?, role = ?, code = ?, age = ?, sex = ? WHERE id = ?");
            if(!$stmt->execute([$name, $username,  $password, $unit ,$code, $age, $sex, $user_id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
                header("location: ../administrator/users.php?success=1");

        }
        else{
   
            $stmt = $connection->prepare("UPDATE users SET name = ?, username = ?, role = ?, code = ?, age = ?, sex = ? WHERE id = ?");
            if(!$stmt->execute([$name, $username, $unit ,$code, $age, $sex, $user_id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
                header("location: ../administrator/users.php?success=1");

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