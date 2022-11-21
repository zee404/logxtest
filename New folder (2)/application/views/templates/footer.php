<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        <?= date('Y') ?> &copy; <a href="http://aimstech.ae/" target="_blank"></a>
    </div>
    <div class="footer-tools">
         <span class="go-top">
         <i class="icon-angle-up"></i>
         </span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
<script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>-->
<script src="<?php echo base_url()?>assets/plugins/flot/jquery.flot.js" type="text/javascript"></script><!--dashboard map data-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>-->
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
        //Tasks.initDashboardWidget();
        //Index.initCharts(); // init index page's custom scripts

    });

/*
1 sec = 1000
1 min = 1000*60 = 60000
30 min = 1000*60*30 = 1800000
1 hour = 1000*60*60 = 3600000
2 hour = 1000*60*60*2 = 7200000
3 hour = 1000*60*60*3 = 10800000
*/

    //call function auto exectly every 3 hours
    window.setInterval(function(){
       // get_sql_attendance();
    }, 1800000);


    function get_sql_attendance() {
        var url = "<?php echo base_url(); ?>" + "";
        $.post(url, '', function (response) {
            if (response.success) {
            }
        }, 'json');
    }

    //hide error or success messages
    function hide_msg(ele){
        var parent_id = $(ele).parent().attr('id');
        $('#'+parent_id).hide();
    }
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>