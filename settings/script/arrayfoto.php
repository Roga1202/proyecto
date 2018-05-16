<?php
  //inicializar
  $PR_arrayfoto=null;
  //
  $num_arrayfoto=count($_FILES["archivo"]['name']);
  $contador = 0;


  if($num_arrayfoto>0){
    $directorio='C:/xampp/htdocs/Vista_ElSurtidor/private/base_de_datos/files/'.$PR_referencia.'/';
    foreach ($PR_foto as $key => $value){
      if ($contador != $num_arrayfoto-1){
      $PR_arrayfoto=$directorio .= $PR_arrayfoto .= $value.' ';
      $contador++;
      } else {
      $PR_arrayfoto=$directorio .= $PR_arrayfoto .= $value;
      }
    }
  }
 ?>
