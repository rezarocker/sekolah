	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pegawai');
		$this->load->model('m_petugas');
	}
	public function tambah()
	{
		$data=array(
			 	'nama_pegawai' => $this->input->post('nama'),
			 	'nip' => $this->input->post('nip'),
			 	'alamat' => $this->input->post('alamat')
			 );
		$where['nip']=$data['nip'];

		$id_pegawai=$this->m_pegawai->tambah($data,$where);
		
		if ($id_pegawai != '') {
		
		$insert=array(
			 	'id_pegawai' => $id_pegawai,
				'nama_petugas' => $data['nama_pegawai'],
			 	'username' => $data['nip'],
			 	'password' => sha1($data['nama_pegawai']),
			 	'id_level' => $this->input->post('level'),
			);

		$this->m_petugas->tambah($insert);
		
		}

		redirect('admin/pegawai');

	}
	public function hapus($value='')
	{
		$where['id_pegawai']=$value;
		$this->m_pegawai->hapus($where);
		$this->berhasil();
		redirect('admin/pegawai','refresh');
	
	}
	public function edit($value)
	{
		$data=array(
			 	'nama_pegawai' => $this->input->post('nama'),
			 	'nip' => $this->input->post('nip'),
			 	'alamat' => $this->input->post('alamat')
			 );
		$where['id_pegawai']=$value;

		$this->m_pegawai->update($data,$where);
		
		
		$update=array(
				'nama_petugas' => $data['nama_pegawai'],
			 	'username' => $data['nip'],
			 	'password' => sha1($data['nama_pegawai']),
			 	'id_level' => $this->input->post('level'),
		);

		$this->m_petugas->update($update,$where);
		

		redirect('admin/pegawai');
	}


	private function berhasil()
	{
		$this->session->set_flashdata('pesan', '
	                            <div class="alert alert-success alert-dismissible alert-mg-b-0" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>Berhasil!
	                            </div>');	
	}
	public function get_edit()
	{
		
		$where['pegawai.id_pegawai']=$this->input->post('id');
		$json=$this->m_pegawai->get_edit($where);
		echo json_encode($json);

	}
	public function ubah($value='')
	{
		$where = array(
			'password' => sha1($this->input->post('old_pass')),
			'id_petugas' => $this->session->id_petugas,
			 );
		$set=array(

			'password' => sha1($this->input->post('new_pass')),
		);
		$this->m_petugas->ubah($where,$set);
		if ($this->session->level == 'admin'){
		redirect('admin/setting','refresh');
		}elseif($this->session->level=='operator'){
		redirect('operator/setting');
		}elseif($this->session->level=='peminjam'){
		redirect('peminjam/setting');
		}

	}
	

}

/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */ ?>