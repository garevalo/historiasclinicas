<?php

class Creporte extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("personas/mpersonal_medico");
        $this->load->model("especialidad/mespecialidad");
    }
    
    function form_reporte_medico(){
        
        $medicos=$this->mpersonal_medico->get_medico();
        $data=  array(
                "title"         =>      "Reporte Por Médico",
                "contenido"     =>      "reporte/reporte_medico/frm_reporte_medico",
                "titulopanel"   =>      "Reporte Por Médico",
                "medicos"       =>      $medicos
                );
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        
    }
    
    function generar_reporte_medico(){
        $this->load->library("metodos");
        
        $idmedico   =   $this->input->post("idmedico");
        $desde      =   $this->metodos->convertir_fecha($this->input->post("desde"));
        $hasta      =   $this->metodos->convertir_fecha($this->input->post("hasta"));
      
        $this->load->model("historia/mcitas");
        $this->load->library("tcpdf/tcpdf");
        $citasmedico=$this->mcitas->get_cita_idpersonal($idmedico,$desde,$hasta);
        $data=array("citas_medico"=>$citasmedico);
        $this->load->view("reporte/reporte_medico/reporte_medico",$data);
        $this->output->enable_profiler(false);
        
    }
    
    function form_reporte_especialidad(){
        
        $especialidad=$this->mespecialidad->get_especialidad();
        $data=  array(
                "title"         =>      "Reporte Por Especialidad",
                "contenido"     =>      "reporte/reporte_especialidad/frm_reporte_especialidad",
                "titulopanel"   =>      "Reporte Por Especialidad",
                "especialidad"       =>      $especialidad
                );
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    function generar_reporte_especialidad(){
        
    }
    
    
    
    
    function form_citas_registradas(){
        
        $especialidad=$this->mespecialidad->get_especialidad();
        $data=  array(
                "title"         =>      "Reporte Por Especialidad",
                "contenido"     =>      "reporte/citas_registradas/frm_citas_registradas",
                "titulopanel"   =>      "Citas Registradas",
                "especialidad"       =>  $especialidad
                );
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    function generar_citas_registradas(){
        
        $this->load->library("metodos");
        
       // $idmedico   =   $this->input->post("idmedico");
        $desde      =   $this->metodos->convertir_fecha($this->input->post("desde"));
        $hasta      =   $this->metodos->convertir_fecha($this->input->post("hasta"));
      
        $this->load->model("historia/mcitas");
        $this->load->library("tcpdf/tcpdf");
        $citasmedico=$this->mcitas->get_reporte_citas($desde,$hasta);
        $data=array("citas_medico"=>$citasmedico,"desde"=>$desde,"hasta"=>$hasta);
        $this->load->view("reporte/citas_registradas/reporte_citas_registradas",$data);
        $this->output->enable_profiler(true);
    }
    
    
    
    function form_pacientes_registrados(){
        
        $especialidad=$this->mespecialidad->get_especialidad();
        $data=  array(
                "title"         =>      "Reporte Por Especialidad",
                "contenido"     =>      "reporte/pacientes_registrados/frm_pacientes_registrados",
                "titulopanel"   =>      "Pacientes Registrados",
                "especialidad"       =>  $especialidad
                );
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    function generar_pacientes_registrados(){
        
        $this->load->library("metodos");
        
       // $idmedico   =   $this->input->post("idmedico");
        $desde      =   $this->metodos->convertir_fecha($this->input->post("desde"));
        $hasta      =   $this->metodos->convertir_fecha($this->input->post("hasta"));
      
        $this->load->model("paciente/mpaciente");
        $this->load->library("tcpdf/tcpdf");
        $citasmedico=$this->mpaciente->get_paciente_registrados($desde,$hasta);
        $data=array("citas_medico"=>$citasmedico,"desde"=>$desde,"hasta"=>$hasta);
        $this->load->view("reporte/pacientes_registrados/reporte_pacientes_registrados",$data);
        $this->output->enable_profiler(true);
        
    }
    
    
}