<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ccitas
 *
 * @author hogar
 */
class Ccitas extends CI_Controller {
    
    function __construct() {
        parent::__construct();
       
        $this->load->model("personas/mpersonal_medico");
        $this->load->model("historia/mcitas");
        
    }
    
    function sacar_cita($num){
     

        $data['title']              =   'Sacar Cita';
        $data['titulopanel']        =   'Sacar Cita';
        $data['contenido']          =   "historia_clinica/citas";
        $data["medicos"]            =   $this->mpersonal_medico->get_medicos_turno();
        $data["especialidad"]       =   $this->mpersonal_medico->get_especialidad();
        $data['citas']              =   $this->mcitas->get_citas(); 
        $data["numero_historia"]    =   $num;
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");

    }
    
    
    function guardar_cita(){


        $this->mcitas->guardar_cita($_POST);

      
       //$this->sacar_cita($this->input->post("num_historia")); 
       redirect("historias/ccitas/sacar_cita/".$this->input->post("num_historia"));
    }

    
}
