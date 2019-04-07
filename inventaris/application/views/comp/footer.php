 
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by JarangNgoding.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Footer area-->
    
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/sparkline/sparkline-active.js"></script>
    
    <!-- knob JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/knob/jquery.knob.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/knob/jquery.appear.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/knob/knob-active.js"></script>
    <!-- flot JS
        ============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/charts/Chart.js"></script>

    <script src="<?php echo base_url('assets/dashboard/');?>js/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/flot/flot-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/todo/jquery.todo.js"></script>
	<!--  wave JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/wave/waves.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/main.js"></script>
    <!-- bootstrap select JS
        ============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/bootstrap-select/bootstrap-select.js"></script>

     <script type="text/javascript" src="<?php echo base_url('assets/dashboard/');?>js/moment.min.js"></script>
<!-- datatable -->
      <script type="text/javascript" src="<?php echo base_url('assets/dashboard/');?>js/daterangepicker.js"></script>
    
    <!--  Chat JS
        ============================================ -->
    <script src="<?php echo base_url('assets/dashboard/');?>js/dialog/sweetalert2.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/');?>js/dialog/dialog-active.js"></script>
    
    <script type="text/javascript">
        $('.sa-warning').on('click', function(e){
        e.preventDefault();
        link = $(this).attr("href");
        swal({   
            title: "Are You Sure?",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonText: "Yes",
        }).then(function(){
            window.location.href=link;
        });
    });
              
   $('#range').daterangepicker({
    "ranges": {
        "Today": [
            moment(),
            moment(),
        ],
        "Yesterday": [
            moment().subtract(1,'days'),
            moment().subtract(1,'days')


        ],
        "Last 7 Days": [
            moment().subtract(7,'days'),
            moment()
        ],
        "Last 30 Days": [
            moment().subtract(30,'days'),
            moment()

        ],
        "This Month": [
            moment().startOf('month'),
            moment().endOf('month')
        ],
        "Last Month": [
            moment().subtract(1,'month').startOf('month'),
            moment().subtract(1,'month').endOf('month')

        ]
    },
    "linkedCalendars": false,
    "startDate": "<?php echo date('m/d/Y'); ?>",
    "endDate": "<?php echo date('m/d/Y'); ?>"
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
         $('.data-table-basic').DataTable();
    setInterval(function(){
    notification()
  }, 1000)

    function notification(){
    $.ajax({
    url:"<?php echo site_url('barang/notification');?>",
    method:"POST",
    dataType:'json',
    success:function(data)
    {
      $('#rowNotif').html(data.row)
      $('#notification').html(data.list)
    }
   });
   }
    </script>

<?php if ( isset($title) && $title=='Dashboard') {
    ?>
<script type="text/javascript">
          var ctx = document.getElementById("basiclinechart");
    var basiclinechart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($chart['bulan'] as $key => $value): 
           echo '"'.$value.'"'.($key < $chart['last']-1  ? ',' : '');
     endforeach ?>],
            datasets: [{
                label: "Pinjaman",
                fill: false,
                backgroundColor: '#00c292',
                borderColor: '#00c292',
                data: [<?php foreach ($chart['jumlah'] as $key => $value): 
           echo $value.($key < $chart['last']-1  ? ',' : '');
     endforeach ?>]
            }]
        },
        options: {
            responsive: true,
            title:{
                display:false,
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Pinjaman'
                    }
                }]
            }
        }
    });
    </script>
    <?php
}
?>
</body>

</html>
