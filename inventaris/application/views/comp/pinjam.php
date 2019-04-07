
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo $this->session->pesan; ?>
                <?php echo form_open('barang/pinjam','id="submit"'); ?>

                    <div class="form-example-wrap mg-t-30">
                         <div class="cmp-tb-hd cmp-int-hd">
                            <h4 class="panel-title">Pinjam Barang
                            <button class="btn btn-success notika-btn-success pull-right"><?= ($this->session->level=="admin" || $this->session->level=="operator" ? 'Pinjam' : 'Ajukan' ); ?></button></h4>
                                
                        </div>

                        <div class="row">
                            <?php if (isset($pegawai)) {
                                # code...
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" name="pegawai">
                                           <?php foreach ($pegawai->result() as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value->id_pegawai ?>" ><?php echo $value->nama_pegawai; ?></option>
                                            <?php
                                           } ?>
                                           
                                        </select>
                                </div>
                        </div>
                    <?php }
                    ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" data-live-search="true" id="barang">
                                           <?php foreach ($barang->result() as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value->id_inventaris ?>" id="barang-<?php echo $value->id_inventaris; ?>"><?php echo $value->nama.' - tersedia '.$value->jumlah; ?></option>
                                            <?php
                                           } ?>
                                           
                                        </select>
                                </div>
                        </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    
                                    <div class="nk-int-st">
                                        <input type="number" class="form-control" id="qty">
                                        <label class="nk-label">Qty</label>
                                    </div>
                                </div>
                            </div>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="form-example-int ">
                                    <button type="button" class="btn btn-success notika-btn-success" data-toggle="tooltip" data-placement="top" title="Tambahkan" id="tambah_pinjaman"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="basic-tb-hd">
                            <h4 class="panel-title">Detail Peminjaman  - <?php echo date('d / F / Y');?></h4>
                        </div>
                        <div class="bsc-tbl-hvr">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="10px">No.</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list-detail"></tbody>
                            </table>
                        </div>
                    </div>
                <?php echo form_close(); ?>

                </div>
            </div>
            <!-- table detail -->
             
           <!-- end table detail  -->
           <!-- table pinjaman -->
           <div class="row mg-t-30">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="accordion-wn-wp">

                    <div class="accordion-stn">
                    <div class="panel-group"  data-collapse-color="nk-green" id="accordionGreen">
                         <div class="panel panel-collapse notika-accrodion-cus">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionGreen" href="#accordionGreen-two" aria-expanded="false">
                                                        Pinjaman Mu
                                                        </a>
                                                </h4>
                                            </div>
                                            <div role="tabpanel">
                                                <div class="bsc-tbl-hvr">
                            <table class="table table-hover data-table-basic">
                                <thead>
                                    <tr>
                                        
                                        <th width="10px">No.</th>
                                        <th>Kode Pinjam</th>
                                        <th>Peminjam</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Petugas</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list-pinjaman">
                                    <?php
                                    $no=1; 
                                    foreach ($pinjam->result() as $key => $value) {
                                        $if=$value->status_peminjaman; 
                                        if ($if=='REQUESTED') {
                                        $badge='info';
                                        }elseif ($if=='APPROVED') {
                                        $badge='success';
                                        }elseif ($if=='REJECTED') {
                                        $badge='danger';
                                        }elseif ($if=='TAKEN') {
                                        $badge='warning';
                                        }elseif ($if=='RETURNED') {
                                        $badge='secondary';
                                        }
                                            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $value->kode_pinjam; ?></td>
                                            <td><?php echo $value->nama_pegawai; ?></td>
                                            <td><?php echo date("d / F / Y",strtotime($value->tanggal_pinjam)); ?></td>
                                            <td><?php echo $value->tanggal_kembali =='' ? ' - ':date("d / F / Y",strtotime($value->tanggal_kembali)); ?></td>
                                            <td><?php echo "<span class='badge badge-".$badge."'>".$if."</span>"; ?></td>
                                            <td><?php echo $value->nama_petugas != '' ? $value->nama_petugas : '-' ; ?></td>
                                            <td class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30 text-center">
                                                <?php if ($if=='REQUESTED'): ?>
                                                    
                                                <button class="btn-edit btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg waves-effect" data-toggle="modal" data-target="#myModalone" data-href="<?php echo site_url('barang/edit_detail/'.$value->id_peminjaman); ?>" data-id="<?php echo $value->id_peminjaman; ?>"><i class="fa fa-edit"></i></button>
                                                <a class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg waves-effect sa-warning"  id="" href="<?php echo site_url('barang/hapus_pinjam/'.$value->id_peminjaman); ?>"><i class="fa fa-trash"></i></a>

                                                <?php endif ?>
                                                <?php if ($if=="APPROVED" || $if=="TAKEN"): ?>
                                                    <button class="btn-ruang btn btn-success success-icon-notika btn-reco-mg btn-button-mg waves-effect" data-toggle="tooltip" data-placement="top" title="Lihat Detail"  data-href="<?php echo site_url('barang/get_ruang/'.$value->id_peminjaman); ?>" data-id="<?php echo $value->id_detail_peminjaman; ?>"><i class="fa fa-eye" data-toggle="modal" data-target="#myModalone"></i></button>
                                                    
                                                <?php endif ?>
                                                <?php if ($if=="TAKEN" && ($this->session->level=="admin" || $this->session->level=="operator")) {
                                                    ?>
                                                    <a class=" btn btn-success success-icon-notika  sa-warning" data-toggle="tooltip" data-placement="top" title="Kembalikan Barang"  href="<?php echo site_url('barang/returned/'.$value->id_peminjaman); ?>"><i class="fa fa-arrow-left"></i></a>
                                                    <?php
                                                } ?>
                                            </td>

                                        </tr>
                                        <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                                            </div>
                                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
           <!-- end table pinjaman -->
        </div>
    </div>
    <div class="modal fade" id="myModalone" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header text-center" ><h5 id="title-modal">Edit Detail Peminjaman</h5><button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <?php  echo form_open_multipart('','id="edit_detail"'); ?>
                                            <div class="modal-body text-center">
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default btn-simpan">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            <?php   echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>

    <script>
        $('.btn-edit').on('click', function(){
            $('#title-modal').html('Edit Detail Peminjaman')
            link=$(this).data('href')
            $('.btn-simpan').html('Update')
            $('#edit_detail').attr('action',link)
            id=$(this).data("id")
            $.ajax({
              url:"<?php echo site_url('barang/get_edit_detail'); ?>",
              method:"POST",
              dataType: 'json',
              data:{id:id},
              success:function(data){
                $('.modal-body').html(data)
                  

              }
            })

        })
        $('.btn-ruang').on('click', function(){

            link=$(this).data('href')
            link2="<?php echo site_url('barang/ambil/'); ?>"
            $('#title-modal').html("Ruangan")
            $('.btn-simpan').html("Ambil Barang")
            id=$(this).data("id")

            $('#edit_detail').attr('action',link2)

            $.ajax({
              url:link,
              method:"POST",
              dataType: 'json',
              data:{id:id},
              success:function(data){

                $('.modal-body').html(data)

              }
            })

        })
        no=0;
        $('#tambah_pinjaman').on('click', function(){
            no++;
            id=$('#barang').val();
            nama=$('#barang-'+id).html();
            qty=$('#qty').val();
            if (qty < 1) {
                swal({
                    title:"Qty Tidak bisa kurang dari 1",
                    type :"warning",
                })
            }else{
        append = '<tr class="order" data-index="'+ no +'" id="'+no+'" ><td id="no-'+no+'">'+no+'</td><td>'+nama+'</td><td>'+qty+'</td><td width="10px" class="button-icon-btn button-icon-btn-cl sm-res-mg-t-30"><button class="btn btn-danger list-delete danger-icon-notika btn-reco-mg btn-button-mg waves-effect" data-id='+no+'><i class="fa fa-trash"></i></button><input type="hidden" name="id[]" value="'+id+'"><input type="hidden" name="jumlah[]" value="'+qty+'"></td></tr>';
            $('.list-detail').append(append);
            ordering();
            numbering();
            }

        
        })

        $(document).on('click','.list-delete',function(){
            no=$(this).data('id');
            $('#'+no).remove();
            ordering()
            numbering()
        })
        function ordering(){
        $('.list-detail').each(function(){
            
            var $this = $(this)
            $this.append($this.find('.order').get().sort(function(a,b){
                return $(a).data('index') - $(b).data('index');
            }));
        });
        
    }
    function numbering() {
            no=1;
            $('.order').each(function(){
                index=$(this).data('index');
                cek=$(this).html();
                if ( cek != '') {
                $(this).find('#no-'
                    +index).html(no++)    
                }
                
            })
        }
        $('#submit').submit(function(e){
            list=$('.list-detail').html();
            if (list=="") {
                e.preventDefault();
                swal({
                    title:"Detail Pinjaman Tidak Boleh Kosong",
                    type :"warning",
                })
            }

        })
    </script>