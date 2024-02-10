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

    protected function insertKMSFILE($file,$date, $company,$name, $position,$unit, $selector_name,$imsi, $imei,$time,$lac_cid, $address,$remarks){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO kml_file (name, company, address, position, unit, selector_name, imsi, imei, lac_cid, remarks,date, time ,dir ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([ $name, $company, $address, $position, $unit, $selector_name, $imsi, $imei,$lac_cid, $remarks, $date, $time,$file, $datetimetoday])){
            $stmt = null;
            header ("location: ../index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../administrator/index.php');
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

    protected function setRMD($date, $time, $frequency,$clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $grid){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO rmd_record (frequency, clarity, direction, subject, callsign, reciever, fc, src, barangay, municipality, province, date,time , grid_coordinate ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$frequency, $clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $date, $time,$grid, $datetimetoday])){
            $stmt = null;
            header ("location: ../index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../administrator/index.php');
        }
    }

    protected function getRmdRecord(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM rmd_record");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        }
    }

    protected function getMiaRecord(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM mia");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        }
    }

    protected function getLibertyRecord(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM liberty");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        }
    }

    protected function setMia($target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO mia (target_name, phone_number, msisdn, imei, imsi, tmsi, operator, mia_call, mia_sms, identities, event, last_activity,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity, $datetimetoday])){
            $stmt = null;
            header ("location: ../administrator/geoint.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../administrator/geoint.php');
        }
    }

    protected function setLiberty($name, $sim, $supplier,$imsi, $imei,$model, $phone_number){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO liberty (name, sim, supplier, liberty_imsi, liberty_imei, model, phone_number,created_at) VALUES (?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$name, $sim, $supplier,$imsi, $imei,$model, $phone_number, $datetimetoday])){
            $stmt = null;
            header ("location: ../administrator/index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../administrator/sigint.php');
        }
    }
}





?>