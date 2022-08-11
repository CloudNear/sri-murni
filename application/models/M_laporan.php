<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model{

    public function showLogPenjualan()
	{
		$this->db->select('*');
		$this->db->from('d_penjualan d');
		$this->db->join('penjualan p', 'd.faktur = p.faktur');
		$this->db->join('obat o', 'd.id_obat = o.id_obat');
		$this->db->join('admin a', 'p.id_admin=a.id_admin');
		$this->db->order_by('p.tgl_jual', 'DESC');
		return $this->db->get()->result_array();
	}

    public function showProfitAllTime()
    {
        $this->db->select('SUM(subtotal) as total');
        $this->db->from('d_penjualan');
        return $this->db->get()->row_array();
    }

    public function showProfitMonth()
    {
        $date = date('Y-m');
        $this->db->select('SUM(subtotal) as total');
        $this->db->from('penjualan p');
        $this->db->join('d_penjualan d', 'p.faktur = d.faktur');
        $this->db->where('SUBSTRING(tgl_jual, 1, 7) =', $date);
        return $this->db->get()->row_array();
    }

    public function showProfitDay()
    {
        $date = date('Y-m-d');
        $this->db->select('SUM(subtotal) as total');
        $this->db->from('penjualan p');
        $this->db->join('d_penjualan d', 'p.faktur = d.faktur');
        $this->db->where('tgl_jual', $date);
        return $this->db->get()->row_array();
    }

    public function getDataLaporanPenjualan($tglX, $tglY){
        
        $this->db->select('*');
		$this->db->from('penjualan p');
		$this->db->join('d_penjualan d', 'p.faktur = d.faktur');
		$this->db->join('obat o', 'd.id_obat = o.id_obat');
		$this->db->join('admin a', 'p.id_admin=a.id_admin');
        $this->db->where('tgl_jual BETWEEN "'. $tglX. '" and "'. $tglY.'"');
        $this->db->order_by('p.tgl_jual', 'DESC');
		return $this->db->get()->result_array();
    }



    


    public function showLogPembelian()
	{
		$this->db->select('*');
		$this->db->from('d_pembelian d');
		$this->db->join('pembelian p', 'd.nota = p.nota');
		$this->db->join('obat o', 'd.id_obat = o.id_obat');
        $this->db->join('suplier s', 'p.id_suplier = s.id_suplier');
		$this->db->join('admin a', 'p.id_admin=a.id_admin');
		$this->db->order_by('p.tgl_beli', 'DESC');
		return $this->db->get()->result_array();
	}

    public function showSpendAllTime()
    {
        $this->db->select('SUM(subtotal) as total');
        $this->db->from('d_pembelian');
        return $this->db->get()->row_array();
    }

    public function showSpendMonth()
    {
        $date = date('Y-m');
        $this->db->select('SUM(subtotal) as total');
        $this->db->from('pembelian p');
        $this->db->join('d_pembelian d', 'p.nota = d.nota');
        $this->db->where('SUBSTRING(tgl_beli, 1, 7) =', $date);
        return $this->db->get()->row_array();
    }

    public function showSpendDay()
    {
        $date = date('Y-m-d');
        $this->db->select('SUM(subtotal) as total');
        $this->db->from('pembelian p');
        $this->db->join('d_pembelian d', 'p.nota = d.nota');
        $this->db->where('tgl_beli', $date);
        return $this->db->get()->row_array();
    }

    public function getDataLaporanPembelian($tglX, $tglY){
        
        $this->db->select('*');
		$this->db->from('pembelian p');
		$this->db->join('d_pembelian d', 'p.nota = d.nota');
		$this->db->join('obat o', 'd.id_obat = o.id_obat');
		$this->db->join('admin a', 'p.id_admin=a.id_admin');
        $this->db->join('suplier s', 'p.id_suplier = s.id_suplier');
        $this->db->where('tgl_beli BETWEEN "'. $tglX. '" and "'. $tglY.'"');
        $this->db->order_by('p.tgl_beli', 'DESC');
		return $this->db->get()->result_array();
    }
}