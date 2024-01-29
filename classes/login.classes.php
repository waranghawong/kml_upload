<?php

class Login extends DB {
    
    protected function getUser($username, $pwd){
        $con = $this->dbOpen();
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login.php?error=user_not_found");
            exit();
        }
       // var_dump($stmt->fetch());
        $password = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pass1 = md5($pwd);
        $pass = $password[0]['password'];
        if($pass != $pwd){
            $stmt = null;
            header("location: ../login.php?error=wrong_password");
            exit();
        } 

        elseif($pwd == $pass){
            $stmt = $con->prepare("SELECT *  FROM  users WHERE username = ? and password = ?");
            if(!$stmt->execute(array($username, $pwd))){
                $stmt = null;
                header("location: ../login.php?error=stmt_failed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login.php?errors=user_not_found");
                exit();
            }
                
            $user = $stmt->fetch();
            if($stmt->rowCount() > 0){
                var_dump($user['role']);
                if($user['role'] == 0){
                    $admin = new StartSession($user);
                    header("location: ../administrator/index.php");
                 
                }
                elseif($user['role'] == 1){
                    $admin = new StartSession($user);
                    header("location: ../geoint/index.php");
                }
                elseif($user['role'] == 2){
                        $admin = new StartSession($user);
                        header("location: ../sigint/index.php");
                }
                else{
                    $admin = new StartSession($user);
                    header("location: ../cado/index.php");
                }
        
            }
            else{
                header("location: ../login.php?error=UserNotFound");
            }
            
   
        }

        $stmt = null;
         
    }

    protected function insertRegisteredUser($first_name, $last_namme, $address, $contact, $email, $password){
        $pass = md5($password);
        $datetimetoday = date("Y-m-d H:i:s");
        $con = $this->dbOpen();
        $stmt = $con->prepare("INSERT INTO users (first_name, last_name, address, contact, email, password,created_at) VALUES (?,?,?,?,?,?,?) ");
        if(!$stmt->execute(array($first_name, $last_namme, $address, $contact, $email, $pass, $datetimetoday))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        header("location: ../login.php?success=for_approval");
    }

    protected function checkEmailExist($email){
        $resultCheck;
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");

        if(!$stmt->execute([$email])){
            $stmt = null;

            header("location: index.php?errors=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0 ){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }
}


?>