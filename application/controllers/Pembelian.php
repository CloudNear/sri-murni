<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_pembelian');
       
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Pembelian";
            $data['suplier']    = $this->db->get_where('suplier', ['status_suplier'  => 1])->result_array();
            $data['obat']       = $this->db->get('obat')->result_array();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pembelian/index');
        }
    }

    public function getTableProductRow()
	{
		$products = $this->M_pembelian->getActiveProductData();
		echo json_encode($products);
	}

    public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if($product_id) {
			$product_data = $this->M_pembelian->getProductData($product_id);
			echo json_encode($product_data);
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
                $nota = $this->input->post('nota', true);
                $check = $this->db->get_where('pembelian', ['nota' => $nota])->row_array();
                if($check != NULL){
                    $this->session->set_flashdata('flash-success', 'Di-Simpan ');
                    redirect('Pembelian/index');
                }else{
                    $this->M_pembelian->save();
                    $this->session->set_flashdata('flash-success', 'Di-Simpan ');
                    redirect('Pembelian/index');
                }    	
            }else{
                $this->session->set_flashdata('flash-error', 'Di-Simpan ');
                redirect('Pembelian/index');
            }
        }	
    }

    public function log()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Riwayat pembelian";
            $data['log']        = $this->M_pembelian->showLog();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pembelian/log');
            $this->load->view('admin/templates/footer');
        }
    }

    
}