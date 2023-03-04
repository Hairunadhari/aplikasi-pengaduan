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
        $id = $this->input->post('id');
		$path = "";
        $data['pengaduan'] = $this->admin->get_all_pengaduan();
        // var_dump($data['pengaduan']);die;
        // $data['petugas'] = $this->admin->ambil_id_petugas($id);
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
        $this->db->delete('tanggapan', ['id_pengaduan' => $id]);
        // $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-1 alert-dismissible fade show" role="alert">Data berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Administrator/daftar_pengaduan');
    }
        
    public function input_tanggapan(){
        $data = [
            'id_pengaduan' => $this->input->post('id_pengaduan'),
            'tgl_tanggapan' => date('Y-m-d H:i'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $this->input->post('id_petugas'),
        ];
        $this->db->insert('tanggapan', $data);

        $data_status = [
            'status' =>  'Selesai',
        ];
        $this->db->where('id', $this->input->post('id_pengaduan'));
        $this->db->update('pengaduan', $data_status);
        // var_dump($where);die;
        redirect('Administrator/daftar_pengaduan');
    }
    public function terimaPengaduan()
	{
		
		$dataPengaduan = array(
			'status' => 'selesai',
		);

		$this->db->where('id', $this->input->post('id_pengaduan'));
		$updatePengaduan = $this->db->update('pengaduan', $dataPengaduan);

		if($insertTanggapan || $updatePengaduan){
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

    public function account()
	{   
		$path = "";
        $data['akun'] = $this->admin->get_akun();
      
        // $data['petugas'] = $this->admin->ambil_id_petugas($id);
        $data = array(
            "page" => $this->load("Aministrator", $path),
            "title" => "Semua Pengaduan",
            "content" => $this->load->view('admin/account', $data, true)
        );
        $this->load->view('template_admin/default', $data);
	}
    public function edit_account($id)
    {
        $this->load->library('encryption');
        $path = "";
        $data['pengaduan'] = $this->admin->ambil_id_akun($id);
        // var_dump($data['pengaduan']);die; 
        $data = array(
            "page" => $this->load("Administrator", $path),
            "title" => "Edit Pengaduan",
            "content" => $this->load->view('admin/edit_account', $data, true)
        );
        $this->load->view('template_admin/default', $data);
    }
    public function update_account(){
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
        ];
        // var_dump($data);die;
        $this->db->where('petugas_id', $this->input->post('petugas_id'));
        $this->db->update('petugas', $data);
        $this->session->set_flashdata('message', '<div  class="alert m-1 text-center alert-success alert-dismissible" role="alert">User berhasil di edit! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button></div>');
        redirect('Administrator/account');
    }

public function form_add_account()
	{
		$path = "";
        $data['role'] = $this->admin->get_role();
        // var_dump($data);die;
        $data = array(
            "page" => $this->load("Aministrator", $path),
            "title" => "Dashboard",
            "content" => $this->load->view('admin/add_account', $data, true)
        );
        $this->load->view('template_admin/default', $data);
	}

    public function add_account(){
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
            'role_id' => $this->input->post('role_id'),
        ];
        // var_dump($data);die;
        $this->db->insert('petugas', $data);
        $this->session->set_flashdata('message', '<div class="alert m-1 text-center alert-success alert-dismissible" role="alert">User berhasil ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button></div>');
        redirect('Administrator/account');
    }

    public function delete_account($id){
        $this->db->delete('petugas', ['petugas_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert m-1 text-center alert-success alert-dismissible" role="alert">User berhasil dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button></div>');
        redirect('Administrator/account');
    }
}
?>
