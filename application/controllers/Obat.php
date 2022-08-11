<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_obat');
        $this->load->library('Opensslencryptdecrypt');
       
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Obat";
            $data['obat']   = $this->db->get('obat')->result_array();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/obat/index');
            $this->load->view('admin/templates/footer');
        }
    }

    public function add()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $this->form_validation->set_rules('name', 'Nama Obat', 'trim|required');
            $this->form_validation->set_rules('beli', 'Harga Beli', 'trim|required');
            $this->form_validation->set_rules('jual', 'Harga Jual', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Add";
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/topbar', $data);
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/obat/add');
                $this->load->view('admin/templates/footer');
            }else{
              $this->_saveObat();
            }
        }
    }

    private function _saveObat()
    {
        $this->M_obat->saveObat();
        $this->session->set_flashdata('flash-success', 'Di-simpan ');
        redirect('Obat/index');
    }


    public function edit($id)
    {
        if($this->session->userdata('email_admin') == NULL OR $this->session->userdata('role_admin') != 1){
            $this->load->view('notfound');
        }else{
            $this->form_validation->set_rules('name', 'Nama Obat', 'trim|required');
            $this->form_validation->set_rules('beli', 'Harga Beli', 'trim|required');
            $this->form_validation->set_rules('jual', 'Harga Jual', 'trim|required');
            $id = decrypt_url($id);
            $detail  = $this->M_obat->showObatById($id);
            if($detail == NULL){
                $this->load->view('notfound');
            }else{
                if ($this->form_validation->run() == FALSE) {
                    $data['title'] = "Edit";
                    $data['obt']  = $detail;
                    $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
                    $this->load->view('admin/templates/header', $data);
                    $this->load->view('admin/templates/topbar', $data);
                    $this->load->view('admin/templates/sidebar');
                    $this->load->view('admin/obat/edit', $data);
                    $this->load->view('admin/templates/footer');
                }else{
                  $this->_changeObat();
                }
            }
        }
    }

    private function _changeObat()
    {
        $this->M_obat->changeObat();
        $this->session->set_flashdata('flash-success', 'Di-simpan ');
        redirect('Obat/index');
    }
}