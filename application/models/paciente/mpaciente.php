<?php 

class Mpaciente extends CI_Model{
	
	
	function registrar_paciente($sp)
	{
		$this->db->query($sp);
		
	}
        
        function editar_paciente($sp)
	{
		$this->db->query($sp);
		
	}
        
        function busca_paciente($tipo,$buscar,$desde=0,$cantidad=20){
            if(isset($tipo) && !empty($tipo)){
                
                if($tipo=="dni"){

                     $sql="select * from paciente a
                     inner join personas b on a.idpersonas=b.idpersona
                     where dni like'%".$buscar."%'
                     limit ".$desde.",".$cantidad;
                     $consulta=$this->db->query($sql);
                     return $consulta->result();
                }

                if($tipo=="numhistoria"){

                     $sql=" select * from paciente a
                     inner join personas b on a.idpersonas=b.idpersona
                     where numero_historia like'%".$buscar
                     ."%' limit ".$desde.",".$cantidad;
                     
                     $consulta=$this->db->query($sql);
                     return $consulta->result();
                }

                if($tipo=="nombre"){

                     $sql=" select * from paciente a
                            inner join personas b on a.idpersonas=b.idpersona
                            where (apepaterno like '%".$buscar."%') or (apematerno like '%".$buscar."%') or (nombres like '%".$buscar."%')
                            limit ".$desde.",".$cantidad;
                     
                     $consulta=$this->db->query($sql);
                     return $consulta->result();
                } 
            
            }          
            else{
 
                 $sql=" select * from paciente a
                     inner join personas b on a.idpersonas=b.idpersona";
                 $consulta=$this->db->query($sql);
                 return $consulta->result();
            }
            
            
        }
        
        function edad_paciente($num_historia){
  
            $query=$this->db->query("select edad_paciente(".$num_historia.") as edad");
            
            return $query->row(0);
   
            
        }
        
        
        function get_paciente_registrados($desde,$hasta){
            
            $query=$this->db->query("SELECT a.numero_historia,a.fecha_registro_paciente,a.hora_inicio,concat(b.nombres,'',b.apepaterno,' ',b.apematerno ) as paciente, edad_paciente(a.numero_historia)as edad,b.dni FROM paciente a
            inner join personas b on a.idpersonas=b.idpersona
            where fecha_registro_paciente between  '".$desde."' and '".$hasta."'");
            return $query->result();
        }
        
        
      
        

}

