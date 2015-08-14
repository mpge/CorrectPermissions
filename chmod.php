<?php

function chmod_r($Path) {
    $dp = opendir($Path);
     while($File = readdir($dp)) {
       if($File != "." AND $File != "..") {
         if(is_dir($File)){
            echo 'chmod '.$Path.'/'.$File.' to 0750<br>';
            chmod($File, 0750);
            chmod_r($Path."/".$File);
         }else{
             echo 'chmod '.$Path.'/'.$File.' to 0644<br>';
             chmod($Path."/".$File, 0644);
         }
       }
     }
   closedir($dp);
}

$current_dir = getcwd();
chmod_r($current_dir);

?>
