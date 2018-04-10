<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cCalendar
 *
 * @author hogar
 */
class Ccalendar extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("calendar/mcalendar");
    }
    
    function agregar_evento(){
        
       $this->mcalendar->agregar_evento($_POST);
     
    }
    
    function actualizar_evento(){
       
        $this->mcalendar->actualizar_evento($_POST); 
    }
    function eliminar_evento(){
        
        $id=$this->input->post("id");
        $this->mcalendar->eliminar_evento($id);
    }
    
    function ver_calendar(){
       
        // liste des événements
        $json = array();

        // envoi du résultat au success
        $calendar=$this->mcalendar->ver_calendar();
        $this->output
	->set_content_type('application/json')
	->set_output(json_encode($calendar));

        
    }
    
    
}
