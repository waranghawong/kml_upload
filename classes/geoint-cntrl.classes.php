<?php 

class geoIntCntrller extends geoIntClass {

    public function setTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $file){
        

        $target_dir = "../kml_files/";
        if ($file['name'] == trim($file['name']) && str_contains($file['name'], ' ')) {
            $new_name = str_replace(' ', '_', $file['name']);

            $target_file =  $target_dir . basename($new_name);
        }
        else{
            $target_file =  $target_dir . basename($file["name"]);
        }
        

       
        $uploadOk = 1;

        if(file_exists($target_file)) {
            $target_file  = $target_dir .$this->random_string(). basename($file["name"]);
            $uploadOk = 1;
        }

        if($uploadOk = 1){
            
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // echo "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.";
                return $this->insertTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $target_file);
              } else {
                echo 'sadfawefawef';
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


    public function setISR($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation){

        return $this->insertISR($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation);

    }

    public function editTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml, $id){
        if($upload_kml == ''){
            return $this->updateTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, null, $id);
        }
        else{
            $target_dir = "../kml_files/";
            if ($file['name'] == trim($file['name']) && str_contains($file['name'], ' ')) {
                $new_name = str_replace(' ', '_', $file['name']);
    
                $target_file =  $target_dir . basename($new_name);
            }
            else{
                $target_file =  $target_dir . basename($file["name"]);
            }
            
    
           
            $uploadOk = 1;
    
            if(file_exists($target_file)) {
                $target_file  = $target_dir .$this->random_string(). basename($file["name"]);
                $uploadOk = 1;
            }
    
            if($uploadOk = 1){
                
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.";
                    return $this->updateTolArea($date, $time, $uav, $name, $remarks, $position, $unit, $address, $upload_kml, $id);
                  } else {
                    header("location: ../index.php?error=there_was_a_problem_uploading_your_file");
                  }
            }
        }
       
        
    }

    public function editIsrReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id){
        return $this->updateIsrReport($subject, $isr_to, $reference, $background, $flight_details, $result, $analysis,$assessment, $lesson_learned, $best_practices, $issues_concern, $recommendation,$id);
    }

    public function tolArea(){
       return $this->getTolArea();
    }

    public function isrData(){
        return $this->getIsrData();
     }

    public function selectedTol($id){
        echo json_encode($this->getSelectedTol($id));
    }

    public function deleteTolRecord($id){
        $this->deleteTol($id);
        return json_encode(array("statusCode"=>200));
    }

    public function selectedIsr($id){
        echo json_encode($this->getSelectedIsr($id));
    }
}
?>