<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png');?>">

        <!-- Plugins css -->
         <link href="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/datatables/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://logxchat.com/lte/dist/css/AdminLTE.min.css">

        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
             .columns {
            float: right!important;
            display: none;
        }
        td, th {
         border: 1px solid #dddddd;
        }
        .yellow {
          background-color: lightblue;
        }
                    .btn-danger {
            color: #fff;
            background-color: #197990 !important;
             border-color: white;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #00b6eb;
            border-color: #7e57c2;
        }
        .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
  
        .badge {
            color: #72747b;
            font-size: 10.5px !important;
        }
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-top: -32px;
        }
        .badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            /* text-align: center; */
            white-space: unset;
            vertical-align: baseline;
            border-radius: .25rem;
            -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        }



/*chat css starts here*/
.chatBoxLg{
          /* display: none; */
          position: absolute;
          /* float: right; */
          z-index: 1100;
          max-width: 55%;
          width: 50%;
          top: 12%;
          right: 0;
          border: 2px solid #101;
        }
        .box-comments .username{
          color: #d66464 !important;
        }
        .box-comments .comment-text {
          margin-left: 0 !important;
        }
        .chatBoxLg .box-header{
          background: #101;
        }

        #example2 td{
          cursor: pointer;
        }

        #unserved td{
          cursor: pointer;
        }

        .user_buttons{
          position: fixed;
          bottom: 0;
          left: 250px;
          z-index: 400000;
          
        }
        .user_button{
          margin: 0 10px;
        }
        kbd {
          display: block;
        }

        #csrPrivateChat{
          width: 300px;
          position: absolute;
          top: 10%;
          left: 20%;
          z-index: 99999999;
          display: none;
        }

        #csrPrivateChat .box-header
        {
          cursor: grab;
        }

        .btn_red{
          background-color: #863109;
          color: white;
        }

        .tcb_blink {
  animation: tcb-blink-animation 560ms steps(5, start) 5;
  -webkit-animation: tcb-blink-animation 560ms steps(5, start) 5;
}
@keyframes tcb-blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes tcb-blink-animation {
  to {
    visibility: hidden;
  }
}

.msg_counters{
  position: absolute;
  z-index: 999999;
  background: red;
  text-align: center;
  padding: 1px 5px;
  right:0px;
  top: -15px;
  border-radius: 20%;
  display: none;
}

/*chat css ends here*/
        </style>
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header');?>        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                         <div class="page-title-box">
                            <div class="page-title-right">
                                
                            </div>
                           
                            <h4 class="page-title">Support Panel</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h4>Currently Served</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Visitor</th>
                  <th>Online</th>
                  <th>Served By</th>
                  <th>Viewing</th>
                  <th>Referrer</th>
                  <th>Visits</th>
                  <th>Chats</th>
                </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h4>Active Website Visitors</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="unserved" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Visitor</th>
                  <th>Online</th>
                  <th>Viewing</th>
                  <th>Referrer</th>
                  <th>Visits</th>
                  <th>Chats</th>
                </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>

  
                 
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2015 - 2019 &copy; UBold theme by <a href="">Coderthemes</a> 
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

        <!-- Right Sidebar -->
      
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <script type="text/javascript">
          <?php $me = array('agent_name'=>$this->session->userdata('name'), 'agent_email'=>$this->session->userdata('email')); ?>
            user = JSON.parse('<?php echo json_encode($me) ?>');
window.base_url = '';
if(user)
{
  window.csr = user;
}
        </script>
        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script></script>

        <!-- App js-->
        <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/chat/js/csrChat.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
       
        
    </body>


<!-- chat box -->
<div class="chatBoxLg" style="display: none">
      <div class="box box-widget" style="margin-bottom: 0 !important">
    <div class="box-header with-border">
      <div class="user-block">
        <!-- <img class="img-circle" src="/lte/dist/img/user1-128x128.jpg" alt="User Image"> -->
        <span class="username"><a href="javascript:void(0)">xxx</a></span>
        <span class="description"></span>
      </div>
      <!-- /.user-block -->
      <div class="box-tools">
        <button type="button" class="btn btn-box-tool minimize_chat"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool endChat"><i class="fa fa-times"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
          <div class="col-sm-8">
            <div class="box-comments" style="overflow-y: auto; max-height: 250px; min-height: 250px">
              
            </div>
              <form action="#" method="post" id="msgForm">
                <input type="file" id="uploadInput" style="display: none">
                  <img class="img-responsive img-circle img-sm" src="https://via.placeholder.com/40/0000/FFFFFF?text=me" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <!-- <input type="text" id="msgBox" class="form-control input-sm" placeholder="Press Enter to Send Message" autocomplete="off"> -->
                    <div class="input-group">
                        <input type="text" id="msgBox" class="form-control input-sm" placeholder="Press Enter to Send Message" autocomplete="off">
                        <div class="input-group-btn">
                          <button class="btn btn-default btn-sm" type="button" id="uploadButton">
                            <i class="fa fa-upload"></i>
                          </button>
                        </div>
                      </div>
                  </div>
                  
                </form>
                <p style="margin-left: 50px; display: none" class="typing"></p>
          </div>

          <div class="col-sm-4">
              <form id="contactForm">
                  <input readonly class="form-control input-sm user_info" data-old="" type="text" placeholder="Add Name" data-toggle="tooltip" data-original-title="Click to Edit Name" name="user_name">
                  <input readonly class="form-control input-sm user_info" data-old="" type="email" placeholder="Add Email" data-toggle="tooltip" data-original-title="Click to Edit Email" name="user_email">
                  <input readonly class="form-control input-sm user_info" data-old="" type="text" placeholder="Add Phone Number" data-toggle="tooltip" data-original-title="Click to Edit Phone" name="user_contact">
                  <textarea readonly cols="30" rows="4" class="form-control user_info" data-old="" placeholder="Add Visitor Note" data-toggle="tooltip" data-original-title="Click to Edit Notes" name="user_notes"></textarea>
              </form>
              <div id="userInfo">

              </div>
          </div>
        </div>
        
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      
    </div>
    <!-- /.box-footer -->
      </div>
      
</div>
<!-- end chat box -->

<!-- chat buttons -->
<div class="btn-group user_buttons">
</div>
<!-- end chat buttons -->


</html>