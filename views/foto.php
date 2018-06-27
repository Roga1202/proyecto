<?php
if(file_exists($path)){
  $directorio = opendir($path);
  while ($archivo = readdir($directorio))
  {
    if (!is_dir($archivo)){
      echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";
      echo "$archivo <a href='#' class='delete' title='Ver Archivo Adjunto' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>";
      echo "<img src='files/$ref/$archivo' width='300' />";
    }
  }
}

?>

<!-- 	{% set path = '../archivos/files/' %}
  {{path}}e -->
