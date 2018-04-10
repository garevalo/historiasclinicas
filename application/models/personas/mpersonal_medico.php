<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mpersonal_medico
 *
 * @author hogar
 */
class Mpersonal_medico  extends CI_Model{
    
    function __contruct(){

        parent::__construct();
            
    }
    
    function registrar_personal($sql){
        
        $this->db->query($sql);
      
    }

    function get_medico(){
    
        $query=$this->db->get("vista_medicos");
        return $query->result();
   
    }
    
    function get_medicos_turno(){
        

        $query=$this->db->get("vista_medicos_horario");
        return $query->result();
        
    }
    
    function get_especialidad(){
        $query=$this->db->get("tipo_personalmedico");
        return $query->result();
        
    }
    
    
    function get_medico_especialidad($id){
        
        $this->db->where("idtipopersonal",$id);
        $query=$this->db->get("vista_medicos_horario");
        return $query->result();
    }
    
    
    function get_tipo_usuario($id){
        $this->db->where("idtipousuario",$id);
        $query=$this->db->get("tipousuario");
        return $query->result();
    }
    
    function get_personal_medico(){
      
        $query=$this->db->query("SELECT * FROM personal_medico a
        inner join personas b on a.idpersona=b.idpersona
        inner join usuario c on b.idpersona=c.idpersona
        inner join tipo_personalmedico d on d.idtipopersonal=a.idtipopersonal
        inner join tipousuario e on e.idtipousuario=c.idtipousuario
        inner join estadousuario f on f.idestadousuario=c.idestadousuario");
        return $query->result();
        
    }
    
    function get_personal_medico_id($id){
      
        $query=$this->db->query("SELECT * FROM personal_medico a
        inner join personas b on a.idpersona=b.idpersona
        inner join usuario c on b.idpersona=c.idpersona
        inner join tipo_personalmedico d on d.idtipopersonal=a.idtipopersonal
        inner join tipousuario e on e.idtipousuario=c.idtipousuario
        inner join estadousuario f on f.idestadousuario=c.idestadousuario
        where a.idpersonal=".$id);
        return $query->row();  
        
    }
    
    function get_id_personal_medico($idpersona){
        $query=$this->db->query("SELECT idpersonal FROM personal_medico a
        where a.idpersona=".$idpersona);
        return $query->row(); 
    }
    
   function actualizar_personal($data){
       
       /*
Array ( [dni] => 45845768 [nombre] => Giordan Brian [apellido_paterno] => ArÃ©valo [apellido_materno] => Povis 
        * [fecha_nacimiento] => 05/06/1989 [sexo] => 1 [telefono] => 951315698 [direccion] => Los ViÃ±edos Mz B lte 17 [tipo_personal] => 5 
        * [num_colegiatura] => 0 [usuario] => garevalo [contrasena] => 123456 [tipo_usuario] => 1 [idpersonal] => 12 )        */
       
       $dni=$data["dni"];
       $nombre=$data["nombre"];
       $apellido_paterno=$data["apellido_paterno"];
       $apellido_materno=$data["apellido_materno"];
       $fecha_nacimiento=$data["fecha_nacimiento"];
       $sexo=$data["sexo"];
       $telefono=$data["telefono"];
       $direccion=$data["direccion"];
       $tipo_personal=$data["tipo_personal"];
       $num_colegiatura=$data["num_colegiatura"];
       $usuario=$data["usuario"];
       $contrasena=$data["contrasena"];
       $tipo_usuario=$data["tipo_usurio"];
       $idtipo_usuario=$data["id_tipo_usuario"];
       $idpersonal=$data["idpersonal"];
       $estado_usuario=$data["estado_usuario"];
       
       $this->db->query("call editar_personal('$dni','$nombre','$apellido_paterno','$apellido_materno','$fecha_nacimiento','$sexo',
                        '$telefono','$direccion','$tipo_personal','$num_colegiatura','$usuario','$contrasena','$tipo_usuario','$idtipo_usuario','$estado_usuario','$idpersonal');");
   }
    
}
