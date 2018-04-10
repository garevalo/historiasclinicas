<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mcitas
 *
 * @author hogar
 */
class mcitas extends CI_Model{
    
    function __construct() {
        parent::__construct();
        /*
         * create temporary table persona_medico_tmp as 
select a.idpersonal,concat(c.nombres,' ',c.apepaterno,' ',c.apematerno) as nombre_medico from personal_medico a 
                            join personas c on c.idpersona=a.idpersona
         */
        $this->db->query("create temporary table persona_medico_tmp as 
select a.idpersonal,concat(c.nombres,' ',c.apepaterno,' ',c.apematerno) as nombre_medico from personal_medico a 
                            join personas c on c.idpersona=a.idpersona;");
        $this->db->query("SET lc_time_names = 'es_UY';");
    }
    
    function guardar_cita($data){
        //Array ( [num_historia] => 00000000004 [especialidad] => 1 [medico] => 6 [cita] => Cita )
         /*$citas = array(
               'idpersonal'         => $data['medico'],
               'numero_historia'    => $data['num_historia'],
               'inicio'             => now(),
               'estado_cita'        => '1',
               'idtipopersonal'     => $data['especialidad']
            );

         $this->db->insert('citas', $citas);*/
        $medico=$data['medico'];
        $numero_historia=$data['num_historia'];
        $especialidad=$data['especialidad'];
        
        $sql="insert into citas (numero_historia,inicio,idestado_cita,idtipopersonal) values('$numero_historia',now(),'1',$especialidad)";
        $this->db->query($sql);
       
    }
    
    function get_citas(){

        $query=$this->db->query(" select a.idcitas, a.numero_historia , concat(c.nombres,' ',c.apepaterno,' ',c.apematerno) nombre_paciente,
            DATE_FORMAT(inicio,'%a %d de %M del %Y - %H:%i:%s') as inicio,d.nombre_medico,e.nombre_personal,f.estado_cita,a.idestado_cita,g.idconsulta
            from citas a
            join paciente b on a.numero_historia=b.numero_historia
            join personas c on c.idpersona=b.idpersonas
            left join  (select a.idpersonal,concat(c.nombres,' ',c.apepaterno,' ',c.apematerno) as nombre_medico from personal_medico a 
                            join personas c on c.idpersona=a.idpersona
                   ) d
            on d.idpersonal=a.idpersonal
            left join tipo_personalmedico e on a.idtipopersonal=e.idtipopersonal
            join estado_cita f on a.idestado_cita=f.idestado_cita
            left join consulta g on a.idcitas=g.idcitas
            order by a.idcitas");
        
        return $query->result();

    }
    
    function get_cita_id($idcita){
        
        $sql="select a.idcitas, a.numero_historia , concat(c.nombres,' ',c.apepaterno,' ',c.apematerno) nombre_paciente,
            DATE_FORMAT(inicio,'%a %d de %M del %Y - %H:%i:%s') as inicio,e.nombre_personal,f.estado_cita,a.idestado_cita,g.idconsulta
            from citas a
            join paciente b on a.numero_historia=b.numero_historia
            join personas c on c.idpersona=b.idpersonas
            join tipo_personalmedico e on a.idtipopersonal=e.idtipopersonal
            join estado_cita f on a.idestado_cita=f.idestado_cita
            left join consulta g on a.idcitas=g.idcitas
            where a.idcitas=".$idcita ."
            order by a.idcitas";
        
         $query=$this->db->query($sql);
        
        return $query->row();
        
    }
    
    function get_cita_idpersonal($idpersonal,$desde,$hasta){
        
         $sql=" select * from citas a
                join consulta b on a.idcitas=b.idcitas
                join paciente c  on c.numero_historia=a.numero_historia
                join personas d on d.idpersona = c.idpersonas
                where idpersonal=".$idpersonal." and
                inicio between  '".$desde."' and '".$hasta."'";
        
         $query=$this->db->query($sql);
        
        return $query->result();
    }
    
    
    function get_reporte_citas($desde,$hasta){
        
         $sql=" select * from citas a
                join paciente c  on c.numero_historia=a.numero_historia
                join personas d on d.idpersona = c.idpersonas
                join tipo_personalmedico e on a.idtipopersonal=e.idtipopersonal
                where 
                date(a.inicio) between  '".$desde."' and '".$hasta."'";
        
         $query=$this->db->query($sql);
        
        return $query->result();
    }

}
