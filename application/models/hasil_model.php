<?php

class hasil_model extends CI_Model
{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function tampil_data_join($table,$table2,$order=null)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($table2, 'dt_hasil.id_pesanan = dt_pesanan.id_pesanan');
		if ($order) {
			$this->db->order_by($order);
		}
		$query = $this->db->get();
		return $query;
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table,$data);
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}