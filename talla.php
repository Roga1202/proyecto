<?php
$options="";
if ($_POST["elegido"]=="Ropa intima") {
    $options= '
    <option value="1">4</option>
    <option value="2">5</option>
    <option value="3">7</option>
    <option value="4">21</option>
    <option value="5">Scennic</option>
    <option value="6">Traffic</option>
    ';
}
if ($_POST["elegido"]=="Medias") {
    $options= '
    <option value="1">Ibiza</option>
    <option value="2">Toledo</option>
    <option value="3">Cordoba</option>
    <option value="4">Arosa</option>
    ';
}
if ($_POST["elegido"]=="Prendas de vestir") {
    $options= '
    <option value="1">106</option>
    <option value="2">206</option>
    <option value="3">306</option>
    ';
}
if ($_POST["elegido"]=="Pijamas") {
    $options= '
    <option value="1">106</option>
    <option value="2">206</option>
    <option value="3">306</option>
    ';
}
if ($_POST["elegido"]=="Traje de baño") {
    $options= '
    <option value="1">106</option>
    <option value="2">206</option>
    <option value="3">306</option>
    ';
}
if ($_POST["elegido"]=="Accesorios") {
    $options= '
    <option value="1">NO POSEE</option>
    ';
}

echo $options;
?>
