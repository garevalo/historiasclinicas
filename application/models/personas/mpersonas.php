<?php

class Mpersonas extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
    }
    
    function get_data($tabla)
    {
        
        $query = $this->db->get($tabla);
        return $query->result(); 
        
    }
    
    function get_data_id($tabla,$id,$idval,$campo){
        
            $this->db->order_by($campo, "asc"); 
            $this->db->where($id, $idval);
            $query = $this->db->get($tabla);
            return $query->result();
 
    
      }
      
    function get_data_filtrada(){
        
            $query=$this->db->join('comentarios', 'comentarios.id = blogs.id');
            return $query->result();        
    }  
      
     function guardar_pariente($data){
   
         $personas = array(
               'apepaterno' => $data['ape_paterno_pariente'],
               'apematerno' => $data['ape_materno_pariente'],
               'nombres'    => $data['nombre_pariente'],
               'idsexo'     => $data['sexo_pariente'],
               'dni'        => $data['dni_pariente']
            );

         $this->db->insert('personas', $personas);

         
     } 
     
     function get_id($tabla,$campo){
         $this->db->select("$campo");
         $this->db->order_by("$campo", "desc");
         $query = $this->db->get($tabla);
         return $query->row();
     }
    
     function get_persona($campo){
       
       $query = $this->db->query("select * from  personas b
                        left join paciente a on a.idpersonas=b.idpersona
                        where b.dni like '%".$campo."%'");
        return $query->result();
    }
     
    function get_persona_no_paciente($campo){
        
       $query= $this->db->query("select * from  personas b
                        left join paciente a on a.idpersonas=b.idpersona
                        where b.dni like '%".$campo."%' and isnull(a.numero_historia)
                        ");
        return $query->result();
    }
    
    function get_persona_paciente($campo){
        
       $query= $this->db->query("select * from  personas b
                        inner join paciente a on a.idpersonas=b.idpersona
                        where b.dni='".$campo."'");
       
        return $query->row();
    }
    
}


