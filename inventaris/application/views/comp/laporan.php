
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">

                            
                        <div class="basic-tb-hd">

                            <h2 class="">Laporan
                            </h2>

                           
                        </div>
                        <div class="row">
                             <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <div class="form-group float-lb">
                                    <div class="nk-int-st">
                            <input type="text" name="" id="range" class="form-control text-center" style="color:#00c292; " autocomplete="false">
                        </div>
                        </div>
                        </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <div class="form-group float-lb">
                        <button class="btn btn-success notika-btn-success waves-effect" id="btn-cari">Cari</button>
                    </div>
                </div>
                        </div>
                        
                    </div>

                </div>
            </div>
    <!-- DataTable Barang -->

             <div class="row mg-t-30">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="accordion-wn-wp">

                    <div class="accordion-stn">
                    <div class="panel-group"  data-collapse-color="nk-green" id="accordionGreen">
                         <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-two" aria-expanded="false">Barang (<?php echo $barang->num_rows(); ?>)
                                                        </a>
                                                </h4>
                                            </div>
                                            <div class="pull-right" style="margin-top: -35px;">
                                            <a href="<?php echo site_url('barang/export/'.$date) ?>" class="btn btn-success notika-btn-success waves-effect" >Export Excel</a>
                                            <a href="<?php echo site_url('barang/export_pdf/'.$date) ?>" class="btn btn-success notika-btn-success waves-effect"  >Export Pdf</a>
                                        </div>
                                            <div id="accordionGreen-two" class="collapse" role="tabpanel">
                                              <div class="table-responsive">
                           <table id="data-table-basic" class="table table-striped">
                                <thead>

                                    <tr>
                                        <th width="10px">Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kondisi</th>
                                        <th>Qty</th>
                                        <th>Keterangan</th>
                                        <th>Ruangan</th>
                                        <th>Jenis</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1; 
                                    foreach ($barang->result() as $key => $value) {
                                    
                                     ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $value->nama; ?></td>
                                        <td><?php echo $value->kondisi; ?></td>
                                        <td><?php echo $value->jumlah; ?></td>
                                        <td><?php echo $value->keterangan; ?></td>
                                        <td><?php echo $value->nama_ruang; ?></td>
                                        <td><?php echo $value->nama_jenis; ?></td>
                                        <td><?php echo date("d / F / Y",strtotime($value->tanggal_register)); ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    
                                    <tr>
                                        <th width="10px">Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kondisi</th>
                                        <th>Qty</th>
                                        <th>Keterangan</th>
                                        <th>Ruangan</th>
                                        <th>Jenis</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                                            </div>
                                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <!-- DataTable peminjaman -->
 <div class="row mg-t-30">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                               
                    <div class="accordion-wn-wp">


                    <div class="accordion-stn">
                    <div class="panel-group"  data-collapse-color="nk-green" id="accordionGreen">
                         <div class="panel panel-collapse notika-accrodion-cus">

                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-three" aria-expanded="false">
                                                        Peminjaman  Barang (<?php echo $peminjaman->num_rows(); ?>)
                                                        </a>

                                                        
                                                </h4>
                                                 
                                            </div>

                         
                          <div class="pull-right" style="margin-top: -35px;">
                                            <a href="<?php echo site_url('barang/peminjaman_export/'.$date) ?>" class="btn btn-success notika-btn-success waves-effect" >Export Excel</a>
                                            <a href="<?php echo site_url('barang/peminjaman_export_pdf/'.$date) ?>" class="btn btn-success notika-btn-success waves-effect"  >Export Pdf</a>
                                        </div>

                                            <div id="accordionGreen-three" class="collapse" role="tabpanel">
                                              <div class="table-responsive">
                            <table id="" class="table table-striped data-table-basic">
                                <thead>

                                      <tr>

                                        <th>No.</th>
                                        <th width="10px">Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Peminjam</th>
                                        <th>Petugas</th>
                                        <th>Status</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1; 
                                    foreach ($peminjaman->result() as $key => $value) {
                                        # code...
                                     ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $value->kode_pinjam; ?></td>
                                        <td><?php echo $value->nama; ?></td>
                                        <td><?php echo $value->jumlah; ?></td>
                                        <td><?php echo $value->nama_pegawai; ?></td>
                                        <td><?php echo ($value->nama_petugas != '' ? $value->nama_petugas:'-'); ?></td>
                                        <td><?php echo $value->status_peminjaman; ?></td>

                                        <td><?php echo date("d / F / Y",strtotime($value->tanggal_pinjam)); ?></td>
                                        <td><?php echo $value->tanggal_kembali =='' ? ' - ':date("d / F / Y",strtotime($value->tanggal_kembali)); ?></td>
                                                                         </tr>
                                <?php } ?>
                                </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>No.</th>
                                        <th width="10px">Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Peminjam</th>
                                        <th>Petugas</th>
                                        <th>Status</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                                            </div>
                                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
    <script type="text/javascript">
        
    $(document).on('click','#btn-cari', function(){
        val=$('#range').val()
        val=val.replace(/\-/g,'_')
        val=val.replace(/\//g,'-')
        val=val.replace(/ /g,'')
        window.location.href='<?php echo site_url('admin/laporan/'); ?>'+val;
    
    });
    
    </script>
