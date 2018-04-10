<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cenfermedad extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("enfermedad/menfermedad");
    }
    
    function index(){
        
        
        $enfermedades=$this->menfermedad->get_enfermedades();
        $data["title"]          =   "Registros de Enfermedades";
        $data["contenido"]      =   "enfermedades/registros_enfermedades";
        $data["titulopanel"]    =   "Registros de Enfermedades";
        $data["enfermedades"]   =   $enfermedades;
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        $this->output->enable_profiler(FALSE);
        
    }
    
    function form_nueva_enfermedad(){
        
      
        $data["title"]          =   "Registrar Nueva Enfermedad";
        $data["contenido"]      =   "enfermedades/nueva_enfermedad";
        $data["titulopanel"]    =   "Registrar Nueva Enfermedad";
       
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        $this->output->enable_profiler(FALSE);
    }
    
    function  form_editar_enfermedad($idcie){
        
       $enfermedad= $this->menfermedad->get_enfermedades_id($idcie);
        
        $data["title"]          =   "Registrar Nueva Enfermedad";
        $data["contenido"]      =   "enfermedades/editar_enfermedad";
        $data["titulopanel"]    =   "Registrar Nueva Enfermedad";
        $data["enfermedad"]     =   $enfermedad;
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        $this->output->enable_profiler(FALSE);
        
    }
            
    
    function guardar_cie(){
        
        $this->menfermedad->guardar_cie($_POST);
        redirect("enfermedad/cenfermedad", "location");
        
    }
    
    
    function editar_cie(){
        
        $this->menfermedad->editar_cie($_POST);
        redirect("enfermedad/cenfermedad", "location");
    }
    
    
    function  eliminar_cie($idcie){
        
        $this->menfermedad->eliminar_cie($idcie);
        redirect("enfermedad/cenfermedad", "location");
    }
}