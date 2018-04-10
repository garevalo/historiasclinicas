<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cespecialidad extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this-> form_validation->set_message ('is_unique','%s ya ha sido registrado');
        $this->form_validation->set_error_delimiters('', '');
        $this->load->model("especialidad/mespecialidad");
    }
    
    function  index(){
        
        $especialidad=$this->mespecialidad->get_especialidad();
        
        $data=array(
                "title"              =>  "Registro de Especialidades",
                "titulopanel"        =>  "Registro de Especialidades",
                "contenido"          =>  "especialidades/especialidades",
                "especialidades"      =>  $especialidad
                );
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        //$this->output->enable_profiler(TRUE);
        
    }
    
    function registrar_especialidad(){
        
        $this->form_validation->set_rules('especialidad', $this->input->post("especialidad"), 'is_unique[tipo_personalmedico.nombre_personal]');
 
        if ($this->form_validation->run() == FALSE)
        {
            $error=array("error"=>form_error('especialidad'));
            echo ( json_encode($error) );
        }
        else
        {
            $this->mespecialidad->registrar_especialidad( $this->input->post("especialidad") );
            
            $especialidades=$this->mespecialidad->get_especialidad();
            $data["especialidades"]=$especialidades;
            $tabla_especialidad=$this->load->view("especialidades/especialidades",$data,TRUE);
            $tabla=array("tabla"=>$tabla_especialidad);
            echo json_encode($tabla);
        }

    }
    
    function editar_especialidad(){
        $id= $this->input->post("id");
        $esp= $this->input->post("especialidad");
        $this->mespecialidad->editar_especialidad($esp,$id);
        $this->output->enable_profiler(FALSE);        
        
    }
    
    function eliminar_especialidad(){
        $id= $this->input->post("id");
        $this->mespecialidad->eliminar_especialidad($id);
        $this->output->enable_profiler(FALSE);
    }
    
}