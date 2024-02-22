<?php


class cadoClass extends db{


    protected function insertOsint($date, $acc, $pers, $issues, $others){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO osint (acc, personalities, issues, date,others,created_at) VALUES (?,?,?,?,?,?)');

        if(!$stmt->execute([$acc, $pers, $issues, $date, $others , $datetimetoday])){
            $stmt = null;
            header ("location: ../cado/index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../cado/index.php');
        }
    }

    protected function insertWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$imageFile){
        $datetimetoday = date("Y-m-d H:i:s");
        $connection = $this->dbOpen();
        $stmt = $connection->prepare('INSERT INTO wacom (full_name, alias, bday, address, position, affil, dir, others ,created_at) VALUES (?,?,?,?,?,?,?,?,?)');

        if(!$stmt->execute([$full_name, $alias, $bday, $address, $position, $affil,$imageFile, $others, $datetimetoday])){
            $stmt = null;
            header ("location: ../cado/index.php?errors=stmtfailed");
            exit();
        }
        else{
            header('location: ../cado/index.php');
        }
    }

    protected function getOsintRecord(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM osint");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        }
    }

    protected function getWacomRecord(){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM wacom");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchall();
        }
    }

    protected function getOsintId($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM osint Where id = ?");
        $stmt->execute([$id]);

        if($stmt->rowCount() > 0){
            return $stmt->fetch();
        }
    }

    protected function getWacomId($id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("SELECT * FROM wacom where id = ?");
        $stmt->execute([$id]);

        if($stmt->rowCount() > 0){
            return $stmt->fetch();
        }
    }

    protected function updateOsint($date, $acc, $pers, $issues, $others, $id){
        $connection = $this->dbOpen();
        $stmt = $connection->prepare("UPDATE osint SET date = ?, acc = ?, personalities = ?, issues = ?,others = ? WHERE id = ?");
        if(!$stmt->execute([$date, $acc, $pers, $issues, $others, $id])){
            $stmt = null;
            header("location: ../cado/index.php?errors=stmtfailed");
            exit();
        }
        header("location: ../cado/index.php?success=1");
    }

    protected function updateWacom($full_name, $alias, $bday, $address, $position, $affil, $others,$imageFile, $id){
        $connection = $this->dbOpen();
        if($imageFile == ''){
            $stmt = $connection->prepare("UPDATE wacom SET full_name = ?, alias = ?, bday = ?, address = ?, position = ?, affil = ?, others = ?  WHERE id = ?");
            if(!$stmt->execute([$full_name, $alias, $bday, $address, $position, $affil, $others, $id])){
                $stmt = null;
                header("location: ../cado/index.php?errors=stmtfailed");
                exit();
            }
            header("location: ../cado/index.php?success=1");
        }
        else{
            $stmt = $connection->prepare("UPDATE wacom SET full_name = ?, alias = ?, bday = ?, address = ?, position = ?, affil = ?, dir = ?, others = ?  WHERE id = ?");
            if(!$stmt->execute([$full_name, $alias, $bday, $address, $position, $affil, $others,$imageFile, $id])){
                $stmt = null;
                header("location: index.php?errors=stmtfailed");
                exit();
            }
            header("location: ../cado/index.php?success=1");
        }
   
    }

    

    
}


?>