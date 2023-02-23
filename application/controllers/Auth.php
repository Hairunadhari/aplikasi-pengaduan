<?php

class Auth extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('form_validation');
	}

    public function index(){

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

         // Mengambil data user dan employee berdasarkan username
         $petugas = $this->auth_model->get_petugas_by_username($username);
         $masyarakat = $this->auth_model->get_masyarakat_by_username($username);

        
        if($masyarakat){
            if(password_verify($password, $masyarakat['password'])){
                
                $data = [
                    'username' => $masyarakat['username'],
                    'id_level' => $masyarakat['id_level'],
                ];
                $this->session->set_userdata($data);
                // var_dump($data);die;
                redirect('Home');

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger p-1"  role="alert" align="center">Password salah<button type="button" class="btn-close position-absolute" style="margin-left:110px; " data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('auth/login');
            }

        } else {
            if($petugas){
                if(password_verify($password, $petugas['password'])){
                    $data = [
                        'username' => $petugas['username'],
                        'id_level' => $petugas['id_level'],
                    ];
                    $this->session->set_userdata($data);
                    // var_dump($data);die;
                        redirect('Administrator');
    
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger p-1"  role="alert" align="center">Password salah<button type="button" class="btn-close position-absolute" style="margin-left:110px; " data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('auth/login');
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-danger p-1 alert-dismissible fade show" role="alert" align="center">Username belum terdaftar.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('auth/login');
        }
    }


	public function daftar()
	{
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('telp', 'No Telepon', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/daftar');
        } else {
            $data = array(
                'nik' => $this->input->post('nik'),
                'name' => $this->input->post('name'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_level' => 3
            );
            // var_dump($data);die;
            $this->db->insert('masyarakat',$data);
            redirect('auth/login');
        }
	}

    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');

        
        $this->session->set_flashdata('message', '<div class="alert alert-succes  alert-dismissible fade show" role="alert" align="center">Logout berhasil!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('auth/login');
    }
	public function login()
	{
		$this->load->view('auth/login');
	}
	public function home()
	{
		$this->load->view('home');
	}
    
}
?>
