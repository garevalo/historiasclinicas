<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mespecialidad extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function get_especialidad(){
        
        $query=$this->db->get("tipo_personalmedico");
        return $query->result();
    }
    
    function registrar_especialidad($especialidad){
        
        $insert=array("nombre_personal"=>$especialidad);
        $this->db->insert("tipo_personalmedico",$insert);
    }
    
    function editar_especialidad($esp,$id){
        
        $data = array(
                'nombre_personal' => $esp
            );

        $this->db->where('idtipopersonal', $id);
        $this->db->update('tipo_personalmedico', $data);         
    }
    
    function eliminar_especialidad($id){
        $this->db->where('idtipopersonal', $id);
        $this->db->delete('tipo_personalmedico'); 
    }
}