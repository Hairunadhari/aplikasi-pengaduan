<?php

class Administrator extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/content');
		$this->load->view('templates/footer');
	}

	
}
?>