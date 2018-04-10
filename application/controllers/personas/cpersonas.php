<?php
class Cpersonas extends CI_Controller{
    
    function __construct() {
        parent::__construct();
       $this->load->model('personas/mpersonas'); 
       
    }
    
   function nuevo_pariente(){
       
        $data['sexo']= $this->mpersonas->get_data('sexo'); 
        $data['pariente']=$this->input->post('pariente');
        
        $data['conten_modal']='personas/personas';
        $this->load->view('personas/RegistroPariente',$data);
        $this->load->view('layout/footer');
    }
    
    function registrar_pariente(){
       
//        
//        $this->load->library('form_validation');
//
//        $this->form_validation->set_rules('dni_pariente', 'DNI pariente', 'is_unique[personas.dni]');
////        $this->form_validation->set_rules('password', 'Contraseña', 'required');
////        $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'required');
////        $this->form_validation->set_rules('email', 'Email', 'required');
//
//        if ($this->form_validation->run() == FALSE)
//        {
//            $this->load->view('mi_form');
//        }
//        else
//        {
//            $this->load->model('personas/mpersonas');
//            //$data['pariente']=$this->input->post('pariente'); 
//            $this->mpersonas->guardar_pariente($_POST);
//            $idpersona=$this->mpersonas->get_id('personas','idpersona'); 
//            echo json_encode($idpersona);
//        //print_r($_POST);
//        //echo json_encode($obj->get_val($sql));
//        } 
        
        
       
       //$data['pariente']=$this->input->post('pariente'); 
       $this->mpersonas->guardar_pariente($_POST);
       $idpersona=$this->mpersonas->get_id('personas','idpersona'); 
       echo json_encode($idpersona);

    }
    
    function get_personas(){
        
        $persona=$this->mpersonas->get_persona($this->input->get('term', TRUE));

        foreach($persona as $result){

          $records[] = array( 'id'              =>  $result->idpersona,
                               'nombre'         =>  $result->nombres.' '.$result->apepaterno.' '.$result->apematerno, 
                               'nombres'        =>  $result->nombres,
                               'apepaterno'     =>  $result->apepaterno,
                               'apematerno'     =>  $result->apematerno,
                               'idsexo'         =>  $result->idsexo,
                               'domicilio'      =>  $result->domicilio,
                               'fecnacimiento'  =>  $result->fecnacimiento,
                               'telefono'       =>  $result->telefono,
                               'value'          =>  $result->dni);
        			   
        }
       echo json_encode($records);
        
    }
    
    function get_personas_no_paciente(){
        
        $persona=$this->mpersonas->get_persona_no_paciente($this->input->get('term', TRUE));
       
       
        foreach($persona as $result){

          $records[] = array( 'id'      => $result->idpersona,
                               'nombres' => $result->nombres,
                               'apepaterno' =>$result->apepaterno,
                               'apematerno' =>$result->apematerno,
                               'idsexo' =>$result->idsexo,
                               'domicilio' =>$result->domicilio,
                               'fecnacimiento' =>$result->fecnacimiento,
                               'telefono' =>$result->telefono,
                               'value'  => $result->dni
                             );
        			   
        }
       echo json_encode($records);
        
    }
    
    function get_persona_paciente(){
        
       $persona=$this->mpersonas->get_persona_paciente($this->input->post('idpersona', TRUE)); 
       $cant_persona=  count($persona);
       if($cant_persona>0){
           echo "Ya existe este paciente";
       }
       

    }
    
    
    
	       
}

