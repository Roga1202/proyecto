<?php


// Include the main TCPDF library (search for installation path).
require_once('assets/php/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gabriel Gomez , Wrayan Prato , Daniel Urbina');
$pdf->SetTitle('Pedido');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content

$html = <<<EOF
<style>
    h1 {
        color: Red;
        font-family: times;
        font-size: 24pt;
        text-align: center;
    }
    p{
        color: black;
        font-family: Arial;
        font-size: 20pt;
    }
    span.variable{
        font-weight: bold;
    }
</style>
<h1><center>Pedido Numero $pedido->PD_ID </center></h1>

<p align="justify"> <span class="variable">El Surtidor de la Frontera C.A</span> le hace llegar este documento para informarle al:</p>
<p align="justify">Proveedor: <span class="variable">$proveedor->PRV_primernombre $proveedor->PRV_primerapellido</span>.</p>
<p align="justify">Identificador: <span class="variable">$proveedor->PRV_ID</span>.</p>
<p align="justify">Para hacerle la solicitud del articulo <span class="variable">$pedido->PD_nombre</span>.</p>
<p align="justify">Talla: <span class="variable">$pedido->PD_talla</span>.</p>
<p align="justify">Marca: <span class="variable">$pedido->PD_marca</span>.</p>
<p align="justify">Material: <span class="variable">$pedido->PD_material</span>.</p>
<p align="justify">Cantidad: <span class="variable">$pedido->PD_cantidad</span>.</p>
<a href="http://elsurtidor.com">Inicio</a>
EOF;


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$file = 'Pedido'.$pedido->PD_ID.'.pdf';
$pdf->Output($file);

?>
