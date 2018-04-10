<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Cocupacion extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("ocupacion/mocupacion");
    }
    
    function index(){
        
        $this->load->view("ocupacion/frm_ocupacion");
        
    }
    
    function modal_ocupacion(){
        
        $this->load->view("ocupacion/modal_ocupacion");
    }
    
    function guardar_ocupacion(){
        $ocupacion=$this->input->post("ocupacion");
        $this->mocupacion->guardar_ocupacion($ocupacion);
        
    }
    
    function cargar_ocupacion(){
        $ocupacion=$this->mocupacion->get_ocupacion();
        $cantidad=  count($ocupacion);
        echo "<option value='".$ocupacion[$cantidad-1]->idocupacion."' selected=''>".$ocupacion[$cantidad-1]->ocupacion."</option>";
    }
    
}
