
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo $this->session->pesan; ?>
                    <div class="data-table-list">

                            <div class="pull-right">
                                 <button type="button"   class="btn btn-success success-icon-notika waves-effect"data-toggle="tooltip" data-placement="top" title="Tambah Pegawai"><span data-href="<?php echo site_url("pegawai/tambah"); ?>"  id="btn-tambah" class="fa fa-plus"  data-toggle="modal" data-target="#myModalone"></span></button> 
                            </div>
                        <div class="basic-tb-hd">
                            <h2>Pegawai</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>

                                    <tr>
                                        <th width="10px">No.</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th>Username Default</th>
                                        <th>Password Default</th>
                                        <th>Hak Akses</th>

                                        <th width="100px">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    foreach ($pegawai->result() as $key => $value) {
                                     ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $value->nip; ?></td>
                                        <td><?php echo $value->nama_pegawai; ?></td>
                                        <td><?php echo $value->alamat; ?></td>
                                        <td><?php echo $value->nip; ?></td>
                                        <td><?php echo $value->nama_pegawai; ?></td>
                                        <td><?php echo $value->level; ?></td>
                                        <td class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30">
                                            <button data-id="<?php echo $value->id_pegawai; ?>" data-toggle="modal" data-target="#myModalone" data-href="<?php echo site_url('pegawai/edit/'.$value->id_pegawai); ?>" class="btn-edit btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg waves-effect">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <?php if ($value->level != "admin"): ?>
                                                
                                            <a  id="" href="<?php echo site_url('pegawai/hapus/'.$value->id_pegawai); ?>" class="sa-warning btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg waves-effect" >
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <?php endif ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <th width="10px">No.</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th>Username Default</th>
                                        <th>Password Default</th>
                                        <th>Hak akses</th>

                                        <th width="100px">action</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal area Start-->
<div class="modal fade" id="myModalone" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header text-center"><h5  id="title-modal">Tambah Pegawai</h5><button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <?php  echo form_open_multipart('','id="tambah_pegawai"'); ?>
                                            <div class="modal-body text-center">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              
                                <div class="form-group ic-cmp-int float-lb floating-lb mg-tb-30">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">

                                        <input required  type="number" class="form-control" name="nip" id="nip" placeholder="NIP">
                                    </div>

                                </div>
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input required  type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                    </div>
                                    
                                </div>

                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input required  type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                    </div>
                                    
                                </div>

                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <select required="" name="level" id="level" class="form-control">
                                            <option value="">Hak Akses</option><?php foreach ($level->result() as $key => $value) {
                                            
                                         ?>

                                         <option value="<?php echo $value->id_level; ?>"><?php echo $value->nama_level; ?></option>
                                         <?php } ?>
                                     </select>
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
    <script type="text/javascript">
        $('#btn-tambah').on('click', function(){
            
            link=$(this).data('href');
            $('#title-modal').html('Tambah Pegawai');
            $('#tambah_pegawai').attr('action',link).trigger('reset');

        
        })

        $('.btn-edit').on('click', function(){
            
            link=$(this).data('href');
            id=$(this).data('id');
            $('#tambah_pegawai').attr('action',link);
            $('#title-modal').html('Edit Pegawai');
            
            $.ajax({
              url:"<?php echo site_url('pegawai/get_edit'); ?>",
              method:"POST",
              dataType: 'json',
              data:{id:id},
              success:function(data){

                    $('#nip').val(data.nip);
                    $('#nama').val(data.nama_pegawai);
                    $('#alamat').val(data.alamat);
                    $('#level').val(data.id_level);

              }
            })
            
        })
    </script>
