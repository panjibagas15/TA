<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All barang
	public function listing()
	{
		$this->db->select('T_OBAT.*,
         	             T_JENIS_OBAT.NAMA_JENIS_OBAT,
         	         	T_KATEGORI_OBAT.NAMA_KATEGORI_OBAT');
		$this->db->from('T_OBAT');
    	$this->db->join('T_JENIS_OBAT','T_JENIS_OBAT.ID_JENIS_OBAT = T_OBAT.ID_JENIS_OBAT','left');
    	$this->db->join('T_KATEGORI_OBAT','T_KATEGORI_OBAT.ID_KATEGORI_OBAT = T_OBAT.ID_KATEGORI_OBAT','left');
		$this->db->order_by('ID_OBAT', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All barang untuk edit
	public function detail($id_obat)
	{
		$this->db->select('*');
		$this->db->from('T_OBAT');
		$this->db->where('ID_OBAT', $id_obat);
		$this->db->order_by('ID_OBAT', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data barang
	public function tambah($data)
	{
		$this->db->insert('T_OBAT', $data);
	}

	// Edit data barang
	public function edit($data)
	{
		$this->db->where('ID_OBAT', $data['ID_OBAT']);
		$this->db->update('T_OBAT',$data);
	}

	// Delete data barang
	public function delete($data)
	{
		$this->db->where('ID_OBAT', $data['ID_OBAT']);
		$this->db->delete('T_OBAT',$data);
	}

}

/* End of file barang_model.php */
/* Location: ./application/models/barang_model.php */
