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

    protected function insertKMSFILE($file,$date, $company,$name, $position,$unit, $selector_name,$imsi, $imei,$time,$lac_cid, $address,$remarks, $role){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO kml_file (name, company, address, position, unit, selector_name, imsi, imei, lac_cid, remarks,date, time ,dir ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([ $name, $company, $address, $position, $unit, $selector_name, $imsi, $imei,$lac_cid, $remarks, $date, $time,$file, $datetimetoday])){
            $stmt = null;
            header ("location: ../index.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header('location: ../administrator/index.php');
            }
            else{
                header('location: ../sigint/index.php');
            }
          
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

    protected function setRMD($date, $time, $frequency,$clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $grid, $role){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO rmd_record (frequency, clarity, direction, subject, callsign, reciever, fc, src, barangay, municipality, province, date,time , grid_coordinate ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$frequency, $clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $date, $time,$grid, $datetimetoday])){
            $stmt = null;
            header ("location: ../index.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header('location: ../administrator/index.php');
            }
            else{
                header('location: ../sigint/index.php');
            }
            
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

    protected function getSelectedRmd($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM rmd_record WHERE id = ?");
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

    protected function getSelectorRecord($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM kml_file WHERE id = ?");
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

    protected function getSelectedMiaId($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM mia WHERE id = ?");
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

    protected function getSelectedLibertyId($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM liberty WHERE id = ?");
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

    protected function setMia($target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity, $role){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO mia (target_name, phone_number, msisdn, imei, imsi, tmsi, operator, mia_call, mia_sms, identities, event, last_activity,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity, $datetimetoday])){
            $stmt = null;
            header ("location: ../administrator/geoint.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header('location: ../administrator/sigint.php');
            } 
            else{
                header('location: ../sigint/index.php');
            }
            
        }
    }

    protected function setLiberty($name, $sim, $supplier,$imsi, $imei,$model, $phone_number, $role){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO liberty (name, sim, supplier, liberty_imsi, liberty_imei, model, phone_number,created_at) VALUES (?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$name, $sim, $supplier,$imsi, $imei,$model, $phone_number, $datetimetoday])){
            $stmt = null;
            header ("location: ../administrator/index.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header('location: ../administrator/sigint.php');
            } 
            else{
                header('location: ../sigint/index.php');
            }
        }
    }

    protected function updateSelector($files,$date, $company,$name, $position,$unit, $selector_name,$imsi, $imei,$time,$lac_cid, $address,$remarks, $id, $role){
        $connection = $this->dbOpen();
       
        if($files != '' && $address != ''){
            $password = md5($password);
            $stmt = $connection->prepare("UPDATE kml_file SET name = ?, company = ?, address = ?, position = ?, unit = ?, selector_name = ?, imsi = ?, imei = ?, lac_cid = ?, remarks =? ,date = ?, time = ?,dir =? WHERE id = ?");
            if(!$stmt->execute([$name, $company,  $address, $position ,$unit, $selector_name, $imsi, $imei, $lac_cid, $remarks, $date, $time, $files, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
            if($role == 'admin'){
                header("location: ../administrator/sigint.php?success=1");
            }
            else{
                header("location: ../sigint/index.php?success=1");
            }
               

        }
        else if($address == " " && $files  != ''){
            $stmt = $connection->prepare("UPDATE kml_file SET name = ?, company = ?, position = ?, unit = ?, selector_name = ?, imsi = ?, imei = ?, lac_cid = ?, remarks =? ,date = ?, time = ?, dir = ? WHERE id = ?");
            if(!$stmt->execute([$name, $company, $position ,$unit, $selector_name, $imsi, $imei, $lac_cid, $remarks, $date, $time, $files, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
            if($role == 'admin'){
                header("location: ../administrator/sigint.php?success=1");
            }
            else{
                header("location: ../sigint/index.php?success=1");
            }
        }
        else if($address != '' && $files  == ''){
   
            $stmt = $connection->prepare("UPDATE kml_file SET name = ?, company = ?, address = ?, position = ?, unit = ?, selector_name = ?, imsi = ?, imei = ?, lac_cid = ?, remarks =? ,date = ?, time = ? WHERE id = ?");
            if(!$stmt->execute([$name, $company,  $address, $position ,$unit, $selector_name, $imsi, $imei, $lac_cid, $remarks, $date, $time, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
            if($role == 'admin'){
                header("location: ../administrator/sigint.php?success=1");
            }
            else{
                header("location: ../sigint/index.php?success=1");
            }

        }
        else{
            $stmt = $connection->prepare("UPDATE kml_file SET name = ?, company = ?, position = ?, unit = ?, selector_name = ?, imsi = ?, imei = ?, lac_cid = ?, remarks =? ,date = ?, time = ? WHERE id = ?");
            if(!$stmt->execute([$name, $company, $position ,$unit, $selector_name, $imsi, $imei, $lac_cid, $remarks, $date, $time, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
            if($role == 'admin'){
                header("location: ../administrator/sigint.php?success=1");
            }
            else{
                header("location: ../sigint/index.php?success=1");
            }
        }
    }

    protected function updateMia($target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity, $id, $role){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE mia SET target_name = ? , phone_number = ?, msisdn = ?, imei = ?, imsi = ?, tmsi = ?, operator = ?, mia_call = ?, mia_sms = ?, identities = ?, event = ?, last_activity = ? WHERE id = ?");
        if(!$stmt->execute([$target_name, $phone_number, $msisdn,$imei, $imsi,$tmsi, $operator,$call, $sms ,$identities ,$event, $last_activity, $id])){
            $stmt = null;
            header("location: index.php?errors=stmtfailed");
            exit();
        }
        if($role == 'admin'){
            header('location: ../administrator/sigint.php');
        } 
        else{
            header('location: ../sigint/index.php');
        }
    }

    protected function updateLiberty($name, $sim, $supplier,$imsi, $imei,$model, $phone_number, $id, $role){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE liberty SET name = ?, sim = ?, supplier = ?, liberty_imsi =?, liberty_imei = ?, model = ?, phone_number = ? WHERE id = ?");
        if(!$stmt->execute([$name, $sim, $supplier,$imsi, $imei,$model, $phone_number, $id])){
            $stmt = null;
            header("location: index.php?errors=stmtfailed");
            exit();
        }
        if($role == 'admin'){
            header('location: ../administrator/sigint.php');
        } 
        else{
            header('location: ../sigint/index.php');
        }
    }

    protected function removeCurrentSelector($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM kml_file WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function removeCurrentRmd($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM rmd_record WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function removeCurrentMia($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM mia WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function removeCurrentLiberty($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM liberty WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function updateRmd($date, $time, $frequency,$clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $grid, $id, $role,$address){
        $connection = $this->dbOpen();
        if($address == ''){
            $stmt = $connection->prepare("UPDATE rmd_record SET frequency =?, clarity=?, direction=?, subject=?, callsign=?, reciever=?, fc=?, src=?, date=?,time=? , grid_coordinate=? WHERE id = ?");
            if(!$stmt->execute([$frequency, $clarity, $direction,$subject, $callsign,$reciever, $fc ,$src, $date, $time,$grid, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
        }
        else{
            $stmt = $connection->prepare("UPDATE rmd_record SET frequency =?, clarity=?, direction=?, subject=?, callsign=?, reciever=?, fc=?, src=?, barangay=?, municipality=?, province=?, date=?,time=? , grid_coordinate=? WHERE id = ?");
            if(!$stmt->execute([$frequency, $clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $date, $time,$grid, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
        }

        if($role == 'admin'){
            header('location: ../administrator/sigint.php');
        } 
        else{
            header('location: ../sigint/index.php');
        }
    }
}





?>