    <!DOCTYPE html>
    <html>
    <head>
        <title>Laporan Peminjaman</title>
    <link href="<?php echo base_url('assets/dashboard/');?>css/bootstrap.min.css" rel="stylesheet" />

    </head>
    <body>
<table>
    <label class="text-center" style="color: black !important; margin-bottom:20px;   font-family: calibri !important; font-size: 15px !important;"><h1>Laporan Peminjaman Barang</h1></label>
</table>
  <table id="" class="table table-striped data-table-basic">

                                <thead class="text-center">

                                      <tr>

                                        <th width="5px">No.</th>
                                        <th >Kode Pinjam</th>
                                        <th>Nama Barang</th>
                                        <th width="5px">Qty</th>
                                        <th>Peminjam</th>
                                        <th>Petugas</th>
                                        <th>Status</th>
                                        <th class="text-center">Tanggal Pinjam</th>
                                        <th class="text-center">Tanggal Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1; 
                                    foreach ($peminjaman->result() as $key => $value) {
                                        # code...
                                     ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo $value->kode_pinjam; ?></td>
                                        <td><?php echo $value->nama; ?></td>
                                        <td  class="text-center"><?php echo $value->jumlah; ?></td>
                                        <td><?php echo $value->nama_pegawai; ?></td>
                                        <td><?php echo ($value->nama_petugas != '' ? $value->nama_petugas:'-'); ?></td>
                                        <td><?php echo $value->status_peminjaman; ?></td>

                                        <td  class="text-center"><?php echo date("d / F / Y",strtotime($value->tanggal_pinjam)); ?></td>
                                        <td  class="text-center"><?php echo $value->tanggal_kembali
                                         =='' ? ' - ':date("d / F / Y",strtotime($value->tanggal_kembali)); ?></td>
                                                                         </tr>
                                <?php } ?>
                                </tbody>
                                   

                            </table>
              
    
    </body>
    </html>              <style type="text/css">
                                *{
                                    font-size: 9px;    
                                }
                            </style>