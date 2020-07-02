<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All kategori
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('T_KATEGORI_OBAT');
		$this->db->order_by('ID_KATEGORI_OBAT', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All kategori untuk edit
	public function detail($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('T_KATEGORI_OBAT');
		$this->db->where('ID_KATEGORI_OBAT', $id_kategori);
		$this->db->order_by('ID_KATEGORI_OBAT', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data kategori
	public function tambah($data)
	{
		$this->db->insert('T_KATEGORI_OBAT', $data);
	}

	// Edit data kategori
	public function edit($data)
	{
		$this->db->where('ID_KATEGORI_OBAT', $data['ID_KATEGORI_OBAT']);
		$this->db->update('T_KATEGORI_OBAT',$data);
	}	

	// Delete data kategori
	public function delete($data)
	{
		$this->db->where('ID_KATEGORI_OBAT', $data['ID_KATEGORI_OBAT']);
		$this->db->delete('T_KATEGORI_OBAT',$data);
	}	

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */