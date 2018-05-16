<?php
//inicializar
$PR_arraytalla= null;
//

//modifica el array a text
$num_arraytalla = count($_POST['talla']);
$contador = 0;

if($num_arraytalla>0){
  foreach ($PR_talla as $key => $value) {
    if ($contador != $num_arraytalla-1){
    $PR_arraytalla .= $value.' ';
    $contador++;
    } else {
    $PR_arraytalla .= $value;
    }
  }
}
?>
