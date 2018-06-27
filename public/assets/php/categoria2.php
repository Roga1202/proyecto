<?php
$options="";
var_dump($_POST);
if ($_POST["elegido"]=="Dama") {
    $options= '
    <option value="Ropa intima">Ropa intima</option>
    <option value="Medias">Medias</option>
    <option value="Camisa">Camisa</option>
    <option value="Pantalon">Pantalon</option>
    <option value="Falda">Falda</option>
    <option value="Pijama">Pijama</option>
    <option value="Traje de Baño">Traje de Baño</option>
    <option value="Accesorio">Accesorio</option>
    ';
}
if ($_POST["elegido"]=="Caballero") {
    $options= '
    <option value="Ropa intima">Ropa intima</option>
    <option value="Medias">Medias</option>
    <option value="Camisa">Camisa</option>
    <option value="Pantalon">Pantalon</option>
    <option value="Pijama">Pijama</option>
    <option value="Traje de Baño">Traje de Baño</option>
    <option value="Accesorio">Accesorio</option>
    ';
}
if ($_POST["elegido"]=="Ninos") {
    $options= '
    <option value="Ropa intima">Ropa intima</option>
    <option value="Medias">Medias</option>
    <option value="Camisa">Camisa</option>
    <option value="Pantalon">Pantalon</option>
    <option value="Falda">Falda</option>
    <option value="Pijama">Pijama</option>
    <option value="Traje de Baño">Traje de Baño</option>
    <option value="Accesorio">Accesorio</option>
    ';
}
if ($_POST["elegido"]=="Bebes") {
    $options= '
    <option value="Medias">Medias</option>
    <option value="Conunto">Conjunto</option>
    <option value="Pijama">Pijama</option>
    <option value="Accesorio">Accesorio</option>
    ';
}
if ($_POST["elegido"]=="Hogar") {
    $options= '
    <option value="Toallas">Toallas</option>
    ';
}
if ($_POST["elegido"]=="Otros") {
    $options= '
    <option value="Otros">Otros</option>
    ';
}

echo $options;
?>
