<?php


class geoIntClass extends db{


    protected function insertTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $target_file, $role){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO tol_area (date, time, uav, file_name, remarks, position, unit, address, kml_dir,created_at) VALUES (?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$date, $time, $uav, $name, $remarks, $position, $unit, $address, $target_file, $datetimetoday])){
            $stmt = null;
            header ("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header("location: ../administrator/geoint.php?success=tol_area");
            }
            else{
                header("location: ../geoint/index.php?success=tol_area");
            }
        }
    }

    protected function getSelectedTol($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM tol_area WHERE id = ?");
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

    protected function deleteTol($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM tol_area WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function deleteIsr($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM isr_report WHERE id = ?");
        $stmt->execute([$id]);
    }

    protected function deleProf($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("DELETE FROM profeciency_report WHERE id = ?");
        $stmt->execute([$id]);
    }

    

    protected function updateTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml, $id,$role){
        $connection = $this->dbOpen();
        if($address == '' && $upload_kml != ''){
           $stmt = $connection->prepare("UPDATE tol_area SET date = ?, time = ?, uav = ?, file_name = ?, remarks = ?, position = ?, unit = ?, kml_dir = ?WHERE id = ?");

            if(!$stmt->execute([$date, $time, $uav, $name, $remarks, $position, $unit , $upload_kml, $id])){

                $stmt = null;
                if($role == 'admin'){
                    header("location: ../administrator/geoint.php?errors=stmtfailed");
                    exit();
                }
                else{
                    header("location: ../geoint/index.php?errors=stmtfailed");
                    exit();
                }
            }
           
        }
        else if($upload_kml == '' && $address == ''){
            $stmt = $connection->prepare("UPDATE tol_area SET date = ?, time = ?, uav = ?, file_name = ?, remarks = ?, position = ?, unit = ? WHERE id = ?");

            if(!$stmt->execute([$date, $time, $uav, $name, $remarks, $position, $unit, $id])){

                $stmt = null;
                if($role == 'admin'){
                    header("location: ../administrator/geoint.php?errors=stmtfailed");
                    exit();
                }
                else{
                    header("location: ../geoint/index.php?errors=stmtfailed");
                    exit();
                }
            }
        }
        else if($upload_kml == '' && $address != ''){

            $stmt = $connection->prepare("UPDATE tol_area SET date = ?, time = ?, uav = ?, file_name = ?, remarks = ?, position = ?, unit = ?, address= ? WHERE id = ?");

            if(!$stmt->execute([$date, $time, $uav, $name, $remarks, $position, $unit,$address, $id])){

                $stmt = null;
                if($role == 'admin'){
                    header("location: ../administrator/geoint.php?errors=stmtfailed");
                    exit();
                }
                else{
                    header("location: ../geoint/index.php?errors=stmtfailed");
                    exit();
                }
            }
        }
       
      
        if($role == 'admin'){
            header("location: ../administrator/geoint.php?success=tol_area");
        }
        else{
            header("location: ../geoint/index.php?success=1");
        }
    }

    protected function insertISR($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$role){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO isr_report (subject, isr_to, reference, background, flight_details, result, analysis, assessment, lesson_learned, best_practices, issues_concern, recommendation ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $datetimetoday])){
            $stmt = null;
            header ("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?success=isr");
            }
            else{
                header('location: ../geoint/index.php?success=isr');
            }
        }
    }

    protected function insertProf($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $role){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO profeciency_report (subject, isr_to, reference, background, flight_details, result, analysis, assessment, lesson_learned, best_practices, issues_concern, recommendation ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $datetimetoday])){
            $stmt = null;
            header ("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?success=prof");
            }
            else{
                header('location: ../geoint/index.php?success=prof');
            }
        }
    }
    

    protected function getTolArea(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM tol_area");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        } 
    }
    
    protected function getIsrData(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM isr_report");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        } 
    }

    protected function getProfData(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM profeciency_report");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        } 
    }

    protected function getSelectedIsr($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM isr_report WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function getSelectedProf($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM profeciency_report WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        }
    }

    protected function updateIsrReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id,$role){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE isr_report SET subject = ?, isr_to = ?, reference = ?, background = ?, flight_details = ?, result = ?, analysis = ?, assessment = ?, lesson_learned = ?, best_practices = ?, issues_concern = ?, recommendation = ? WHERE id = ?");
        if(!$stmt->execute([$subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $id])){
            $stmt = null;

            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?errors=stmtfailed");
                exit();
            }
            else{
                header ("location: ../geoint/index.php?errors=stmtfailed");
                exit();
            }
          
        }
        else{
            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?success=isr");
            }
            else{
                header('location: ../geoint/index.php?success=isr');
            }
          
        }
    }

    protected function updateProfReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id,$role){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE profeciency_report SET subject = ?, isr_to = ?, reference = ?, background = ?, flight_details = ?, result = ?, analysis = ?, assessment = ?, lesson_learned = ?, best_practices = ?, issues_concern = ?, recommendation = ? WHERE id = ?");
        if(!$stmt->execute([$subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $id])){
            $stmt = null;

            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?errors=stmtfailed");
                exit();
            }
            else{
                header ("location: ../geoint/index.php?errors=stmtfailed");
                exit();
            }
          
        }
        else{
            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?success=prof");
            }
            else{
                header('location: ../geoint/index.php?success=prof');
            }
          
        }
    }
    protected function setUav($role, $quantity, $type_of_drone, $drone_number, $system_number, $flight_details, $battery_serial, $unit, $remark){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO tbl_uav (quantity, type_of_drone,system_number, drone_number, flight_details, battery_serial, unit, remarks ,created_at) VALUES (?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$quantity, $type_of_drone, $drone_number,$system_number, $flight_details, $battery_serial, $unit, $remark, $datetimetoday])){
            $stmt = null;
            header ("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
        else{
            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?success=uav");
            }
            else{
                header('location: ../geoint/index.php?success=uav');
            }
          
        }
    }

    protected function updateUav($role, $quantity, $type_of_drone, $system_number,$drone_number, $flight_details, $battery_serial, $unit, $remark,$id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE tbl_uav SET quantity =?, type_of_drone = ?,system_number = ?, drone_number = ? , flight_details = ?, battery_serial = ?, unit = ?, remarks =? WHERE id = ?");
        if(!$stmt->execute([$quantity, $type_of_drone, $system_number, $drone_number, $flight_details, $battery_serial, $unit, $remark,$id])){
            $stmt = null;

            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?errors=stmtfailed");
                exit();
            }
            else{
                header ("location: ../geoint/index.php?errors=stmtfailed");
                exit();
            }
          
        }
        else{
            if($role == 'admin'){
                header ("location: ../administrator/geoint.php?success=uav");
            }
            else{
                header('location: ../geoint/index.php?success=uav');
            }
          
        }
    }

    protected function getUavList(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM tbl_uav");
        $stmt->execute();

        $data = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0){
            return $data;
        }
        else{
            return false;
        } 
    }

    protected function getCurrentUavId($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM tbl_uav where id = ?");
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

    
}


?>