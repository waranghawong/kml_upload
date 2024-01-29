<?php
class LoginContr extends Login{
    private $username;
    private $pwd;

    public function __construct($username, $pwd){
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header('location: ../index.php?error=emptyInput');
            exit();
        }

        $this->getUser($this->username, $this->pwd);
    }

    public function emptyInput(){
        $result;

        if(empty($this->username || empty($this->pwd))){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}

// class registerUserCntrlr extends Login{
//     private $first_name;
//     private $last_namme;
//     private $address;
//     private $contact;
//     private $username;
//     private $password;

//     public function __construct($first_name, $last_namme, $address , $contact, $username, $password){
//         $this->first_name = $first_name;
//         $this->last_namme = $last_namme;
//         $this->address = $address;
//         $this->contact = $contact;
//         $this->username = $username;
//         $this->password = $password;
//     }

//     public function regUser(){
//         if($this->verifyusername($this->username) == true){
//             header('location: ../login.php?error=username-already-exist');
//             exit();
//         }
//         else{
//             $this->insertRegisteredUser($this->first_name, $this->last_namme, $this->address, $this->contact, $this->username, $this->password);
//         }
       
//     }

//     public function verifyusername($username){
//         $result;

//         if($this->checkusernameExist($username) == false){
//             $result = false;
//         }
//         else{
//             $result = true;
//         }
//         return $result;
        
//     }
// }