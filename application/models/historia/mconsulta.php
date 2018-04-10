<?php

class Mconsulta extends CI_Model{
    
    function __construct() {
        parent::__construct();
        
    }
    
    function get_consulta_idcita($idcita){
        $where=array('idcitas'=>$idcita);
        $this->db->where($where);
        $query=$this->db->get('consulta');
        return $query->row();
    }
    

    
    function get_consulta_paciente($num_historia){
        $query=$this->db->query("select * from citas a
                            inner join consulta b on a.idcitas=b.idcitas
                            where a.numero_historia='$num_historia'");
        
        return $query->result();
    }
    
    function get_diagnostico($num_historia){
        
       $query=$this->db->query("select * from citas a
                            inner join consulta b on a.idcitas=b.idcitas
                            inner join diagnostico c on b.idconsulta=c.idconsulta
                            inner join cie d on c.cie=d.cie10
                            where a.numero_historia='$num_historia'");
        
        return $query->result();
        
    }
    
    function guardar_consulta($data,$proxima_cita)
    {
        
       //$var_fc,$var_pulso,$var_fr,$var_sed,$var_apetito,$var_miccion,$var_deposic ,$var_sueno , $var_informante , $var_estado_general , $var_estado_conciencia ,$var_tiempo_cantidad ,$var_tiempo_descripcion , $var_cie , $var_tratamiento , $var_idcita, $examen_clinico,$desc_cronologica,$medida_higienica, $medida_preventiva,$apoyo_diagnostico,$proxima_cita , $i 
       $fc                  =   $data["fc"];
       $pulso               =   $data["pulso"];
       $fr                  =   $data["fr"];  
       $sed                 =   $data["sed"];
       $apetito             =   $data["apetito"];
       $miccion             =   $data["miccion"];
       $deposic             =   $data["deposic"];
       $sueno               =   $data["sueno"];
       $informante          =   $data["informante"];
       $estado_general      =   $data["estado_general"];
       $estado_conciencia   =   $data["estado_conciencia"];
       $tiempo_cantidad     =   $data["tiempo_cantidad"];
       $tiempo_descripcion  =   $data["tiempo_descripcion"];
       $proxima_cita       ;
       $idcita              =   $data["idcita"];
       $examen_clinico      =   $data["examen_clinico"];
       $desc_cronologica    =   $data["desc_cronologica"];
       $medida_higienica    =   $data["medida_higienica"];
       $medida_preventiva   =   $data["medida_preventiva"];
       $apoyo_diagnostico   =   $data["apoyo_diagnostico"];
    
       $i= count($data["cie"]);
       $tratamientos    =   $data["tratamiento"];
       $enfermedad      =   $data["cie"]; 
       $tipo_consulta     =   $data["tipo_consulta"]; 
       for($x=0;$x<$i;$x++){
           
        $this->db->query("call sp_registrar_consulta($fc,"
                . "$pulso,"
                . "$fr,"
                . "$sed,"
                . "$apetito,"
                . "$miccion,"
                . "$deposic,"
                . "$sueno,"
                . "'$informante',"
                . "$estado_general,"
                . "$estado_conciencia,"
                . "$tiempo_cantidad,"
                . "$tiempo_descripcion,"
                . "'$enfermedad[$x]',"
                . "'$tratamientos[$x]',"
                . "$idcita,"
                . "'$examen_clinico',"
                . "'$desc_cronologica',"
                . "'$medida_higienica',"
                . "'$medida_preventiva',"
                . "'$apoyo_diagnostico',"
                . "'$proxima_cita',"
                . "'$tipo_consulta',"
                . "$x )");
            
       } 

    }
  
}