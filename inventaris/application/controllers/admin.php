<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ( !isset($this->session->level) || $this->session->level != 'admin') {
			
			redirect('auth','refresh');

		}
		$this->load->model('m_barang');
		$this->load->model('m_pegawai');
		$this->load->model('m_petugas');

	}
	public function index()
	{
		$data['title']='Dashboard';
		$data['barang']=$this->m_barang->get_num_rows();
		$data['rows']=$this->m_petugas->get_num_rows();
		$data['chart']=$this->m_barang->get_chart();
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('comp/dashboard', $data, FALSE);
		$this->load->view('comp/footer',$data);
		
	}

	public function pegawai()
	{
		$data['pegawai']=$this->m_pegawai->get();
		$data['level']=$this->db->get('level');
		
		$data['title']='Pegawai';
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('comp/pegawai', $data, FALSE);
		$this->load->view('comp/footer');
		
	}
	public function barang()
	{
		$data['title']='Barang';
		$data['supplier']=$this->m_barang->get_supplier();
		$data['barang']=$this->m_barang->get();
		$data['jenis']=$this->db->get('jenis');
		$data['ruang']=$this->db->get('ruang');
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('comp/barang', $data, FALSE);
		$this->load->view('comp/footer');
	
	}
	public function supplier()
	{
		$data['title']='Supplier';
		$data['barang']=$this->m_barang->get_supplier();
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('comp/supplier', $data, FALSE);
		$this->load->view('comp/footer');
	}

	public function ruangan()
	{
		$data['ruang']=$this->db->order_by('kode_ruang','DESC')->get('ruang');
		$data['title']='Barang';
		$this->load->view('admin/header',$data);
		$this->load->view('comp/ruang',$data);
		$this->load->view('comp/footer');
	
	}
	public function  peminjaman(){
		$data['pegawai']=$this->m_pegawai->get();
		$data['pinjam']=$this->m_barang->get_pinjam();
		$data['barang']=$this->m_barang->get();
		$data['title']='Peminjaman';
		$this->load->view('admin/header',$data);
		$this->load->view('comp/pinjam',$data);
		$this->load->view('comp/footer');
	}
	public function jenis()
	{
		$data['jenis']=$this->db->order_by('kode_jenis','DESC')->get('jenis');
		$data['title']='Barang';
		$this->load->view('admin/header',$data);
		$this->load->view('comp/jenis',$data);
		$this->load->view('comp/footer');
	
	}
	public function pengembalian()
	{
		$data['title']='Pengembalian';
		$this->load->view('admin/header',$data);
		$this->load->view('comp/pengembalian',$data);
		$this->load->view('comp/footer');
	}
	public function laporan($value='')
	{	$data['date']=$value;
		$data['title']='Laporan';
		$data['barang']=$this->m_barang->get($value);
		$data['peminjaman']=$this->m_barang->get_laporan($value);
		$this->load->view('admin/header',$data);
		$this->load->view('comp/laporan',$data);
		$this->load->view('comp/footer');
		
	}
	public function request($value='')
	{
		$data['title']='Request';
		$data['pinjam']=$this->m_barang->get_request($value);
		$this->load->view('admin/header',$data);
		$this->load->view('comp/request',$data);
		$this->load->view('comp/footer');


	}
	public function setting($value='')
	{
		$data['title']='Setting';
		$this->load->view('admin/header',$data);
		$this->load->view('comp/setting',$data);
		$this->load->view('comp/footer');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */ ?>