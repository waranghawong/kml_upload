<?php
  // $demofile = fopen('kml_files/eado06ivn5index.kml', 'r') or die('File cannot be opened!');
  // echo fread($demofile, filesize('kml_files/eado06ivn5index.kml'));
  // fclose($demofile);
  // $loc = $_POST['location'];
  // 

  if(isset($_POST['submit_files'])){
    

    foreach($_POST['check'] as $checkbox){
      if($checkbox){
        $a = substr($checkbox, 3);
        exec('c:\WINDOWS\system32\cmd.exe /c START '.$a.'');
        header("location: administrator/index.php");
      }
    }

  }


  $user_agent = getenv("HTTP_USER_AGENT");
  $os = '';
  if(strpos($user_agent, "Win") !== FALSE){
    if(isset($_GET['dir'])){
        exec('c:\WINDOWS\system32\cmd.exe /c START '.$_GET['dir'].'');
    }
  }
  elseif(strpos($user_agent, "Mac") !== FALSE){
    exec('open -a '.$_GET['dir'].'', $outputArray);
  }
  else{
    $os = 'linux';
  }

  echo $os;



?>