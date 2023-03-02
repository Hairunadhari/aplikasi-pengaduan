<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('auth_model');
		// $this->load->model('home_model');
        
    }

	public function load()
	{
		$page = array(
            "header" => $this->load->view('template/header', false, true),
            "navbar" => $this->load->view('template/navbar', false, true),
            "footer" => $this->load->view('template/footer', false, true),

        );
        return $page;
	}

	public function index()
	{
		$path = "";
		$id = $this->session->userdata('masyarakat_id');
		$data['masyarakat'] = $this->auth_model->getall_data_masyarakat_by_id($id);
		// var_dump($data['masyarakat']);die;
        $data = array(
            "page" => $this->load("Home", $path),
            "title" => "Home",
            "content" => $this->load->view('umum/home', $data, true)
        );
        $this->load->view('template/default', $data);
	}

	public function input_foto(){
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;
        $config['max_size']     = '10000';
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        $_FILES['file']['name'] = $_FILES['foto']['name'];
        $_FILES['file']['type'] = $_FILES['foto']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['foto']['error'];
        $_FILES['file']['size'] = $_FILES['foto']['size'];
        
        $this->upload->do_upload('foto');
        $foto = $this->upload->data();
        return $foto;
    }

	public function add_pengaduan()
	{
		$foto =   $this->input_foto();
		
		$datapengaduan = [
			'tgl_pengaduan' => date('Y-m-d H:i'),
			'id_masyarakat' => $this->input->post('id_masyarakat'),
			'isi_laporan' => $this->input->post('isi_laporan'),
			'foto' => $foto['file_name'],
			'status' => 'Diproses'
		];
		// var_dump($datapengaduan);die;
		$this->db->insert('pengaduan', $datapengaduan);
		redirect('Home');

	}
}
