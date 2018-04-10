<?php
 $datestring = "%d/%m/%Y - %h:%i:%s ";
// $fecha_hora= mdate($datestring, $now);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);


// add a page
$pdf->AddPage();



// define some HTML content with style
$html =' 
<!-- EXAMPLE OF CSS STYLE -->
<style>
	h2 {
		color: navy;
		font-family: times;
		text-decoration: underline;
                text-align:center;    
	}
	p.first {
		color: #003300;
		font-family: helvetica;
		font-size: 10pt;
	}
	p.first span {
		color: #006600;
		font-style: italic;
	}
	p#second {
		color: rgb(00,63,127);
		font-family: times;
		font-size: 12pt;
		text-align: justify;
	}
	p#second > span {
		background-color: #FFFFAA;
	}


	td.second {
		border: 2px dashed green;
	}
	div.test {
		color: #CC0000;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;
		border-style: solid solid solid solid;
		border-width: 2px 2px 2px 2px;
		border-color: green #FF00FF blue red;
		text-align: center;
	}
	.lowercase {
		text-transform: lowercase;
	}
	.uppercase {
		text-transform: uppercase;
	}
	.capitalize {
		text-transform: capitalize;
	}
        td.centro{
            text-decoration: underline;
            font-size:16px;
        }
        td.hora{
            text-decoration: underline;
            font-size:16px;
        }
        th.caja {
		border: 2px solid black;		
               
	}
        td.linesuperior{
                border-top: 1px solid black;
                
                
        }
        td.lineinferior{
                border-bottom: 1px solid black;
                
        }
        .tabla2{
            font-size:12px;
        }
        .cabecera{
            background-color:red;
            color:white;
            padding: 2px 2px 2px 2px;
             font-size:16px;
        }
        
	
}
</style>

<h2 align="center" class="title">Reporte de citas atendidas por médico</h2>

<table border="1">
<tr class="cabecera">
    <th >Historia</th>
    <th >Fecha y Hora</th>
</tr>
';

foreach ($citas_medico as $rowcitas)
{
$html.='<tr>
        <td>'.$rowcitas->numero_historia.'</td>
        <td>'.$rowcitas->fecha_hora_consulta.'</td>    
        </tr>';    
    
}
$html.='</table>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->lastPage();


//Close and output PDF document
$pdf->Output('Reporte por Médico.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
