<?php

$file_permissions = 0644;
$dir_permissions = 0750;

function chmod_r($Path, $file_permissions, $dir_permissions) {
    $dp = opendir($Path);
     while($File = readdir($dp)) {
       if($File != "." AND $File != "..") {
         if(is_dir($File)){
            echo 'chmod '.$Path.'/'.$File.' to 0750<br>';
            chmod($File, $dir_permissions);
            chmod_r($Path."/".$File);
         }else{
             echo 'chmod '.$Path.'/'.$File.' to 0644<br>';
             chmod($Path."/".$File, $file_permissions);
         }
       }
     }
   closedir($dp);
}

$current_dir = getcwd();
chmod_r($current_dir, $file_permissions, $dir_permissions);

?>
