<?php 

class usersController extends userClass {
    public function setUsers(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $code = $_POST['code'];
            $unit = $_POST['unit'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
    
             $this->addUser($name, $username, $password,  $code, $unit, $age, $sex);
        }
    }

    public function getListofUsers(){
        return $this->listofUsers();
    }


 
}

?>