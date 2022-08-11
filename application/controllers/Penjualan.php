<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_penjualan');
       
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Penjualan";
            $data['obat']       = $this->db->get('obat')->result_array();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/penjualan/index');
        }
    }

    public function save()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{

            $this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
            
        
            if($this->form_validation->run() == TRUE) {   
                $faktur = $this->input->post('faktur', true);
                $check = $this->db->get_where('penjualan', ['faktur' => $faktur])->row_array();
                if($check != NULL){
                    $this->session->set_flashdata('flash-success', 'Di-Jual ');
                    redirect('Penjualan/index');
                }else{
                    $this->M_penjualan->save();
                    $this->session->set_flashdata('flash-success', 'Di-Jual ');
                    redirect('Penjualan/index');
                }    	
            }else{
                $this->session->set_flashdata('flash-error', 'Di-Jual ');
                redirect('Penjualan/index');
            }
        }	
    }


    public function log()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Riwayat penjualan";
            $data['log']        = $this->M_penjualan->showLog();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/penjualan/log');
            $this->load->view('admin/templates/footer');
        }
    }
}