 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->library('excel');
		if ( !isset($this->session->level) || !isset($this->session->status)) {
			
			redirect('auth','refresh');

		}
	}
	public function approve($value)
	{
		$array =$this->input->post('id');
		$jml =$this->input->post('qty');
		$inventaris=$this->input->post('id_inventaris');
		$update_peminjaman = array(
			'id_petugas' => $this->session->id_petugas,
			'status_peminjaman' => 'APPROVED',
			 );
		$where_id['id_peminjaman']=$value;
		$this->m_barang->edit_peminjaman($update_peminjaman,$where_id);
		foreach ($array as $key => $value) {

			$update = array(
			'id_inventaris' => $inventaris[$key],
			'jumlah' => $jml[$key], 
			);
			$if=$this->m_barang->cek_qty($update);
			if ($if < 1) {
			$where['id_detail_peminjaman']=$value;
			$this->m_barang->edit_detail_peminjaman($update,$where);
			}

		}
		
		if($this->session->level=='admin'){
		redirect('admin/request','refresh');
		}elseif ($this->session->level=='operator') {
		redirect('operator/request','refresh');
		}
	}
	public function get_approve($value)
	{
		$peminjaman=$this->m_barang->get_pinjam_detail($value);
		$list='<div class="bsc-tbl-hvr">
                            <table class="table table-hover text-center">
                                       <thead>
                                    <tr>
                                        <th width="10px">No.</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody class="list-detail">';
        $no=1;
        foreach ($peminjaman->result() as $key => $value) {
        $option='<div class="form-group float-lb floating-lb"><div class="nk-int-st" ><input type="hidden" value="'.$value->id_inventaris.'" name="id_inventaris[]"><input type="hidden" name="id[]" value="'.$value->id_detail_peminjaman.'"><select required="" name="qty[]" class="form-control" ><option></option>';
       	for ($i=0; $i <=$value->jumlah ; $i++) { 
       	$option.='<option value='.$i.'>'.$i.'</option>';
       	}
       	$option.='</select><label class="nk-label">Qty</label></div></div>';
    	$list .= '<tr><td>'.$no++.'</td>
    			<td>'.$value->nama.'</td>
    			<td>'.$option.'</td>
    			</tr>';

        }
        $list.='</tbody></table></div>';
        echo json_encode($list);
	}
	public function get_ruang($value)
	{
		$peminjaman=$this->m_barang->get_detail_pinjaman($value);
		$list='<div class="bsc-tbl-hvr">
                            <table class="table table-hover">
                                       <thead>
                                    <tr>
                                        <th width="10px">No.</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody>';
        $no=1;
        foreach ($peminjaman->result() as $key => $value) {
       
    	$list .= '<tr><td><input type="hidden" value="'.$value->id_peminjaman.'" name="id_peminjaman">'.$no++.'</td>
    			<td align="left">'.$value->nama.'</td>
    			<td align="left">'.$value->jumlah.'</td>
    			<td align="left">'.$value->nama_ruang.'</td>
    			</tr>';

        }
        $list.='</tbody></table></div>';
        echo json_encode($list);
	}
	public function reject($value)
	{	
		$update = array(
			'status_peminjaman' => 'REJECTED',
			'id_petugas' => $this->session->id_petugas,
			 );
		$where['id_peminjaman']=$value;
		$this->m_barang->edit_peminjaman($update,$where);
		
		if($this->session->level=='admin'){
		redirect('admin/request','refresh');
		}
	}
	public function ambil()
	{	
		$update = array(
			'status_peminjaman' => 'TAKEN',
			 );
		$where['id_peminjaman']=$this->input->post('id_peminjaman');
		$this->m_barang->edit_peminjaman($update,$where);
		
		if($this->session->level=='admin'){
		redirect('admin/peminjaman','refresh');
		}elseif($this->session->level=='operator'){
		redirect('operator/peminjaman');
		}
		elseif($this->session->level=='peminjam'){
		redirect('peminjam/peminjaman');
		}
	}
	public function notification()
	{
		$data['list']='';
		$notif=$this->m_barang->get_notif();
		$data['row']=$notif->num_rows();
		if ($data['row'] > 0) {
			# code...
		
		foreach ($notif->result() as $key => $value) {
			$data['list'].='<a href="'.site_url('admin/request/'.$value->id_peminjaman).'">
                                            <div class="hd-message-sn">
                                                
                                                <div class="hd-mg-ctn">
                                                    <h3>'.$value->nama_pegawai.' <span class="badge badge-warning">'.$value->status_peminjaman.'</span></h3>
                                                    <p><small>'.date("d / F / Y",strtotime($value->tanggal_pinjam)).'</small></p>
                                                </div>
                                            </div>
                                        </a>';
			}
		}else {
			$data['list']="<div class='hd-message-sn '><div class='hd-mg-ctn '>No Data</div></div>";
		}
		echo json_encode($data);

	}
	public function peminjaman_export_pdf($value='')
	{

		$data['peminjaman']=$this->m_barang->get_laporan($value);
		$this->pdf->load_view('comp/Export_Pdf_peminjaman',$data);
		$this->pdf->render();	
		$this->pdf->stream("Laporan peminjaman ".date("Y M d").".pdf");
	}
	public function export_pdf($value='')
	{

		$data['barang']=$this->m_barang->get($value);
		$this->pdf->load_view('comp/Export_Pdf_barang',$data);
		$this->pdf->render();	
		$this->pdf->stream("Barang ".date("Y M d").".pdf");
	}
	public function peminjaman_export($value='')
	{
		$select = $this->m_barang->get_laporan($value);
        $objPHPExcel    = new PHPExcel();
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        
        $objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(2)->getFont()->setBold(true);
        $center = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
         );
        $center = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $header = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
                'name' => 'calibri'
            )
        );
        $footer = array(
            
            'font' => array(
                'bold' => true,
                'name' => 'calibri'
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle("A1:H2")
                ->applyFromArray($header)
                ->getFont()->setSize(11);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Laporan Peminjaman Barang'. date('Y F d'))

            ->setCellValue('A2', 'No.')
            ->setCellValue('B2', 'Kode Pinjam')
            ->setCellValue('c2', 'Nama Barang')
            ->setCellValue('D2', 'Qty')
            ->setCellValue('E2', 'Peminjam')
            ->setCellValue('F2', 'Petugas')
            ->setCellValue('G2', 'Status')
            ->setCellValue('H2', 'Tanggal Pinjam')
            ->setCellValue('I2', 'Tanggal Kembali')

            ;
        
        $ex = $objPHPExcel->setActiveSheetIndex(0);
        $no = 1;
        $counter = 3;
        $total=0;
       if ($select->num_rows() > 0) {
        	# code...
        
        foreach ($select->result() as $row){
            $ex->setCellValue('A'.$counter, $no++);
            $ex->setCellValue('B'.$counter, $row->kode_pinjam);
            $ex->setCellValue('c'.$counter, $row->nama);
            $ex->setCellValue('D'.$counter, $row->jumlah);
            $ex->setCellValue('E'.$counter, $row->nama_pegawai);
            $ex->setCellValue('F'.$counter, ($row->nama_petugas !='' ? $row->nama_petugas : '-' ));
            $ex->setCellValue('G'.$counter, $row->status_peminjaman);
            $ex->setCellValue('H'.$counter, $row->tanggal_pinjam);
            $ex->setCellValue('I'.$counter, ($row->tanggal_kembali !='' ? $row->tanggal_kembali :'-' ));
            $counter++;

        	}
    	}else{
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$counter.':I'.$counter);
        $ex->setCellValue('A'.$counter, 'No Data');
        $objPHPExcel->getActiveSheet()->getStyle('A'.$counter,':I'.$counter)->applyFromArray($center);


    	}


        $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        // header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        // header('Chace-Control: no-store, no-cache, must-revalation');
        // header('Chace-Control: post-check=0, pre-check=0', FALSE);

        // header('Pragma: no-cache');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Peminjaman '. date('Ymd') .'.xlsx"');
        ob_end_clean();
        $objWriter->save('php://output');
	}
	public function export($value='')
	{
		$select = $this->m_barang->get($value);
        $objPHPExcel    = new PHPExcel();
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        
        $objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(2)->getFont()->setBold(true);
        $center = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
         );
        $header = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
                'name' => 'calibri'
            )
        );
        $footer = array(
            
            'font' => array(
                'bold' => true,
                'name' => 'calibri'
            )
        );

        $objPHPExcel->getActiveSheet()->getStyle("A1:H2")
                ->applyFromArray($header)
                ->getFont()->setSize(11);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Laporan Barang '. date('Y F d'))

            ->setCellValue('A2', 'No.')
            ->setCellValue('B2', 'Nama Barang')
            ->setCellValue('C2', 'Kondisi')
            ->setCellValue('D2', 'Qty')
            ->setCellValue('E2', 'Keterangan')
            ->setCellValue('F2', 'Jenis')
            ->setCellValue('G2', 'Ruangan')

            ;
        
        $ex = $objPHPExcel->setActiveSheetIndex(0);
        $no = 1;
        $counter = 3;
        $total=0;
        foreach ($select->result() as $row){
            $ex->setCellValue('A'.$counter, $no++);
            $ex->setCellValue('B'.$counter, $row->nama);
            $ex->setCellValue('C'.$counter, $row->kondisi);
            $ex->setCellValue('D'.$counter, $row->jumlah);
            $ex->setCellValue('E'.$counter, $row->keterangan);
            $ex->setCellValue('F'.$counter, $row->nama_jenis);
            $ex->setCellValue('G'.$counter, $row->nama_ruang);

        }

        $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        // header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        // header('Chace-Control: no-store, no-cache, must-revalation');
        // header('Chace-Control: post-check=0, pre-check=0', FALSE);

        // header('Pragma: no-cache');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Barang '. date('Ymd') .'.xlsx"');
        ob_end_clean();
        $objWriter->save('php://output');
	}

	public function edit($value)
	{

		$data=array(
			
			'nama' => $this->input->post('nama'),
			'kondisi' => $this->input->post('kondisi'),
			'keterangan' => $this->input->post('ket'),
			'jumlah' => $this->input->post('qty'),
			'id_ruang' => $this->input->post('ruang'),
			'id_jenis'=> $this->input->post('jenis'),
			'id_petugas'=> $this->session->id_pegawai,
			
			 );
		$where['id_inventaris']=$value;

		$this->m_barang->edit($data,$where);
		

		
		if($this->session->level=='admin'){
		redirect('admin/barang');
		}
	}

	public function edit_detail($value)
	{
		$array=$this->input->post('id_detail');
		$qty=$this->input->post('qty');
		$barang=$this->input->post('nama');
		foreach ($array as $key => $value) {
		$data=array(
			
			'id_inventaris' => $barang[$key],
			'jumlah'		=> $qty[$key],
			 );
		$where['id_detail_peminjaman']=$value;
		$this->m_barang->edit_detail_peminjaman($data,$where);
		
		}
		

		
		if($this->session->level=='admin'){
		redirect('admin/peminjaman');
		}elseif($this->session->level=='operator'){
		redirect('operator/peminjaman');
		}elseif($this->session->level=='peminjam'){
		redirect('peminjam/peminjaman');
		}
	}
	public function edit_ruangan($value)
	{

		$data=array(

			'nama_ruang' => $this->input->post('nama'),
			
			 );
		$where['id_ruang']=$value;

		$this->m_barang->edit_ruangan($data,$where);
		

		
		if($this->session->level=='admin'){
		redirect('admin/ruangan');
		}
	}

	public function returned($value)
	{

		$data=array(
			'tanggal_kembali' => date('Y-m-d'),
			'status_peminjaman' =>'RETURNED',

			 );
		$where['id_peminjaman']=$value;

		$array=$this->m_barang->edit_peminjaman($data,$where);
		
		foreach ($array->result() as $key => $value) {
			$update = $value->jumlah;
			$where_inventaris=$value->id_inventaris;
			$this->m_barang->tambah_qty($update,$where_inventaris);
		}
		

		
		if($this->session->level=='admin'){
		redirect('admin/peminjaman');
		}elseif($this->session->level=='operator'){
		redirect('operator/peminjaman');
		}
	}
	public function pengembalian()
	{

		$data=array(
			'tanggal_kembali' => date('Y-m-d'),
			'status_peminjaman' =>'RETURNED',

			 );
		$where['kode_pinjam']=$this->input->post('kode');

		$this->m_barang->edit_peminjaman($data,$where);
		$array=$this->input->post('id');
		$qty=$this->input->post('qty');
		$rusak=$this->input->post('rusak');
		$detail=$this->input->post('detail');
		foreach ($array as $key => $value) {
			$update = $qty[$key];
			$where_inventaris=$value;
			echo $edit['rusak']=$rusak[$key];
			echo $whereid['id_detail_peminjaman']=$detail[$key];
			$this->m_barang->tambah_qty($update,$where_inventaris);
			$this->m_barang->edit_detail($edit,$whereid);
		}
		

		
		if($this->session->level=='admin'){
		redirect('admin/pengembalian');
		}
	}
	public function edit_jenis($value)
	{

		$data=array(

			'nama_jenis' => $this->input->post('nama'),
			'keterangan' => $this->input->post('ket'),

			 );
		$where['id_jenis']=$value;

		$this->m_barang->edit_jenis($data,$where);
		

		
		if($this->session->level=='admin'){
		redirect('admin/jenis');
		}
	}
	public function get_edit_ruangan()
	{
		$where['id_ruang']=$this->input->post("id");
		$json=$this->m_barang->get_edit_ruangan($where)->row();
		echo json_encode($json);
	}
	public function get_pengembalian()
	{
		$where['peminjaman.kode_pinjam']=$this->input->post('code');
		$json=$this->m_barang->get_pengembalian($where);
		$list='';
		$no=1;
		if ($json->num_rows() < 1) {
			
			$list.='<tr class="text-center"><td colspan="6" class="cek">No Data</td></tr>';
		}else{
			foreach ($json->result() as $key => $value) {
				$option='<div class="form-group float-lb floating-lb"><div class="nk-int-st" ><select required="" name="rusak[]" class="form-control" >';
				for ($i=0; $i <=$value->jumlah ; $i++) { 
       			$option.='<option value='.$i.'>'.$i.'</option>';
       			}
       			$option.='</select></div></div>';
				$list.='<tr class="order" data-index="2">
	                   	<td>'.$no++.'</td>
	                   	<td>'.$value->nama_pegawai.'</td>
	                   	<td>'.$value->nama_ruang.'</td>
	                    <td><input type="hidden" name="id[]" value="'.$value->id_inventaris.'">'.$value->nama.'</td>
	                    <td><input type="hidden" name="qty[]" value="'.$value->jumlah.'">'.$value->jumlah.'</td>
	                    <td><input type="hidden" name="detail[]" value="'.$value->id_detail_peminjaman.'">'.$option.'</td>
	                    </tr>';
			}
		}
		echo json_encode($list);
	}

	public function get_edit_detail()
	{
		$id=$this->input->post('id');
		$inventaris=$this->m_barang->get();
		$peminjaman=$this->m_barang->get_pinjam_detail($id);
		$list='<div class="bsc-tbl-hvr">
                            <table class="table table-hover text-center">
                                       <thead>
                                    <tr>
                                        <th width="10px">No.</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody class="list-detail">';
        $no=1;
        foreach ($peminjaman->result() as $key => $value) {
        $option='<div class="form-group float-lb floating-lb"><div class="nk-int-st" ><input type="number" name="qty[]" value="'.$value->jumlah.'" class="form-control"><label class="nk-label">Qty</label></div></div>';
        $barang='<div class="form-group float-lb floating-lb"><div class="nk-int-st" >
        <input type="hidden" name="id_detail[]" value="'.$value->id_detail_peminjaman.'" ><select required="" name="nama[]" class="form-control" ><option></option>';
        foreach ($inventaris->result() as $key_b => $value_b) {
        	$barang .='<option value="'.$value_b->id_inventaris.'" '. ($value->id_inventaris == $value_b->id_inventaris ? 'selected' : '') .'>'.$value_b->nama.'</option>';
        }
        $barang.='</select><label class="nk-label">Nama Barang</label></div></div>';
    	$list .= '<tr><td>'.$no++.'</td>
    			<td>'.$barang.'</td>
    			<td>'.$option.'</td>
    			</tr>';

        }
        $list.='</tbody></table></div>';
        echo json_encode($list);
	
	}
	public function get_edit()
	{
		$where['id_inventaris']=$this->input->post("id");
		$json=$this->m_barang->get_edit($where)->row();
		echo json_encode($json);
	}

	public function get_edit_supplier()
	{
		$where['id_supplier']=$this->input->post("id");
		$json=$this->m_barang->get_edit_supplier($where)->row();
		echo json_encode($json);
	}

	public function get_edit_jenis()
	{
		$where['id_jenis']=$this->input->post("id");
		$json=$this->m_barang->get_edit_jenis($where)->row();
		echo json_encode($json);
	}

	public function tambah_supplier()
	{
		$insert=array(
			'nama_supplier' => $this->input->post('nama'),
			'alamat_supplier' => $this->input->post('alamat'),
			'nm_perusahaan' => $this->input->post('per'),

			);

		$this->m_barang->tambah_supplier($insert);
		
		if($this->session->level=='admin'){
		redirect('admin/supplier','refresh');
		}
		
	}

	public function edit_supplier($id)
	{
		$insert=array(
			'nama_supplier' => $this->input->post('nama'),
			'alamat_supplier' => $this->input->post('alamat'),
			'nm_perusahaan' => $this->input->post('per'),

			);
		$where['id_supplier']=$id;
		$this->m_barang->edit_supplier($insert,$where);
		
		if($this->session->level=='admin'){
		redirect('admin/supplier','refresh');
		}
		
	}
	public function tambah()
	{
		$insert=array(
			'nama' => $this->input->post('nama'),
			'kondisi' => $this->input->post('kondisi'),
			'keterangan' => $this->input->post('ket'),
			'jumlah' => $this->input->post('qty'),
			'jumlah_all' => $this->input->post('qty'),
			'tanggal_register' => date('Y-m-d'),
			'id_ruang' => $this->input->post('ruang'),
			'id_jenis'=> $this->input->post('jenis'),
			'id_petugas'=> $this->session->id_petugas,

			);

		$id=$this->m_barang->tambah($insert);
		
		$insert_detail=array(
			'jumlah' =>$insert['jumlah'],
			'id_inventaris' =>$id,
			'id_supplier' => $this->input->post('supplier'),
			'ket' => $insert['keterangan'],
			'kondisi' => $insert['kondisi'],
		);
		$this->m_barang->tambah_supply('detail_supply',$insert_detail);
		
		if($this->session->level=='admin'){
		redirect('admin/barang','refresh');
		}
		
	}
	public function tambah_ada()
	{
		$insert=array(
			'jumlah' =>$this->input->post('qty'),
			'id_inventaris' =>$this->input->post('barang'),
			'id_supplier' => $this->input->post('supplier'),
			'ket' => $this->input->post('ket'),
			'kondisi' => $this->input->post('kondisi'),
		);
		$this->m_barang->tambah_supply('detail_supply',$insert,'ada');
		redirect('admin/barang','refresh');
	}
	public function tambah_ruangan()
	{
		$insert=array(
			
			'nama_ruang' => $this->input->post('nama'),
		
		);

		$this->m_barang->tambah_ruangan($insert);
		
		if($this->session->level=='admin'){
		redirect('admin/ruangan','refresh');
		}elseif($this->session->level=='operator'){
		redirect('operator/');
		}
		
	}
	public function tambah_jenis()
	{
		$insert=array(
			
			'nama_jenis' => $this->input->post('nama'),
			'keterangan' => $this->input->post('ket'),
		
		);
		$where['kode_jenis']=$insert['kode_jenis'];

		$this->m_barang->tambah_jenis($insert,$where);
		
		if($this->session->level=='admin'){
		redirect('admin/jenis','refresh');
		}
		
	}
	public function pinjam($value='')
	{
		$array=$this->input->post("id");
		$array_qty=$this->input->post('jumlah');
		$no=0;
		foreach ($array as $key => $value) {
			$where_qty = array(
				'jumlah >=' => $array_qty[$key] ,
				'id_inventaris'=> $value, );
			$if=$this->m_barang->cek_qty($where_qty);
			if ($if > 0) {
				
				if ($this->input->post('pegawai')!=null) {
				$id_p=$this->input->post('pegawai');
				}else{
				$id_p=$this->session->id_pegawai;
				}

				 $id_petugas=($this->session->level =="admin" || $this->session->level =="operator" ? $this->session->id_petugas : NULL );
				
				if ($no < 1) {
				$request=($this->session->level =="admin" || $this->session->level =="operator" ? 'TAKEN' : 'REQUESTED');
				$insert_peminjam=array(
					'id_pegawai' => $id_p,
					'tanggal_pinjam' => date('Y-m-d'),
					'status_peminjaman' => $request,
					'kode_pinjam' => random_string('numeric',10),
					'id_petugas' => $id_petugas,
				);

				$id_peminjaman = $this->m_barang->tambah_peminjam($insert_peminjam);
				
				}
				$no++;
				
				$insert=array(
					'id_inventaris' => $value,
					'id_peminjaman' => $id_peminjaman,
					'jumlah'		=> $array_qty[$key],
				);
				$this->m_barang->tambah_detail($insert);
				}
			}
		
		
		if ($this->session->level == 'admin'){
		redirect('admin/peminjaman','refresh');
		}elseif($this->session->level=='operator'){
		redirect('operator/peminjaman');
		}elseif($this->session->level=='peminjam'){
		redirect('peminjam/peminjaman');
		}
	}

	public function hapus_pinjam($id)
	{
		$where['id_peminjaman']=$id;
		$this->m_barang->hapus_detail($where);
		
		if($this->session->level=='admin'){
		redirect('admin/peminjaman','refresh');
		}elseif($this->session->level=='operator'){
		redirect('operator/peminjaman');
		}
		elseif($this->session->level=='operator'){
		redirect('peminjam/peminjaman');
		}
	}
	public function hapus_ruangan($id)
	{
		$where['id_ruang']=$id;
		$this->m_barang->hapus_ruangan($where);
		
		if($this->session->level=='admin'){
		redirect('admin/ruangan','refresh');
		}
	}

	public function hapus($id)
	{
		$where['id_inventaris']=$id;
		$this->m_barang->hapus($where);
		
		if($this->session->level=='admin'){
		redirect('admin/barang','refresh');
		}
	}
	public function hapus_supplier($id)
	{
		$where['id_supplier']=$id;
		$this->m_barang->hapus_supplier($where);
		redirect('admin/supplier','refresh');
	}

	public function hapus_jenis($id)
	{
		$where['id_jenis']=$id;
		$this->m_barang->hapus_jenis($where);
		
		if($this->session->level=='admin'){
		redirect('admin/jenis','refresh');
		}
	}

}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */ ?>