<?php 
        if(!$this->session->userdata('usuario')) redirect ('login/login');
	$this->load->view("layout/header");
	$this->load->view("layout/template");
	$this->load->view("layout/footer");

 ?>
