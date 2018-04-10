<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mcalendar
 *
 * @author hogar
 */
class Mcalendar extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function ver_calendar(){
        
         $sql="select a.id,concat(c.nombres,' ',c.apepaterno,' ',c.apematerno) as title,a.start,a.end from evenement a
inner join personal_medico b ON a.title=b.idpersonal
inner join personas c ON b.idpersona=c.idpersona";
         $consulta=$this->db->query($sql);
         return $consulta->result();
    }
    
    function agregar_evento($data){
        
        $title=$data['title'];
        $start=$data['start'];
        $end=$data['end'];

        $sql = "INSERT INTO evenement (title, start, end) VALUES ('$title','$start','$end')";
        $this->db->query($sql);
        
    }
    
    function actualizar_evento($data){
        $id=$data['id'];
        //$title=$data['title'];
        $start=$data['start'];
        $end=$data['end'];

        $sql = "UPDATE evenement SET start='$start', end='$end' WHERE id='$id'";
        $this->db->query($sql);
        

    }
    
    function eliminar_evento($id){
        $sql = "delete from evenement  WHERE id='$id'";
        $this->db->query($sql);
         
        
    }
}
