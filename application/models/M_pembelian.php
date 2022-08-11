<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model{

    public function getActiveProductData()
	{
        $sql = "SELECT * FROM obat ORDER BY id_obat DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function getProductData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM obat where id_obat = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		} 

		$sql = "SELECT * FROM obat ORDER BY id_obat DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save()
	{
		$nota = $this->input->post('nota');
		$date = $this->input->post('date');
		$supp = $this->input->post('suplier');
		$adm  = $this->input->post('admin');
		$total= $this->input->post('gross_amount_value');

		$data = array(
            'nota' 			=> $nota,
            'tgl_beli'      => $date,
            'id_suplier'    => $supp,
            'total_harga'   => $total,
            'id_admin'      => $adm
        );

        $this->db->insert('pembelian', $data);

		$count_product = count($this->input->post('product'));
        for($x = 0; $x < $count_product; $x++) {
            $items = array(
                'nota' 			=> $nota,
                'id_obat'	    => $this->input->post('product')[$x],
				'hrg_beli'	    => $this->input->post('harga')[$x],
                'qty'           => $this->input->post('qty')[$x],
                'subtotal'      => $this->input->post('subtotal_value')[$x]
            );

			$this->db->insert('d_pembelian', $items);

			$obat = $this->db->get_where('obat', ['id_obat' => $this->input->post('product')[$x] ])->row_array();
			if($obat != NULL){
				$idObt = $obat['id_obat'];
				$stock = $obat['stok'] + $this->input->post('qty')[$x];

				$this->db->set('stok', $stock);
				$this->db->where('id_obat', $idObt);
				$this->db->update('obat');
			}

		}
	}


	public function showLog()
	{
		$this->db->select('*');
		$this->db->from('d_pembelian d');
		$this->db->join('pembelian p', 'd.nota = p.nota');
		$this->db->join('obat o', 'd.id_obat = o.id_obat');
		$this->db->join('suplier s', 'p.id_suplier=s.id_suplier');
		$this->db->join('admin a', 'p.id_admin=a.id_admin');
		$this->db->order_by('p.tgl_beli', 'DESC');
		return $this->db->get()->result_array();
	}
}