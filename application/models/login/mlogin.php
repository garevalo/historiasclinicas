<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model{
    
	function __construct()
	{
		
		parent::__construct();
	}

    function login($user,$pass){
	
	$array = array('usuario' => $user,'contrasena' => $pass);
	$this->db->where($array); 
    	$res=$this->db->get('usuario');
	
	$cant=$res->num_rows();
		
		if($cant>0)
        {
                    return $res->row();
		}
		else
        {
                    return false;
		}
	}
	
	
	
}
