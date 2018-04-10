<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Menfermedad extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function get_enfermedades(){
        
        $this->db->order_by("idcie","desc");
        $query=$this->db->get("cie");
        return $query->result();
    }
    
    
    function get_enfermedades_id($idcie){
        $where=array("idcie"=>$idcie);
        
        $this->db->where($where);
        $this->db->order_by("idcie","desc");
        $query=$this->db->get("cie");
        return $query->row();
    }
    
    
    
    function guardar_cie($data){
        
        $enfermedad =   $data["nombre_enfermedad"];
        $cie        =   $data["cie10"];
        
        $this->db->query("insert into cie values(null,'$enfermedad','$cie')");
        
    }
    
    
    function editar_cie($data){
        
        $enfermedad     =   $data["nombre_enfermedad"];
        $cie            =   $data["cie10"];
        $idcie          =   $data["idcie"];
        
        $this->db->query("update  cie set nombre_enfermedad='$enfermedad',cie10='$cie' where idcie='$idcie'");
    }
    
    function eliminar_cie($idcie){
         $this->db->query("delete from cie  where idcie='$idcie'");
        
    }
}