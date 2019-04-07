
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo $this->session->pesan; ?>
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h4 class="panel-title">Ubah Password</h4>
                        </div>
                        <div class="row text-center">
                        <?= form_open('pegawai/ubah','id="change"'); ?>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    
                                    <div class="nk-int-st">
                                        <input required type="password" class="form-control" id="kode" name="old_pass">
                                        <label class="nk-label">Password Lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    
                                    <div class="nk-int-st">
                                        <input required type="password" class="form-control" id="new_pass" name="new_pass">
                                        <label class="nk-label">Password Baru</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    
                                    <div class="nk-int-st">
                                        <input required type="password" class="form-control" id="new_pass_cek" name="">
                                        <label class="nk-label">Re-Password</label>
                                    </div>
                                </div>
                            </div>
                           <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">

                                <div class="form-example-int">
                                    <button type="submit" class="btn btn-success notika-btn-success" id="cek"><span data-toggle="modal" data-target="#detail_peminjam">Update</span></button>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- modal -->

   
                                <script>
                                    $('#change').submit(function(e){
                                        new_pass=$('#new_pass').val();
                                        cek_pass=$('#new_pass_cek').val();
                                            if (new_pass != cek_pass) {
                                                e.preventDefault();
                                                swal({
                                                    title:"Password Tidak cocok !",
                                                    type :"warning",
                                                })
                                            }
                                    })
                                </script>
