<?php
  //inicializar
  $arrayfoto=null;
  //
  $num_arrayfoto=count($_FILES["archivo"]['name']);
  $contador = 0;


  if($num_arrayfoto>0){
    $directorio='assets/archivos/files/'.$id.'/';
    foreach ($foto as $key => $value){
      if ($contador != $num_arrayfoto-1){
      $arrayfoto=$directorio .= $arrayfoto .= $value.' ';
      $contador++;
      } else {
      $arrayfoto=$directorio .= $arrayfoto .= $value;
      }
    }
  }
 ?>
