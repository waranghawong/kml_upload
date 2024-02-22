<?php


class geoIntClass extends db{


    protected function insertTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $target_file){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO tol_area (date, time, uav, file_name, remarks, position, unit, address, kml_dir,created_at) VALUES (?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$date, $time, $uav, $name, $remarks, $position, $unit, $address, $target_file, $datetimetoday])){
            $stmt = null;
            header ("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../geoint/index.php');
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

    protected function updateTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml, $id){
        $connection = $this->dbOpen();

        $stmt = $connection->prepare("UPDATE tol_area SET date = ?, time = ?, uav = ?, file_name = ?, remarks = ?, position = ?, unit = ?,  address = ?, kml_dir = ? WHERE id = ?");
        if(!$stmt->execute([$date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml, $id])){
            $stmt = null;
            header("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
            header("location: ../geoint/index.php?success=1");
    }

    protected function insertISR($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO isr_report (subject, isr_to, reference, background, flight_details, result, analysis, assessment, lesson_learned, best_practices, issues_concern, recommendation ,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $datetimetoday])){
            $stmt = null;
            header ("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../geoint/index.php');
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

    protected function updateIsrReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE isr_report SET subject = ?, isr_to = ?, reference = ?, background = ?, flight_details = ?, result = ?, analysis = ?, assessment = ?, lesson_learned = ?, best_practices = ?, issues_concern = ?, recommendation = ? WHERE id = ?");
        if(!$stmt->execute([$subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation, $id])){
            $stmt = null;
            header ("location: ../geoint/index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../geoint/index.php');
        }
    }

    
}


?>