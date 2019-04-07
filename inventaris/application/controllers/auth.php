<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_petugas');

	}
	public function index()
	{
		$this->load->view('login');
	}
	public function masuk()
	{
		$where = array(
			'petugas.username' => $this->input->post('username'),
			'petugas.password' =>sha1($this->input->post('password')),
		);

		$if=$this->m_petugas->masuk($where);

		if ($if == 'operator') {
			redirect('operator/peminjaman','refresh');			
		}else if($if == 'admin') {
			redirect('admin','refresh');			

		}else if($if == 'peminjam') {
			redirect('peminjam/peminjaman','refresh');			

		}else{
			redirect('auth','refresh');
		}

	}
	public function keluar(){
		session_destroy();
		redirect('auth','refresh');
	}
	public function no_page()
	{
		$this->load->view('comp/404');
	}
}
