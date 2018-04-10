<?php
class Cpaciente extends CI_Controller{
    
    private $_data = array();

    function __construct() {
        parent::__construct();
                
       		$this->load->model('personas/mpersonas');
    	    $this->load->model("historia/mhistoria");  
            $this->load->model('paciente/mpaciente');
            $this->load->library('metodos');
            $this->_data['numero_historia']	=	$this->mhistoria->generar_num_historia(); 
    		$this->_data['sexo']                   =	$this->mpersonas->get_data('sexo');
    		$this->_data['raza']                   =	$this->mpersonas->get_data('raza');
       		$this->_data['grupo_sanguineo']	=	$this->mpersonas->get_data('grupo_sanguineo');
    		$this->_data['estado_civil']           =	$this->mpersonas->get_data('estado_civil');
    		$this->_data['religion']		=	$this->mpersonas->get_data('religion');     
            $this->_data['departamento']           =	$this->mpersonas->get_data('departamento');
    		$this->_data['provincia']              =	$this->mpersonas->get_data('provincia');
    		$this->_data['distrito']		=	$this->mpersonas->get_data('distrito');
            $this->_data['grado_instruccion']      =	$this->mpersonas->get_data('grado_instruccion');
    		$this->_data['ocupacion']		=	$this->mpersonas->get_data('ocupacion'); 
                
            $this->_data['title']			=	"Paciente";
            $this->_data['titulopanel']='Registro de Historia Clinica';
                      
    }
    
    function nuevo_paciente(){
                $this->load->view('layout/header',$this->_data);
                $data['contenido']		=	"pacientes/RegistrarPaciente";
                $data['titulomodal']            =	'Registrar Pariente';
                $data['conten_modal']           =	'personas/personas';
                $this->load->view('layout/template',$data);
                $this->load->view('layout/footer');
   
    }
    
    function registrar_paciente(){
		
//                 $this->load->library('form_validation');
//
//                 $this->form_validation->set_rules('num_historia', 'Numero de Historia', 'is_unique');
//                 $this->form_validation->set_rules('dni', 'Este DNI ya ha sido registrado', 'is_unique');
//                 
//                 if ($this->form_validation->run() == FALSE){
//                     $this->load->view("pacientes/RegistrarPaciente");
//                     
//                 }else {
                 $var_numero_historia   =   $this->input->post('num_historia');
                 $var_hora              =   $this->input->post('hora');
                 $var_apepaterno        =   $this->input->post('ape_paterno');
                 $var_apematerno        =   $this->input->post('ape_materno');
                 $var_nombre            =   $this->input->post('nombre');
                 $var_sexo              =   $this->input->post('sexo');
                 $var_raza              =   $this->input->post('raza');
                 $var_grupo_sanguineo   =   $this->input->post('grupo_sanguineo'); 
                 $var_estado_civil      =   $this->input->post('estado_civil'); 
                 $var_domicilio         =   $this->input->post('domicilio'); 
                 $var_dni               =   $this->input->post('dni');
                 $var_fecha_nac         =   $this->metodos->convertir_fecha($this->input->post('fecha_nacimiento'));
                 $var_distrito          =   $this->input->post('departamento'); 
                 $var_procedencia       =   $this->input->post('procedencia');
                 $var_grado_instruccion =   $this->input->post('grado_instruccion'); 
                 $var_religion          =   $this->input->post('religion');
                 $var_ocupacion         =   $this->input->post('ocupacion');
                 $var_padre             =   $this->input->post('nom_padre');
                 $var_madre             =   $this->input->post('nom_madre');
                 $var_notificar         =   $this->input->post('notificar'); 
                 $var_telefono          =   $this->input->post('telefono'); 
                 $accion                =   $this->input->post('accion'); 
                $sp  ="call registrar_paciente('$var_numero_historia','$var_hora','$var_apepaterno','$var_apematerno','$var_nombre','$var_sexo','$var_raza',
                       '$var_grupo_sanguineo','$var_estado_civil','$var_domicilio','$var_dni','$var_fecha_nac','$var_distrito','$var_procedencia',
                       '$var_grado_instruccion','$var_religion','$var_ocupacion','$var_padre','$var_madre','$var_notificar','$var_telefono','$accion');";
              
                $this->mpaciente->registrar_paciente($sp);
                 
                //$data['mensaje_ok']             =       "Registrado Correctamente"; 
                //$data['conten_modal']           =	'personas/personas';
               // $this->load->view('layout/mensaje',$data);
               redirect('paciente/cpaciente/buscar_paciente', 'location');
            //   }

	}
        
        function buscar_paciente(){
            $this->load->view('layout/header',$this->_data);
            if(isset($_POST['tipo'])){
                
              $tipo=$this->input->post('tipo');
              $buscar=$this->input->post('buscar'); 
              $data["paciente"]=$this->mpaciente->busca_paciente($tipo,$buscar,0,20);
              echo $this->load->view("pacientes/TablaPaciente",$data,true);
            
            }
            else{
                $tipo=""; $buscar="";
                $data["contenido"]='pacientes/BuscarPaciente';
                $data['titulopanel']='Buscar Paciente';

                $data["paciente"]=$this->mpaciente->busca_paciente($tipo,$buscar,0,20);
                $this->load->view("layout/template",$data);
                $this->load->view('layout/footer');
            }
        }

        public function datapacientes(){

            // DB table to use
            $table = 'paciente';
             
            // Table's primary key
            $primaryKey = 'numero_historia';
             
            // Array of database columns which should be read and sent back to DataTables.
            // The `db` parameter represents the column name in the database, while the `dt`
            // parameter represents the DataTables column identifier. In this case object
            // parameter names
            $columns = array(
                        array( 'db' => 'b.idpersona',       'dt' => 'idpersona', 'field'=>'idpersona' ),
                        array( 'db' => 'a.numero_historia', 'dt'=>'numero_historia',  'field' => 'numero_historia' ),
                        array( 'db' => 'b.nombres',       'dt' => 'nombres', 'field'=>'nombres' ),
                        array( 'db' => 'b.apepaterno',       'dt' => 'apepaterno', 'field'=>'apepaterno' ),
                        array( 'db' => 'b.apematerno',       'dt' => 'apematerno', 'field'=>'apematerno' ),
                        array( 'db' => 'b.dni',       'dt' => 'dni', 'field'=>'dni' ),
                        array( 'db' => 'b.domicilio',       'dt' => 'domicilio', 'field'=>'domicilio' ),
                        array( 'db' => 'b.domicilio',       'dt' => 'domicilio', 'field'=>'domicilio' ),
                        );

            $joinQuery = "from paciente a inner join personas b on a.idpersonas=b.idpersona";
            $extraCondition = "";
             
            // SQL server connection information
            $sql_details = array(
                'user' => 'homestead',
                'pass' => 'secret',
                'db'   => 'gesthospital',
                'host' => 'localhost'
            );
             
             
            /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
             * If you just want to use the basic configuration for DataTables with PHP
             * server-side, there is no need to edit below this line.
             */
           
            $this->load->library('ssp');
           
             
            echo json_encode(
                SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns ,$joinQuery)
            );





        }
        
        
        
        function cargar_provincia(){
        
           $iddepartamento=$this->input->post('id');
           $provincia   = $this->mpersonas->get_data_id('provincia','iddepartamento',$iddepartamento,'provincia');
           
        ?>

            <option value="">Provincia</option>
            <?php foreach ($provincia as $rowprovincia){ ?>
            <option value='<?= $rowprovincia->idprovincia ?>'<?php echo set_select('provincia', $rowprovincia->idprovincia); ?>> <?= $rowprovincia->provincia ?></option>
            <?php }
     
        }
        
        function cargar_distrito(){
        
           $idprovincia=$this->input->post('id');
           $distrito   = $this->mpersonas->get_data_id('distrito','idprovincia',$idprovincia,'distrito');
        ?>

            <option value="">Distrito</option>
            <?php foreach ($distrito as $rowdistrito){ ?>
            <option value='<?= $rowdistrito->iddistrito ?>'<?php echo set_select('distrito', $rowdistrito->iddistrito); ?>> <?= $rowdistrito->distrito ?></option>
            <?php }
   
        }
        
        
        function frm_editar_paciente($numero_historia){
                $this->load->view('layout/header',$this->_data);
                $paciente= $this->mhistoria->get_historia($numero_historia);
                $data['contenido']		=	"pacientes/EditarPaciente";
                $data['titulomodal']            =	'Registrar Pariente';
                $data['conten_modal']           =	'personas/personas';
                $data['paciente']               =	 $paciente;
                $this->load->view('layout/template',$data);
                $this->load->view('layout/footer');
        }
        
        
        function editar_paciente(){
                 $var_numero_historia   =   $this->input->post('num_historia');
                 $var_hora              =   $this->input->post('hora');
                 $var_apepaterno        =   $this->input->post('ape_paterno');
                 $var_apematerno        =   $this->input->post('ape_materno');
                 $var_nombre            =   $this->input->post('nombre');
                 $var_sexo              =   $this->input->post('sexo');
                 $var_raza              =   $this->input->post('raza');
                 $var_grupo_sanguineo   =   $this->input->post('grupo_sanguineo'); 
                 $var_estado_civil      =   $this->input->post('estado_civil'); 
                 $var_domicilio         =   $this->input->post('domicilio'); 
                 $var_dni               =   $this->input->post('dni');
                 $var_fecha_nac         =   $this->metodos->convertir_fecha($this->input->post('fecha_nacimiento'));
                 $var_distrito          =   $this->input->post('departamento'); 
                 $var_procedencia       =   $this->input->post('procedencia');
                 $var_grado_instruccion =   $this->input->post('grado_instruccion'); 
                 $var_religion          =   $this->input->post('religion');
                 $var_ocupacion         =   $this->input->post('ocupacion');
                 $var_padre             =   $this->input->post('nom_padre');
                 $var_madre             =   $this->input->post('nom_madre');
                 $var_notificar         =   $this->input->post('notificar'); 
                 $var_telefono          =   $this->input->post('telefono'); 

                $sp  ="call sp_editar_paciente('$var_numero_historia','$var_hora','$var_apepaterno','$var_apematerno','$var_nombre','$var_sexo','$var_raza',
                       '$var_grupo_sanguineo','$var_estado_civil','$var_domicilio','$var_dni','$var_fecha_nac','$var_distrito','$var_procedencia',
                       '$var_grado_instruccion','$var_religion','$var_ocupacion','$var_padre','$var_madre','$var_notificar','$var_telefono');";
              
                $this->mpaciente->registrar_paciente($sp);

                redirect('paciente/cpaciente/buscar_paciente', 'location');
            
        }
        
  
        
}

