<?php 

class locationsCntrl extends locations{

    public function setlocations(){
        if(isset($_POST['add_location'])) {
            $name=  $_POST['name'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $region_text = $_POST['region_text'];
            $province_text = $_POST['province_text'];
            $city_text = $_POST['city_text'];
            $barangay_text = $_POST['barangay_text'];
            $this->add_location($name, $lat, $lng, $region_text, $province_text, $city_text, $barangay_text);
    
        }
    }

    public function get_locations(){
        return $this->get_saved_locations();
    }

    public function getAllMarkers(){
        $dom = new DOMDocument('1.0', 'UTF-8');

        // Creates the root KML element and appends it to the root document.
        $node = $dom->createElementNS('http://earth.google.com/kml/2.1', 'kml');
        $parNode = $dom->appendChild($node);

        // Creates a KML Document element and append it to the KML element.
        $dnode = $dom->createElement('Document');
        $docNode = $parNode->appendChild($dnode);

        // Creates the two Style elements, one for restaurant and one for bar, and append the elements to the Document element.
        $restStyleNode = $dom->createElement('Style');
        $restStyleNode->setAttribute('id', 'restaurantStyle');
        $restIconstyleNode = $dom->createElement('IconStyle');
        $restIconstyleNode->setAttribute('id', 'restaurantIcon');
        $restIconNode = $dom->createElement('Icon');
        $restHref = $dom->createElement('href', 'http://maps.google.com/mapfiles/kml/pal2/icon63.png');
        $restIconNode->appendChild($restHref);
        $restIconstyleNode->appendChild($restIconNode);
        $restStyleNode->appendChild($restIconstyleNode);
        $docNode->appendChild($restStyleNode);

        $barStyleNode = $dom->createElement('Style');
        $barStyleNode->setAttribute('id', 'barStyle');
        $barIconstyleNode = $dom->createElement('IconStyle');
        $barIconstyleNode->setAttribute('id', 'barIcon');
        $barIconNode = $dom->createElement('Icon');
        $barHref = $dom->createElement('href', 'http://maps.google.com/mapfiles/kml/pal2/icon27.png');
        $barIconNode->appendChild($barHref);
        $barIconstyleNode->appendChild($barIconNode);
        $barStyleNode->appendChild($barIconstyleNode);
        $docNode->appendChild($barStyleNode);

       // Iterates through the MySQL results, creating one Placemark for each row.

        foreach($this->get_saved_locations() as $row){
         
        //Creates a Placemark and append it to the Document.

        $node = $dom->createElement('Placemark');
        $placeNode = $docNode->appendChild($node);

        // Creates an id attribute and assign it the value of id column.
        $placeNode->setAttribute('id', 'placemark' . $row['id']);

        // Create name, and description elements and assigns them the values of the name and address columns from the results.
        $nameNode = $dom->createElement('name',htmlentities($row['name']));
        $placeNode->appendChild($nameNode);
        $descNode = $dom->createElement('description', $row['address']);
        $placeNode->appendChild($descNode);
        $styleUrl = $dom->createElement('styleUrl', '#' . $row['type'] . 'Style');
        $placeNode->appendChild($styleUrl);

        // Creates a Point element.
        $pointNode = $dom->createElement('Point');
        $placeNode->appendChild($pointNode);

        // Creates a coordinates element and gives it the value of the lng and lat columns from the results.
        $coorStr = $row['lng'] . ','  . $row['lat'];
        $coorNode = $dom->createElement('coordinates', $coorStr);
        $pointNode->appendChild($coorNode);
        }

        $kmlOutput = $dom->saveXML();
        header('Content-type: application/vnd.google-earth.kml+xml');
        echo $kmlOutput;
    }

    public function kmlOutput(){
        // Creates an array of strings to hold the lines of the KML file.
            $kml = array('<?xml version="1.0" encoding="UTF-8"?>');
            $kml[] = '<kml xmlns="http://earth.google.com/kml/2.1">';
            $kml[] = ' <Document>';
            $kml[] = ' <Style id="restaurantStyle">';
            $kml[] = ' <IconStyle id="restuarantIcon">';
            $kml[] = ' <Icon>';
            $kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon63.png</href>';
            $kml[] = ' </Icon>';
            $kml[] = ' </IconStyle>';
            $kml[] = ' </Style>';
            $kml[] = ' <Style id="barStyle">';
            $kml[] = ' <IconStyle id="barIcon">';
            $kml[] = ' <Icon>';
            $kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon27.png</href>';
            $kml[] = ' </Icon>';
            $kml[] = ' </IconStyle>';
            $kml[] = ' </Style>';

            // Iterates through the rows, printing a node for each row.
            foreach ($this->get_saved_locations() as $row) 
            {
            $kml[] = ' <Placemark id="placemark' . $row['id'] . '">';
            $kml[] = ' <name>' . htmlentities($row['name']) . '</name>';
            $kml[] = ' <description>' . htmlentities($row['address']) . '</description>';
            $kml[] = ' <styleUrl>#' . ($row['type']) .'Style</styleUrl>';
            $kml[] = ' <Point>';
            $kml[] = ' <coordinates>' . $row['lng'] . ','  . $row['lat'] . '</coordinates>';
            $kml[] = ' </Point>';
            $kml[] = ' </Placemark>';
            
            } 

            // End XML file
            $kml[] = ' </Document>';
            $kml[] = '</kml>';
            $kmlOutput = join("\n", $kml);
            header('Content-type: application/vnd.google-earth.kml+xml');
            echo $kmlOutput;
    }

    public function uploadKMS($file,$date, $company,$name, $position,$unit, $selector_name,$imsi, $imei,$time,$lac_cid, $address,$remarks){

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
                return $this->insertKMSFILE($target_file,$date, $company,$name, $position,$unit, $selector_name,$imsi, $imei,$time,$lac_cid, $address,$remarks);
              } else {
                header("location: ../index.php?error=there_was_a_problem_uploading_your_file");
              }
        }
       
       
    }

    public function insertRMD($date, $time, $frequency,$clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $grid){
        return $this->setRMD($date, $time, $frequency,$clarity, $direction,$subject, $callsign,$reciever, $fc ,$src ,$barangay_text, $city_text, $province_text, $grid);
    }

    function random_string($length = 10) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
    
        return $key;
    }

    public function getKMS(){
        return $this->getAllKMSFile();
    }

    public function getRMD(){
        return $this->getRmdRecord();
    }


}


?>