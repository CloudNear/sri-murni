<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model{

public $image     = "default_admin.png";

    private function _uploadImage($data)
    {
        $config['upload_path']          = FCPATH.'/upload/admin/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            =  $this->input->post('uniqId', true);
        $config['max_size']             =  2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($data)) {
            return $this->upload->data("file_name");
        }else{
            return "default_admin.png";
        }
        
    }
    private function _uploadImageNew($data)
    {
        $config['upload_path']          = FCPATH.'/upload/admin/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            =  $this->input->post('uniqId', true);
        $config['max_size']             =  2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $gambar_lama                  = $this->input->post('oldimg', true);
        $this->load->library('upload', $config);

        if($data == 'image'){
            if($gambar_lama != "default_admin.png"){
                unlink("upload/admin/$gambar_lama");
            }
        }
        if ($this->upload->do_upload($data)) {
            return $this->upload->data("file_name");
        }
        return "default_admin.png";
        
    }

    private function _deleteImage($id)
    {
        $img  = $this->showEmployById($id);
        $img1 = $img['image'];
        if ($img1 != "default_admin.png") {
            unlink("upload/admin/".$img['image']);
        }
    }


    public function showEmployById($id)
    {
        $query = $this->db->get_where('admin', array('id_admin' => $id));
        return $query->row_array();
    }

    public function showEmploy()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('role_admin !=', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saveEmployed()
    {
        $this->load->library('Opensslencryptdecrypt'); 
        $id       = $this->input->post('id', true);
        $name     = $this->input->post('name', true);
        $email    = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $telepon  = $this->input->post('telepon', true);
        $alamat   = $this->input->post('alamat', true);
        $role     = $this->input->post('role', true);;
        $status   = 1;

        $encrptopenssl =  new Opensslencryptdecrypt();
        $newpass  = $encrptopenssl->encrypt($password);
        
        $data = array(
            'id_admin'      => $id,
            'nama_admin'    => $name,
            'email_admin'   => $email,
            'password_admin'=> $newpass,
            'alamat_admin'  => $alamat,
            'telepon_admin' => $telepon,
            'role_admin'    => $role,
            'status_admin'  => $status
        );
        $this->db->insert('admin', $data);
    }

    public function saveChangeEmpl()
    {
        $this->load->library('Opensslencryptdecrypt'); 
        $id       = $this->input->post('id', true);
        $name     = $this->input->post('name', true);
        $email    = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $oldpass  = $this->input->post('oldpassword', true);
        $telepon  = $this->input->post('telepon', true);
        $alamat   = $this->input->post('alamat', true);
        $role     = $this->input->post('role', true);
        $status   = $this->input->post('status', true);

        $encrptopenssl =  new Opensslencryptdecrypt();
        $oldpw    = $encrptopenssl->decrypt($oldpass);
        $newpass  = $encrptopenssl->encrypt($password);
        if($oldpw == $password){
            $pass = $oldpass;
        }else{
            $pass = $newpass;
        }

        
        $data = array(
            'nama_admin' => $name,
            'email_admin'    => $email,
            'password_admin' => $pass,
            'alamat_admin'   => $alamat,
            'telepon_admin'  => $telepon,
            'role_admin'     => $role,
            'status_admin'   => $status
        );
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $data);
    }

    public function deleteEmploy($id)
    {
        return $this->db->delete('admin', array('id_admin' => $id));
    }



    public function getPopularObat()
    {
        $this->db->select('*');
        $this->db->select('SUM(qty) as rank');
        $this->db->from('d_penjualan d');
        $this->db->join('obat o', 'd.id_obat=o.id_obat');
        $this->db->group_by('d.id_obat');
        $this->db->order_by('rank', 'DESC');
        return $this->db->get()->result_array();
    }

   
}