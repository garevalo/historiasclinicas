<?php 

class Mhistoria extends CI_Model{
	
	
	function __construct(){
		parent::__construct();	
	}
	
	function generar_num_historia (){
		
		$sql="select * from paciente order by numero_historia desc limit 1";
		$query = $this->db->query($sql);
       	$cant=$query->num_rows();
				
		
		if($cant==0){
			return $corre=str_pad('0'+1, 11, "0", STR_PAD_LEFT);
		}
		else
		{
			$row=$query->row();
			$num_historia=$row->numero_historia;
			return $corre=str_pad($num_historia+1, 11, "0", STR_PAD_LEFT);
		}
	}
        
        function get_historia($numero_historia){
            
//            $where=array("numero_historia"=>$numero_historia);
//            $this->db->where($where);
            $query=$this->db->query("select 
      *
    from
        (((((((`paciente` `a`
        join `personas` `b` ON ((`a`.`idpersonas` = `b`.`idpersona`)))
        join `sexo` `c` ON ((`c`.`idsexo` = `b`.`idsexo`)))
        join `raza` `d` ON ((`d`.`idraza` = `b`.`idraza`)))
        join `grupo_sanguineo` `e` ON ((`e`.`idgruposang` = `b`.`idgruposang`)))
        join `estado_civil` `f` ON ((`f`.`idestcivil` = `b`.`idestcivil`)))
        join `grado_instruccion` `g` ON ((`g`.`idgradoinstruccion` = `b`.`idgradoinstruccion`)))
        join `ocupacion` `i` ON ((`i`.`idocupacion` = `b`.`idocupacion`)))
	join departamento l on l.iddepartamento=b.iddistrito
        join religion m on m.idreligion = b.idreligion
        where numero_historia='".$numero_historia."'");
            
            return $query->row();
            
        }
}
