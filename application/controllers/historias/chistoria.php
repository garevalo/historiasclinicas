<?php 

class Chistoria extends CI_Controller{


	function __construct() {
            parent::__construct();
            $this->load->model("historia/mhistoria");
            $this->load->model("historia/mconsulta");
            $this->load->model("historia/mantecedentes");
            $this->load->library("metodos");
        }
        
        function sacar_cita(){
            
            $this->load->view("");
            echo "sacar cita";
      
        }
        
        function imprimir_historia($numero_historia){
           $this->load->model("paciente/mpaciente"); 
           $antecedentes=$this->mantecedentes->get_antecedentes($numero_historia); 
           $diagnostico=$this->mconsulta->get_diagnostico($numero_historia);
           $consulta=$this->mconsulta->get_consulta_paciente($numero_historia);
           $this->load->library("tcpdf/tcpdf");
           $historias= $this->mhistoria->get_historia($numero_historia);
           $edad=$this->mpaciente->edad_paciente($numero_historia);
           $fecha_nacimiento=$this->metodos->revertir_fecha( $historias->fecnacimiento);
           
           $data=array("historias"          =>  $historias,
                        "fecha_nacimiento"  =>  $fecha_nacimiento,
                        "consulta"          =>  $consulta,
                        "antecedentes"      =>  $antecedentes,
                        "diagnostico"       =>  $diagnostico,
                        "edad"              =>  $edad->edad);
           
           $this->load->view("historia_clinica/historia_pdf",$data);
         
        }

}

