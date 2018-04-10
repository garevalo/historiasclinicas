<?php

class Cconsulta extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library("metodos");
        $this->load->model("historia/mcitas");
        $this->load->model("historia/mantecedentes");
        $this->load->model("historia/mtriaje");
        $this->load->model("paciente/mpaciente");
        $this->load->model("historia/mconsulta");
        $this->load->model("cie10/mcie10");
    }
    
    function index(){
        
        $data=array("title"        =>  "Registros Pacientes",
                    "contenido"    =>  "consulta/registros_consulta",
                    "titulopanel"  =>  "Pacientes",
                    "citas"        =>  $this->mcitas->get_citas()
                    );
                    
       
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    
    function  form_consulta($idcita){
        
       $this->load->helper('date'); 
       $cita= $this->mcitas->get_cita_id($idcita) ;
       $antecedentes=$this->mantecedentes->get_antecedentes($cita->numero_historia);
       $edad=$this->mpaciente->edad_paciente($cita->numero_historia);
       $consulta=$this->mconsulta->get_consulta_idcita($idcita);
       
       $data=array("title"              =>  "Consulta",
                    "contenido"         =>  "consulta/formulario_consulta",
                    "titulopanel"       =>  "Consulta",
                    "cita"              =>  $cita,
                    "edad_paciente"     =>  $edad->edad,
                    "consulta"          =>  $consulta,
                    "antecedentes"      =>  $antecedentes
                    );
        $data['cie']= json_encode($this->mcie10->get_cie_nombre('cie10',$this->input->get('term', TRUE)));     
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    function guardar_consulta(){

          $proxima_cita        =   $this->metodos->convertir_fecha($this->input->post("proxima_cita"));

          $this->mconsulta->guardar_consulta($_POST,$proxima_cita);
          redirect("historias/cconsulta");
       
    }
}