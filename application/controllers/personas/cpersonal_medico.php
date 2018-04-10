<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cpersonal_medico
 *
 * @author hogar
 */
class Cpersonal_medico extends CI_Controller{



    function __construct() {
        parent::__construct();
        $this->load->library("metodos");
        $this->load->model("personas/mpersonas");
        $this->load->model("personas/mpersonal_medico");
    }
    
    function registro_personal(){
        $personal=$this->mpersonal_medico->get_personal_medico();
        $data["title"]          =   "Registro de Personal";
        $data["contenido"]      =   "personas/registros_personal_medico";
        $data["titulopanel"]    =   "Registro de Personal Médico";
        $data["personal"]       =   $personal;
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    function registrar_personal(){
        $data["title"]          =   "Registro de Personal";
        $data["contenido"]      =   "personas/personal_medico";
        $data["titulopanel"]    =   "Registro de Personal Médico";
        $data["sexo"]           =   $this->mpersonas->get_data("sexo");
        $data["tipo_usuario"]   =   $this->mpersonas->get_data("tipousuario");
        $data["tipo_personal"]   =  $this->mpersonas->get_data("tipo_personalmedico");
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
    }
    
    function guardar_personal(){
  
       $dni=$this->input->post("dni");
       $nombre=$this->input->post("nombre");
       $apellidopat=$this->input->post("apellido_paterno");
       $apellidomat=$this->input->post("apellido_materno");
       $fecha_nac=$this->metodos->convertir_fecha($this->input->post("fecha_nacimiento"));
       $sexo=$this->input->post("sexo");
       $telefono=$this->input->post("telefono");
       $direccion=$this->input->post("direccion");
       $tipo_personal=$this->input->post("tipo_personal");
       $num_colegio=$this->input->post("num_colegiatura");
       $usuario=$this->input->post("usuario");
       $contrasena=$this->input->post("contrasena");
       $tipo_usuario=$this->input->post("tipo_usuario");


        $sp  ="call registrar_personal('$dni','$nombre','$apellidopat','$apellidomat','$fecha_nac','$sexo','$telefono','$direccion','$tipo_personal','$num_colegio','$usuario','$contrasena','$tipo_usuario');";
              
       $this->mpersonal_medico->registrar_personal($sp);    
       
       redirect("personas/cpersonal_medico/registro_personal");
         
    }
    
    function form_editar_personal($id){
        
        $personal=$this->mpersonal_medico->get_personal_medico_id($id);
        $fecha_nacimiento=$this->metodos->revertir_fecha($personal->fecnacimiento);
        $data["fecha_nacimiento"]=$fecha_nacimiento;
        $data["personal"]=$personal;
        $data["title"]          =   "Registro de Personal";
        $data["contenido"]      =   "personas/editar_personal_medico";
        $data["titulopanel"]    =   "Registro de Personal Médico";
        $data["sexo"]           =   $this->mpersonas->get_data("sexo");
        $data["tipo_usuario"]   =   $this->mpersonas->get_data("tipousuario");
        $data["tipo_personal"]   =  $this->mpersonas->get_data("tipo_personalmedico");
        $data["estado"]   =  $this->mpersonas->get_data("estadousuario");
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        $this->output->enable_profiler(FALSE);
    }
    
    
    function actualizar_personal(){
        
       // print_r($this->input->post());
        $this->mpersonal_medico->actualizar_personal($this->input->post());
   
        if($this->session->userdata("tipo_usuario")==1)
        {redirect("personas/cpersonal_medico/registro_personal", "location");}
        else
        {redirect("personas/cpersonal_medico/form_editar_personal/16", "location");}
    }
    
    function get_medico_especialidad(){
        
        
        $id=$this->input->post("id");        
        $medicos=$this->mpersonal_medico->get_medico_especialidad($id);
       ?>
              <option value="">Médicos</option>
              <?php 
              foreach ($medicos as $rowmedico) {
              ?>
              <option value="<?= $rowmedico->idpersonal;?>"><?= $rowmedico->nombre;?></option>
              
              <?php
    
              }
   
    }
    
    
    
}
