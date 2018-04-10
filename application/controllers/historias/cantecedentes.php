<?php

class Cantecedentes extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model("historia/mantecedentes");
    }
    
    
    function guardar_antecedente(){
        
        
        
        $this->mantecedentes->guardar_antecedentes($_POST);
        $idcita= $this->input->post("idcita");
                
        redirect("historias/cconsulta/form_consulta/".$idcita);
    }
}