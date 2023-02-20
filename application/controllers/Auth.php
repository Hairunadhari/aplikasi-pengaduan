<?php

class Auth extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('user_model');
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
        $user = $this->db->select('user.id, user.name, user.username, user.password, user.role')->from('user')->where('username', $username)->get()->row_array();
        // var_dump($user);die;
        if($user){

            if(password_verify($password, $user['password'])){
                
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                ];
                $this->session->set_userdata($data);
                var_dump($data);die;

                if ($user['role'] == 'admin') {
                    redirect('Administrator');
                } else{
                    redirect('Home');
                }

            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger p-1"  role="alert" align="center">Password salah<button type="button" class="btn-close position-absolute" style="margin-left:110px; " data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('auth/login');
            }

        } else {
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
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            // var_dump($data);die;
            $this->user_model->insert_user($data);
            redirect('auth/login');
        }
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
