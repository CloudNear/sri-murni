<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        $this->load->model('M_laporan');
        $this->load->library('Opensslencryptdecrypt');
       
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']         = "Dashboard";
            $data['monthBuy']      = $this->M_laporan->showSpendMonth();
            $data['monthSell']     = $this->M_laporan->showProfitMonth();
            $data['daySell']       = $this->M_laporan->showProfitDay();
            $data['rank']          = $this->M_admin->getPopularObat();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/index');
            $this->load->view('admin/templates/footer');
        }
    }

    public function listEmployed()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $data['title'] = "Pegawai";
            $data['list']  = $this->M_admin->showEmploy();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/admin/index', $data);
            $this->load->view('admin/templates/footer');
        }
    }
    public function add()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $this->form_validation->set_rules('name', 'Nama', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email_admin]', [
                'is_unique' => 'Email sudah dipakai, Coba lagi!',
                'valid_email' => 'Masukan format email yang benar!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]', [
                'min_lenght' => 'Terlalu pendek'
            ]);
            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|min_length[11]|max_length[13]', [
                'min_lenght' => 'Harus 11 digit',
                'max_length' => 'Harus 13 digit'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Add";
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/topbar', $data);
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/admin/add');
                $this->load->view('admin/templates/footer');
            }else{
              $this->_saveEmpl();

            }
        }
    }

    private function _saveEmpl()
    {
        $this->M_admin->saveEmployed();
        $this->session->set_flashdata('flash-success', 'Di-simpan ');
        redirect('Admin/listEmployed');
    }

    public function detail($id)
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $id = decrypt_url($id);
            $data['title'] = "detail-Pegawai";
            $detail  = $this->M_admin->showEmployById($id);
            if($detail == NULL){
                $this->load->view('notfound');
            }else{
                $data['detail'] = $detail;
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/topbar', $data);
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/admin/detail', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }

    public function edit($id)
    {
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $this->form_validation->set_rules('name', 'Nama', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $oldEmail = $this->input->post('oldemail', true);
            $newEmail = $this->input->post('email', true);
            if($oldEmail != $newEmail){
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email_admin]', [
                    'is_unique' => 'Email sudah dipakai, Coba lagi!',
                    'valid_email' => 'Masukan format email yang benar!'
                ]);
            }
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]', [
                'min_lenght' => 'Terlalu pendek'
            ]);

            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|min_length[11]|max_length[13]', [
                'min_lenght' => 'Harus 11 digit',
                'max_length' => 'Harus 13 digit'
            ]);
            $id = decrypt_url($id);
            $detail  = $this->M_admin->showEmployById($id);
            if($detail == NULL){
                $this->load->view('notfound');
            }else{
                if ($this->form_validation->run() == FALSE) {
                    $data['title'] = "Edit";
                    $data['adm']  = $this->M_admin->showEmployById($id);
                    $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
                    $this->load->view('admin/templates/header', $data);
                    $this->load->view('admin/templates/topbar', $data);
                    $this->load->view('admin/templates/sidebar');
                    $this->load->view('admin/admin/edit', $data);
                    $this->load->view('admin/templates/footer');
                }else{
                  $this->_changeEmpl();
                }
            }
        }
    }

    private function _changeEmpl()
    {
        $this->M_admin->saveChangeEmpl();
        $this->session->set_flashdata('flash-success', 'Di-update ');
        redirect('Admin/listEmployed');
    }

    public function delete($id)
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $id = decrypt_url($id);
            $data['title'] = "delete-pegawai";
            $detail  = $this->M_admin->showEmployById($id);
            if($detail == NULL){
                $this->load->view('notfound');
            }else{
                $this->M_admin->deleteEmploy($id);
                $this->session->set_flashdata('flash-success', 'Di-hapus ');
                redirect('Admin/listEmployed');
            }
        }
    }


    public function changeStatus($id, $status)
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $id = decrypt_url($id);
            if($status == 1){
                $this->db->set('status_admin', 0);
                $this->db->where('id_admin', $id);
                $this->db->update('admin');
                $this->session->set_flashdata('flash-success', 'di NON-AKTIF kan ');
                redirect('Admin/listEmployed');
            }elseif($status == 0){
                $this->db->set('status_admin', 1);
                $this->db->where('id_admin', $id);
                $this->db->update('admin');
                $this->session->set_flashdata('flash-success', 'di AKTIF kan ');
                redirect('Admin/listEmployed');
            }
           
        }
    }
}
