<?php

class Administrator extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
    }
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
        $data['pengaduan'] = $this->admin->get_all_pengaduan();
        $data = array(
            "page" => $this->load("Aministrator", $path),
            "title" => "Semua Pengaduan",
            "content" => $this->load->view('admin/daftar_pengaduan', $data, true)
        );
        $this->load->view('template_admin/default', $data);
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

	public function edit_pengaduan($id)
    {
        $path = "";
        $data['pengaduan'] = $this->admin->ambil_id_pengaduan($id);
        // var_dump($data['pengaduan']);die;
        $data = array(
            "page" => $this->load("Administrator", $path),
            "title" => "Edit Pengaduan",
            "content" => $this->load->view('admin/edit_pengaduan', $data, true)
        );
		$this->load->view('template_admin/default', $data);
    }

    public function update_pengaduan(){
        $dataM = [
            'masyarakat_id' => $this->input->post('masyarakat_id'),
            'name' => $this->input->post('name'),
        ];
        // var_dump($dataM);die;
        $this->db->where('masyarakat_id', $this->input->post('masyarakat_id'));
        $this->db->update('masyarakat', $dataM);

        $dataP = [
            'isi_laporan' => $this->input->post('isi_laporan'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pengaduan', $dataP);
        redirect('Administrator/daftar_pengaduan');
        }
        
    public function delete_pengaduan($id){
        $this->db->delete('pengaduan', ['id' => $id]);
        // $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-1 alert-dismissible fade show" role="alert">Data berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Administrator/daftar_pengaduan');
    }
        
    public function tanggapan(){
        $dataM = [
            'masyarakat_id' => $this->input->post('masyarakat_id'),
            'name' => $this->input->post('name'),
        ];
            // var_dump($dataM);die;
        $this->db->where('masyarakat_id', $this->input->post('masyarakat_id'));
         $this->db->update('masyarakat', $dataM);
    
        $dataP = [
            'isi_laporan' => $this->input->post('isi_laporan'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pengaduan', $dataP);
        redirect('Administrator/daftar_pengaduan');
    }
}
?>
