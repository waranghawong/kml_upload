<?php
  // $demofile = fopen('kml_files/eado06ivn5index.kml', 'r') or die('File cannot be opened!');
  // echo fread($demofile, filesize('kml_files/eado06ivn5index.kml'));
  // fclose($demofile);
  // $loc = $_POST['location'];
  if(isset($_GET['dir'])){
    exec('c:\WINDOWS\system32\cmd.exe /c START '.$_GET['dir'].'');
  }
?>