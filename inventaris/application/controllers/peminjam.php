<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ( !isset($this->session->level) || $this->session->level != 'peminjam') {
			
			redirect('auth','refresh');

		}
		$this->load->model('m_barang');
		$this->load->model('m_petugas');

	}

	public function  peminjaman(){
		$data['pinjam']=$this->m_barang->get_pinjam_peminjam();
		$data['barang']=$this->m_barang->get();
		$data['title']='Peminjaman';
		$this->load->view('peminjam/header',$data);
		$this->load->view('comp/pinjam',$data);
		$this->load->view('comp/footer');
	}
	public function setting($value='')
	{
		$data['title']='Setting';
		$this->load->view('peminjam/header',$data);
		$this->load->view('comp/setting',$data);
		$this->load->view('comp/footer');
	}


}

/* End of file peminjam.php */
/* Location: ./application/controllers/peminjam.php */ ?>