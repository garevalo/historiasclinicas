<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of metodos
 *
 * @author hogar
 */
class Metodos{
    
    
  
    
    function convertir_fecha($fecha){
        
        $arreglofecha= explode('/', $fecha);
        $dia=$arreglofecha[0];
        $mes=$arreglofecha[1];
        $anio=$arreglofecha[2];
        
        return $anio.'-'.$mes.'-'.$dia;
        
    }
    
    function revertir_fecha($fecha){
        
        $arreglofecha= explode('-', $fecha);
        $dia=$arreglofecha[2];
        $mes=$arreglofecha[1];
        $anio=$arreglofecha[0];
        
        return $dia.'/'.$mes.'/'.$anio;
        
    }
    
    function probar_datos(){
       //$this->load->view("layout/header"); 
       $myarray = $_POST;
       echo "<table class='table table-striped table-condensed table-bordered table-hover'>";
       echo "<thead class='alert-success text-primary'><th class='col-md-2'>Campo</th><th>Valor</th></thead>";
        foreach ($myarray as $key => $value) {

         echo "<tr><td>".$key."</td><td>".$value."</td></tr>";

        }
        echo "</table>";
    }
    
}
