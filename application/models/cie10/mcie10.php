<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mcie10 extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function get_cie_nombre($valor,$texto){
        
        if($valor=="nombre"){
            
            $sql="select * from cie where nombre_enfermedad like  '%".$texto."%'";
            
        }
        else if($valor=="cie10"){
            
            $sql="select * from cie where  cie10  like '%".$texto."%'";
        }
        else
        { $sql="select * from cie "; }
       
        $query=$this->db->query($sql);
        return $query->result();
    }
    
    
}