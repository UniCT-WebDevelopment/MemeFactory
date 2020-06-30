<?php

$files = glob('*.mp4*'); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file); 
}


//header('Location: http://localhost/esempio2/download.php') ;
exit;


?>