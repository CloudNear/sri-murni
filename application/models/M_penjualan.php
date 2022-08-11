<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model{

    public function save()
	{
		$faktur = $this->input->post('faktur');
        $buyer  = $this->input->post('konsumen');
		$date   = $this->input->post('date');
		$adm    = $this->input->post('admin');
		$total  = $this->input->post('gross_amount_value');

		$data = array(
            'faktur' 	    => $faktur,
            'tgl_jual'      => $date,
            'total_harga'   => $total,
            'id_admin'      => $adm,
            'konsumen'      => $buyer
        );

        $this->db->insert('penjualan', $data);

		$count_product = count($this->input->post('product'));
        for($x = 0; $x < $count_product; $x++) {
            $items = array(
                'faktur' 			=> $faktur,
                'id_obat'	    => $this->input->post('product')[$x],
                'qty'           => $this->input->post('qty')[$x],
                'subtotal'      => $this->input->post('subtotal_value')[$x]
            );

			$this->db->insert('d_penjualan', $items);

			$obat = $this->db->get_where('obat', ['id_obat' => $this->input->post('product')[$x] ])->row_array();
			if($obat != NULL){
				$idObt = $obat['id_obat'];
				$stock = $obat['stok'] - $this->input->post('qty')[$x];

				$this->db->set('stok', $stock);
				$this->db->where('id_obat', $idObt);
				$this->db->update('obat');
			}

		}
	}


	public function showLog()
	{
		$this->db->select('*');
		$this->db->from('d_penjualan d');
		$this->db->join('penjualan p', 'd.faktur = p.faktur');
		$this->db->join('obat o', 'd.id_obat = o.id_obat');
		$this->db->join('admin a', 'p.id_admin=a.id_admin');
		$this->db->order_by('p.tgl_jual', 'DESC');
		return $this->db->get()->result_array();
	}
}