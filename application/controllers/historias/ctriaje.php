<?php

class Ctriaje extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model("historia/mcitas");
        $this->load->model("historia/mtriaje");
        $this->load->model("paciente/mpaciente");
    }
    
    function index(){
        $data=array("title"        =>  "Triaje",
                    "contenido"    =>  "historia_clinica/triaje",
                    "titulopanel"  =>  "Triaje",
                    "citas"        =>  $this->mcitas->get_citas()
                    );
                    
       
        $this->load->view("layout/header",$data);
 
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    function form_triaje($idcita){
       $this->load->model("historia/mconsulta"); 
       $datos=$this->mconsulta->get_consulta_idcita($idcita);
       $cita = $this->mcitas->get_cita_id($idcita) ;
       $edad = $this->mpaciente->edad_paciente($cita->numero_historia);
        $data=array("title"             =>  "Triaje",
                    "contenido"         =>  "historia_clinica/formulario_triaje",
                    "titulopanel"       =>  "Triaje",
                    "cita"              =>  $cita,
                    "edad_paciente"     =>  $edad->edad,
                    "datos"             =>  $datos
                    );
       
       
        $this->load->view("layout/header",$data);
 
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        
    }
    
    function guardar_triaje(){
        
        $this->mtriaje->guardar_triaje($_POST);
        redirect("historias/ctriaje");
    }
    
}