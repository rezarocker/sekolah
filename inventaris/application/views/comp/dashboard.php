
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo isset($rows['operator']) ? $rows['operator'] : '0'; ?></span></h2>
                            <p>Operator</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo isset($rows['peminjam']) ? $rows['peminjam'] : '0'; ?></span></h2>
                            <p>Peminjam</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo isset($barang['ttl']) ? $barang['ttl'] : '0'; ?></span></h2>
                            <p>Barang</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Status area-->
    <?php if ($this->session->level=='admin') {
        # code...
    ?>
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Pinjaman Statistik</h2>
                                
                            </div>
                        </div>
                        <canvas id="basiclinechart" class="ct-chart"></canvas>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
                                <h2>Kondisi Barang Awal</h2>
                            </div>
                           
                            <div class="email-round-gp">
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="<?php echo ((isset($barang['baik']) ? $barang['baik'] : 0) /$barang['ttl'])*100; ?>" data-linecap="round" data-width="80" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Baik Total : <?= (isset($barang['baik']) ? $barang['baik'] : 0) ?> dari <?= $barang['ttl']  ?></p>
                                    </div>
                                </div>
                                <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="<?php echo ((isset($barang['rusak']) ? $barang['rusak'] : 0)/$barang['ttl'])*100; ?>" data-linecap="round" data-width="80" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Rusak Total : <?= (isset($barang['rusak']) ? $barang['rusak'] : 0) ?> dari <?= $barang['ttl']  ?></p>
                                    </div>
                                </div>

                                
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="email-ctn-round">
                            <div class="email-rdn-hd">
                                <h2>Kondisi Barang Setelah Peminjaman</h2>
                            </div>
                            <div class="email-round-pro">
                                    <div class="email-signle-gp">
                                        <input type="text" class="knob" value="0" data-rel="<?php echo ((isset($barang['sekarang']) ? $barang['sekarang'] : 0)/$barang['ttl'])*100; ?>" data-linecap="round" data-width="80" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                    <div class="email-ctn-nock">
                                        <p>Rusak Total : <?= (isset($barang['sekarang']) ? $barang['sekarang'] : 0) ?> dari <?= $barang['ttl'] ?></p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                
               
            </div>
        </div>
    </div>
    <?php
}   
    ?>
    <!-- End Sale Statistic area-->
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                
         
                
            </div>
        </div>
    </div>
