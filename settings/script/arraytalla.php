<?php
//inicializar
$arraytalla= null;
//

//modifica el array a text
$num_arraytalla = count($_POST['talla']);
$contador = 0;

if($num_arraytalla>0){
  foreach ($talla as $key => $value) {
    if ($contador != $num_arraytalla-1){
    $arraytalla .= $value.' ';
    $contador++;
    } else {
    $arraytalla .= $value;
    }
  }
}
?>
