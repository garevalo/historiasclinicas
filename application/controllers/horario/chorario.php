<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of horario
 *
 * @author hogar
 */
class Chorario extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("personas/mpersonas");
        $this->load->model("calendar/mcalendar");
    }
    
    function horario(){
     $json = array();   
     $data['title']='Registro de Horarios';
     $data['titulopanel']='Asignar Turnos';
     $data['contenido']="horario/registro_horario";
     $data['calendar']=  json_encode($this->mcalendar->ver_calendar());
     $data["medicos"]= $this->mpersonas->get_data("vista_medicos");
     $this->load->view("layout/header",$data);
     $this->load->view("layout/template");
     $this->load->view("layout/footer");
        
    }
}
