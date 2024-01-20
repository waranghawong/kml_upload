<?php

class locations extends db{

    
    protected function add_location($name, $lat, $lng, $region_text, $province_text, $city_text, $barangay_text){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO markers (name, lat, lng, address,created_at) VALUES (?,?,?,?,?)');

        if(!$stmt->execute([$name, $lat, $lng,$region_text.' '.$barangay_text.' '.$city_text.' '.$province_text , $datetimetoday])){
            $stmt = null;
            header ("location: ../user-map.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../user-map.php');
        }
    
    }

    protected function get_saved_locations(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM markers");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            // return json_encode($stmt->fetchall());
            return $stmt->fetchall();
        }
    }

    protected function insertKMSFILE($file, $name, $description){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO kml_file (name, description, location ,created_at) VALUES (?,?,?,?)');

        if(!$stmt->execute([ $name, $description,$file, $datetimetoday])){
            $stmt = null;
            header ("location: ../index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../index.php');
        }

    }
    protected function getAllKMSFile(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM kml_file");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            // return json_encode($stmt->fetchall());
            return $stmt->fetchall();
        } 
    }
}





?>