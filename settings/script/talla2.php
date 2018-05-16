<?php
$options="";
if ($_POST["elegido"]=="Ropa intima") {
    $options= '
    <option value="S" <?php if(strpos($row['PR_talla'], "S")!== false) echo 'selected'; ?>>S</option>
    <option value="M" <?php if(strpos($row['PR_talla'], "M")!== false) echo 'selected'; ?>>M</option>
    <option value="L" <?php if(strpos($row['PR_talla'], "L")!== false) echo 'selected'; ?>>L</option>
    <option value="XL" <?php if(strpos($row['PR_talla'], "XL")!== false) echo 'selected'; ?>>XL</option>
    <option value="XXL" <?php if(strpos($row['PR_talla'], "XXL")!== false) echo 'selected'; ?>>XXL</option>
    <option value="3XL" <?php if(strpos($row['PR_talla'], "3XL")!== false) echo 'selected'; ?>>3XL</option>
    <option value="4XL" <?php if(strpos($row['PR_talla'], "4XL")!== false) echo 'selected'; ?>>4XL</option>
    <option value="5XL" <?php if(strpos($row['PR_talla'], "5XL")!== false) echo 'selected'; ?>>5XL</option>
    <option value="6XL" <?php if(strpos($row['PR_talla'], "6XL")!== false) echo 'selected'; ?>>6XL</option>
    ';
}
if ($_POST["elegido"]=="Medias") {
    $options= '
    <option value="10" <?php if(strpos($row['PR_talla'], "10")!== false) echo 'selected'; ?>>10</option>
    <option value="12" <?php if(strpos($row['PR_talla'], "12")!== false) echo 'selected'; ?>>12</option>
    <option value="14" <?php if(strpos($row['PR_talla'], "14")!== false) echo 'selected'; ?>>14</option>
    <option value="16" <?php if(strpos($row['PR_talla'], "16")!== false) echo 'selected'; ?>>16</option>
    ';
}
if ($_POST["elegido"]=="Camisa") {
    $options= '
    <option value="SS" <?php if(strpos($row['PR_talla'], "SS")!== false) echo 'selected'; ?>>SS</option>
    <option value="S" <?php if(strpos($row['PR_talla'], "S")!== false) echo 'selected'; ?>>S</option>
    <option value="M" <?php if(strpos($row['PR_talla'], "M")!== false) echo 'selected'; ?>>M</option>
    <option value="L" <?php if(strpos($row['PR_talla'], "L")!== false) echo 'selected'; ?>>L</option>
    <option value="XL" <?php if(strpos($row['PR_talla'], "XL")!== false) echo 'selected'; ?>>XL</option>
    <option value="XXL" <?php if(strpos($row['PR_talla'], "XXL")!== false) echo 'selected'; ?>>XXL</option>
    <option value="3XL" <?php if(strpos($row['PR_talla'], "3XL")!== false) echo 'selected'; ?>>3XL</option>
    <option value="4XL" <?php if(strpos($row['PR_talla'], "4XL")!== false) echo 'selected'; ?>>4XL</option>
    ';
}
if ($_POST["elegido"]=="Pantalon") {
    $options= '
    <option value="0" <?php if(strpos($row['PR_talla'], "0")!== false) echo 'selected'; ?>>0</option>
    <option value="2" <?php if(strpos($row['PR_talla'], "2")!== false) echo 'selected'; ?>>2</option>
    <option value="4" <?php if(strpos($row['PR_talla'], "4")!== false) echo 'selected'; ?>>4</option>
    <option value="6" <?php if(strpos($row['PR_talla'], "6")!== false) echo 'selected'; ?>>6</option>
    <option value="8" <?php if(strpos($row['PR_talla'], "8")!== false) echo 'selected'; ?>>8</option>
    <option value="10" <?php if(strpos($row['PR_talla'], "10")!== false) echo 'selected'; ?>>10</option>
    <option value="12" <?php if(strpos($row['PR_talla'], "12")!== false) echo 'selected'; ?>>12</option>
    <option value="14" <?php if(strpos($row['PR_talla'], "14")!== false) echo 'selected'; ?>>14</option>
    <option value="16" <?php if(strpos($row['PR_talla'], "16")!== false) echo 'selected'; ?>>16</option>
    <option value="18" <?php if(strpos($row['PR_talla'], "18")!== false) echo 'selected'; ?>>18</option>
    <option value="20" <?php if(strpos($row['PR_talla'], "20")!== false) echo 'selected'; ?>>20</option>
    <option value="22" <?php if(strpos($row['PR_talla'], "22")!== false) echo 'selected'; ?>>22</option>
    <option value="24" <?php if(strpos($row['PR_talla'], "24")!== false) echo 'selected'; ?>>24</option>
    <option value="26" <?php if(strpos($row['PR_talla'], "26")!== false) echo 'selected'; ?>>26</option>
    <option value="28" <?php if(strpos($row['PR_talla'], "28")!== false) echo 'selected'; ?>>28</option>
    <option value="30" <?php if(strpos($row['PR_talla'], "30")!== false) echo 'selected'; ?>>30</option>
    <option value="32" <?php if(strpos($row['PR_talla'], "32")!== false) echo 'selected'; ?>>32</option>
    <option value="34" <?php if(strpos($row['PR_talla'], "34")!== false) echo 'selected'; ?>>34</option>
    <option value="36" <?php if(strpos($row['PR_talla'], "36")!== false) echo 'selected'; ?>>36</option>
    <option value="38" <?php if(strpos($row['PR_talla'], "38")!== false) echo 'selected'; ?>>38</option>
    <option value="40" <?php if(strpos($row['PR_talla'], "40")!== false) echo 'selected'; ?>>40</option>
    <option value="42" <?php if(strpos($row['PR_talla'], "42")!== false) echo 'selected'; ?>>42</option>
    <option value="44" <?php if(strpos($row['PR_talla'], "44")!== false) echo 'selected'; ?>>44</option>
    <option value="46" <?php if(strpos($row['PR_talla'], "46")!== false) echo 'selected'; ?>>46</option>
    <option value="48" <?php if(strpos($row['PR_talla'], "48")!== false) echo 'selected'; ?>>48</option>
    <option value="50" <?php if(strpos($row['PR_talla'], "50")!== false) echo 'selected'; ?>>50</option>
    ';
}
if ($_POST["elegido"]=="Pijamas") {
    $options= '
    <option value="SS" <?php if(strpos($row['PR_talla'], "SS")!== false) echo 'selected'; ?>>SS</option>
    <option value="S" <?php if(strpos($row['PR_talla'], "S")!== false) echo 'selected'; ?>>S</option>
    <option value="M" <?php if(strpos($row['PR_talla'], "M")!== false) echo 'selected'; ?>>M</option>
    <option value="L" <?php if(strpos($row['PR_talla'], "L")!== false) echo 'selected'; ?>>L</option>
    <option value="XL" <?php if(strpos($row['PR_talla'], "XL")!== false) echo 'selected'; ?>>XL</option>
    <option value="XXL" <?php if(strpos($row['PR_talla'], "XXL")!== false) echo 'selected'; ?>>XXL</option>
    <option value="3XL" <?php if(strpos($row['PR_talla'], "3XL")!== false) echo 'selected'; ?>>3XL</option>
    <option value="4XL" <?php if(strpos($row['PR_talla'], "4XL")!== false) echo 'selected'; ?>>4XL</option>
    ';
}
if ($_POST["elegido"]=="Traje de baño") {
    $options= '
    <option value="0" <?php if(strpos($row['PR_talla'], "0")!== false) echo 'selected'; ?>>0</option>
    <option value="2" <?php if(strpos($row['PR_talla'], "2")!== false) echo 'selected'; ?>>2</option>
    <option value="4" <?php if(strpos($row['PR_talla'], "4")!== false) echo 'selected'; ?>>4</option>
    <option value="6" <?php if(strpos($row['PR_talla'], "6")!== false) echo 'selected'; ?>>6</option>
    <option value="8" <?php if(strpos($row['PR_talla'], "8")!== false) echo 'selected'; ?>>8</option>
    <option value="10" <?php if(strpos($row['PR_talla'], "10")!== false) echo 'selected'; ?>>10</option>
    <option value="12" <?php if(strpos($row['PR_talla'], "12")!== false) echo 'selected'; ?>>12</option>
    <option value="14" <?php if(strpos($row['PR_talla'], "14")!== false) echo 'selected'; ?>>14</option>
    <option value="16" <?php if(strpos($row['PR_talla'], "16")!== false) echo 'selected'; ?>>16</option>
    <option value="18" <?php if(strpos($row['PR_talla'], "18")!== false) echo 'selected'; ?>>18</option>
    <option value="20" <?php if(strpos($row['PR_talla'], "20")!== false) echo 'selected'; ?>>20</option>
    <option value="22" <?php if(strpos($row['PR_talla'], "22")!== false) echo 'selected'; ?>>22</option>
    <option value="24" <?php if(strpos($row['PR_talla'], "24")!== false) echo 'selected'; ?>>24</option>
    <option value="26" <?php if(strpos($row['PR_talla'], "26")!== false) echo 'selected'; ?>>26</option>
    <option value="28" <?php if(strpos($row['PR_talla'], "28")!== false) echo 'selected'; ?>>28</option>
    <option value="30" <?php if(strpos($row['PR_talla'], "30")!== false) echo 'selected'; ?>>30</option>
    <option value="32" <?php if(strpos($row['PR_talla'], "32")!== false) echo 'selected'; ?>>32</option>
    <option value="34" <?php if(strpos($row['PR_talla'], "34")!== false) echo 'selected'; ?>>34</option>
    <option value="36" <?php if(strpos($row['PR_talla'], "36")!== false) echo 'selected'; ?>>36</option>
    <option value="38" <?php if(strpos($row['PR_talla'], "38")!== false) echo 'selected'; ?>>38</option>
    <option value="40" <?php if(strpos($row['PR_talla'], "40")!== false) echo 'selected'; ?>>40</option>
    <option value="42" <?php if(strpos($row['PR_talla'], "42")!== false) echo 'selected'; ?>>42</option>
    <option value="44" <?php if(strpos($row['PR_talla'], "44")!== false) echo 'selected'; ?>>44</option>
    <option value="46" <?php if(strpos($row['PR_talla'], "46")!== false) echo 'selected'; ?>>46</option>
    <option value="48" <?php if(strpos($row['PR_talla'], "48")!== false) echo 'selected'; ?>>48</option>
    <option value="50" <?php if(strpos($row['PR_talla'], "50")!== false) echo 'selected'; ?>>50</option>
    ';
}
if ($_POST["elegido"]=="Falda") {
    $options= '
    <option value="SS" <?php if(strpos($row['PR_talla'], "SS")!== false) echo 'selected'; ?>>SS</option>
    <option value="S" <?php if(strpos($row['PR_talla'], "S")!== false) echo 'selected'; ?>>S</option>
    <option value="M" <?php if(strpos($row['PR_talla'], "M")!== false) echo 'selected'; ?>>M</option>
    <option value="L" <?php if(strpos($row['PR_talla'], "L")!== false) echo 'selected'; ?>>L</option>
    <option value="XL" <?php if(strpos($row['PR_talla'], "XL")!== false) echo 'selected'; ?>>XL</option>
    <option value="XXL" <?php if(strpos($row['PR_talla'], "XXL")!== false) echo 'selected'; ?>>XXL</option>
    <option value="3XL" <?php if(strpos($row['PR_talla'], "3XL")!== false) echo 'selected'; ?>>3XL</option>
    <option value="4XL" <?php if(strpos($row['PR_talla'], "4XL")!== false) echo 'selected'; ?>>4XL</option>
    ';
}

if ($_POST["elegido"]=="Accesorios") {
    $options= '
    <option value="No posee">No posee</option>
    ';
}

echo $options;
?>
