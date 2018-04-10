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
$pdf->setPrintFooter(false);
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
/*
 * '.$antecedentes->ant_familiares.'</p>
<p class=""><b><u>ANTECEDENTES EPIDEMIOLÓGICOS</u></b>'.$antecedentes->ant_epidemiologicos.'</p>
<p class=""><b><u>ANTECEDENTES OCUPACIONALES</u></b>'.$antecedentes->ant_ocupacionales.'</p>        
<p class=""><b><u>ANTECEDENTES PERSONALES</u></b>'.$antecedentes->ant_personales.'</p>
 */
if(count($antecedentes)>0){
    $familiares=$antecedentes->ant_familiares;
    $epidemiologicos=$antecedentes->ant_epidemiologicos;
    $ocupacionales=$antecedentes->ant_ocupacionales;
    $personales=$antecedentes->ant_personales;
}else{
    $familiares="";
    $epidemiologicos="";
    $ocupacionales="";
    $personales="";
}

// define some HTML content with style
$html =' 
<!-- EXAMPLE OF CSS STYLE -->
<style>
	h1 {
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
        td.caja {
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
	
}
</style>

<h1 class="title">MICRORED LOS OLIVOS</h1>
<table>
   <tr>
        <td width="450" class="centro">"CENTRO DE SALUD LOS OLIVOS DE PRO"</td>
        <td width="130" >HORA :'.$historias->hora_inicio.'</td>
   </tr>
</table>        

<br>
<br>
        <br>
<table class="first" cellpadding="4" cellspacing="0" border="0">
 <tr>
  <td width="250" align="" colspan="2"><b>HISTORIA CLÍNICA No.</b></td>
  
  <td width="190" align="center" class="caja" style="font-size: 20px;"><b>'.$historias->numero_historia.'</b></td>
  <td width="200" align="center"> </td>

  
 </tr>
 <tr>
   <td height="30" width="200"><b><i>FILIACIÓN : </i></b>'.$this->metodos->revertir_fecha($historias->fecha_registro_paciente).'</td>      
 </tr>
  <tr>
   <td width="200" height="4" class="" cellspacing="0">'.  strtoupper($historias->apepaterno).'</td>      
   <td width="200" class="" cellspacing="0">'.  strtoupper($historias->apematerno).'</td>         
   <td width="240" class="" cellspacing="0">'.  strtoupper($historias->nombres).'</td>           
 </tr>
 <tr>
   <td width="200" height="4" class="linesuperior" cellspacing="0"><strong>APELLIDO PATERNO</strong></td>      
   <td width="200" class="linesuperior" cellspacing="0"><strong>APELLIDO MATERNO</strong></td>         
   <td width="240" class="linesuperior" cellspacing="0"><strong>NOMBRES</strong></td>           
 </tr>
 <tr>
   <td width="120" height="4" class="" cellspacing="0">'.$edad.'</td>      
   <td width="130" class="" cellspacing="0">'.  strtoupper($historias->nombre_sexo).'</td>         
   <td width="120" class="" cellspacing="0">'.  strtoupper($historias->nombre_raza).'</td>
   <td width="150" class="" cellspacing="0">'.  strtoupper($historias->nombre_grupo_sanguineo).'</td>         
   <td width="120" class="" cellspacing="0">'.  strtoupper($historias->estado_civil).'</td>     
 </tr>
 <tr>
   <td width="120" height="4" class="linesuperior" cellspacing="0"><strong>EDAD</strong></td>      
   <td width="130" class="linesuperior" cellspacing="0"><strong>SEXO</strong></td>         
   <td width="120" class="linesuperior" cellspacing="0"><strong>RAZA</strong></td>
   <td width="150" class="linesuperior" cellspacing="0"><strong>GRUPO SANGUINEO</strong></td>         
   <td width="120" class="linesuperior" cellspacing="0"><strong>ESTADO CIVIL</strong></td>     
 </tr>
 <tr>       
  <td width="440" height="4" class="">'.  strtoupper($historias->domicilio).' </td>
  <td width="200" class="">'.  strtoupper($historias->dni).'</td>

 </tr>
 <tr>       
  <td width="440" height="4" class="linesuperior"><strong>DOMICILIO</strong> </td>
  <td width="200" class="linesuperior"><strong>DNI</strong></td>

 </tr>
 <tr>       
  <td width="220" height="4" class="">'.$fecha_nacimiento.'</td>
  <td width="220" class="">'.strtoupper($historias->departamento).' </td>
  <td width="200" class="">'.  strtoupper($historias->procedencia).' </td>
 </tr> 
 <tr>       
  <td width="220" height="4" class="linesuperior"><strong>FECHA DE NACIMIENTO</strong></td>
  <td width="220" class="linesuperior"><strong>LUGAR DE NACIMIENTO</strong></td>
  <td width="200" class="linesuperior"><strong>PROCEDENCIA</strong></td>
 </tr>
 <tr>       
  <td width="220" height="4" class="">'.strtoupper($historias->grado_instruccion).'</td>
  <td width="220" class="">'.strtoupper($historias->religion).'</td>
  <td width="200" class="">'.strtoupper($historias->ocupacion).'</td>
 </tr>
 <tr>       
  <td width="220" height="4" class="linesuperior"><strong>GRADO DE INSTRUCCIÓN</strong></td>
  <td width="220" class="linesuperior"><strong>RELIGIÓN</strong></td>
  <td width="200" class="linesuperior"><strong>OCUPACIÓN</strong></td>
 </tr>
 <tr>       
  <td width="320" height="4" class="">'.strtoupper($historias->idnpadre).'</td>
  <td width="320" class="">'.strtoupper($historias->idnmadre).'</td>
  
 </tr>
 <tr>       
  <td width="320" height="4" class="linesuperior"><strong>NOMBRE DEL PADRE</strong></td>
  <td width="320" class="linesuperior"><strong>NOMBRE DE LA MADRE</strong></td>
  
 </tr>
 <tr>       
  <td width="260" height="4" class="">'.strtoupper($historias->notificar).'</td>
  <td width="280" class="">'.strtoupper($historias->domicilio).'</td>
  <td width="100" class="">'.strtoupper($historias->telefono).'</td>
 </tr> 
 <tr>       
  <td width="260" height="4" class="linesuperior"><strong>NOTIFICAR EN CASO DE URGENCIA A:</strong></td>
  <td width="280" class="linesuperior"><strong>DOMICILIO</strong></td>
  <td width="100" class="linesuperior"><strong>TELÉFONO</strong></td>
 </tr>       
</table>
<p class=""><b><u>ANTECENDENTES FAMILIARES</u></b>&nbsp;&nbsp; '.$familiares.'</p>
<p class=""><b><u>ANTECEDENTES EPIDEMIOLÓGICOS</u></b>&nbsp;&nbsp;'.$epidemiologicos.'</p>
<p class=""><b><u>ANTECEDENTES OCUPACIONALES</u></b>&nbsp;&nbsp;'.$ocupacionales.'</p>        
<p class=""><b><u>ANTECEDENTES PERSONALES</u></b>&nbsp;&nbsp;'.$personales.'</p>
<div class=""><b>INMUNOLÓGICOS:</b></div>
        <br />
<span class=""><b>FISIOLÓGICOS:</b>Peso y talla al nacer. Vacunas. Menarquía. Régimen Catamenial. Fórmula Obstétrica FUR y último parto</span>
<br /><br /><br /><br /><span class=""><b>PATOLÓGICOS:</b>Enfermedades Crónicas o Graves. Operaciones. Accidentes. Alegias.</span>
<br />
        <br /><br /><br />
<table>
<tr>
        <td width="100">NOMBRES Y APELLIDOS</td>
        <td width="380" class="lineinferior">' .strtoupper($historias->nombres.' '.$historias->apepaterno.' '.$historias->apematerno).'</td>
        <td width="50" align="center">H.C:</td>
        <td width="130" class="lineinferior">'.$historias->numero_historia.'</td>
</tr>
</table>';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

if(count($consulta)>0){
  $pdf->AddPage();  
}

$x=1;

$opciones       =   array("Normal","Aumentada","Disminuida");
$est_conciencia =   array("Estado de Conciencia","Lucido Orientado Tiempo Espacio","No Lucido Orientado Tiempo Espacio","No hay Lucides o Ido","Activo");
$est_general    =   array("Estado General","Mal Estado General","Regular Estado General","Buen Estado General");
$tiempo_desc=   array("Hora(s)","Día(s)","Mes(es)","Año(s)");
$tipo_consulta=array("Demanda","SIS");
for($i=0;$i<  count($consulta);$i++){
    
    
    for($y=0;$y<count($opciones);$y++){
        if($consulta[$i]->sed==$y){
            $sed=$opciones[$y];
        }
        if($consulta[$i]->apetito==$y){
            $apetito=$opciones[$y];
        }
         if($consulta[$i]->miccion==$y){
            $miccion=$opciones[$y];
        }
         if($consulta[$i]->deposicion==$y){
            $deposicion=$opciones[$y];
        }
         if($consulta[$i]->sueno==$y){
            $sueno=$opciones[$y];
        }
     }
     
     for($y=0;$y<count($est_general);$y++){
         
         if($consulta[$i]->estado_general==$y){
            $estado_general=$est_general[$y];
        }
     }
     
     for($y=0;$y<count($est_conciencia);$y++){
         
         if($consulta[$i]->estado_conciencia==$y){
            $estado_conciencia=$est_conciencia[$y];
        }
     }
     
       for($y=0;$y<count($tiempo_desc);$y++){
         
         if($consulta[$i]->tiempo_descripcion==$y){
            $tiempo_descripcion=$tiempo_desc[$y];
        }   
     }
     
     
         
         if($consulta[$i]->tipo_consulta==1){$demanda="X";} else{$demanda="";}
         if($consulta[$i]->tipo_consulta==2){$sis="X";}else{$sis="";}
         

$html2='
    <style>
        td.borde_inferior{
          border-bottom: 1px solid black;
        }
    </style>
 <table width="900" border="1" class="tabla2">
  <tr>
    <td colspan="2" rowspan="11" width="128">
    
    <table width="128" height="707" border="0" >
      <tr>
        <td width="48" >Fecha</td>
        <td width="70" class="borde_inferior"><u>'.$consulta[$i]->hora_consulta.'</u></td>
      </tr>
      <tr>
        <td >Hora</td>
        <td class="borde_inferior">&nbsp;</td>
      </tr>
      <tr>
        <td >Edad</td>
        <td class="borde_inferior"><u>'.$consulta[$i]->edad.'</u></td>
      </tr>
      <tr>
        <td >Peso</td>
        <td class="borde_inferior">'.$consulta[$i]->peso.'</td>
      </tr>
      <tr>
        <td >Talla</td>
        <td class="borde_inferior">'.$consulta[$i]->talla.'</td>
      </tr>
      <tr>
        <td >PA</td>
        <td class="borde_inferior">'.$consulta[$i]->presion_arterial.'</td>
      </tr>
      <tr>
        <td >FC</td>
        <td class="borde_inferior">'.$consulta[$i]->frecuencia_cardiaca.'</td>
      </tr>
      <tr>
        <td >Pulso</td>
        <td class="borde_inferior">'.$consulta[$i]->pulso.'</td>
      </tr>
      <tr>
        <td >FR</td>
        <td class="borde_inferior">'.$consulta[$i]->frecuencia_respiratoria.'</td>
      </tr>
      <tr>
        <td >T°</td>
        <td class="borde_inferior">'.$consulta[$i]->temperatura.'</td>
      </tr>
      <tr>
        <td >Sed</td>
        <td class="borde_inferior">'.$sed.'</td>
      </tr>
      <tr>
        <td >Apetito</td>
        <td class="borde_inferior">'.$apetito.'</td>
      </tr>
      <tr>
        <td >Micción</td>
        <td class="borde_inferior">'.$miccion.'</td>
      </tr>
      <tr>
        <td >Deposic</td>
        <td class="borde_inferior">'.$deposicion.'</td>
      </tr>
      <tr>
        <td >Sueño</td>
        <td class="borde_inferior">'.$sueno.'</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><img src="'.base_url().'img/img_consulta.jpg"  /></td>
      </tr>
    </table></td>
    <td width="80" class="borde_izquierdo" height="4">Informante</td>
    <td width="60" class="borde_inferior">'.$consulta[$i]->informante.'</td>
    <td width="70">Est.Gral</td>
    <td width="150" class="borde_inferior">'.$estado_general.'</td>
    <td width="70">Est.Conc</td>
    <td width="110" class="borde_inferior">'.$estado_conciencia.'</td>
  </tr>
  <tr>
    <td class="borde_izquierdo">Tiempo de enf.</td>
    <td class="borde_inferior">'.$consulta[$i]->tiempo_cantidad.' '.$tiempo_descripcion.'</td>
    <td colspan="2">Descripción cronológica de la enfermedad:</td>
    <td colspan="2" class="borde_inferior"></td>
  </tr>
  <tr>
    <td colspan="6" class="borde_izquierdo borde_inferior">'.$consulta[$i]->desc_crono_enfermedad.'</td>
  </tr>
  <tr>
    <td colspan="6" align="left" valign="top" class="borde_izquierdo"><strong>Ex. Clínico:</strong>&nbsp;'.$consulta[$i]->examen_clinico.'</td>
  </tr><tr><td colspan="6"><table border="1" width="100%">';
for($d=0;$d<count($diagnostico);$d++){
if($consulta[$i]->idconsulta==$diagnostico[$d]->idconsulta){
$html2.='
  <tr>
    <td  class="borde_izquierdo" width="10%">DIAG.</td>
    <td  class="borde_izquierdo" width="60%">'.$diagnostico[$d]->nombre_enfermedad.'</td>
    <td width="10%">CIE10</td>
    <td width="20%">'.$diagnostico[$d]->cie.'</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top" class="borde_izquierdo">TRAT(dosis,vía,frec,duración)'.$diagnostico[$d]->tratamiento.'</td>
  </tr>';
}
}
$html2.='</table></td></tr>
  <tr>
    <td class="borde_izquierdo">MED:Hig.diet.</td>
    <td colspan="5">'.$consulta[$i]->medida_hig_diet.'</td>
  </tr>
  <tr>
    <td height="" class="borde_izquierdo">MED.Prev.</td>
    <td colspan="5">'.$consulta[$i]->medida_preventiva.'</td>
  </tr>
  <tr>
    <td class="borde_izquierdo">Apoyo al Dx</td>
    <td colspan="5">'.$consulta[$i]->apoyo_diagnostico.'</td>
  </tr>
  <tr>
    <td class="borde_izquierdo">Próxima cita</td>
    <td colspan="5">'.$consulta[$i]->proxima_cita.'</td>
  </tr>
  <tr>
    <td colspan="6" class="borde_izquierdo">Demanda ('.$demanda.') SIS ('.$sis.')</td>
  </tr>
  <tr>
    
    <td colspan="6" align="center" valign="bottom"><br><br><br><br><br>Firma y Sello</td>
  </tr>
</table>';
if($x%2==0){
   $html2.='<br><br><br><br><br><br>'; 
}
else{
     $html2.='<br><br><br><br>';
}

$pdf->writeHTML($html2, true, false, true, false, '');
$x++;
}
// output the HTML content



$pdf->lastPage();


//Close and output PDF document
$pdf->Output('historia_clinica.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

