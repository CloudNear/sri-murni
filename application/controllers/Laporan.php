<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_laporan');
        $this->load->library('Opensslencryptdecrypt');
       
    }

    public function penjualan()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Laporan - penjualan";
            $data['log']        = $this->M_laporan->showLogPenjualan();
            $data['alltime']    = $this->M_laporan->showProfitAllTime();
            $data['month']      = $this->M_laporan->showProfitMonth();
            $data['day']        = $this->M_laporan->showProfitDay();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/laporan/penjualan/index');
            $this->load->view('admin/templates/footer');
        }
    }

    public function cetakJual()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $this->load->library('Pdfreport');
            $tglX               = $this->input->post('tgl_a', true);
            $tglY               = $this->input->post('tgl_b', true);
            $data['tgl_x']      = $tglX;
            $data['tgl_y']      = $tglY;
            $data['laporan']    = $this->M_laporan->getDataLaporanPenjualan($tglX, $tglY);
            // title dari pdf
            $this->data['title_pdf'] = 'Laporan Penjualan';
            
            // filename dari pdf ketika didownload
            $file_pdf = 'Laporan penjualan';
            // setting paper
            $paper = 'A4';
            //orientasi paper potrait / landscape
            $orientation = "portrait";
            $html = $this->load->view('admin/laporan/penjualan/print',$data, true);	    
            // run dompdf
            $this->pdfreport->generate($html, $file_pdf,$paper,$orientation);
        }
    }



    public function pembelian()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $data['title']      = "Laporan - pembelian";
            $data['log']        = $this->M_laporan->showLogPembelian();
            $data['alltime']    = $this->M_laporan->showSpendAllTime();
            $data['month']      = $this->M_laporan->showSpendMonth();
            $data['day']        = $this->M_laporan->showSpendDay();
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/laporan/pembelian/index');
            $this->load->view('admin/templates/footer');
        }
    }

    public function cetakBeli()
    {
        $data['admin'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();
        if($this->session->userdata('email_admin') == NULL){
            $this->load->view('notfound');
        }else{
            $this->load->library('Pdfreport');
            $tglX               = $this->input->post('tgl_a', true);
            $tglY               = $this->input->post('tgl_b', true);
            $data['tgl_x']      = $tglX;
            $data['tgl_y']      = $tglY;
            $data['laporan']    = $this->M_laporan->getDataLaporanPembelian($tglX, $tglY);
            // title dari pdf
            $this->data['title_pdf'] = 'Laporan pembelian';
            
            // filename dari pdf ketika didownload
            $file_pdf = 'Laporan pembelian';
            // setting paper
            $paper = 'A4';
            //orientasi paper potrait / landscape
            $orientation = "portrait";
            $html = $this->load->view('admin/laporan/pembelian/print',$data, true);	    
            // run dompdf
            $this->pdfreport->generate($html, $file_pdf,$paper,$orientation);
        }
    }
}