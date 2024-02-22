
<?php
  // $demofile = fopen('kml_files/eado06ivn5index.kml', 'r') or die('File cannot be opened!');
  // echo fread($demofile, filesize('kml_files/eado06ivn5index.kml'));
  // fclose($demofile);
  // $loc = $_POST['location'];
  // 

  if($_SERVER['HTTP_HOST'] == "localhost"){
    if(isset($_POST['submit_files'])){
    
      foreach($_POST['check'] as $checkbox){
        if($checkbox){
  
          $a = substr($checkbox, 3);
          opendir('\\\192.168.100.221\xampp\htdocs/kml_upload\kml_files\\'.$a.'', 'r');
          //exec('c:\WINDOWS\system32\cmd.exe /c START '.$a.'');

       
        }
      }
  
    }
  }
  else{
    if(isset($_POST['submit_files'])){
      echo 'hello world';
      execInBackground('start cmd.exe @cmd /k "ping google.com"');
      shell_exec('start cmd.exe @cmd /k "ping google.com"');
      //exec('c:\WINDOWS\system32\cmd.exe START \\192.168.10.217\xampp\htdocs\kml\kml_files\5_6145352096037211692.kml');
      // opendir('\\\\192.168.10.217\\xampp\\htdocs\\kml\\kml_files\\5_6145352096037211692.kml');
      // foreach($_POST['check'] as $checkbox){
      //   if($checkbox){

      //      $a = substr($checkbox, 13);
      //     //shell_exec('c:\WINDOWS\system32\cmd.exe @cmd /k \\\192.168.100.221\xampp\htdocs\kml_upload\kml_files\\'.$a.'');
      //   
      //   }
      // }
    }
  }

  


  function execInBackground($cmd) { 
    if (substr(php_uname(), 0, 7) == "Windows"){ 
        pclose(popen("start /B ". $cmd, "r"));  
    } 
    else { 
        exec($cmd . " > /dev/null &");   
    } 
}

  // $user_agent = getenv("HTTP_USER_AGENT");
  // $os = '';
  // if(strpos($user_agent, "Win") !== FALSE){
  //   if(isset($_GET['dir'])){
  //       
  //   }
  // }
  // elseif(strpos($user_agent, "Mac") !== FALSE){
  //   exec('open -a '.$_GET['dir'].'', $outputArray);
  // }
  // else{
  //   $os = 'linux';
  // }

  // echo $os;



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<button onclick="openCMD()">Open CMD</button>
<script>
function openCMD() {
  console.log('hello world');
  window.open("https://www.w3schools.com");
  //window.open("\\192.168.10.217\xampp\htdocs\kml\kml_files\3q7rrfq92w428129319_405696565448066_1840518164740996938_n.jpg");

}
</script>
</body>
</html>

