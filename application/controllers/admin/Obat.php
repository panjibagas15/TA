<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model');
		$this->load->model('jenis_model');
		$this->load->model('kategori_model');
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		$this->simple_login->cek_login();
	}

	// View obat
	public function index()
	{
		$obat = $this->obat_model->listing();

		$data = array(	'title'		=> 'Data obat',
						'obat'		=> $obat,
						'isi'		=> 'admin/obat/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah obat
	public function tambah()
	{
		//Ambil Data JENIS
		$jenis = $this->jenis_model->listing();
		//Ambil Data KATEGORI
		$kategori = $this->kategori_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_OBAT','Nama Obat','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('HARGA_OBAT','Harga Obat','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('STOK_OBAT','Stok Obat','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()===FALSE) {
		// end validasi

		$data = array(	'title'		=> 'Tambah Obat',
						'jenis' 	=> $jenis,
						'kategori'	=> $kategori,
						'isi'		=> 'admin/obat/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'ID_JENIS_OBAT'		=>$i->post('ID_JENIS_OBAT'),
							'ID_KATEGORI_OBAT'	=>$i->post('ID_KATEGORI_OBAT'),
							'NAMA_OBAT' 		=>$i->post('NAMA_OBAT'),
							'HARGA_OBAT'		=>$i->post('HARGA_OBAT'),
							'STOK_OBAT'			=>$i->post('STOK_OBAT')
						);
			$this->obat_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/obat'),'refresh');
		}
		// End Masuk Database
	}

	// edit obat
	public function edit($id_obat)
	{
		$obat = $this->obat_model->detail($id_obat);
		//Ambil data jenis
		$jenis = $this->jenis_model->listing();
		//Ambil data kategori
		$kategori = $this->kategori_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_OBAT','Nama obat','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('HARGA_OBAT','Harga obat','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('STOK_OBAT','Stok obat','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()===FALSE) {
		// end validasi

			$data = array(	'title'		=>'Edit obat ',
							'obat' 		=>$obat,
							'jenis'		=>$jenis,
							'kategori'	=>$kategori,
							'isi'		=>'admin/obat/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'ID_OBAT'			=>$id_obat,
							'ID_JENIS_OBAT'		=>$i->post('ID_JENIS_OBAT'),
							'ID_KATEGORI_OBAT'	=>$i->post('ID_KATEGORI_OBAT'),
							'NAMA_OBAT'			=>$i->post('NAMA_OBAT'),
							'HARGA_OBAT'		=>$i->post('HARGA_OBAT'),
							'STOK_OBAT'			=>$i->post('STOK_OBAT')
						);
			$this->obat_model->edit($data);
			$this->session->set_flashdata('Berhasil', 'Data telah diedit');
			redirect(base_url('admin/obat'),'refresh');
		}
		// End Masuk Database
	}

	// Delete obat
	public function delete($id_obat)
	{
		$data = array('ID_OBAT'	=> $id_obat);
		$this->obat_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/obat'),'refresh');
	}
}

/* End of file obat.php */
/* Location: ./application/controllers/admin/obat.php */
