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

    public function deleteUser($id){
 
        $this->removeCurrentUser($id);
        return json_encode(array("statusCode"=>200));
    }

    public function getUser($id){
        echo json_encode($this->getCurrentUser($id));
  
    }

    public function updateUSer($name, $username, $password, $code, $unit, $age, $sex,$user_id){
        return $this->setUpdateUser($name, $username, $password, $code, $unit, $age, $sex,$user_id);
    }


 
}

?>