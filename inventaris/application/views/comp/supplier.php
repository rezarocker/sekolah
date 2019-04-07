
<div class="modal fade" id="myModalone" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header text-center"><h5 id="title-modal"></h5><button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <?php echo form_open('','id="tambah_barang"'); ?>
                                            <div class="modal-body text-center">
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group float-lb">
                                    <div class="nk-int-st">
                                        <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama Supplier">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group float-lb">
                                    <div class="nk-int-st">
                                        <input required type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group float-lb">
                                    <div class="nk-int-st">
                                        <input required type="text" class="form-control" name="per" id="perusahaan" placeholder="Nama Perusahaan">
                                    </div>
                                </div>
                            </div>


                                  




                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            <?php   echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                                
	<!-- modal area End-->

    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo $this->session->pesan; ?>

                    <div class="data-table-list">

                            <div class="pull-right">
                                 <button type="button"  class="btn btn-success success-icon-notika waves-effect"data-toggle="tooltip" data-placement="top" title="Tambah Supplier" ><span class="fa fa-plus" id="btn-tambah" data-toggle="modal" data-target="#myModalone" data-href="<?php echo site_url('barang/tambah_supplier'); ?>"></span></button> 
                            </div>
                        <div class="basic-tb-hd">

                            <h2 class="">Supplier
                            </h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>

                                    <tr>
                                        <th width="10px">No.</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1; 
                                    foreach ($barang->result() as $key => $value) {
                                    
                                     ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $value->nm_perusahaan; ?></td>
                                        <td><?php echo $value->nama_supplier; ?></td>
                                        <td><?php echo $value->alamat_supplier; ?></td>
                                        <td class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30"><button data-href="<?php echo site_url('barang/edit_supplier/'.$value->id_supplier); ?>"  class="btn-edit btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg waves-effect" data-toggle="modal" data-target="#myModalone" data-id="<?php echo $value->id_supplier; ?>"><i class="fa fa-edit"></i></button><a class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg waves-effect sa-warning" href="<?php echo site_url('barang/hapus_supplier/'.$value->id_supplier); ?>" id=""><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#btn-tambah').on('click', function(){
            
            link=$(this).data('href');
            // alert(link)
            $('#title-modal').html('Tambah Supplier');
            $('#tambah_barang').attr('action',link).trigger('reset');

        
        })
        $('.btn-edit').on('click', function(){
            
            link=$(this).data('href');
            id=$(this).data('id');
            $('#tambah_barang').attr('action',link);
            $('#title-modal').html('Edit Supplier');
            alert(id)
            $.ajax({
              url:"<?php echo site_url('barang/get_edit_supplier'); ?>",
              method:"POST",
              dataType: 'json',
              data:{id:id},
              success:function(data){

                    $('#perusahaan').val(data.nm_perusahaan);
                    $('#nama').val(data.nama_supplier);
                    $('#alamat').val(data.alamat_supplier);

              }
            })
            
        })
    </script>