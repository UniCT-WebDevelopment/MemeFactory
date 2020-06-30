<?php

session_start();
$dump=$_SESSION['pass'];


$files= scandir("works");

for ($a = 2; $a < count($files); $a++)
{
    $extension = pathinfo($files[$a], PATHINFO_EXTENSION);
    if($files[$a] !== ('small_worked.mp4') && $extension != ('txt') && $files[$a] == $dump)
    {
        
    ?>
    <p>
        <?php echo $files[$a]; ?>
        <a href="works/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
        <a href="delete.php?name=works/<?php echo $files[$a]; ?>" style="color: red;"> 
        Delete
        </a>
    </p>

    <?php
      
    
    }
  
}
session_destroy();


 




 ?>