<?php


class mantecedentes extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function guardar_antecedentes($data){
       
        $antecedentes_familiares =$data["antecedentes_familiares"];
        $antecedentes_epidemiologicos =$data["antecedentes_epidemiologicos"];
        $antecedentes_ocupacionales =$data["antecedentes_ocupacionales"];
        $antecedentes_personales =$data["antecedentes_personales"];
        $numero_historia =$data["numero_historia"];
        $sql="insert into antecedentes(ant_personales,ant_familiares,ant_epidemiologicos,ant_ocupacionales,numero_historia)
            values('$antecedentes_personales','$antecedentes_familiares','$antecedentes_epidemiologicos','$antecedentes_ocupacionales','$numero_historia')";
        $this->db->query($sql);
        
    }
    function get_antecedentes($numero_historia){
        $where=array("numero_historia"=>$numero_historia);
        $this->db->where($where);
        $query=$this->db->get("antecedentes");
        return $query->row();
    }
 
}

