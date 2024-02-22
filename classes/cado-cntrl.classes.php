<?php 

class cadoCntrller extends cadoClass {

public function setOsint($date, $acc, $pers, $issues, $others){
    return $this->insertOsint($date, $acc, $pers, $issues, $others);
}

public function setWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$picture){

    $imageFile = $this->uploadImage($picture);

    return $this->insertWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$imageFile,$id);

}

public function editOsint($date, $acc, $pers, $issues, $others, $id){
    return $this->updateOsint($date, $acc, $pers, $issues, $others,$id);
}

public function editWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$picture, $id){
    $imageFile = '';
    if($picture != ''){
        $imageFile = null;
    }
    else{
        $imageFile = $this->uploadImage($picture);
    }


    return $this->updateWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$imageFile,$id);

}

public function osintRecord(){
    return $this->getOsintRecord();
}

public function wacomRecord(){
    return $this->getWacomRecord();
}

public function getCurrentOsint($id){
    echo json_encode($this->getOsintId($id));
}

public function getCurrentWacom($id){
    echo json_encode($this->getWacomId($id));
}


public function uploadImage($imageName){
    $target_dir = "../images/";
    $uploadErr = "";
    $target_file = $target_dir . basename($imageName["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(file_exists($target_file)) {
        $target_file  = $target_dir .$this->random_string(). basename($imageName["name"]);
        $uploadOk = 1;
    }
    
    $check = getimagesize($imageName["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    }
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

 

    if($imageName["size"] > 5000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($imageName["tmp_name"], $target_file)) {
           return $target_file;
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }

}


function random_string($length = 10) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
    
}



?>