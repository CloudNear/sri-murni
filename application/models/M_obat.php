<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_obat extends CI_Model{

    public function saveObat()
    {
        $id   = $this->input->post('id', true);
        $nama = $this->input->post('name', true);
        $stok = $this->input->post('stok', true);
        $beli = $this->input->post('beli', true);
        $jual = $this->input->post('jual', true);

        $beli  = str_replace(".", "", $beli);
        $jual  = str_replace(".", "", $jual);

        $data = array(
            'id_obat'   => $id,
            'nama_obat' => $nama,
            'stok'      => $stok,
            'hrg_beli'  => $beli,
            'hrg_jual'  => $jual
        );

        $this->db->insert('obat', $data);
    }

    public function showObatById($id)
    {
        return $this->db->get_where('obat', ['id_obat' => $id])->row_array();
    }

    public function changeObat()
    {
        $id   = $this->input->post('id', true);
        $nama = $this->input->post('name', true);
        $stok = $this->input->post('stok', true);
        $beli = $this->input->post('beli', true);
        $jual = $this->input->post('jual', true);

        $beli  = str_replace(".", "", $beli);
        $jual  = str_replace(".", "", $jual);

        $data = array(
            'nama_obat' => $nama,
            'stok'      => $stok,
            'hrg_beli'  => $beli,
            'hrg_jual'  => $jual
        );

        $this->db->where('id_obat', $id);
        $this->db->update('obat', $data);
    }
}