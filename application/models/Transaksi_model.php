<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All transaksi
	public function listing()
	{
		$this->db->select('T_TRANSAKSI.*,
						T_OBAT.NAMA_OBAT,
						T_LOGIN.USERNAME');
		$this->db->from('T_TRANSAKSI');
		// Join
		$this->db->join('T_OBAT', 'T_OBAT.ID_OBAT = T_TRANSAKSI.ID_OBAT', 'left');
		$this->db->join('T_LOGIN', 'T_LOGIN.ID_USER = T_TRANSAKSI.ID_USER', 'left');
		// End Join
		$this->db->order_by('ID_TRANSAKSI', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All transaksi untuk edit
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('T_TRANSAKSI');
		$this->db->where('ID_TRANSAKSI', $id_transaksi);
		$this->db->order_by('ID_TRANSAKSI', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data transaksi
	public function tambah($data)
	{
		$this->db->insert('T_TRANSAKSI', $data);
	}

	// Edit data transaksi
	public function edit($data)
	{
		$this->db->where('ID_TRANSAKSI', $data['ID_TRANSAKSI']);
		$this->db->update('T_TRANSAKSI',$data);
	}	

	// Delete data transaksi
	public function delete($data)
	{
		$this->db->where('ID_TRANSAKSI', $data['ID_TRANSAKSI']);
		$this->db->delete('T_TRANSAKSI',$data);
	}	

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */