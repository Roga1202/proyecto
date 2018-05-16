<?php
$options="";
if ($_POST["elegido"]=="Ropa intima") {
    $options= '
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
    <option value="3XL">3XL</option>
    <option value="4XL">4XL</option>
    <option value="5XL">5XL</option>
    <option value="6XL">6 XL</option>
    ';
}
if ($_POST["elegido"]=="Medias") {
    $options= '
    <option value="10">10</option>
    <option value="12">12</option>
    <option value="14">14</option>
    <option value="16">16</option>
    ';
}
if ($_POST["elegido"]=="Camisa") {
    $options= '
    <option value="SS">SS</option>
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
    <option value="3XL">3XL</option>
    <option value="4XL">4XL</option>
    ';
}
if ($_POST["elegido"]=="Pantalon") {
    $options= '
    <option value="0">0</option>
    <option value="2">2</option>
    <option value="4">4</option>
    <option value="6">6</option>
    <option value="8">8</option>
    <option value="10">10</option>
    <option value="12">12</option>
    <option value="14">14</option>
    <option value="16">16</option>
    <option value="18">18</option>
    <option value="20">20</option>
    <option value="22">22</option>
    <option value="24">24</option>
    <option value="26">26</option>
    <option value="28">28</option>
    <option value="30">30</option>
    <option value="32">32</option>
    <option value="34">34</option>
    <option value="36">36</option>
    <option value="38">38</option>
    <option value="40">40</option>
    <option value="42">42</option>
    <option value="44">44</option>
    <option value="46">46</option>
    <option value="48">48</option>
    <option value="50">50</option>
    ';
}
if ($_POST["elegido"]=="Pijamas") {
    $options= '
    <option value="SS">SS</option>
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
    <option value="3XL">3XL</option>
    <option value="4XL">4XL</option>
    ';
}
if ($_POST["elegido"]=="Traje de baño") {
    $options= '
    <option value="0">0</option>
    <option value="2">2</option>
    <option value="4">4</option>
    <option value="6">6</option>
    <option value="8">8</option>
    <option value="10">10</option>
    <option value="12">12</option>
    <option value="14">14</option>
    <option value="16">16</option>
    <option value="18">18</option>
    <option value="20">20</option>
    <option value="22">22</option>
    <option value="24">24</option>
    <option value="26">26</option>
    <option value="28">28</option>
    <option value="30">30</option>
    <option value="32">32</option>
    <option value="34">34</option>
    <option value="36">36</option>
    <option value="38">38</option>
    <option value="40">40</option>
    <option value="42">42</option>
    <option value="44">44</option>
    <option value="46">46</option>
    <option value="48">48</option>
    <option value="50">50</option>
    ';
}
if ($_POST["elegido"]=="Falda") {
    $options= '
    <option value="SS">SS</option>
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
    <option value="3XL">3XL</option>
    <option value="4XL">4XL</option>
    ';
}
if ($_POST["elegido"]=="Accesorios") {
    $options= '
    <option value="1">No posee</option>
    ';
}
if ($_POST["elegido"]=="Ropa intima nino") {
    $options= '
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
    <option value="3XL">3XL</option>
    <option value="4XL">4XL</option>
    <option value="5XL">5XL</option>
    <option value="6XL">6 XL</option>
    ';
}

echo $options;
?>
