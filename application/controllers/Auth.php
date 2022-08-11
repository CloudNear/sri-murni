<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

     public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Opensslencryptdecrypt');
  
    }
    public function index(){

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Login Page';
            $this->load->view('Auth/templates/header', $data);
            $this->load->view('Auth/index');
            $this->load->view('Auth/templates/footer');
        } else {
            // validasinya success
            $this->_login();
        } 
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $usr = $this->db->get_where('admin', ['email_admin' => $email])->row_array();
        
        $encrptopenssl =  new Opensslencryptdecrypt();
        $result  = $encrptopenssl->encrypt($password);
        
        // jika usernya ada
        if ($usr) {
            // cek password
            if ($result == $usr['password_admin']) {
                $data = [
                    'id_admin'      => $usr['id_admin'],
                    'nama_admin'    => $usr['nama_admin'],
                    'email_admin'   => $usr['email_admin'],
                    'role_admin'    => $usr['role_admin'],
                    'status_admin'  => $usr['status_admin']
                ];
                $this->session->set_userdata($data);
                if ($usr['status_admin'] == 1 ) {
                    redirect('Admin/index');
                }else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Status akun anda Non-Active!, hubungi Admin untuk lebih lanjut.. </div>');
                    redirect('Auth/index');
                }  
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Incorect!</div>');
                redirect('Auth/index');
            }  
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('Auth/index');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Logout!</div>');
        redirect('Auth/index');
    }
}