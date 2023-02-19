<?php

class User extends CI_Controller {

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function daftar()
	{
		$this->load->view('auth/daftar');
	}
	public function home()
	{
		$this->load->view('home');
	}
}
?>