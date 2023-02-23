<?php

class Administrator extends CI_Controller {

	public function load()
	{
		$page = array(
            "header" => $this->load->view('template_admin/header', false, true),
            "sidenav" => $this->load->view('template_admin/sidenav', false, true),
            "footer" => $this->load->view('template_admin/footer', false, true),

        );
        return $page;
	}

	public function index()
	{
		$path = "";

        $data = array(
            "page" => $this->load("Aministrator", $path),
            "title" => "Dashboard",
            "content" => $this->load->view('admin/dashboard', false, true)
        );
        $this->load->view('template_admin/default', $data);
	}

	public function daftar_pengaduan()
	{
		$path = "";

        $data = array(
            "page" => $this->load("Aministrator", $path),
            "title" => "Semua Pengaduan",
            "content" => $this->load->view('admin/daftar_pengaduan', false, true)
        );
        $this->load->view('template_admin/default', $data);
	}

	


	
}
?>