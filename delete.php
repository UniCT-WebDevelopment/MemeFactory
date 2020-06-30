<?php
 
//del
unlink($_GET["name"]);
 
//reindirizzamento
header("Location: " . $_SERVER["HTTP_REFERER"]);

?>