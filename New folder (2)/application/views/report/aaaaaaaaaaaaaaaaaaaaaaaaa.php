<?php $this->load->view("templates/header.php");?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/data-tables/DT_bootstrap.css" />
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/css/datepicker.css" />
<!-- END PAGE LEVEL STYLES -->

<div class="page-container">
<?php $this->load->view("templates/sidebar");?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">

<div class="page-content">

    <!-- BEGIN PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->

            <ul class="page-breadcrumb breadcrumb">
                <li class="btn-group" id="download_btn_container" style="display: none">
                    <?php echo form_open('report/csv_vendor_delivery_report', array('id'=>'vendor_deliveries','method'=>'post')); ?>
                    <input type="hidden" value="<?= date('Y-m-d')?>" name="csv_start_date" id="csv_start_date">
                    <input type="hidden" value="<?= date('Y-m-d')?>" name="csv_end_date" id="csv_end_date">
                    <input type="hidden" value="<?= date('Y-m-d')?>" name="csv_vendor_id" id="csv_vendor_id">
                    <button onclick="javascript:submit_form('vendor_deliveries')" type="submit_" class="btn green">Download <i class="icon-download"></i></button>
                    <?php echo form_close(); ?>
                </li>
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url()?>auth/dashboard">Dashboard</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="">Reports</a></li>
            </ul>


            <div class="col-md-4">
                <h3 class="page-title">
                    Vendor Wise Deliveries
                </h3>
            </div>

            <div class="table-toolbar pull-right_">

                <div class="col-md-2">
                    <div class="form-group">
                        <select class="form-control" name="vendor_list" id="vendor_list">
                            <option value="">Select Vendor</option>
                            <?php foreach ($vendors as $key => $ven) {?>
                                <option value="<?= $ven->id; ?>" ><?= $ven->email.' - '.$ven->full_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 no-space">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group input-large date-picker input-daterange" data-date="<?= date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" name="from" id="from_date" value="<?= date('d-m-Y'); ?>">
                                <span class="input-group-addon">to</span>
                                <input type="text" class="form-control" name="to" id="to_date" value="<?= date('d-m-Y'); ?>">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="btn-group">
                    <a href="#" onclick="javascript:get_reports()">
                        <button class="btn blue">Get Report <i class="icon-plus"></i></button>
                    </a>
                </div>

            </div>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-bar-chart"></i>Reporting Data</div>
                </div>
                <div class="portlet-body" id="">

                    <table class="table table-striped table-bordered table-hover" id="report_table">
                        <thead id="table_header">
                        <tr>
                            <th>Delivery ID</th>
                            <th>Customer</th>
                            <th>Delivery Address</th>
                            <th>Notes</th>
                            <th>Time Slot</th>
                            <th>Type</th>
                            <th>Driver</th>
                            <th>Vendor</th>
                            <th>Received Bags</th>
                            <th>Ice Bags</th>
                            <th>Delivery Date</th>
                           
                            
                            
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody id="table_body"></tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->

</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view("templates/footer.php");?>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url()?>assets/scripts/moment.js" type="text/javascript" ></script>
<script src="<?php echo base_url()?>assets/scripts/moment-duration-format.js" type="text/javascript" ></script>
    
<script type="text/javascript">
    var delivery_table;
    jQuery(document).ready(function() {
        var link_id = 'vendor_deliveries';
        App.side_Menu(link_id);

        date_picker();
        init_table();

    });


    function get_reports(){
        var vendor_id = $("select#vendor_list option:selected").val();
        get_deliveries_report_by_vendor(vendor_id);

    }

    //GENERAL METHODS
    function init_table(){
        delivery_table = $('#report_table').dataTable({
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {"bSortable": false}
            ],
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 5,
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": []
        });
    }

    function date_picker() {
        var date = new Date();
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                autoclose: true
               // endDate : new Date(date.getFullYear(), date.getMonth(), date.getDate())

            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    }

    function get_deliveries_report_by_vendor(vendor_id){
        $("#download_btn_container").hide();
        var from_date = moment($("#from_date").val(), 'DD-MM-YYYY').subtract(0, 'days').format('YYYY-MM-DD 23:59:59');
        var to_date = moment($("#to_date").val(), 'DD-MM-YYYY').format('YYYY-MM-DD 23:59:59');


        if(delivery_table){
            $('#report_table').dataTable().fnDestroy();
        }

        $("#table_body").empty();

        var url = "<?php echo base_url(); ?>"+"report/get_deliveries_report_by_vendor";
        $fields = {'start_date':from_date, 'end_date':to_date, 'vendor_id':vendor_id};

        if(vendor_id) {
            $.post(url, $fields, function (response) {
                var data = '';
                $("#table_body").empty();

                if (response.success) {
                    data = response.report_data.records;
                    $("#table_body").append(set_report_data(data));

                    $("#download_btn_container").show();
                }
                init_table();
            }, 'json');
        }else{
            init_table();
        }
    }

    function set_report_data(data){
        var tbody = '';

        $.each(data, function(i, e){
          tbody += '<tr class="odd gradeX">';
            tbody += '<td >'+ e.order_id +'</td>';
            tbody += '<td >'+ e.name_on_delivery +'<br/>'+ e.c_phone +'</td>';
             tbody += '<td >'+ e.delivery_address +'</td>';
              tbody += '<td >'+ e.note +'</td>';
              tbody += '<td >'+ e.delivery_date +'<br/>'+ e.delivery_time +'</td>';
               tbody += '<td >'+ e.delivery_type +'</td>';
            tbody += '<td >'+ e.driver +'<br/>'+ e.d_phone +'</td>';
            tbody += '<td >'+ e.vendor +'<br/>'+ e.v_phone +'</td>';
             tbody += '<td >'+ e.bag_received +'</td>';
              tbody += '<td >'+ e.ice_bags +'</td>';
            tbody += '<td >'+ e.delivery_date +'</td>';
           
           
          
            tbody += '<td >'+ App.deliveries_status(e.status) +'</td>';
            tbody += '</tr >';
        });
        return tbody;
    }

    function submit_form(ele){
        var from_date = moment($("#from_date").val(), 'DD-MM-YYYY').subtract(0, 'days').format('YYYY-MM-DD 23:59:59');
        var to_date = moment($("#to_date").val(), 'DD-MM-YYYY').format('YYYY-MM-DD 23:59:59');
        var vendor_id = $("select#vendor_list option:selected").val();
        $("#csv_vendor_id").val(vendor_id);
        $("#csv_start_date").val(from_date);
        $("#csv_end_date").val(to_date);
        $("#"+ele).submit();
    }

</script>