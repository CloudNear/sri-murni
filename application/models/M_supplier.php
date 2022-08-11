<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_supplier extends CI_Model{


    public function saveSupply()
    {
        $id       = $this->input->post('id', true);
        $name     = $this->input->post('name', true);
        $telepon  = $this->input->post('telepon', true);
        $alamat   = $this->input->post('alamat', true);
        $status   = 1;

        
        $data = array(
            'id_suplier'      => $id,
            'nama_suplier'    => $name,
            'alamat_suplier'  => $alamat,
            'telepon_suplier' => $telepon,
            'status_suplier'  => $status,
        );
        $this->db->insert('suplier', $data);
    }

    public function saveChange()
    {
        $id       = $this->input->post('id', true);
        $name     = $this->input->post('name', true);
        $telepon  = $this->input->post('telepon', true);
        $alamat   = $this->input->post('alamat', true);
        $status   = $this->input->post('status', true);

        
        $data = array(
            'nama_suplier'    => $name,
            'alamat_suplier'  => $alamat,
            'telepon_suplier' => $telepon,
            'status_suplier'  => $status,
        );
        $this->db->where('id_suplier', $id);
        $this->db->update('suplier', $data);
    }

    public function showSuplyId($id)
    {
        $query = $this->db->get_where('suplier', array('id_suplier' => $id));
        return $query->row_array();
    }

    public function deleteSupply($id)
    {
        return $this->db->delete('suplier', array('id_suplier' => $id));
    }
}