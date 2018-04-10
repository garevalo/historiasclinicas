<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cciudades extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("ciudades/mciudades");
        
        $this->load->library('form_validation');
        $this-> form_validation->set_message ('is_unique','%s ya ha sido registrado');
        $this->form_validation->set_error_delimiters('', '');
    }
    
    function index(){
        
        $departamento=$this->mciudades->get_departamento();
        $provincia=$this->mciudades->get_provincia();
        $distrito=$this->mciudades->get_distrito();
        $data=array("contenido"=>"ciudades/ciudades","title"=>"Mantenimiento Ciudades","titulopanel"=>"Mantenimiento Ciudades");
        $data["departamento"]=$departamento;
        $data["provincia"]=$provincia;
        $data["distrito"]=$distrito;
        
        $this->load->view("layout/header",$data);
        $this->load->view("layout/template");
        $this->load->view("layout/footer");
        
    }
    
    
    function guardar_departamento(){
 
       $this->form_validation->set_rules('departamento', $this->input->post("departamento"), 'is_unique[departamento.departamento]');
 
        if ($this->form_validation->run() == FALSE)
        {
            $error=array("error"=>form_error('departamento'));
            echo ( json_encode($error) );
        }
        else
        {
            $this->mciudades->guardar_departamento( $this->input->post("departamento") );
            
            $departamento=$this->mciudades->get_departamento();
            $data["departamento"]=$departamento;
            $tabla_departamento=$this->load->view("ciudades/departamento",$data,TRUE);
            $tabla=array("tabla"=>$tabla_departamento);
            echo json_encode($tabla);
        }

    }
    
    function editar_departamento(){
        
        $id= $this->input->post("iddepa");
        $depa= $this->input->post("depa");
        $this->mciudades->editar_departamento($depa,$id);
        $this->output->enable_profiler(FALSE);
    }
    
    function eliminar_departamento(){
        $id= $this->input->post("id");
        $this->mciudades->eliminar_departamento($id);
        $this->output->enable_profiler(FALSE);
        
    }
    
    function guardar_provincia(){
        
        $this->form_validation->set_rules('provincia', $this->input->post("provincia"), 'is_unique[provincia.provincia]');
 
        if ($this->form_validation->run() == FALSE)
        {
            $error=array("error"=>form_error('provincia'));
            echo ( json_encode($error) );
        }
        else
        {
            $iddepartamento    =   $this->input->post("departamento");
            $cprovincia        =   $this->input->post("provincia");   
            $this->mciudades->guardar_provincia( $iddepartamento,$cprovincia );
            
            $departamento   =   $this->mciudades->get_departamento();
            $provincia      =   $this->mciudades->get_provincia();
            $data["departamento"]   =   $departamento;
            $data["provincia"]      =   $provincia;
            $tabla_provincia        =   $this->load->view("ciudades/provincia",$data,TRUE);
            $tabla=array("tabla"=>$tabla_provincia);
            echo json_encode($tabla);
        }
    }
        
    function editar_provincia(){

            $id     = $this->input->post("idprov");
            $prov   = $this->input->post("prov");
            $this->mciudades->editar_provincia($prov,$id);
            $this->output->enable_profiler(FALSE);
            

    }
    
    function eliminar_provincia(){
        $id= $this->input->post("id");
        $this->mciudades->eliminar_provincia($id);
        $this->output->enable_profiler(FALSE);
        
    }
    
    function guardar_distrito(){
        
        $this->form_validation->set_rules('distrito', $this->input->post("distrito"), 'is_unique[distrito.distrito]');
 
        if ($this->form_validation->run() == FALSE)
        {
            $error=array("error"=>form_error('distrito'));
            echo ( json_encode($error) );
        }
        else
        {
        
            $idprovincia         =   $this->input->post("provincia_dis");
            $ndistrito           =   $this->input->post("distrito");
            
            $this->mciudades->guardar_distrito( $idprovincia,$ndistrito );
            
            $departamento   =   $this->mciudades->get_departamento();
            $provincia      =   $this->mciudades->get_provincia();
            $distrito       =   $this->mciudades->get_distrito();
            
            $data["departamento"]   =   $departamento;
            $data["provincia"]      =   $provincia;
            $data["distrito"]       =   $distrito;
            
            $tabla_distrito        =    $this->load->view("ciudades/distrito",$data,TRUE);
            
            $tabla=array("tabla"=>$tabla_distrito);
            echo json_encode($tabla);

        }

    }
    
    function editar_distrito(){

            $id     = $this->input->post("iddist");
            $dist  = $this->input->post("dist");
            $this->mciudades->editar_distrito($dist,$id);
            $this->output->enable_profiler(FALSE);
 

    }
    
    function eliminar_distrito(){
        $id= $this->input->post("id");
        $this->mciudades->eliminar_distrito($id);
        $this->output->enable_profiler(FALSE);
        
    }
 
}