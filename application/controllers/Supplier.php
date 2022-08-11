<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_supplier');
        $this->load->library('Opensslencryptdecrypt');
       
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Supplier";
            $data['supplier']   = $this->db->get('suplier')->result_array();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/supplier/index');
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
            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|min_length[11]|max_length[13]', [
                'min_lenght' => 'Harus 11 digit',
                'max_length' => 'Harus 13 digit'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Add";
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/topbar', $data);
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/supplier/add');
                $this->load->view('admin/templates/footer');
            }else{
              $this->_saveSupply();

            }
        }
    }

    private function _saveSupply()
    {
        $this->M_supplier->saveSupply();
        $this->session->set_flashdata('flash-success', 'Di-simpan ');
        redirect('Supplier/index');
    }

    public function changeStatus($id, $status)
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $id = decrypt_url($id);
            if($status == 1){
                $this->db->set('status_suplier', 0);
                $this->db->where('id_suplier', $id);
                $this->db->update('suplier');
                $this->session->set_flashdata('flash-success', 'di NON-AKTIF kan ');
                redirect('Supplier/index');
            }elseif($status == 0){
                $this->db->set('status_suplier', 1);
                $this->db->where('id_suplier', $id);
                $this->db->update('suplier');
                $this->session->set_flashdata('flash-success', 'di AKTIF kan ');
                redirect('Supplier/index');
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
            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|min_length[11]|max_length[13]', [
                'min_lenght' => 'Harus 11 digit',
                'max_length' => 'Harus 13 digit'
            ]);
            $id = decrypt_url($id);
            $detail  = $this->M_supplier->showSuplyId($id);
            if($detail == NULL){
                $this->load->view('notfound');
            }else{
                if ($this->form_validation->run() == FALSE) {
                    $data['title'] = "Edit";
                    $data['sply']  = $detail;
                    $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
                    $this->load->view('admin/templates/header', $data);
                    $this->load->view('admin/templates/topbar', $data);
                    $this->load->view('admin/templates/sidebar');
                    $this->load->view('admin/supplier/edit', $data);
                    $this->load->view('admin/templates/footer');
                }else{
                  $this->_saveChangeSuply();
                }
            }
        }
    }

    private function _saveChangeSuply()
    {
        $this->M_supplier->saveChange();
        $this->session->set_flashdata('flash-success', 'Di-update ');
        redirect('Supplier/index');
    }

    public function delete($id)
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $id = decrypt_url($id);
            $data['title'] = "delete-supplier";
            $detail  = $this->M_supplier->showSuplyId($id);
            if($detail == NULL){
                $this->load->view('notfound');
            }else{
                $this->M_supplier->deleteSupply($id);
                $this->session->set_flashdata('flash-success', 'Di-hapus ');
                redirect('Supplier/index');
            }
        }
    }
}