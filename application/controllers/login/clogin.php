<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Clogin extends CI_Controller{

    
    function index(){
        
		$data['title']="Iniciar Sesion";
		
                $this->load->view('login/login',$data);
      
    }

    function login(){

        
   	 $this->load->model("login/mlogin");
	 $this->load->model("personas/mpersonal_medico"); 
	 
	 $user = $this->input->post('usuario');
	 $pass = $this->input->post('contrasena');
	 $login=$this->mlogin->login($user,$pass);
	 
        
         
	 
		 if($login){
            // if($this->session->userdata('sesion')=='ok')
            // {
                     
	 $idpersona=$this->mpersonal_medico->get_id_personal_medico($login->idpersona);
	 $sesion=array('usuario' => $user,'sesion' => 'ok','tipo_usuario'=>$login->idtipousuario,'idpersona'=>$idpersona->idpersonal);
	 $this->session->set_userdata($sesion);
               
		   $this->load->model('personas/mpersonas');
		   $this->load->model("historia/mhistoria");
		   
		   $data['numero_historia']	=	$this->mhistoria->generar_num_historia();
		   $data['sexo']		=	$this->mpersonas->get_data('sexo');
		   $data['raza']		=	$this->mpersonas->get_data('raza');
   		   $data['grupo_sanguineo']	=	$this->mpersonas->get_data('grupo_sanguineo');
		   $data['estado_civil']	=	$this->mpersonas->get_data('estado_civil');
		   $data['religion']		=	$this->mpersonas->get_data('religion');     
                   $data['departamento']	=	$this->mpersonas->get_data('departamento');
		   $data['provincia']           =	$this->mpersonas->get_data('provincia');
		   $data['distrito']		=	$this->mpersonas->get_data('distrito');
                   $data['grado_instruccion']   =	$this->mpersonas->get_data('grado_instruccion');
		   $data['ocupacion']		=	$this->mpersonas->get_data('ocupacion');
                   $data['titulomodal'] 	=	'Registrar Pariente';
                   $data['conten_modal']	=	'personas/personas';
                   $data['titulopanel']		=	"Menú Principal";
                   $data['title']		=	"Menu Principal";
                   $data['contenido']		=	"layout/menu_principal";

		  // $this->validar_sesion();		  
                  $this->load->view('layout/header',$data);
                  $this->load->view('layout/template');
                  $this->load->view('layout/footer');
	 
	 	}
		 else{
		 	$data['error']="Usuario Incorrecto";
			$data['title']="Iniciar Sesion";
		 	$this->load->view('login/login',$data);
		 
		}	 
    }
	
	
	function validar_sesion(){
		if($_SESSION['sesion']='ok'){
			return true;
			
			}
		else{
			$data['error']="Inicie Sesión";
			$data['title']="Iniciar Sesion";
		 	$this->load->view('login/login',$data);
			
			}
			
		
	}
	
	function log_out()
        {
		//$this->load->library('session');
		$this->session->sess_destroy();
			
		if(!isset($_SESSION['usuario']))
                {
			$data['title']="Sesion cerrada";
			$this->load->view('login/login',$data);
			
			//echo $this->session->userdata('usuario');
		}
	
	}
	
}

