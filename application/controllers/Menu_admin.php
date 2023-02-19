<?php

class Menu_admin extends CI_Controller {

	public function dashboard()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}

	
}
?>