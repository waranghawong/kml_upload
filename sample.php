<?php
  // $demofile = fopen('kml_files/eado06ivn5index.kml', 'r') or die('File cannot be opened!');
  // echo fread($demofile, filesize('kml_files/eado06ivn5index.kml'));
  // fclose($demofile);
  // $loc = $_POST['location'];
  // 

  $user_agent = getenv("HTTP_USER_AGENT");
  $os = '';
  if(strpos($user_agent, "Win") !== FALSE){
    if(isset($_GET['dir'])){
        exec('c:\WINDOWS\system32\cmd.exe /c START '.$_GET['dir'].'');
    }
  }
  elseif(strpos($user_agent, "Mac") !== FALSE){
    $os = "Mac";
  }
  else{
    $os = 'linux';
  }





?>