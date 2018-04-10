<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Ccie10 extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("cie10/mcie10");
    }
    
    
    function get_cie_nombre(){
        
       $cie=$this->mcie10->get_cie_nombre('cie10',$this->input->get('term', TRUE));
      

        foreach($cie as $result){

          $records[] = array('id' => $result->idcie,
                               'nombre_enfermedad' => $result->nombre_enfermedad,
                               'value' => $result->cie10
                             );
        			   
        }
       echo json_encode($records);
        
    } 
    
}
