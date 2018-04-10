<?php

class Mtriaje extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function guardar_triaje($data){
       
        $edad=$data['edad'];
        $peso=$data['peso'];
        $talla=$data['talla'];
        $pa=$data['PA'];
        $temperatura=$data['temperatura'];
        $idcita=$data['idcita'];
  
       $this->db->query("call sp_registro_triaje ($edad,$peso,$talla,$pa,$temperatura,$idcita)");
 
    }
}