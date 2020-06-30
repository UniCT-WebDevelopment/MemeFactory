<?php

if(isset($_FILES["file"]["size"], $_FILES["file"]["type"]))
{
    //mi setto tutte le variabili
    $target_dir = "works/";
    $baseDir = dirname(__FILE__)."/";
    $concatPath= $baseDir."works/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = $_FILES["file"]["type"];
    $size = $_FILES["file"]["size"];

    
    function getRand($length)
          {
            $keys = array_merge(range('a', 'z'), range('0', '9')); $key = "";
            for($i=0; $i<$length; $i++) 
            {
               $key .= $keys[array_rand($keys)]; 
            }
              return $key;
          }

    if($check !== false && $videoFileType == "mp4")
    {
    
    $uploadOk = 1; 
    } else
            {
            $uploadOk = 0;
            }
  if ($uploadOk == 1)//controlla la variabile, se non ci sono flag, carica
  {  
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    copy('assets\small_worked.mp4', 'works\small_worked.mp4');
  } 
  else  {echo "il file non è stato caricato correttamente"."<br>"; }


  //prima chiamata exec a FFMEPG :setto il file in input con un nuovo timestamp
  $tempvideo=getRand(16).".mp4";
  $fTargetTemp = $target_dir."$tempvideo";
  exec("ffmpeg -i ".$target_file." -video_track_timescale 75 ".$fTargetTemp);


//crea file di testo temporaneo con le info che mi servono


$tmpconcList2 =getRand(16).'_output.txt';
$tmpconcPath=$concatPath.$tmpconcList2;
$tmpconcList1= fopen("$tmpconcPath","w");
fclose($tmpconcLists1);
$content = "file '".$tempvideo."'\n";
$content .= "file 'small_worked.mp4'\n";
file_put_contents($tmpconcPath, $content);
$pathList = $concatPath.$tmpconcList2;

//seconda chiamata exec per il concat FFMPEG

  $fOutput =getRand(16)."_output.mp4";
  $pOutput = $target_dir."$fOutput";
  $outPath = $concatPath."$fOutput";
  exec("ffmpeg -f concat -safe 0 -i ".$pathList." -c copy ".$outPath);

  //delete file 
  
  unlink($target_file);
  unlink($fTargetTemp);
  unlink($tmpconcPath);

  
//sessione
session_start();
$_SESSION['pass']= $fOutput;

  
  header('Location: http://localhost/MemeFactory/download.php') ;
 
  exit;
  

  /*   header di download per file mp4

  $file=$fOutput; 

   if(file_exists($file)) 
   {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    
  }*/
}


?>