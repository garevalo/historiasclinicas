<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mocupacion extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function guardar_ocupacion($ocupacion){
        
        
        $insert=array("ocupacion"=>$ocupacion);
        $this->db->insert('ocupacion',$insert);
    }
    
    function get_ocupacion(){
        $query=$this->db->get("ocupacion");
        return $query->result();
    }
    
}