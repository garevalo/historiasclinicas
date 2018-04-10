<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mciudades extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function get_departamento(){
        $this->db->order_by("departamento","asc");
        $query=$this->db->get("departamento");
        
        return $query->result();
        
    }
    
    function get_provincia(){
        
        $this->db->select('*');
        $this->db->from('departamento');
        $this->db->join('provincia', 'departamento.iddepartamento = provincia.iddepartamento');

        $query = $this->db->get();
        return $query->result();
        
        
    }
    
    function get_distrito(){
        $this->db->select('*');
        $this->db->from('departamento');
        $this->db->join('provincia', 'departamento.iddepartamento = provincia.iddepartamento');
        $this->db->join('distrito', 'provincia.idprovincia = distrito.idprovincia');
        $query = $this->db->get();
        return $query->result();       
        
    }
    
    function guardar_departamento($departamento){
        
        $insert=array("departamento"=>$departamento);
        $this->db->insert("departamento",$insert);
    }
    
    function editar_departamento($depa,$iddepa){
                
        $sql="update departamento set departamento='$depa' where iddepartamento='$iddepa'";
        $this->db->query($sql);
    }
    
    function eliminar_departamento($id){
        
        $this->db->where('iddepartamento', $id);
        $this->db->delete('departamento'); 
    }
    
    function guardar_provincia($iddepartamento,$provincia){
        
       $data = array(
               'iddepartamento'     => $iddepartamento ,
               'provincia'           => $provincia
            );

       $this->db->insert('provincia', $data); 
    }
    
    
    function editar_provincia($prov,$id){
        $data = array(
                'provincia' => $prov
            );

        $this->db->where('idprovincia', $id);
        $this->db->update('provincia', $data); 
    }
    
    function eliminar_provincia($id){
        
        $this->db->where('idprovincia', $id);
        $this->db->delete('provincia'); 
    }
    
    function guardar_distrito( $idprovincia,$ndistrito ){
        
       $data = array(
           'idprovincia'        =>  $idprovincia,
           'distrito'          =>  $ndistrito
       );

       $this->db->insert('distrito', $data); 
        
    }
    
    function editar_distrito($dis,$id){
        $data = array(
            'distrito' => $dis
        );

        $this->db->where('iddistrito', $id);
        $this->db->update('distrito', $data); 
        
    }
    
    function eliminar_distrito($id){
        
        $this->db->where('iddistrito', $id);
        $this->db->delete('distrito'); 
        
    }
}