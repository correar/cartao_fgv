<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

require_once($_SERVER['DOCUMENT_ROOT'].'/cartao_fgv/assets/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);


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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('Helvetica', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
//$pdf->SetFillColor(255, 255, 127);

/*$txt = 'Rodrigo';


// Multicell test
$pdf->MultiCell(35, 5, '[LOGO] ', 1, 'L', 0, 1, 45, '', true);
$pdf->MultiCell(35, 8, '[Nome] '.$txt."\n".$txt."\n".$txt, 1, 'L', 0, 1, 5, '', true);
$pdf->SetFont('helvetica', '', 8);
$txt2 = 'Rodrigo';
$pdf->MultiCell(35, 25, '[CENTER] '.$txt."\n".$txt2."\n".$txt2."\n".$txt2."\n".$txt2."\n".$txt2."\n".$txt2."\n".$txt2."\n".$txt2."\n".$txt2, 1, 'L', 0, 0, 45, 20, true);
*/

// Set some content to print
$logo_html = <<<EOD
<style>
	.logo {
		font-family:helvetica;
		font-size: 12px;
	}
	
</style>

<div class="logo">LOGO</div>

EOD;

$nome_html = <<<EOD
<style>
	.nome {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 12px;
		font-style: normal;
		font-weight: bold;
		color: blue;
	}
	.cargo {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 11px;
		font-style: normal;
		font-weight: normal;
		color: blue;
	}
	.cargo_en {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 11px;
		font-style: italic;
		font-weight: normal;
		color: blue;
	}
	
</style>

<span class="nome">$nomes</span><br/>
<span class="cargo">Rodrigo</span><br/>
<span class="cargo_en">Rodrigo</span>

EOD;
//print_r($setor);
foreach($setores as $setor){
$nomeSetor = $setor->nome;
}
$dados_html = <<<EOD
<style>
	.small{
		line-height: 1;
	}
	.setor {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 11px;
		font-style: normal;
		font-weight: bold;
		color: blue;
	}
	.setor_en {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 10px;
		font-style: italic;
		font-weight: normal;
		color: blue;
		
	}
	.endereco {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 8px;
		font-style: normal;
		font-weight: normal;
		color: blue;
		
	}
	.telefone {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 8px;
		font-style: normal;
		font-weight: normal;
		color: blue;
	
	}
	.celular {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 8px;
		font-style: normal;
		font-weight: normal;
		color: blue;
		
	}
	.fax {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 8px;
		font-style: normal;
		font-weight: normal;
		color: blue;
		
	}
	.email {
		text-transform: capitaliza;
		font-family:helvetica;
		font-size: 8px;
		font-style: normal;
		font-weight: normal;
		color: blue;
	}
	
</style>
<p class="small">
<span class="setor">$nomeSetor</span><br/>
<span class="setor_en">FGV Corporate</span><br/>
<span class="endereco">Av. Paulista, 542 - andar/floor 1 Bela Vista 01310-000 - São Paulo - SP Brasil/Brazil</span><br/>
<span class="telefone">t. (55 21) 3799 0000/0000</span><br/>
<span class="celular">c. (55 21) 00000 0000</span><br/>
<span class="fax">f. (55 21) 0000 0000</span><br/>
<span class="email">rodrigo@fgv.br</span>
</p>
EOD;
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
$pdf->writeHTMLCell(50, '', 35, '', $logo_html, 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(30, '', 5, 10, $nome_html, 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(45, 30, 40, 15, $dados_html, 0, 0, 0, true, 'L', true);

$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(0, 0, 0, 0);

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

$pdf->SetFillColor(0,0,255);

$verso_html = <<<EOD
<style>
	.email{
		text-transform: lowercase;
		font-family:helvetica;
		font-size: 12px;
		font-style: normal;
		font-weight: normal;
		color: white;
	}
</style>
<span class="email">fgv.br</span>
EOD;
$pdf->writeHTMLCell(90, 49.9, 0, 0, '', 0, 0, 1, true, 'C', true);
$pdf->writeHTMLCell(12, 8, 40, 25, $verso_html, 0, 0, 0, true, 'C', true);

$pdf->lastPage();
// Print text using writeHTMLCell()
//$pdf->Write(0, $html, '', 0, 'L', true, 0, false, false, 0);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+