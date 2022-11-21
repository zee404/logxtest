<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>The Logx Portal Powered by Mitbyte </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/logx-logo-512x512.png');?>">

        <!-- Plugins css -->
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header');?>
        <!-- End Navigation Bar-->

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
                                <form class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary ">
                                                    From:<!-- <i class="mdi mdi-calendar-range font-13"></i> -->
                                                </span>
                                            </div>
                                            <input type="text" class="form-control shadow border-white" name="date" id="from_date" value="<?php echo $this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d') ?>">
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-primary border-primary ">
                                                    To:<!-- <i class="mdi mdi-calendar-range font-13"></i> -->
                                                </span>
                                            </div>
                                            <input type="text" class="form-control shadow border-white" name="date" id="to_date" value="<?php echo $this->uri->segment(4)?$this->uri->segment(4) : date('Y-m-d') ?>">
                                            
                                        </div>
                                    </div>
                                    
                                   <!--  <a href="javascript: void(0);" class="btn btn-primary btn-sm ml-2 font-14">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a> -->
                                   <!--  <a href="javascript: void(0);" class="btn btn-primary btn-sm ml-1 font-14">
                                        <i class="mdi mdi-filter-variant"></i>
                                    </a> -->
                                </form>
                            </div>
                            <h4 class="page-title">Dashboard ALL Data</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                 <?php $sx=$this->uri->segment(3)? $this->uri->segment(3): date('Y-m-d');
                       $ex=$this->uri->segment(4)? $this->uri->segment(4): date('Y-m-d')
                                                     ?>


                <?php //TAHA if (strtolower($this->session->userdata('role')) == 'admin') { ?>
                
                <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?>
            
               <caption>Deliveries</caption>
                  <div class="row">
                    
                    
                     <!-- total Deliveries-->
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16.499" height="22" viewBox="0 0 16.499 22">
  <g id="total_deliveres_" data-name="total deliveres " transform="translate(-2028 -4922.15)">
    <g id="Group_159" data-name="Group 159" transform="translate(2028 4922.15)">
      <path id="Paper" d="M404.609,51.276h-1.72a.566.566,0,0,1-.516-.6V49.126a1.936,1.936,0,0,0-1.89-1.976H391.89A1.936,1.936,0,0,0,390,49.126V67.173a1.937,1.937,0,0,0,1.89,1.977h12.719a1.937,1.937,0,0,0,1.89-1.977V53.252A1.936,1.936,0,0,0,404.609,51.276Zm.514,15.9a.564.564,0,0,1-.516.6H391.89a.566.566,0,0,1-.517-.6V49.126a.565.565,0,0,1,.517-.6h8.594a.566.566,0,0,1,.516.6v1.548a1.938,1.938,0,0,0,1.89,1.977h1.72a.566.566,0,0,1,.517.6V67.173Zm-8.3-13.149h2.117a.687.687,0,1,0,0-1.373h-2.117a.687.687,0,1,0,0,1.373Zm6.241,1.375h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.751h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Z" transform="translate(-390 -47.15)" fill="#1e97cb"/>
      <path id="Check" d="M396.276,53.552a.368.368,0,0,0-.507,0l-1.181,1.181-.453-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.382-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,0-.254.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.087.087,0,0,0,.125,0L395.9,53.68a.181.181,0,0,1,.254,0,.179.179,0,0,1,.052.128A.182.182,0,0,1,396.15,53.934Z" transform="translate(-390.881 -48.725)" fill="#1e97cb"/>
      <path id="Check-2" data-name="Check" d="M396.276,57.22a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.379-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.128-.306.175.175,0,0,1,.126.052l.517.516a.087.087,0,0,0,.125,0l1.244-1.243a.179.179,0,0,1,.305.127A.168.168,0,0,1,396.15,57.6Z" transform="translate(-390.881 -49.643)" fill="#1e97cb"/>
      <path id="Check-3" data-name="Check" d="M396.276,60.885a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.381L394.716,62.7a.182.182,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.089.089,0,0,0,.125,0l1.244-1.244a.179.179,0,0,1,.305.127.17.17,0,0,1-.05.126Z" transform="translate(-390.881 -50.559)" fill="#1e97cb"/>
      <path id="images" d="M395.429,65.275h-1.16a.367.367,0,0,0-.367.367V66.8a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367v-1.16A.367.367,0,0,0,395.429,65.275Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1v-1.16a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -51.682)" fill="#1e97cb"/>
      <path id="images-2" data-name="images" d="M395.429,68.883h-1.16a.368.368,0,0,0-.367.367v1.16a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367V69.25A.368.368,0,0,0,395.429,68.883Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1V69.25a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -52.584)" fill="#1e97cb"/>
      <path id="Path_314" data-name="Path 314" d="M394.864,55.439l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,55.439Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,1,1-.344-.344l1.237-1.236A.244.244,0,0,1,396.243,53.654Zm-1.379,4.522-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,58.176Zm1.379-1.783a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.242.242,0,0,1,396.243,56.393Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,394.864,60.926Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.244.244,0,0,1,396.243,59.142Zm-.857,5.013H394.2a.223.223,0,0,1-.222-.222V62.653a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.223.223,0,0,1,395.386,64.155Zm0,2.711H394.2a.222.222,0,0,1-.222-.222V65.365a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.222.222,0,0,1,395.386,66.866Z" transform="translate(-390.912 -48.759)" fill="#1e97cb"/>
    </g>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                               $chunk4=0;
                                               $chunk5=0;
                                              
                                              $chunk1=!empty($get_deliveries_data_2021_04_01_from_2021_07_31[0]) ? $get_deliveries_data_2021_04_01_from_2021_07_31[0]->total_dels: 0;
                                              $chunk2=!empty($get_deliveries_data_2020_09_04_from_2021_03_31[0]) ? $get_deliveries_data_2020_09_04_from_2021_03_31[0]->total_dels: 0;
                                              $chunk3=!empty($get_deliveries_data_2019_06_14_from_2020_09_03[0]) ? $get_deliveries_data_2019_06_14_from_2020_09_03[0]->total_dels: 0;
                                              $act_chunk=!empty($deliveries[0]) ? $deliveries[0]->total_dels: 0;
                                              
                                              
                                              $chunk4=!empty($get_deliveries_data_2021_08_01_from_2021_10_31[0]) ? $get_deliveries_data_2021_08_01_from_2021_10_31[0]->total_dels: 0;
                                              $chunk5=!empty($get_deliveries_data_2021_11_01_from_2022_01_31[0]) ? $get_deliveries_data_2021_11_01_from_2022_01_31[0]->total_dels: 0;
                                              
                                              
                                              $total_all_deliv=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              
                                              ?>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_all_deliv; ?></span></h3>
                                        <!--<p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('auth/Active_total_deliveries/').$sx.'/'.$ex; ?>">Total Deliveries</a></p>-->
                                        
                                         <p class="text-muted mb-1 text-truncate">Total Deliveries</p>
                                   
                                    
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    <!-- end of total Deliveries -->
                    
                    <!-- unassigned Deliveries-->
                    <div class="col-md-3 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20.216" height="22" viewBox="0 0 20.216 22">
  <g id="Unassugned_deliveres" data-name="Unassugned deliveres" transform="translate(-1686 -4924.846)">
    <path id="Path_304" data-name="Path 304" d="M49.858,72.071C48.4,71.5,48,70.858,48,69.117q0-7.641,0-15.282a2.333,2.333,0,0,1,1.72-2.552,9.658,9.658,0,0,1,2.125-.033c.119,0,.331.286.318.418-.016.169-.2.431-.34.453a5.792,5.792,0,0,1-1.284.034c-1.128-.077-1.689.666-1.681,1.83.037,5.143.016,10.286.016,15.43,0,1.15.478,1.688,1.507,1.69,1.54,0,3.079.016,4.618-.009a1,1,0,0,1,.918.436,5.163,5.163,0,0,0,.514.54Z" transform="translate(1638 4874.775)" fill="#1e97cb"/>
    <path id="Path_305" data-name="Path 305" d="M54.628,53.555c0-.68,0-1.285,0-1.89a1.614,1.614,0,0,1,1.837-1.817c.578,0,1.155,0,1.733,0a1.565,1.565,0,0,1,1.646,1.642c0,.637,0,1.273.005,1.91a1.208,1.208,0,0,0,.042.158c.551,0,1.124-.014,1.7.005a.91.91,0,0,1,.881.738.929.929,0,0,1-.434,1.028,1.4,1.4,0,0,1-.635.15q-4.153.014-8.306,0c-.875,0-1.355-.715-.989-1.42a.9.9,0,0,1,.868-.507Zm2.578-.772a1.027,1.027,0,0,0,.088-2.052,1.027,1.027,0,1,0-.088,2.052Z" transform="translate(1638.124 4875)" fill="#1e97cb"/>
    <path id="Path_306" data-name="Path 306" d="M57.637,66.344a5.161,5.161,0,1,1,5.174,5.184A5.141,5.141,0,0,1,57.637,66.344Zm9.651.016a4.5,4.5,0,1,0-4.513,4.506A4.48,4.48,0,0,0,67.288,66.359Z" transform="translate(1638.256 4875.141)" fill="#1e97cb"/>
    <path id="Path_307" data-name="Path 307" d="M60.031,59a10.945,10.945,0,0,0-1.085.434,6.861,6.861,0,0,0-1.5.918,2.2,2.2,0,0,1-1.789.615c-.855-.052-1.716-.008-2.573-.013a.98.98,0,1,1,0-1.951C55.353,58.994,57.628,59,60.031,59Z" transform="translate(1637.936 4874.342)" fill="#1e97cb"/>
    <path id="Path_308" data-name="Path 308" d="M67.705,58.664a.989.989,0,0,1-.845-1.155c.065-1.284.022-2.574.018-3.862A1.39,1.39,0,0,0,65.3,52.071c-.429,0-.858,0-1.288-.006-.272,0-.471-.133-.469-.418,0-.306.2-.43.5-.425.547.008,1.095-.008,1.642.006A2.1,2.1,0,0,1,67.7,53.174C67.729,54.993,67.705,56.813,67.705,58.664Z" transform="translate(1637.281 4874.773)" fill="#1e97cb"/>
    <path id="Path_309" data-name="Path 309" d="M63.314,65.607c0-.428,0-.857,0-1.284,0-.3.073-.544.427-.544s.429.257.431.548c0,.782.011,1.565,0,2.347a.5.5,0,0,0,.3.52c.456.238.894.511,1.34.769.277.16.513.365.3.7-.2.32-.455.151-.688.007-.6-.372-1.217-.723-1.8-1.126a.868.868,0,0,1-.3-.57C63.284,66.524,63.314,66.064,63.314,65.607Z" transform="translate(1636.925 4874.267)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                              $chunk4=0;
                                              $chunk5=0;
                                              
                                              $chunk1=!empty($get_un_deliveries_data_2021_04_01_from_2021_07_31[0]) ? $get_un_deliveries_data_2021_04_01_from_2021_07_31[0]->un_delivered_dels: 0;
                                              $chunk2=!empty($get_un_deliveries_data_2020_09_04_from_2021_03_31[0]) ? $get_un_deliveries_data_2020_09_04_from_2021_03_31[0]->un_delivered_dels: 0;
                                              $chunk3=!empty($get_un_deliveries_data_2019_06_14_from_2020_09_03[0]) ? $get_un_deliveries_data_2019_06_14_from_2020_09_03[0]->un_delivered_dels: 0;
                                              $act_chunk=!empty($undeliveries[0]) ? $undeliveries[0]->un_delivered_dels : 0;
                                              
                                              
                                              $chunk4=!empty($get_un_deliveries_data_2021_08_01_from_2021_10_31[0]) ? $get_un_deliveries_data_2021_08_01_from_2021_10_31[0]->un_delivered_dels: 0;
                                              $chunk5=!empty($get_un_deliveries_data_2021_11_01_from_2022_01_31[0]) ? $get_un_deliveries_data_2021_11_01_from_2022_01_31[0]->un_delivered_dels: 0;
                                              
                                              
                                              $total_all_UNdeliv=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              
                                              ?>
                                              
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_all_UNdeliv; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate ">
                                           
                                            
                                            <!--<a href="<?php echo base_url('Order/uploaded/').$sx.'/'.$ex; ?>">Unas. Deliveries</a></p>-->
                                            Unas. Deliveries</p>
                                       
                                    </div>
                                </div>
                                
                               
                               
                                
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    <!-- end of unassigned Deliveries-->
                    
                     <!-- inshiped Deliveries-->
                    <div class="col-md-3 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20.216" height="22" viewBox="0 0 20.216 22">
  <g id="Unassugned_deliveres" data-name="Unassugned deliveres" transform="translate(-1686 -4924.846)">
    <path id="Path_304" data-name="Path 304" d="M49.858,72.071C48.4,71.5,48,70.858,48,69.117q0-7.641,0-15.282a2.333,2.333,0,0,1,1.72-2.552,9.658,9.658,0,0,1,2.125-.033c.119,0,.331.286.318.418-.016.169-.2.431-.34.453a5.792,5.792,0,0,1-1.284.034c-1.128-.077-1.689.666-1.681,1.83.037,5.143.016,10.286.016,15.43,0,1.15.478,1.688,1.507,1.69,1.54,0,3.079.016,4.618-.009a1,1,0,0,1,.918.436,5.163,5.163,0,0,0,.514.54Z" transform="translate(1638 4874.775)" fill="#1e97cb"/>
    <path id="Path_305" data-name="Path 305" d="M54.628,53.555c0-.68,0-1.285,0-1.89a1.614,1.614,0,0,1,1.837-1.817c.578,0,1.155,0,1.733,0a1.565,1.565,0,0,1,1.646,1.642c0,.637,0,1.273.005,1.91a1.208,1.208,0,0,0,.042.158c.551,0,1.124-.014,1.7.005a.91.91,0,0,1,.881.738.929.929,0,0,1-.434,1.028,1.4,1.4,0,0,1-.635.15q-4.153.014-8.306,0c-.875,0-1.355-.715-.989-1.42a.9.9,0,0,1,.868-.507Zm2.578-.772a1.027,1.027,0,0,0,.088-2.052,1.027,1.027,0,1,0-.088,2.052Z" transform="translate(1638.124 4875)" fill="#1e97cb"/>
    <path id="Path_306" data-name="Path 306" d="M57.637,66.344a5.161,5.161,0,1,1,5.174,5.184A5.141,5.141,0,0,1,57.637,66.344Zm9.651.016a4.5,4.5,0,1,0-4.513,4.506A4.48,4.48,0,0,0,67.288,66.359Z" transform="translate(1638.256 4875.141)" fill="#1e97cb"/>
    <path id="Path_307" data-name="Path 307" d="M60.031,59a10.945,10.945,0,0,0-1.085.434,6.861,6.861,0,0,0-1.5.918,2.2,2.2,0,0,1-1.789.615c-.855-.052-1.716-.008-2.573-.013a.98.98,0,1,1,0-1.951C55.353,58.994,57.628,59,60.031,59Z" transform="translate(1637.936 4874.342)" fill="#1e97cb"/>
    <path id="Path_308" data-name="Path 308" d="M67.705,58.664a.989.989,0,0,1-.845-1.155c.065-1.284.022-2.574.018-3.862A1.39,1.39,0,0,0,65.3,52.071c-.429,0-.858,0-1.288-.006-.272,0-.471-.133-.469-.418,0-.306.2-.43.5-.425.547.008,1.095-.008,1.642.006A2.1,2.1,0,0,1,67.7,53.174C67.729,54.993,67.705,56.813,67.705,58.664Z" transform="translate(1637.281 4874.773)" fill="#1e97cb"/>
    <path id="Path_309" data-name="Path 309" d="M63.314,65.607c0-.428,0-.857,0-1.284,0-.3.073-.544.427-.544s.429.257.431.548c0,.782.011,1.565,0,2.347a.5.5,0,0,0,.3.52c.456.238.894.511,1.34.769.277.16.513.365.3.7-.2.32-.455.151-.688.007-.6-.372-1.217-.723-1.8-1.126a.868.868,0,0,1-.3-.57C63.284,66.524,63.314,66.064,63.314,65.607Z" transform="translate(1636.925 4874.267)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                       
                                              
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $get_all_inshiped; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate ">
                                           
                                            
                                            <!--<a href="<?php echo base_url('Order/uploaded/').$sx.'/'.$ex; ?>">Insh. Deliveries</a></p>-->
                                             Insh. Deliveries</p>
                                    </div>
                                </div>
                                
                               
                               
                                
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    <!-- end of inshiped Deliveries-->
                    
                    <!-- assigned Deliveries-->
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                               <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="18.334" height="21.885" viewBox="0 0 18.334 21.885">
  <g id="assigned_delivers" data-name="assigned delivers" transform="translate(-1800 -4923.686)">
    <path id="Path_310" data-name="Path 310" d="M170.787,48.686h.771a.6.6,0,0,0,.116.042,2.835,2.835,0,0,1,2.063,1.231.289.289,0,0,0,.209.093c.564.007,1.128,0,1.692,0a.756.756,0,0,1,.848.841c0,.262,0,.523,0,.8.152,0,.272,0,.393,0,.571.01,1.144-.015,1.71.041a1.914,1.914,0,0,1,1.745,1.935c-.019,1.384,0,2.769,0,4.153q0,5.408,0,10.814a1.794,1.794,0,0,1-.934,1.623,2.237,2.237,0,0,1-1.183.309q-7.045,0-14.089,0c-.057,0-.114,0-.172,0A2,2,0,0,1,162,68.575q.035-7.441,0-14.882a1.928,1.928,0,0,1,1.535-1.919,4.086,4.086,0,0,1,.742-.076c.512-.011,1.023,0,1.56,0,0-.294,0-.563,0-.833a.758.758,0,0,1,.823-.807c.571,0,1.142,0,1.713-.005a.312.312,0,0,0,.226-.1,2.72,2.72,0,0,1,1.629-1.135C170.414,48.766,170.6,48.729,170.787,48.686Zm-4.948,4.544c-.386,0-.741,0-1.1,0a7.088,7.088,0,0,0-.832.033c-.294.04-.366.153-.366.448V68.549a.413.413,0,0,0,.436.481c.077.008.157.005.235.005h13.9a1.924,1.924,0,0,0,.278-.008c.278-.041.405-.178.405-.428q0-7.461,0-14.923a.369.369,0,0,0-.287-.393,1.121,1.121,0,0,0-.337-.05c-.5-.006-1,0-1.5,0-.061,0-.122.009-.191.015v1.006a.785.785,0,0,1-.889.9h-8.863a.794.794,0,0,1-.894-.9C165.838,53.923,165.839,53.6,165.839,53.23Zm1.54.37h7.56V51.589H174.7c-.464,0-.928,0-1.392,0a.762.762,0,0,1-.8-.583.772.772,0,0,0-.412-.542,1.828,1.828,0,0,0-1.874.02.9.9,0,0,0-.366.445.819.819,0,0,1-.873.659c-.457,0-.913,0-1.37,0-.075,0-.151.007-.242.012,0,.613,0,1.2,0,1.8C167.371,53.459,167.376,53.522,167.379,53.6Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_311" data-name="Path 311" d="M170.841,63.845c.063-.059.119-.111.173-.165q1.931-1.928,3.863-3.854a1.225,1.225,0,0,1,1.825,1.635c-.06.07-.127.135-.193.2q-2.233,2.23-4.465,4.461a3.2,3.2,0,0,0-.278.323,1.273,1.273,0,0,1-1.87-.031,1.851,1.851,0,0,0-.194-.226c-.732-.73-1.471-1.455-2.2-2.19A1.227,1.227,0,0,1,168,61.946a1.162,1.162,0,0,1,1.221.3c.486.473.963.953,1.444,1.431C170.719,63.733,170.777,63.785,170.841,63.845Z" transform="translate(1637.144 4873.209)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                         <div class="col-6">
                                    <div class="text-right">
                                        <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                              $chunk4=0;
                                              $chunk5=0;


                                              $chunk1=!empty($asdeliveries_data_2021_04_01_from_2021_07_31[0]) ? $asdeliveries_data_2021_04_01_from_2021_07_31[0]->as_delivered_dels: 0;
                                              $chunk2=!empty($asdeliveries_data_2020_09_04_from_2021_03_31[0]) ? $asdeliveries_data_2020_09_04_from_2021_03_31[0]->as_delivered_dels: 0;
                                              $chunk3=!empty($asdeliveries_data_2019_06_14_from_2020_09_03[0]) ? $asdeliveries_data_2019_06_14_from_2020_09_03[0]->as_delivered_dels: 0;
                                              $act_chunk=!empty($asdeliveries[0]) ? $asdeliveries[0]->as_delivered_dels : 0 ;
                                              
                                              
                                              $chunk4=!empty($asdeliveries_data_2021_08_01_from_2021_10_31[0]) ? $asdeliveries_data_2021_08_01_from_2021_10_31[0]->as_delivered_dels: 0;
                                              $chunk5=!empty($asdeliveries_data_2021_11_01_from_2022_01_31[0]) ? $asdeliveries_data_2021_11_01_from_2022_01_31[0]->as_delivered_dels: 0;
                                              
                                              
                                              $total_all_ASdeliv=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              
                                              ?>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_all_ASdeliv; ?></span></h3>
                                        <!--<p class="text-muted mb-1 text-truncate "><a href="<?php echo base_url('Order/index/').$sx.'/'.$ex; ?>"> Assi. Deliveries</a></p>-->
                                       
                                        <p class="text-muted mb-1 text-truncate "> Assi. Deliveries</p>
                                       
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    <!-- end of assigned Deliveries-->
                 
                     <!-- delivered Deliveries-->
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16.499" height="22" viewBox="0 0 16.499 22">
  <g id="total_delivered" data-name="total delivered" transform="translate(-1914 -4922.15)">
    <path id="Paper" d="M290.609,51.275H288.89a.566.566,0,0,1-.517-.6V49.126a1.935,1.935,0,0,0-1.89-1.976H277.89A1.937,1.937,0,0,0,276,49.126V67.173a1.938,1.938,0,0,0,1.89,1.977h12.719a1.937,1.937,0,0,0,1.89-1.977V53.252A1.936,1.936,0,0,0,290.609,51.275Zm.514,15.9a.564.564,0,0,1-.516.6H277.89a.566.566,0,0,1-.517-.6V49.126a.565.565,0,0,1,.517-.6h8.594a.566.566,0,0,1,.517.6v1.548a1.937,1.937,0,0,0,1.89,1.977h1.719a.566.566,0,0,1,.517.6V67.173Zm-8.3-13.149h2.117a.687.687,0,1,0,0-1.373h-2.117a.687.687,0,1,0,0,1.373Zm6.241,1.375h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.751h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Check" d="M282.277,53.552a.369.369,0,0,0-.508,0l-1.18,1.181-.454-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.357.357,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.382-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.176.176,0,0,1,.126.052l.517.517a.088.088,0,0,0,.126,0L281.9,53.68a.179.179,0,0,1,.305.127A.184.184,0,0,1,282.151,53.934Z" transform="translate(1637.119 4873.425)" fill="#1e97cb"/>
    <path id="Check-2" data-name="Check" d="M282.277,57.22a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.379-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.174.174,0,0,1,.126.052l.517.516a.088.088,0,0,0,.126,0l1.243-1.243a.181.181,0,0,1,.253,0,.178.178,0,0,1,.052.127A.17.17,0,0,1,282.151,57.6Z" transform="translate(1637.119 4872.507)" fill="#1e97cb"/>
    <path id="Check-3" data-name="Check" d="M282.277,60.885a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.381L280.716,62.7a.183.183,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.127-.052.176.176,0,0,1,.126.052l.517.517a.09.09,0,0,0,.126,0l1.243-1.244a.182.182,0,0,1,.253,0,.178.178,0,0,1,.052.127.172.172,0,0,1-.049.126Z" transform="translate(1637.119 4871.591)" fill="#1e97cb"/>
    <path id="Path_364" data-name="Path 364" d="M280.864,55.439l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,55.439Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,0,1-.344-.344l1.237-1.236A.244.244,0,0,1,282.243,53.654Zm-1.379,4.521-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,58.176Zm1.379-1.783a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,0,1-.344-.344l1.237-1.237A.242.242,0,0,1,282.243,56.393Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,280.864,60.926Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.244.244,0,0,1,282.243,59.142Z" transform="translate(1637.087 4873.392)" fill="#1e97cb"/>
    <path id="Check-4" data-name="Check" d="M282.277,60.879a.369.369,0,0,0-.508,0l-1.18,1.181-.454-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.357.357,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.382-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.176.176,0,0,1,.126.052l.517.517a.088.088,0,0,0,.126,0l1.246-1.243a.179.179,0,0,1,.305.127A.184.184,0,0,1,282.151,61.261Z" transform="translate(1637.119 4871.593)" fill="#1e97cb"/>
    <path id="Check-5" data-name="Check" d="M282.277,64.547a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.366.366,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.507,0l1.435-1.435a.355.355,0,0,0,.1-.253A.351.351,0,0,0,282.277,64.547Zm-.126.379-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.176.176,0,0,1,.126.052l.517.517a.088.088,0,0,0,.126,0l1.243-1.243a.181.181,0,0,1,.253,0,.178.178,0,0,1,.052.127A.17.17,0,0,1,282.151,64.927Z" transform="translate(1637.119 4870.675)" fill="#1e97cb"/>
    <path id="Check-6" data-name="Check" d="M282.277,68.212a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.366.366,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.381-1.435,1.435a.182.182,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.127-.052.176.176,0,0,1,.126.052l.517.517a.09.09,0,0,0,.126,0l1.243-1.244a.182.182,0,0,1,.253,0,.178.178,0,0,1,.052.127.172.172,0,0,1-.049.126Z" transform="translate(1637.119 4869.759)" fill="#1e97cb"/>
    <path id="Path_365" data-name="Path 365" d="M280.864,62.766l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,62.766Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,0,1-.344-.344l1.237-1.236A.244.244,0,0,1,282.243,60.981ZM280.864,65.5l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,65.5Zm1.379-1.783a.244.244,0,0,1,0,.344L281.007,65.3a.243.243,0,0,1-.344-.344L281.9,63.72A.242.242,0,0,1,282.243,63.72Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,280.864,68.253Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,0,1-.344-.344l1.237-1.237A.244.244,0,0,1,282.243,66.469Z" transform="translate(1637.087 4871.559)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        
                                        <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                              $chunk4=0;
                                              $chunk5=0;

                                              $chunk1=!empty($get_deliveries_data_2021_04_01_from_2021_07_31[0]) ? $get_deliveries_data_2021_04_01_from_2021_07_31[0]->delivered_dels: 0;
                                              $chunk2=!empty($get_deliveries_data_2020_09_04_from_2021_03_31[0]) ? $get_deliveries_data_2020_09_04_from_2021_03_31[0]->delivered_dels: 0;
                                              $chunk3=!empty($get_deliveries_data_2019_06_14_from_2020_09_03[0]) ? $get_deliveries_data_2019_06_14_from_2020_09_03[0]->delivered_dels: 0;
                                              $act_chunk=!empty($deliveries[0]) ? $deliveries[0]->delivered_dels : 0;
                                              
                                              
                                               $chunk4=!empty($get_deliveries_data_2021_08_01_from_2021_10_31[0]) ? $get_deliveries_data_2021_08_01_from_2021_10_31[0]->delivered_dels: 0;
                                               $chunk5=!empty($get_deliveries_data_2021_11_01_from_2022_01_31[0]) ? $get_deliveries_data_2021_11_01_from_2022_01_31[0]->delivered_dels: 0;
                                              
                                              
                                              $total_all_deliv_delivs=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              
                                              ?>
                                              
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_all_deliv_delivs;  ?></span></h3>
                                        <!--<p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('Order/orderCompleted/').$sx.'/'.$ex; ?>">Total Delivered</a></p>-->
                                     <p class="text-muted mb-1 text-truncate">Total Delivered</p>
                                   
                                    
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                     <!-- end of delivered Deliveries-->
                     
                   
        <?php  if (strtolower($this->session->userdata('role')) == 'admin' OR strtolower($this->session->userdata('role')) == 'accounts manager') {
                ?>                  

                   <!--New Added canceled details-->
                    
                       <!-- Unpaid Deliveries-->
                     <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16.499" height="22" viewBox="0 0 16.499 22">
  <g id="total_deliveres_" data-name="total deliveres " transform="translate(-2028 -4922.15)">
    <g id="Group_159" data-name="Group 159" transform="translate(2028 4922.15)">
      <path id="Paper" d="M404.609,51.276h-1.72a.566.566,0,0,1-.516-.6V49.126a1.936,1.936,0,0,0-1.89-1.976H391.89A1.936,1.936,0,0,0,390,49.126V67.173a1.937,1.937,0,0,0,1.89,1.977h12.719a1.937,1.937,0,0,0,1.89-1.977V53.252A1.936,1.936,0,0,0,404.609,51.276Zm.514,15.9a.564.564,0,0,1-.516.6H391.89a.566.566,0,0,1-.517-.6V49.126a.565.565,0,0,1,.517-.6h8.594a.566.566,0,0,1,.516.6v1.548a1.938,1.938,0,0,0,1.89,1.977h1.72a.566.566,0,0,1,.517.6V67.173Zm-8.3-13.149h2.117a.687.687,0,1,0,0-1.373h-2.117a.687.687,0,1,0,0,1.373Zm6.241,1.375h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.751h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Z" transform="translate(-390 -47.15)" fill="#1e97cb"/>
      <path id="Check" d="M396.276,53.552a.368.368,0,0,0-.507,0l-1.181,1.181-.453-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.382-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,0-.254.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.087.087,0,0,0,.125,0L395.9,53.68a.181.181,0,0,1,.254,0,.179.179,0,0,1,.052.128A.182.182,0,0,1,396.15,53.934Z" transform="translate(-390.881 -48.725)" fill="#1e97cb"/>
      <path id="Check-2" data-name="Check" d="M396.276,57.22a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.379-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.128-.306.175.175,0,0,1,.126.052l.517.516a.087.087,0,0,0,.125,0l1.244-1.243a.179.179,0,0,1,.305.127A.168.168,0,0,1,396.15,57.6Z" transform="translate(-390.881 -49.643)" fill="#1e97cb"/>
      <path id="Check-3" data-name="Check" d="M396.276,60.885a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.381L394.716,62.7a.182.182,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.089.089,0,0,0,.125,0l1.244-1.244a.179.179,0,0,1,.305.127.17.17,0,0,1-.05.126Z" transform="translate(-390.881 -50.559)" fill="#1e97cb"/>
      <path id="images" d="M395.429,65.275h-1.16a.367.367,0,0,0-.367.367V66.8a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367v-1.16A.367.367,0,0,0,395.429,65.275Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1v-1.16a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -51.682)" fill="#1e97cb"/>
      <path id="images-2" data-name="images" d="M395.429,68.883h-1.16a.368.368,0,0,0-.367.367v1.16a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367V69.25A.368.368,0,0,0,395.429,68.883Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1V69.25a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -52.584)" fill="#1e97cb"/>
      <path id="Path_314" data-name="Path 314" d="M394.864,55.439l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,55.439Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,1,1-.344-.344l1.237-1.236A.244.244,0,0,1,396.243,53.654Zm-1.379,4.522-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,58.176Zm1.379-1.783a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.242.242,0,0,1,396.243,56.393Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,394.864,60.926Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.244.244,0,0,1,396.243,59.142Zm-.857,5.013H394.2a.223.223,0,0,1-.222-.222V62.653a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.223.223,0,0,1,395.386,64.155Zm0,2.711H394.2a.222.222,0,0,1-.222-.222V65.365a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.222.222,0,0,1,395.386,66.866Z" transform="translate(-390.912 -48.759)" fill="#1e97cb"/>
    </g>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                         <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                              $chunk4=0;
                                              $chunk5=0;

                                              $chunk1=!empty($unpaid_canc_data_2021_04_01_from_2021_07_31[0]) ? $unpaid_canc_data_2021_04_01_from_2021_07_31[0]->unpaid_canceled_deliv: 0;
                                              $chunk2=!empty($unpaid_canc_data_2020_09_04_from_2021_03_31[0]) ? $unpaid_canc_data_2020_09_04_from_2021_03_31[0]->unpaid_canceled_deliv: 0;
                                              $chunk3=!empty($unpaid_canc_data_2019_06_14_from_2020_09_03[0]) ? $unpaid_canc_data_2019_06_14_from_2020_09_03[0]->unpaid_canceled_deliv: 0;
                                              $act_chunk=!empty($unpaid_canceled_deliv[0]) ? $unpaid_canceled_deliv[0]->unpaid_canceled_deliv: 0;
                                              
                                              
                                               $chunk4=!empty($unpaid_canc_data_2021_08_01_from_2021_10_31[0]) ? $unpaid_canc_data_2021_08_01_from_2021_10_31[0]->unpaid_canceled_deliv: 0;
                                               $chunk5=!empty($unpaid_canc_data_2021_11_01_from_2022_01_31[0]) ? $unpaid_canc_data_2021_11_01_from_2022_01_31[0]->unpaid_canceled_deliv: 0;
                                              
                                              
                                              $total_all_unpaid_delivs=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              
                                              ?>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_all_unpaid_delivs;  ?></span></h3>
                                        <!--<p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('Order/AC_cancelled_/').$sx.'/'.$ex.'/unpaid'; ?>">UnPaid Canceled</a></p>-->
                                    
                                      <p class="text-muted mb-1 text-truncate">UnPaid Canceled</p>
                                    
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                        <!-- end of Unpaid Deliveries-->
                        
                        
                      <!-- paid Deliveries-->
                     <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16.499" height="22" viewBox="0 0 16.499 22">
  <g id="total_deliveres_" data-name="total deliveres " transform="translate(-2028 -4922.15)">
    <g id="Group_159" data-name="Group 159" transform="translate(2028 4922.15)">
      <path id="Paper" d="M404.609,51.276h-1.72a.566.566,0,0,1-.516-.6V49.126a1.936,1.936,0,0,0-1.89-1.976H391.89A1.936,1.936,0,0,0,390,49.126V67.173a1.937,1.937,0,0,0,1.89,1.977h12.719a1.937,1.937,0,0,0,1.89-1.977V53.252A1.936,1.936,0,0,0,404.609,51.276Zm.514,15.9a.564.564,0,0,1-.516.6H391.89a.566.566,0,0,1-.517-.6V49.126a.565.565,0,0,1,.517-.6h8.594a.566.566,0,0,1,.516.6v1.548a1.938,1.938,0,0,0,1.89,1.977h1.72a.566.566,0,0,1,.517.6V67.173Zm-8.3-13.149h2.117a.687.687,0,1,0,0-1.373h-2.117a.687.687,0,1,0,0,1.373Zm6.241,1.375h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.751h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Z" transform="translate(-390 -47.15)" fill="#1e97cb"/>
      <path id="Check" d="M396.276,53.552a.368.368,0,0,0-.507,0l-1.181,1.181-.453-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.382-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,0-.254.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.087.087,0,0,0,.125,0L395.9,53.68a.181.181,0,0,1,.254,0,.179.179,0,0,1,.052.128A.182.182,0,0,1,396.15,53.934Z" transform="translate(-390.881 -48.725)" fill="#1e97cb"/>
      <path id="Check-2" data-name="Check" d="M396.276,57.22a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.379-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.128-.306.175.175,0,0,1,.126.052l.517.516a.087.087,0,0,0,.125,0l1.244-1.243a.179.179,0,0,1,.305.127A.168.168,0,0,1,396.15,57.6Z" transform="translate(-390.881 -49.643)" fill="#1e97cb"/>
      <path id="Check-3" data-name="Check" d="M396.276,60.885a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.381L394.716,62.7a.182.182,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.089.089,0,0,0,.125,0l1.244-1.244a.179.179,0,0,1,.305.127.17.17,0,0,1-.05.126Z" transform="translate(-390.881 -50.559)" fill="#1e97cb"/>
      <path id="images" d="M395.429,65.275h-1.16a.367.367,0,0,0-.367.367V66.8a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367v-1.16A.367.367,0,0,0,395.429,65.275Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1v-1.16a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -51.682)" fill="#1e97cb"/>
      <path id="images-2" data-name="images" d="M395.429,68.883h-1.16a.368.368,0,0,0-.367.367v1.16a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367V69.25A.368.368,0,0,0,395.429,68.883Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1V69.25a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -52.584)" fill="#1e97cb"/>
      <path id="Path_314" data-name="Path 314" d="M394.864,55.439l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,55.439Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,1,1-.344-.344l1.237-1.236A.244.244,0,0,1,396.243,53.654Zm-1.379,4.522-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,58.176Zm1.379-1.783a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.242.242,0,0,1,396.243,56.393Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,394.864,60.926Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.244.244,0,0,1,396.243,59.142Zm-.857,5.013H394.2a.223.223,0,0,1-.222-.222V62.653a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.223.223,0,0,1,395.386,64.155Zm0,2.711H394.2a.222.222,0,0,1-.222-.222V65.365a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.222.222,0,0,1,395.386,66.866Z" transform="translate(-390.912 -48.759)" fill="#1e97cb"/>
    </g>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                              $chunk4=0;
                                              $chunk5=0;

                                              $chunk1=!empty($paid_canc_data_2021_04_01_from_2021_07_31[0]) ? $paid_canc_data_2021_04_01_from_2021_07_31[0]->paid_canceled_deliv: 0;
                                              $chunk2=!empty($paid_canc_data_2020_09_04_from_2021_03_31[0]) ? $paid_canc_data_2020_09_04_from_2021_03_31[0]->paid_canceled_deliv: 0;
                                              $chunk3=!empty($paid_canc_data_2019_06_14_from_2020_09_03[0]) ? $paid_canc_data_2019_06_14_from_2020_09_03[0]->paid_canceled_deliv: 0;
                                              $act_chunk=!empty($paid_canceled_deliv[0]) ? $paid_canceled_deliv[0]->paid_canceled_deliv: 0;
                                              
                                              
                                               $chunk4=!empty($paid_canc_data_2021_08_01_from_2021_10_31[0]) ? $paid_canc_data_2021_08_01_from_2021_10_31[0]->paid_canceled_deliv: 0;
                                               $chunk5=!empty($paid_canc_data_2021_11_01_from_2022_01_31[0]) ? $paid_canc_data_2021_11_01_from_2022_01_31[0]->paid_canceled_deliv: 0;
                                              
                                              
                                              $total_all_paid_delivs=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              
                                              ?>
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_all_paid_delivs;  ?></span></h3>
                                        <!--<p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('Order/AC_cancelled_/').$sx.'/'.$ex.'/paid'; ?>">Paid Canceled</a></p>-->
                                     <p class="text-muted mb-1 text-truncate">Paid Canceled</p>
                                  
                                    
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                       <!-- end of paid Deliveries-->
                   
                    <!--END new added cancel detailes-->
                    
                    
                    <!--New Added cash on delivery-->
                    
                     <!-- Cash Need to be collected-->
                     <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20.216" height="22" viewBox="0 0 20.216 22">
  <g id="Unassugned_deliveres" data-name="Unassugned deliveres" transform="translate(-1686 -4924.846)">
    <path id="Path_304" data-name="Path 304" d="M49.858,72.071C48.4,71.5,48,70.858,48,69.117q0-7.641,0-15.282a2.333,2.333,0,0,1,1.72-2.552,9.658,9.658,0,0,1,2.125-.033c.119,0,.331.286.318.418-.016.169-.2.431-.34.453a5.792,5.792,0,0,1-1.284.034c-1.128-.077-1.689.666-1.681,1.83.037,5.143.016,10.286.016,15.43,0,1.15.478,1.688,1.507,1.69,1.54,0,3.079.016,4.618-.009a1,1,0,0,1,.918.436,5.163,5.163,0,0,0,.514.54Z" transform="translate(1638 4874.775)" fill="#1e97cb"/>
    <path id="Path_305" data-name="Path 305" d="M54.628,53.555c0-.68,0-1.285,0-1.89a1.614,1.614,0,0,1,1.837-1.817c.578,0,1.155,0,1.733,0a1.565,1.565,0,0,1,1.646,1.642c0,.637,0,1.273.005,1.91a1.208,1.208,0,0,0,.042.158c.551,0,1.124-.014,1.7.005a.91.91,0,0,1,.881.738.929.929,0,0,1-.434,1.028,1.4,1.4,0,0,1-.635.15q-4.153.014-8.306,0c-.875,0-1.355-.715-.989-1.42a.9.9,0,0,1,.868-.507Zm2.578-.772a1.027,1.027,0,0,0,.088-2.052,1.027,1.027,0,1,0-.088,2.052Z" transform="translate(1638.124 4875)" fill="#1e97cb"/>
    <path id="Path_306" data-name="Path 306" d="M57.637,66.344a5.161,5.161,0,1,1,5.174,5.184A5.141,5.141,0,0,1,57.637,66.344Zm9.651.016a4.5,4.5,0,1,0-4.513,4.506A4.48,4.48,0,0,0,67.288,66.359Z" transform="translate(1638.256 4875.141)" fill="#1e97cb"/>
    <path id="Path_307" data-name="Path 307" d="M60.031,59a10.945,10.945,0,0,0-1.085.434,6.861,6.861,0,0,0-1.5.918,2.2,2.2,0,0,1-1.789.615c-.855-.052-1.716-.008-2.573-.013a.98.98,0,1,1,0-1.951C55.353,58.994,57.628,59,60.031,59Z" transform="translate(1637.936 4874.342)" fill="#1e97cb"/>
    <path id="Path_308" data-name="Path 308" d="M67.705,58.664a.989.989,0,0,1-.845-1.155c.065-1.284.022-2.574.018-3.862A1.39,1.39,0,0,0,65.3,52.071c-.429,0-.858,0-1.288-.006-.272,0-.471-.133-.469-.418,0-.306.2-.43.5-.425.547.008,1.095-.008,1.642.006A2.1,2.1,0,0,1,67.7,53.174C67.729,54.993,67.705,56.813,67.705,58.664Z" transform="translate(1637.281 4874.773)" fill="#1e97cb"/>
    <path id="Path_309" data-name="Path 309" d="M63.314,65.607c0-.428,0-.857,0-1.284,0-.3.073-.544.427-.544s.429.257.431.548c0,.782.011,1.565,0,2.347a.5.5,0,0,0,.3.52c.456.238.894.511,1.34.769.277.16.513.365.3.7-.2.32-.455.151-.688.007-.6-.372-1.217-.723-1.8-1.126a.868.868,0,0,1-.3-.57C63.284,66.524,63.314,66.064,63.314,65.607Z" transform="translate(1636.925 4874.267)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                              $chunk4=0;
                                              $chunk5=0;

                                              $chunk1=!empty($cash_need_data_2021_04_01_from_2021_07_31[0]) ? $cash_need_data_2021_04_01_from_2021_07_31[0]->cash_need_to_collect: 0;
                                              $chunk2=!empty($cash_need_data_2020_09_04_from_2021_03_31[0]) ? $cash_need_data_2020_09_04_from_2021_03_31[0]->cash_need_to_collect: 0;
                                              $chunk3=!empty($cash_need_data_2019_06_14_from_2020_09_03[0]) ? $cash_need_data_2019_06_14_from_2020_09_03[0]->cash_need_to_collect: 0;
                                              $act_chunk=!empty($cash_need_to_collect[0]) ? round($cash_need_to_collect[0]->cash_need_to_collect,4): 0;
                                              
                                              
                                              $chunk4=!empty($cash_need_data_2021_08_01_from_2021_10_31[0]) ? $cash_need_data_2021_08_01_from_2021_10_31[0]->cash_need_to_collect: 0;
                                              $chunk5=!empty($cash_need_data_2021_11_01_from_2022_01_31[0]) ? $cash_need_data_2021_11_01_from_2022_01_31[0]->cash_need_to_collect: 0;
                                              
                                              
                                              $total_all_cash_need=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              $total_all_cash_need=round($total_all_cash_need,4);
                                              ?>
                                              
                                        <h3 class="text-dark mt-1"><span>&#x62f;&#x2e;&#x625;</span><span data-plugin="counterup"><?php echo $total_all_cash_need; ?></span></h3>
                                        <!--<p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('auth/Active_total_deliveries_with_payment/').$sx.'/'.$ex; ?>">Cash Need to Collected</a></p>-->
                                        <p class="text-muted mb-1 text-truncate">Cash Need to Collected</p>
                                   
                                   
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                       <!-- end of paid Deliveries-->
                    
                    <!-- end of Cash Need to be collected-->
                    
                    
                     <!-- Cash collected-->
                     <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="18.334" height="21.885" viewBox="0 0 18.334 21.885">
  <g id="assigned_delivers" data-name="assigned delivers" transform="translate(-1800 -4923.686)">
    <path id="Path_310" data-name="Path 310" d="M170.787,48.686h.771a.6.6,0,0,0,.116.042,2.835,2.835,0,0,1,2.063,1.231.289.289,0,0,0,.209.093c.564.007,1.128,0,1.692,0a.756.756,0,0,1,.848.841c0,.262,0,.523,0,.8.152,0,.272,0,.393,0,.571.01,1.144-.015,1.71.041a1.914,1.914,0,0,1,1.745,1.935c-.019,1.384,0,2.769,0,4.153q0,5.408,0,10.814a1.794,1.794,0,0,1-.934,1.623,2.237,2.237,0,0,1-1.183.309q-7.045,0-14.089,0c-.057,0-.114,0-.172,0A2,2,0,0,1,162,68.575q.035-7.441,0-14.882a1.928,1.928,0,0,1,1.535-1.919,4.086,4.086,0,0,1,.742-.076c.512-.011,1.023,0,1.56,0,0-.294,0-.563,0-.833a.758.758,0,0,1,.823-.807c.571,0,1.142,0,1.713-.005a.312.312,0,0,0,.226-.1,2.72,2.72,0,0,1,1.629-1.135C170.414,48.766,170.6,48.729,170.787,48.686Zm-4.948,4.544c-.386,0-.741,0-1.1,0a7.088,7.088,0,0,0-.832.033c-.294.04-.366.153-.366.448V68.549a.413.413,0,0,0,.436.481c.077.008.157.005.235.005h13.9a1.924,1.924,0,0,0,.278-.008c.278-.041.405-.178.405-.428q0-7.461,0-14.923a.369.369,0,0,0-.287-.393,1.121,1.121,0,0,0-.337-.05c-.5-.006-1,0-1.5,0-.061,0-.122.009-.191.015v1.006a.785.785,0,0,1-.889.9h-8.863a.794.794,0,0,1-.894-.9C165.838,53.923,165.839,53.6,165.839,53.23Zm1.54.37h7.56V51.589H174.7c-.464,0-.928,0-1.392,0a.762.762,0,0,1-.8-.583.772.772,0,0,0-.412-.542,1.828,1.828,0,0,0-1.874.02.9.9,0,0,0-.366.445.819.819,0,0,1-.873.659c-.457,0-.913,0-1.37,0-.075,0-.151.007-.242.012,0,.613,0,1.2,0,1.8C167.371,53.459,167.376,53.522,167.379,53.6Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_311" data-name="Path 311" d="M170.841,63.845c.063-.059.119-.111.173-.165q1.931-1.928,3.863-3.854a1.225,1.225,0,0,1,1.825,1.635c-.06.07-.127.135-.193.2q-2.233,2.23-4.465,4.461a3.2,3.2,0,0,0-.278.323,1.273,1.273,0,0,1-1.87-.031,1.851,1.851,0,0,0-.194-.226c-.732-.73-1.471-1.455-2.2-2.19A1.227,1.227,0,0,1,168,61.946a1.162,1.162,0,0,1,1.221.3c.486.473.963.953,1.444,1.431C170.719,63.733,170.777,63.785,170.841,63.845Z" transform="translate(1637.144 4873.209)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                              
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                         <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                             
                                              $chunk4=0;
                                              $chunk5=0;

                                              $chunk1=!empty($cash_coll_data_2021_04_01_from_2021_07_31[0]) ? $cash_coll_data_2021_04_01_from_2021_07_31[0]->cash_collected_deliv: 0;
                                              $chunk2=!empty($cash_coll_data_2020_09_04_from_2021_03_31[0]) ? $cash_coll_data_2020_09_04_from_2021_03_31[0]->cash_collected_deliv: 0;
                                              $chunk3=!empty($cash_coll_data_2019_06_14_from_2020_09_03[0]) ? $cash_coll_data_2019_06_14_from_2020_09_03[0]->cash_collected_deliv: 0;
                                              $act_chunk=!empty($cash_collected_deliv[0]) ? round($cash_collected_deliv[0]->cash_collected_deliv,4): 0;
                                              
                                               $chunk4=!empty($cash_coll_data_2021_08_01_from_2021_10_31[0]) ? $cash_coll_data_2021_08_01_from_2021_10_31[0]->cash_collected_deliv: 0;
                                               $chunk5=!empty($cash_coll_data_2021_11_01_from_2022_01_31[0]) ? $cash_coll_data_2021_11_01_from_2022_01_31[0]->cash_collected_deliv: 0;
                                              
                                              
                                              $total_all_cash_col=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              $total_all_cash_col=round($total_all_cash_col,4);
                                              ?>
                                              
                                        <h3 class="text-dark mt-1"><span>&#x62f;&#x2e;&#x625;</span><span data-plugin="counterup"><?php echo  $total_all_cash_col;  ?></span></h3>
                                        <!--<p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('auth/Active_total_deliveries_with_cash/').$sx.'/'.$ex; ?>">Cash Collected</a></p>-->
                                   
                                    <p class="text-muted mb-1 text-truncate">Cash Collected</p>
                                   
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                       <!-- end of paid Deliveries-->
                    
                    <!-- end of Cash collected-->


         <?php } ?>
                
                
                </div>  
                
                <!--   BAGS R2 --->
                
            
                <div class="row">
                                  <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.989" viewBox="0 0 22 17.989">
  <g id="unassigned_bags" data-name="unassigned bags" transform="translate(-1686.904 -5029.557)">
    <g id="Group_161" data-name="Group 161" transform="translate(1686.904 5029.557)">
      <path id="Path_315" data-name="Path 315" d="M57.08,172.359c-.3-.156-.569-.295-.838-.437q-3.513-1.848-7.026-3.7a.513.513,0,0,1-.312-.5q.008-4.115,0-8.229v-.19c.177.094.333.176.488.261q3.753,2.057,7.507,4.111a.3.3,0,0,1,.182.306q-.008,4.065,0,8.129Z" transform="translate(-48.904 -154.557)" fill="#1e97cb"/>
      <path id="Path_316" data-name="Path 316" d="M53.75,156.507c.189-.1.363-.2.539-.291.992-.528,1.987-1.053,2.978-1.583a.5.5,0,0,1,.509-.011q3.813,2.007,7.63,4.01a.8.8,0,0,1,.066.045c-.047.032-.086.064-.128.087-1.15.629-2.3,1.259-3.453,1.881a.306.306,0,0,1-.248,0q-3.875-2.019-7.745-4.049C53.852,156.575,53.809,156.544,53.75,156.507Z" transform="translate(-48.904 -154.557)" fill="#1e97cb"/>
      <path id="Path_317" data-name="Path 317" d="M60.876,161.2c-.2.11-.375.21-.554.308-.893.488-1.787.974-2.678,1.466a.265.265,0,0,1-.292.005q-3.821-2.1-7.645-4.192c-.023-.012-.044-.03-.086-.059.054-.035.1-.069.145-.094.973-.522,1.945-1.044,2.923-1.557a.358.358,0,0,1,.288-.012q3.876,2.015,7.746,4.042C60.768,161.128,60.81,161.157,60.876,161.2Z" transform="translate(-48.904 -154.557)" fill="#1e97cb"/>
    </g>
    <path id="Path_318" data-name="Path 318" d="M61.253,167.7a4.826,4.826,0,1,1,4.837,4.846A4.8,4.8,0,0,1,61.253,167.7Zm9.022.015a4.206,4.206,0,1,0-4.219,4.212A4.188,4.188,0,0,0,70.275,167.715Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_319" data-name="Path 319" d="M60.863,167.7a5.172,5.172,0,0,1,5.215-5.226v-3.148c-.056.025-.086.036-.114.051Q62,161.542,58.029,163.7a.231.231,0,0,0-.126.24q0,4.095,0,8.19c0,.062.007.125.012.213l1.659-.866h0l1.981-1.162A5.232,5.232,0,0,1,60.863,167.7Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_320" data-name="Path 320" d="M65.686,166.609c0-.4,0-.8,0-1.2,0-.279.068-.508.4-.508s.4.241.4.512c0,.732.01,1.463,0,2.195a.465.465,0,0,0,.281.486c.427.222.837.478,1.254.719.259.15.479.341.283.658-.184.3-.426.141-.644.007-.562-.348-1.137-.676-1.679-1.053a.8.8,0,0,1-.279-.533C65.657,167.467,65.686,167.037,65.686,166.609Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($unbags) ? $unbags[0]['unbags_counts'] : '0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#"> Unas. Bags</a></p>
                                       
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                   
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.989" viewBox="0 0 22 17.989">
  <g id="assigned_bags" data-name="assigned bags" transform="translate(-1800 -5029.557)">
    <path id="Path_321" data-name="Path 321" d="M178.342,169.816a.456.456,0,0,1-.371-.156,1.138,1.138,0,0,0-.123-.144s-.934-.927-1.19-1.186a.5.5,0,0,1-.133-.473.47.47,0,0,1,.327-.342.538.538,0,0,1,.158-.026.459.459,0,0,1,.327.146l.845.835.123.115.156-.083,2.188-2.18a.527.527,0,0,1,.369-.161.471.471,0,0,1,.383.2.483.483,0,0,1-.024.6c-.028.031-2.513,2.513-2.513,2.513a2.151,2.151,0,0,0-.166.192A.452.452,0,0,1,178.342,169.816Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <g id="Group_164" data-name="Group 164" transform="translate(1800 5029.557)">
      <g id="Group_163" data-name="Group 163" transform="translate(0 0)">
        <path id="Path_322" data-name="Path 322" d="M170.176,172.359c-.3-.156-.569-.295-.837-.437q-3.513-1.848-7.027-3.695a.514.514,0,0,1-.312-.5q.008-4.115,0-8.229v-.19c.177.094.334.176.489.261q3.751,2.057,7.506,4.111a.3.3,0,0,1,.183.306q-.009,4.065-.005,8.129Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
        <path id="Path_323" data-name="Path 323" d="M166.847,156.507c.189-.1.363-.2.538-.291.993-.528,1.987-1.053,2.978-1.583a.5.5,0,0,1,.509-.011q3.814,2.007,7.63,4.01a.664.664,0,0,1,.066.045,1.533,1.533,0,0,1-.128.087c-1.15.629-2.3,1.259-3.453,1.881a.3.3,0,0,1-.247,0q-3.876-2.019-7.745-4.049C166.949,156.575,166.906,156.544,166.847,156.507Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
        <path id="Path_324" data-name="Path 324" d="M173.972,161.2c-.2.11-.375.21-.554.308-.893.488-1.787.974-2.678,1.466a.265.265,0,0,1-.292.005q-3.82-2.1-7.645-4.192a.932.932,0,0,1-.085-.059c.053-.035.1-.069.144-.094.973-.522,1.946-1.044,2.923-1.557a.358.358,0,0,1,.288-.012q3.878,2.015,7.747,4.042C173.865,161.128,173.907,161.157,173.972,161.2Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
      </g>
      <path id="Path_325" data-name="Path 325" d="M174.349,167.7a4.826,4.826,0,1,1,4.837,4.846A4.8,4.8,0,0,1,174.349,167.7Zm9.023.015a4.206,4.206,0,1,0-4.22,4.212A4.19,4.19,0,0,0,183.372,167.715Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
      <path id="Path_326" data-name="Path 326" d="M173.959,167.7a5.174,5.174,0,0,1,5.216-5.226c0-.753,0-1.448,0-1.975v-1.173c-.057.025-.087.036-.115.051q-3.966,2.165-7.934,4.327a.23.23,0,0,0-.127.24q0,4.1,0,8.19c0,.062.007.125.012.213l1.659-.866h0l1.981-1.162A5.232,5.232,0,0,1,173.959,167.7Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
    </g>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($asbags) ? $asbags[0]['asbags_counts'] : '0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('assigned') ?>">Assi. Bags</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                 

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="19.819" viewBox="0 0 22 19.819">
  <g id="picked_bags" data-name="picked bags" transform="translate(-1914 -5030.908)">
    <path id="Path_327" data-name="Path 327" d="M297.77,168.341l.231.557-8.05,3.2a2.167,2.167,0,0,1,.62,1.992,2.026,2.026,0,0,1-.871,1.283,2.054,2.054,0,0,1-2.8-.5c-.714-.958-.49-2.1.612-3.029l-2.987-7.5a17.305,17.305,0,0,1-4.041-.5,2.26,2.26,0,0,0-.035.284c0,.507.043,1.018-.009,1.52a2.26,2.26,0,0,0,.863,2.014,11.585,11.585,0,0,1,3.436,6.85.922.922,0,0,1-.7,1,.9.9,0,0,1-1.1-.686,17.321,17.321,0,0,0-2.513-5.177,1.549,1.549,0,0,0-.137-.154c-.518,1.233-1.026,2.443-1.535,3.652-.266.632-.528,1.266-.8,1.9a.917.917,0,0,1-1.277.584.935.935,0,0,1-.584-1.309q.653-1.8,1.32-3.593a4.2,4.2,0,0,0-.1-3.168A4.311,4.311,0,0,1,277,166.1c-.04-1.471-.018-2.945-.013-4.417a1.734,1.734,0,0,1,3.445-.369c.014.11.178.243.3.292a10.479,10.479,0,0,0,3.338.73,1.014,1.014,0,0,1,.989,1.366.638.638,0,0,0,.026.374c.957,2.428,1.924,4.851,2.879,7.279a.357.357,0,0,0,.427.265c.225-.017.454.048.681.045a1.467,1.467,0,0,0,.518-.09q3.914-1.545,7.823-3.1C297.524,168.429,297.636,168.39,297.77,168.341Zm-9.188,4.212a1.116,1.116,0,0,0-1.142,1.1,1.119,1.119,0,1,0,2.237.01A1.113,1.113,0,0,0,288.581,172.553Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_328" data-name="Path 328" d="M291.4,162.134l3.014-1.2,2.807,7.06-3.014,1.2Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_329" data-name="Path 329" d="M290.7,162.41l1.287,3.224L287,167.617,285.71,164.4Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_330" data-name="Path 330" d="M293.507,169.474l-4.983,1.981-1.285-3.227,4.98-1.983Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_331" data-name="Path 331" d="M276.988,157.649a1.725,1.725,0,1,1,1.716,1.727A1.71,1.71,0,0,1,276.988,157.649Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($bags) ? $bags[0]['bags_counts'] : '0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Picked Bags</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                    
                  <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="21.999" height="21.99" viewBox="0 0 21.999 21.99">
  <g id="total_bags" data-name="total bags" transform="translate(-2028 -5029.822)">
    <path id="Path_332" data-name="Path 332" d="M408.781,169.481v-13.64a.939.939,0,0,1,.641-.976.921.921,0,0,1,1.194.827c0,.072,0,.144,0,.216q0,8.155,0,16.311a.288.288,0,0,0,.181.3,2.288,2.288,0,1,1-2.151-.024.21.21,0,0,0,.14-.218c-.008-.311,0-.623,0-.95-.061-.005-.113-.014-.165-.014-.39,0-.781,0-1.171,0a.911.911,0,0,0-.952.954c-.005.571,0,1.142,0,1.712a.916.916,0,0,1-1,1H395.04a1.691,1.691,0,0,1-.695,1.458,1.863,1.863,0,0,1-1.285.373,1.806,1.806,0,0,1-1.7-1.831c-.147,0-.3,0-.444,0a.911.911,0,0,1-.065-1.82c.084-.007.168-.006.252-.006h13.557c0-.114,0-.208,0-.3a8.186,8.186,0,0,1,.08-1.218,2.7,2.7,0,0,1,2.563-2.141c.42-.016.841-.005,1.261-.006Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_333" data-name="Path 333" d="M394.351,161.235c0,.382,0,.736,0,1.089a.7.7,0,0,0,.234.563.632.632,0,0,0,.7.132.672.672,0,0,0,.437-.628c.009-.312,0-.625,0-.937v-.2h4.12c0,.262,0,.524,0,.786a2.871,2.871,0,0,0,.025.483.678.678,0,0,0,1.344-.112c.009-.337.007-.673,0-1.009,0-.122.031-.169.161-.168.552.007,1.1,0,1.658,0a.679.679,0,0,1,.7.707q0,1.576,0,3.154a.685.685,0,0,1-.728.718q-2.451,0-4.9,0c-1.824,0-3.647-.01-5.471.007a.765.765,0,0,1-.809-.8c.023-1,.021-2.006,0-3.009a.741.741,0,0,1,.783-.785C393.182,161.248,393.752,161.235,394.351,161.235Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_334" data-name="Path 334" d="M395.753,166.743h4.093c0,.371,0,.735,0,1.1a.693.693,0,0,0,.482.686.675.675,0,0,0,.885-.606c.013-.336.01-.673,0-1.009,0-.135.027-.191.178-.188.534.009,1.069,0,1.6,0a.691.691,0,0,1,.739.745q0,1.54,0,3.081a.69.69,0,0,1-.761.756q-2.387,0-4.774,0-2.789,0-5.578,0a.693.693,0,0,1-.622-.255.83.83,0,0,1-.16-.424c-.013-1.075-.01-2.15-.006-3.225a.674.674,0,0,1,.677-.678c.57-.014,1.141,0,1.712-.006.113,0,.126.055.126.145,0,.313,0,.625,0,.937a.69.69,0,1,0,1.374,0c0-.343,0-.685.007-1.027C395.733,166.773,395.743,166.762,395.753,166.743Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_335" data-name="Path 335" d="M397.1,155.74c0,.39-.005.761,0,1.132a.684.684,0,0,0,1.367.047c.009-.336.008-.672,0-1.009,0-.127.023-.181.166-.179.541.007,1.082,0,1.622,0a.7.7,0,0,1,.735.754q0,1.541,0,3.081a.692.692,0,0,1-.739.747q-2.469,0-4.937,0a.689.689,0,0,1-.736-.733q0-1.559,0-3.117a.664.664,0,0,1,.631-.721C395.831,155.722,396.449,155.74,397.1,155.74Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $asbags[0]['asbags_counts'] + $bags[0]['bags_counts'] + $unbags[0]['unbags_counts'] ; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Total Bags</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
            
                    
                </div>
                <!-- end row-->
                   <!-- R3 TAHA-->
                   
                   <?php if (strtolower($this->session->userdata('role')) == 'admin' ){ ?>
                   
                   <div class="row" >
                                     <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.275" viewBox="0 0 22 17.275">
  <g id="unassigned_cash" data-name="unassigned cash" transform="translate(-1686 -5136.18)">
    <path id="Path_336" data-name="Path 336" d="M48,261.18l10.419,0h9.554v7.141c-.228-.1-.435-.215-.655-.291a9.868,9.868,0,0,0-1.025-.3c-.158-.037-.188-.1-.187-.243.006-.759,0-1.518,0-2.277v-.228a1.955,1.955,0,0,1-1.885-1.9H60.38a10.242,10.242,0,0,1,.709.908,5.249,5.249,0,0,1,.494,4.67.435.435,0,0,1-.124.191,5.99,5.99,0,0,0-2.2,3.534.982.982,0,0,1-.029.1H48.107c-.036,0-.071,0-.107.006Zm1.9,7.513a1.886,1.886,0,0,1,1.294.574,1.957,1.957,0,0,1,.538,1.31h3.917a5.255,5.255,0,0,1,0-7.5H51.929a1.935,1.935,0,0,1-2.029,1.672Zm8.542-4.655h-.915v.724c-.644.1-.845.332-.849.96,0,.251,0,.5,0,.752a.77.77,0,0,0,.826.811h.881c0,.175-.008.331,0,.486.008.14-.04.19-.182.187-.351-.009-.7,0-1.053,0h-.459v.929h.841v.738h.914V268.9c.661-.109.856-.34.857-.993v-.73a.76.76,0,0,0-.785-.806c-.258,0-.516,0-.773-.007-.051,0-.14-.062-.143-.1-.015-.182-.007-.366-.007-.566h1.651v-.916h-.807Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_337" data-name="Path 337" d="M65.128,268.661a4.9,4.9,0,1,1-4.919,4.8A4.911,4.911,0,0,1,65.128,268.661Zm3.482,4.786a3.512,3.512,0,1,0-3.391,3.619A3.5,3.5,0,0,0,68.61,273.447Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_338" data-name="Path 338" d="M67.51,274.983l-.983.993c-.34-.345-.683-.7-1.029-1.046s-.68-.678-1.015-1.021a.331.331,0,0,1-.108-.2c-.007-.987,0-1.975,0-2.977h1.379v.728c0,.522,0,1.045,0,1.568a.421.421,0,0,0,.142.336C66.433,273.9,66.974,274.448,67.51,274.983Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($uncashs) ? $uncashs[0]['uncashs_counts'] : '0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Unas. Cash</a></p>
                                       
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                   
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.274" viewBox="0 0 22 17.274">
  <g id="assigned_cash" data-name="assigned cash" transform="translate(-1802.534 -5136.18)">
    <path id="Path_339" data-name="Path 339" d="M180.978,275.385a.456.456,0,0,1-.371-.155,1.146,1.146,0,0,0-.124-.145s-.933-.926-1.189-1.185a.5.5,0,0,1-.134-.473.474.474,0,0,1,.328-.343.534.534,0,0,1,.158-.025.455.455,0,0,1,.327.146l.845.835.123.115.156-.083,2.188-2.18a.524.524,0,0,1,.368-.161.468.468,0,0,1,.384.2.483.483,0,0,1-.024.6c-.028.031-2.513,2.513-2.513,2.513a1.88,1.88,0,0,0-.166.192A.451.451,0,0,1,180.978,275.385Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_340" data-name="Path 340" d="M164.534,261.18l10.419,0h9.554v7.141c-.228-.1-.435-.215-.655-.291a9.94,9.94,0,0,0-1.025-.3c-.158-.037-.188-.1-.187-.243.006-.759,0-1.518,0-2.277v-.228a1.955,1.955,0,0,1-1.885-1.9h-3.844a10.244,10.244,0,0,1,.709.908,5.249,5.249,0,0,1,.494,4.67.428.428,0,0,1-.125.191,5.989,5.989,0,0,0-2.2,3.534.8.8,0,0,1-.03.1H164.641c-.036,0-.071,0-.107.006Zm1.9,7.513a1.888,1.888,0,0,1,1.294.574,1.957,1.957,0,0,1,.538,1.31h3.917a5.256,5.256,0,0,1,0-7.5h-3.72a1.935,1.935,0,0,1-2.029,1.672Zm8.542-4.655h-.915v.724c-.644.1-.845.332-.849.96,0,.251,0,.5,0,.752a.77.77,0,0,0,.826.811h.881c0,.175-.008.331,0,.486.008.14-.04.19-.183.187-.35-.009-.7,0-1.052,0h-.459v.929h.841v.738h.914V268.9c.661-.109.856-.34.857-.993v-.73a.76.76,0,0,0-.785-.806c-.258,0-.516,0-.773-.007-.051,0-.14-.062-.143-.1-.015-.182-.007-.366-.007-.566h1.651v-.916h-.807Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_341" data-name="Path 341" d="M181.662,268.661a4.9,4.9,0,1,1-4.919,4.8A4.911,4.911,0,0,1,181.662,268.661Zm3.482,4.786a3.512,3.512,0,1,0-3.391,3.619A3.5,3.5,0,0,0,185.144,273.447Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($ascashs)? $ascashs[0]['ascashs_counts']:'0';  ?></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Assi. Cash</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                 

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="21.943" height="17.565" viewBox="0 0 21.943 17.565">
  <g id="cash_picked" data-name="cash picked" transform="translate(-1914 -5136.012)">
    <g id="Group_148" data-name="Group 148" transform="translate(1914 5136.012)">
      <path id="Path_274" data-name="Path 274" d="M286.131,269.115l.378.061-.035.245.457.222-.182.424a2.286,2.286,0,0,0-.276-.154,1.036,1.036,0,0,0-.286-.063c-.042,0-.117.033-.125.065a.176.176,0,0,0,.054.139,1.669,1.669,0,0,0,.19.124,1.628,1.628,0,0,1,.282.213.5.5,0,0,1-.233.825c-.163.048-.228.12-.225.276v.046l-.305-.048c-.026,0-.051-.012-.085-.019l.032-.225c-.115-.055-.222-.1-.325-.159a.1.1,0,0,1-.035-.091c.042-.114.094-.224.146-.344a1.542,1.542,0,0,0,.2.109,1.45,1.45,0,0,0,.3.072.134.134,0,0,0,.108-.061c.012-.02-.019-.081-.048-.1-.072-.057-.155-.1-.23-.152a1.518,1.518,0,0,1-.223-.162.535.535,0,0,1,.248-.913c.153-.04.2-.1.206-.243A.5.5,0,0,1,286.131,269.115Z" transform="translate(-276.024 -261.033)" fill="#1e97cb"/>
      <path id="Path_275" data-name="Path 275" d="M276,268.416a.654.654,0,0,0,.652.3c.327-.021.655,0,.983,0,.47,0,.623-.154.623-.631q0-1.765,0-3.531,0-1.1,0-2.2c0-.433-.162-.593-.594-.6-.357,0-.713.008-1.07,0a.572.572,0,0,0-.593.324Z" transform="translate(-276 -261.014)" fill="#1e97cb"/>
      <path id="Path_276" data-name="Path 276" d="M297.994,271.955a.59.59,0,0,0-.6-.32c-.378.013-.756,0-1.134.007a.469.469,0,0,0-.527.53q0,2.943,0,5.884a.478.478,0,0,0,.539.541c.364,0,.728-.014,1.091.006a.625.625,0,0,0,.628-.3Z" transform="translate(-276.051 -261.039)" fill="#1e97cb"/>
      <path id="Path_277" data-name="Path 277" d="M279.579,267.175c.576-.079,1.14-.155,1.7-.234.655-.092,1.309-.221,1.969-.27a7.356,7.356,0,0,1,1.276.093c.708.074,1.415.181,2.126.231.542.039.895-.366.954-1.014a.941.941,0,0,0-.794-.988c-.473-.065-.948-.118-1.422-.174-.538-.063-1.075-.123-1.617-.217.433-.058.865-.117,1.3-.173.261-.034.527-.05.784-.1a1.017,1.017,0,0,1,.661.1q2.37,1.112,4.743,2.218a.934.934,0,1,0,.767-1.7c-.369-.167-.733-.342-1.094-.512a.99.99,0,0,0-.714-1.285c-1.591-.662-3.187-1.314-4.773-1.987a1.6,1.6,0,0,0-1.325-.005c-1.18.518-2.354,1.049-3.534,1.568-.286.125-.583.226-.881.322-.1.034-.154.07-.154.186q.006,1.927.006,3.855A.49.49,0,0,0,279.579,267.175Z" transform="translate(-276.009 -261.012)" fill="#1e97cb"/>
      <path id="Path_278" data-name="Path 278" d="M294.448,277.133v-3.806h-1.031a2.609,2.609,0,0,0-.385,0,1.6,1.6,0,0,1-1.45-.5,2.611,2.611,0,0,0-.388-.3,5.741,5.741,0,0,1-1.375-1.363,1,1,0,0,0-1.066-.388.939.939,0,0,0-.75.764.962.962,0,0,0,.126.7,4.614,4.614,0,0,0,1.528,1.784c.036.023.084.046.1.081a.493.493,0,0,1,.014.156c-.051,0-.12.029-.151,0a4.346,4.346,0,0,1-1.17-1.085c-.139-.225-.285-.445-.417-.673a.184.184,0,0,0-.256-.1q-1.649.527-3.3,1.034c-.139.043-.176.1-.16.241a2.611,2.611,0,0,0,1.573,2.207c.722.341,1.439.7,2.175,1a2.993,2.993,0,0,0,1.072.241c1.715.025,3.429.012,5.143.011C294.324,277.141,294.373,277.137,294.448,277.133Z" transform="translate(-276.021 -261.037)" fill="#1e97cb"/>
      <path id="Path_279" data-name="Path 279" d="M278.543,262.485v5.5a2.566,2.566,0,0,0,.48-.006c.2-.04.255-.2.255-.393,0-.678,0-1.357,0-2.036,0-.821-.011-1.643,0-2.464C279.294,262.526,279.158,262.4,278.543,262.485Z" transform="translate(-276.007 -261.016)" fill="#1e97cb"/>
      <path id="Path_280" data-name="Path 280" d="M295.447,272.357c-.662-.034-.727.027-.728.661v4.307c0,.5.071.566.576.557.049,0,.1-.007.153-.01Z" transform="translate(-276.048 -261.041)" fill="#1e97cb"/>
      <path id="Path_281" data-name="Path 281" d="M291.21,270.558q-.518-1.673-1.05-3.341a.438.438,0,0,0-.612-.292q-2.029.63-4.058,1.265l-3.994,1.25a.486.486,0,0,0-.371.7l.978,3.117c.132.419.323.527.738.4q2.374-.741,4.748-1.486c.053-.017.1-.039.163-.061a1.253,1.253,0,0,1,.4-1.343,1.333,1.333,0,0,1,1.872.228c.253.332.253.333.65.212.082-.025.165-.048.243-.08A.445.445,0,0,0,291.21,270.558Zm-3.442-.268a1.616,1.616,0,1,1-1.619-1.61A1.6,1.6,0,0,1,287.768,270.289Z" transform="translate(-276.013 -261.027)" fill="#1e97cb"/>
    </g>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($cashs)? $cashs[0]['cashs_counts']:'0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Cash Picked</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                       <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="13.547" viewBox="0 0 22 13.547">
  <g id="total_cash" data-name="total cash" transform="translate(-2028 -5138.044)">
    <path id="Path_342" data-name="Path 342" d="M399.641,263.044h8.817c.593,0,.788.2.788.8q0,4.618,0,9.238c0,.573-.205.777-.776.777H390.746c-.526,0-.745-.22-.745-.751q0-4.619,0-9.238c0-.639.185-.824.825-.824Zm-8.572,2.852a.84.84,0,0,0-.023.131c0,1.6,0,3.19,0,4.785,0,.171.069.213.227.236a1.729,1.729,0,0,1,1.482,1.233,4.2,4.2,0,0,1,.113.528h13.523a1.817,1.817,0,0,1,1.556-1.756c.224-.028.278-.1.277-.313-.009-1.535-.005-3.07-.006-4.6,0-.078-.012-.155-.019-.235a1.875,1.875,0,0,1-1.811-1.817h-13.5C392.507,265.389,392.168,265.73,391.069,265.9Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_343" data-name="Path 343" d="M411.3,275.884v-.409q0-4.44,0-8.88c0-.1-.028-.226.021-.294.079-.108.209-.244.32-.246s.243.132.324.238c.05.067.028.193.028.293q0,4.592,0,9.181c0,.581-.239.819-.823.819q-8.79,0-17.579,0c-.1,0-.225.021-.294-.029a.512.512,0,0,1-.226-.308.481.481,0,0,1,.2-.319.58.58,0,0,1,.32-.046q8.685,0,17.369,0Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_344" data-name="Path 344" d="M409.922,274.526v-9.27c0-.427.092-.587.341-.594s.361.164.361.6q0,4.545,0,9.088c0,.643-.205.853-.84.853q-8.786,0-17.573,0c-.08,0-.185.028-.235-.012-.114-.091-.263-.206-.284-.331-.03-.177.1-.317.307-.332.08-.005.161,0,.241,0h17.683Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_345" data-name="Path 345" d="M396.444,268.313a3.757,3.757,0,0,1,1.473-2.979,2.79,2.79,0,0,1,3.617.156,4.1,4.1,0,0,1,0,5.923,2.9,2.9,0,0,1-4.455-.738A4.245,4.245,0,0,1,396.444,268.313Zm3.619,2.136c.074-.027.169-.057.26-.1a1.129,1.129,0,0,0,.735-1.158.971.971,0,0,0-.563-.861c-.312-.16-.653-.263-.955-.437-.13-.075-.289-.287-.263-.4a.507.507,0,0,1,.391-.279,2.945,2.945,0,0,1,.824.114c.153.036.229.017.267-.132a2.329,2.329,0,0,1,.079-.29c.064-.16.012-.248-.148-.287a1.539,1.539,0,0,0-.232-.064c-.262-.02-.455-.074-.419-.418.022-.2-.172-.212-.328-.205-.172.007-.45-.055-.429.189.032.381-.168.5-.454.605a.736.736,0,0,0-.219.157,1.01,1.01,0,0,0,.118,1.606c.326.207.717.309,1.052.5a.642.642,0,0,1,.3.427c.017.237-.222.34-.423.335a6.418,6.418,0,0,1-.944-.124c-.13-.023-.255-.151-.341.066-.147.369-.132.561.093.636.244.081.5.132.746.2.081.586.081.573.471.583C400.226,271.132,399.938,270.69,400.063,270.449Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_346" data-name="Path 346" d="M394.208,268.444a.6.6,0,0,1-.6.61.6.6,0,1,1,.014-1.2A.593.593,0,0,1,394.208,268.444Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_347" data-name="Path 347" d="M406.235,268.453a.6.6,0,1,1-.582-.6A.605.605,0,0,1,406.235,268.453Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup" ><?php echo $ascashs[0]['ascashs_counts'] + $cashs[0]['cashs_counts'] + $uncashs[0]['uncashs_counts'] ; ?></span> </h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Total Cash</a></p>
                                        
                
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                  </div>
                  <!-- TAHA -->
                  <?php } ?>
                   <!--END R3-->
                   
                   <!--R4-->
                <div class="row">
                    
                    
             <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="19.304" height="22" viewBox="0 0 19.304 22">
  <g id="total_patrens" data-name="total patrens" transform="translate(-1686 -5236.281)">
    <g id="Group_150" data-name="Group 150" transform="translate(1686 5236.281)">
      <path id="Path_282" data-name="Path 282" d="M58.5,377.868c.447,0,.894-.018,1.34,0a3.6,3.6,0,0,1,3.483,3.57c.017.857-.012,1.715.012,2.573a.491.491,0,0,1-.368.548,10.753,10.753,0,0,1-5.152.687c-1.252-.13-2.484-.45-3.727-.675a.446.446,0,0,1-.43-.537c.026-.893,0-1.787.015-2.681a3.543,3.543,0,0,1,3.38-3.482c.482-.023.965,0,1.447,0Z" transform="translate(-48.694 -363.313)" fill="#1e97cb"/>
      <path id="Path_283" data-name="Path 283" d="M55.17,376.966c-2.137.836-3.028,2.565-2.9,5.049-1.167-.225-2.251-.392-3.313-.648-.963-.232-.954-.275-.953-1.25,0-.678-.014-1.357.007-2.036a3.507,3.507,0,0,1,3.255-3.546c.97-.095,1.958-.017,2.839-.017Z" transform="translate(-48 -362.899)" fill="#1e97cb"/>
      <path id="Path_284" data-name="Path 284" d="M65.012,381.912a4.43,4.43,0,0,0-2.871-4.951l1.092-2.47c1.2.09,2.575-.262,3.847.419a3.389,3.389,0,0,1,1.926,2.941c.049.961.028,1.926.014,2.889a.538.538,0,0,1-.216.413A8.9,8.9,0,0,1,65.012,381.912Z" transform="translate(-49.733 -362.898)" fill="#1e97cb"/>
      <path id="Path_285" data-name="Path 285" d="M61.632,364.374a3.061,3.061,0,1,1-3.024-3.093A3.037,3.037,0,0,1,61.632,364.374Z" transform="translate(-48.921 -361.281)" fill="#1e97cb"/>
      <path id="Path_286" data-name="Path 286" d="M61.58,373.981a2.8,2.8,0,0,1-2.813,2.824,2.82,2.82,0,1,1,0-5.64A2.784,2.784,0,0,1,61.58,373.981Z" transform="translate(-48.972 -362.492)" fill="#1e97cb"/>
      <path id="Path_287" data-name="Path 287" d="M53.172,373.461a2.827,2.827,0,1,1,2.733-3.041,1.193,1.193,0,0,1-.247.595,5.825,5.825,0,0,0-.86,1.385,1.338,1.338,0,0,1-1.292,1.038A2.318,2.318,0,0,1,53.172,373.461Z" transform="translate(-48.278 -362.081)" fill="#1e97cb"/>
      <path id="Path_288" data-name="Path 288" d="M63.961,373.462c-.065-.01-.275-.046-.485-.076a.666.666,0,0,1-.645-.629,3.1,3.1,0,0,0-1.245-1.935.581.581,0,0,1-.252-.674,2.827,2.827,0,0,1,5.6.666A2.853,2.853,0,0,1,63.961,373.462Z" transform="translate(-49.632 -362.082)" fill="#1e97cb"/>
      <path id="Path_289" data-name="Path 289" d="M57.353,370.5l-.629-1.9h4.009l-.622,1.747A3.423,3.423,0,0,0,57.353,370.5Z" transform="translate(-49.069 -362.179)" fill="#1e97cb"/>
    </g>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($partners[0]) ? $partners[0]['total_partners'] : 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate">
                                            
                                            <a href="<?php echo base_url('auth/Active_Partners/').$sx.'/'.$ex; ?>">Total Partners</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                       <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="21.145" height="22" viewBox="0 0 21.145 22">
  <g id="total_drivers" data-name="total drivers" transform="translate(-1800 -5237.372)">
    <path id="Path_360" data-name="Path 360" d="M181.443,362.372a.734.734,0,0,1,.359.721c-.013,1.619-.006,3.24-.006,4.859v.372c.288,0,.563,0,.837,0,.411,0,.5.087.507.485,0,.828,0,1.658,0,2.487a.7.7,0,0,1-.327.632c-.242.169-.582.324-.664.56-.076.221.133.539.211.816a11.351,11.351,0,0,1,.49,3.5c-.033.953,0,1.91-.026,2.863a2.933,2.933,0,0,1-.506,1.747.54.54,0,0,0-.06.3c0,.665,0,1.33,0,2,0,.454-.2.656-.649.657q-1.475,0-2.951,0a.569.569,0,0,1-.635-.644c0-.219,0-.438,0-.672H167.132c0,.217,0,.433,0,.649-.01.466-.211.666-.677.667q-1.432,0-2.864,0c-.509,0-.689-.185-.69-.7,0-.646,0-1.292,0-1.938a.6.6,0,0,0-.078-.324,2.627,2.627,0,0,1-.47-1.494c-.027-1.436-.091-2.878.012-4.3a18.513,18.513,0,0,1,.622-2.895.332.332,0,0,0-.137-.427c-.942-.678-.841-.468-.844-1.642,0-.6,0-1.2,0-1.793,0-.423.106-.524.533-.527.26,0,.519,0,.812,0,.007-.129.018-.24.018-.352,0-1.64.008-3.278,0-4.918a.673.673,0,0,1,.372-.681Zm-16.33,10.536h14.923a.786.786,0,0,0,.007-.112c-.173-1.433-.326-2.869-.53-4.3a15.924,15.924,0,0,0-.473-2.224,2.129,2.129,0,0,0-2.02-1.585c-.48-.042-.958-.094-1.439-.123a44.726,44.726,0,0,0-7.508.129,2.1,2.1,0,0,0-1.908,1.451,9.159,9.159,0,0,0-.4,1.531c-.18,1.15-.316,2.307-.462,3.462C165.235,371.72,165.179,372.3,165.113,372.908Zm15.183,5.568a1.2,1.2,0,1,0-2.4,0,1.186,1.186,0,0,0,1.3,1.2A1.21,1.21,0,0,0,180.3,378.476Zm-14.241,1.191a1.222,1.222,0,0,0,1.213-1.17,1.24,1.24,0,0,0-1.2-1.235,1.252,1.252,0,0,0-1.219,1.127A1.211,1.211,0,0,0,166.055,379.666Zm6.485-.05V379.6h3.324c.2,0,.347-.085.346-.3s-.149-.268-.336-.269c-.655,0-1.309-.011-1.964-.013-1.521,0-3.042,0-4.563-.007-.223,0-.4.055-.39.307s.182.3.4.3C170.419,379.613,171.48,379.616,172.54,379.616Zm.053-2.312q-1.632,0-3.264,0c-.176,0-.332.024-.383.224-.058.226.1.366.414.366l6.44,0c.211,0,.414-.036.42-.285.007-.264-.194-.309-.422-.309C174.73,377.307,173.661,377.3,172.593,377.3Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_361" data-name="Path 361" d="M176.069,366.819a1.83,1.83,0,0,1,1.835,1.862,1.844,1.844,0,1,1-3.687-.051A1.824,1.824,0,0,1,176.069,366.819Z" transform="translate(1637.525 4874.827)" fill="#1e97cb"/>
    <path id="Path_362" data-name="Path 362" d="M178.64,372.724h-5.17a2.722,2.722,0,0,1,2.182-1.558A2.99,2.99,0,0,1,178.64,372.724Z" transform="translate(1637.554 4874.659)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($drivers[0]) ? $drivers[0]['total_drivers'] : 0 ?></span></h3>
                                        
                                        
                                        <p class="text-muted mb-1 text-truncate">
                                            
                                            <a href="<?php echo base_url('auth/Active_Drivers_new/').$sx.'/'.$ex; ?>">Total Drivers</a>
                                            
                                            </p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                          <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="21.695" height="15.073" viewBox="0 0 21.695 15.073">
  <g id="total_vehicles" data-name="total vehicles" transform="translate(-1913.75 -5241.004)">
    <path id="Path_363" data-name="Path 363" d="M280.981,380.827h-.663a.343.343,0,0,0-.059-.024,1.963,1.963,0,0,1-1.438-1.171.16.16,0,0,0-.174-.115q-.96.006-1.92,0a.685.685,0,0,1-.726-.732V367.012a.7.7,0,0,1,.762-.756q6.529,0,13.058,0a.715.715,0,0,1,.767.762c-.014,1.024,0,2.048,0,3.073,0,.046,0,.093.008.15h.142c.6,0,1.193-.006,1.788,0a4.676,4.676,0,0,1,4.542,3.5c.061.21.089.43.132.645v4.636a.717.717,0,0,1-.784.493c-.175-.009-.353,0-.529,0a.138.138,0,0,0-.153.1,1.966,1.966,0,0,1-1.139,1.1c-.118.045-.242.075-.362.112h-.663a.57.57,0,0,0-.071-.026,1.953,1.953,0,0,1-1.417-1.158.19.19,0,0,0-.207-.128q-4.61.006-9.218,0a.17.17,0,0,0-.182.124,1.965,1.965,0,0,1-1.277,1.124C281.121,380.787,281.051,380.806,280.981,380.827Zm-3.648-2.64h.163c.38,0,.76,0,1.14,0a.178.178,0,0,0,.193-.128,1.986,1.986,0,0,1,3.64,0,.18.18,0,0,0,.2.124q3.22,0,6.438,0h.151v-10.6h-.163q-5.8,0-11.591,0c-.133,0-.169.031-.169.167q.006,5.133,0,10.266Zm13.257-3.982h5.219a3.294,3.294,0,0,0-2.971-2.622c-.727-.026-1.457-.012-2.184-.015a.282.282,0,0,0-.064.014Zm0,3.983c.448,0,.881,0,1.312,0a.154.154,0,0,0,.165-.11,1.992,1.992,0,0,1,3.662,0c.02.043.07.072.107.108a.482.482,0,0,0,.043-.134c0-.795,0-1.589,0-2.383,0-.039,0-.077-.007-.116H290.59Zm-9.284.661a.66.66,0,1,0-.657.664A.652.652,0,0,0,281.306,378.849Zm13.249,0a.66.66,0,1,0-.658.666A.657.657,0,0,0,294.554,378.848Z" transform="translate(1638 4875)" fill="#1e97cb" stroke="#1e97cb" stroke-width="0.5"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">0</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total Vehicles</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                    
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="14.265" viewBox="0 0 22 14.265">
  <g id="fuel_used" data-name="fuel used" transform="translate(-2028 -5241.685)">
    <g id="Group_152" data-name="Group 152" transform="translate(2028 5241.685)">
      <path id="Path_290" data-name="Path 290" d="M398.98,375.606a1.361,1.361,0,0,1-.175,1.63c-.849,1.055-1.678,2.127-2.514,3.193a1.168,1.168,0,0,1-1.677.287q-1.955-1.256-3.906-2.516a1.441,1.441,0,0,1-.5-1.988c.6-1.124,1.208-2.246,1.8-3.376a1.09,1.09,0,0,0,.135-.551,1.987,1.987,0,0,1,.764-1.8c.045-.037.08-.087.125-.123a1.511,1.511,0,0,0,.684-1.487.8.8,0,0,1,.493-.8q1.315-.664,2.646-1.3a.819.819,0,0,1,.969.179c.318.3.616.626.939.921a.651.651,0,0,0,.379.154c.447.019.9.015,1.344,0a1.363,1.363,0,0,0,.42-.092c.785-.285,1.562-.594,2.353-.858a2.845,2.845,0,0,1,.866-.1c2.008-.008,4.017-.005,6.025,0,.076,0,.152.009.259.016v1.326c-.492.036-1,.076-1.513.112-1.448.1-2.895.214-4.344.289a5.943,5.943,0,0,0-1.967.6,2.53,2.53,0,0,0-1.525,1.52,2.3,2.3,0,0,0-.22.946c.022.389,0,.78.007,1.17a1.681,1.681,0,0,1-.538,1.307c-.432.423-.855.854-1.281,1.282A.394.394,0,0,0,398.98,375.606Zm-2.493-.838c-.279-.112-.473-.195-.672-.269a1.652,1.652,0,0,0-1.909.55q-.584.768-1.155,1.545a1.07,1.07,0,0,0,.292,1.64q.977.669,1.955,1.334c.352.24.468.224.724-.114.636-.839,1.26-1.687,1.91-2.515.541-.689.436-.712-.084-1.321a.241.241,0,0,0-.06-.063c-.041-.021-.1-.054-.13-.042-.351.123-.762.162-.908.594q-.442,1.313-.875,2.628c-.063.19-.139.372-.369.331-.246-.044-.272-.239-.224-.456.186-.845.363-1.692.553-2.536A1.713,1.713,0,0,1,396.487,374.768Z" transform="translate(-390 -366.685)" fill="#1e97cb"/>
      <path id="Path_291" data-name="Path 291" d="M410.352,369.2a9.011,9.011,0,0,1,1.619,3.1,1.644,1.644,0,0,1-3.224.633,2.038,2.038,0,0,1,.04-.886A9.519,9.519,0,0,1,410.352,369.2Zm.17,4.485a1.043,1.043,0,0,0,1.044-1.2,7.127,7.127,0,0,0-.924-2.22c.087.428.218.845.292,1.271C411.065,372.293,411.209,373.067,410.522,373.683Z" transform="translate(-390.001 -366.685)" fill="#1e97cb"/>
    </g>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo empty($fuel[0]->total_fuel) ? 0 : $fuel[0]->total_fuel ; ?></span> lit.</h3>
                                        <p class="text-muted mb-1 text-truncate">
                                            <a href="<?php echo base_url('driver/fuel_list/').$sx.'/'.$ex; ?>">Fuel Used</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    </div>
                    
                    <!-- TAHA R5-->
                    
                     <?php //if (strtolower($this->session->userdata('role')) == 'admin' ){ ?>
                     <?php if (strtolower($this->session->userdata('role')) == 'admin' OR strtolower($this->session->userdata('role')) == 'accounts manager') { ?>
                                
                     
                    <div class="row">
                             <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="21.826" height="21.807" viewBox="0 0 21.826 21.807">
  <g id="total_expenses" data-name="total expenses" transform="translate(-1685.996 -5341.822)">
    <path id="Path_292" data-name="Path 292" d="M57.181,479.693a1.42,1.42,0,0,0-1.292-.278c-.012-.51-.034-1-.031-1.488s.034-1,.041-1.5a.452.452,0,0,0-.508-.5q-.687-.006-1.374,0a.476.476,0,0,0-.52.506.694.694,0,0,1-.1.3,1.608,1.608,0,0,0-.264.876q0,2.185,0,4.368v.233c-.349-.033-.688-.087-1.028-.09a1.864,1.864,0,0,0-1.122.419.608.608,0,0,1-.316.11c-.414.012-.828.006-1.243,0A1.357,1.357,0,0,1,48,481.22q0-3.68,0-7.361v-5.521a1.385,1.385,0,0,1,1.5-1.508c3.49,0,6.979.009,10.469-.008a1.4,1.4,0,0,1,1.458,1.47c-.025,4.286-.01,8.573-.013,12.859a2.667,2.667,0,0,1-.065.534,1.449,1.449,0,0,0-1.763-.986c0-.464,0-.931,0-1.4,0-.344-.156-.5-.5-.507q-.7-.006-1.4,0c-.347,0-.5.154-.506.5C57.179,479.407,57.181,479.524,57.181,479.693Zm-7.347-7.919h9.821v-3.192H49.834Zm8.58,6.277c.251,0,.5,0,.752,0a.433.433,0,0,0,.459-.457c0-.4,0-.8,0-1.194a.441.441,0,0,0-.467-.476c-.487-.009-.974-.008-1.461,0a.429.429,0,0,0-.468.451c-.011.412-.012.826,0,1.239a.423.423,0,0,0,.475.438C57.941,478.053,58.177,478.051,58.413,478.051Zm-7.388,0c.244,0,.488,0,.732,0a.411.411,0,0,0,.459-.449c.006-.407,0-.813,0-1.22a.415.415,0,0,0-.453-.458c-.488-.008-.976-.007-1.464,0a.444.444,0,0,0-.475.452q-.018.61,0,1.22a.446.446,0,0,0,.491.455C50.553,478.054,50.79,478.051,51.026,478.051Zm7.406-4.981c-.236,0-.472,0-.708,0a.443.443,0,0,0-.494.47q-.015.586,0,1.172a.442.442,0,0,0,.473.473q.73.013,1.461,0a.45.45,0,0,0,.462-.483q.007-.576,0-1.15a.455.455,0,0,0-.486-.482C58.9,473.065,58.667,473.069,58.431,473.069Zm-7.382,5.723c-.252,0-.5,0-.754,0a.434.434,0,0,0-.471.449c-.012.4-.011.8,0,1.2a.454.454,0,0,0,.442.467c.51.014,1.02.013,1.53,0a.415.415,0,0,0,.42-.449q.009-.61,0-1.219c0-.3-.153-.44-.458-.446C51.522,478.788,51.285,478.792,51.049,478.792Zm0-5.723h0c-.244,0-.488,0-.732,0a.466.466,0,0,0-.493.484c-.009.384-.009.769,0,1.152a.457.457,0,0,0,.454.478q.754.016,1.508,0a.413.413,0,0,0,.429-.44c.007-.414.008-.828,0-1.242a.414.414,0,0,0-.436-.43C51.535,473.064,51.291,473.069,51.047,473.069Zm3.7,2.12h.331c.118,0,.236,0,.354,0a.468.468,0,0,0,.507-.511q0-.553,0-1.107a.457.457,0,0,0-.51-.5q-.686,0-1.372,0a.471.471,0,0,0-.515.5q-.007.552,0,1.106a.476.476,0,0,0,.5.507C54.279,475.195,54.516,475.189,54.752,475.19Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_293" data-name="Path 293" d="M59.108,481.742a3.157,3.157,0,0,1,.406-.444.834.834,0,0,1,.919-.087.892.892,0,0,1,.536.806c.013.643,0,1.286,0,1.929s.03,1.286,0,1.927a3.091,3.091,0,0,1-.812,2.056.359.359,0,0,0-.072.217c-.01.183,0,.367,0,.566H54.644c0-.116,0-.232,0-.348a2.01,2.01,0,0,0-.684-1.613c-.921-.865-1.821-1.754-2.728-2.635a.675.675,0,0,1,.068-1.154,1.688,1.688,0,0,1,2.21.142c0-.091.01-.168.011-.244q0-2.594,0-5.189a.929.929,0,0,1,1.834-.239,1.424,1.424,0,0,1,.03.351c0,.9,0,1.8,0,2.759.265-.536.648-.816,1.2-.639.577.185.708.66.662,1.226a.961.961,0,0,1,1.222-.586A1,1,0,0,1,59.108,481.742Z" transform="translate(1637.975 4874.917)" fill="#1e97cb"/>
    <path id="Path_294" data-name="Path 294" d="M66.012,482.584a11.412,11.412,0,0,1-3.337-.429c-.014,0-.03,0-.043-.011-.189-.081-.435-.117-.55-.259-.1-.118-.039-.361-.047-.549a2.19,2.19,0,0,0-.014-.353c-.05-.239.073-.343.269-.431a6.927,6.927,0,0,1,2.252-.521,11.142,11.142,0,0,1,3.307.134,9.981,9.981,0,0,1,1.53.487.718.718,0,0,1,.548.657c-.01.338-.3.487-.565.624a5.339,5.339,0,0,1-1.8.512C66.957,482.524,66.346,482.555,66.012,482.584Z" transform="translate(1637.883 4874.89)" fill="#1e97cb"/>
    <path id="Path_295" data-name="Path 295" d="M61.97,472.92c0-.339,0-.679,0-1.019,0-.118.033-.175.157-.184a11.963,11.963,0,0,1,4.651.347,2.91,2.91,0,0,1,.835.437.486.486,0,0,1,0,.841,2.815,2.815,0,0,1-1.241.555,13.489,13.489,0,0,1-4.228.237c-.142-.011-.181-.079-.178-.216C61.976,473.586,61.97,473.253,61.97,472.92Z" transform="translate(1637.884 4874.96)" fill="#1e97cb"/>
    <path id="Path_296" data-name="Path 296" d="M69.916,482.124a.853.853,0,0,1-.517,1.064,5.4,5.4,0,0,1-1.945.562,11.757,11.757,0,0,1-4.1-.129,6.183,6.183,0,0,1-1.191-.4c-.54-.243-.568-.369-.32-.933a9.079,9.079,0,0,0,4.055.7A7.92,7.92,0,0,0,69.916,482.124Z" transform="translate(1637.886 4874.873)" fill="#1e97cb"/>
    <path id="Path_297" data-name="Path 297" d="M62.03,478.63v-2.549a7.5,7.5,0,0,1,2.886.627,1.705,1.705,0,0,1,.26.167c.41.31.416.685-.012.968a3.548,3.548,0,0,1-.815.386A8.853,8.853,0,0,1,62.03,478.63Z" transform="translate(1637.883 4874.923)" fill="#1e97cb"/>
    <path id="Path_298" data-name="Path 298" d="M61.984,475.37v-.793a10.677,10.677,0,0,0,5.842-.768.808.808,0,0,1-.464,1.012,5.226,5.226,0,0,1-1.963.571,14.549,14.549,0,0,1-3.362,0A.252.252,0,0,1,61.984,475.37Z" transform="translate(1637.883 4874.942)" fill="#1e97cb"/>
    <path id="Path_299" data-name="Path 299" d="M65.466,478.271a.785.785,0,0,1-.448.974,5.224,5.224,0,0,1-1.912.578c-.349.051-.7.075-1.087.115,0-.272-.01-.513.01-.752,0-.041.127-.09.2-.1.7-.123,1.412-.21,2.106-.369A7.674,7.674,0,0,0,65.466,478.271Z" transform="translate(1637.883 4874.904)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span>&#x62f;&#x2e;&#x625;</span> <span data-plugin="counterup"><?php echo empty($exp[0]->total_exp) ? 0 : $exp[0]->total_exp ; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate">
                                            <a href="<?php echo base_url('driver/expense_list/').$sx.'/'.$ex; ?>">Total Expenses</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                    
                    <!-- _15feb start-->
                      <!--delivery revenue-->
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20.165" height="22" viewBox="0 0 20.165 22">
  <g id="total_revenue" data-name="total revenue" transform="translate(-1800 -5340.816)">
    <path id="Path_349" data-name="Path 349" d="M173.14,470.42l4.464-4.6,4.681,4.546-.034.075h-1.163c-.332,0-.411.061-.5.385a16.454,16.454,0,0,1-2.441,5.219,13.217,13.217,0,0,1-6.321,4.966,12.916,12.916,0,0,1-3.156.742,16.98,16.98,0,0,1-5.235-.211c.262-.026.525-.049.788-.075a13.766,13.766,0,0,0,4.489-1.2,11.188,11.188,0,0,0,5.349-5.291,16.256,16.256,0,0,0,1.363-4.046.4.4,0,0,0-.416-.53c-.576-.006-1.15,0-1.725,0-.069,0-.138-.006-.207-.01Z" transform="translate(1637.88 4875)" fill="#1e97cb"/>
    <path id="Path_350" data-name="Path 350" d="M166.3,475.88a4.054,4.054,0,1,1,4.053-4A4.027,4.027,0,0,1,166.3,475.88Zm-.187-2.129c-.4-.149-.555-.344-.728-.874a.441.441,0,0,0-.4-.341.4.4,0,0,0-.438.244.771.771,0,0,0-.04.453,1.676,1.676,0,0,0,1.456,1.255c.167.027.209.091.205.249-.01.411,0,.411.4.38a.4.4,0,0,0,.078-.028,1.914,1.914,0,0,0,0-.229c-.021-.17.025-.254.218-.283a1.98,1.98,0,0,0,.566-.2,1.463,1.463,0,0,0,.847-1.37,1.363,1.363,0,0,0-.81-1.417c-.261-.111-.535-.192-.8-.288v-1.5a2.338,2.338,0,0,1,.357.306,2.568,2.568,0,0,1,.2.4.431.431,0,0,0,.545.259.463.463,0,0,0,.312-.58,1.367,1.367,0,0,0-.83-.954c-.2-.081-.423-.124-.654-.19v-.543h-.478c0,.121-.006.221,0,.32.014.17-.015.256-.226.291a1.422,1.422,0,0,0-1.247.922A1.464,1.464,0,0,0,165.7,472c.135.04.273.071.41.105Z" transform="translate(1637.976 4874.837)" fill="#1e97cb"/>
    <path id="Path_351" data-name="Path 351" d="M183.573,475.607v13.021H181.4v-1.059q0-4.116.005-8.233a.57.57,0,0,1,.089-.316,21,21,0,0,0,2.023-3.325C183.525,475.678,183.538,475.661,183.573,475.607Z" transform="translate(1636.382 4874.184)" fill="#1e97cb"/>
    <path id="Path_352" data-name="Path 352" d="M180.318,480.457v8.573h-2.172V488.8q0-3.061,0-6.12a.386.386,0,0,1,.153-.323c.621-.564,1.229-1.142,1.841-1.716C180.193,480.594,180.243,480.536,180.318,480.457Z" transform="translate(1636.654 4873.779)" fill="#1e97cb"/>
    <path id="Path_353" data-name="Path 353" d="M177.105,483.357v5.921h-2.172v-1.187c0-1.115,0-2.228.006-3.343a.3.3,0,0,1,.1-.228C175.72,484.126,176.411,483.746,177.105,483.357Z" transform="translate(1636.921 4873.537)" fill="#1e97cb"/>
    <path id="Path_354" data-name="Path 354" d="M173.884,489.417h-2.171v-.264c0-1.085,0-2.171-.005-3.256a.243.243,0,0,1,.21-.283c.654-.186,1.3-.388,1.967-.587Z" transform="translate(1637.19 4873.398)" fill="#1e97cb"/>
    <path id="Path_355" data-name="Path 355" d="M162,485.771l2.148.348v3.353H162Z" transform="translate(1638 4873.336)" fill="#1e97cb"/>
    <path id="Path_356" data-name="Path 356" d="M170.621,489.5h-2.15v-3.262l2.15-.267Z" transform="translate(1637.46 4873.319)" fill="#1e97cb"/>
    <path id="Path_357" data-name="Path 357" d="M165.261,489.517v-3.24h2.154v3.24Z" transform="translate(1637.728 4873.294)" fill="#1e97cb"/>
    <path id="Path_358" data-name="Path 358" d="M166.961,474.245v-1.513a.748.748,0,0,1,.746.665A.8.8,0,0,1,166.961,474.245Z" transform="translate(1637.586 4874.423)" fill="#1e97cb"/>
    <path id="Path_359" data-name="Path 359" d="M166.344,471.3c-.409-.09-.582-.266-.595-.6s.185-.585.595-.7Z" transform="translate(1637.687 4874.651)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                         <?php 
                                              $chunk1=0;
                                              $chunk2=0;
                                              $chunk3=0;
                                              $act_chunk=0;
                                              
                                              $chunk4=0;
                                              $chunk5=0;

                                              $chunk1=empty($get_revenue_data_2021_04_01_from_2021_07_31[0]->total_reveneu) ?0 : $get_revenue_data_2021_04_01_from_2021_07_31[0]->total_reveneu;
                                              $chunk2=empty($get_revenue_data_2020_09_04_from_2021_03_31[0]->total_reveneu) ?0 : $get_revenue_data_2020_09_04_from_2021_03_31[0]->total_reveneu;
                                              $chunk3=empty($get_revenue_data_2019_06_14_from_2020_09_03[0]->total_reveneu) ?0 : $get_revenue_data_2019_06_14_from_2020_09_03[0]->total_reveneu;
                                              $act_chunk=empty($revenue[0]->total_reveneu) ? 0 : round($revenue[0]->total_reveneu,4);
                                              
                                              $chunk4=empty($get_revenue_data_2021_08_01_from_2021_10_31[0]->total_reveneu) ?0 : $get_revenue_data_2021_08_01_from_2021_10_31[0]->total_reveneu;
                                              $chunk5=empty($get_revenue_data_2021_11_01_from_2022_01_31[0]->total_reveneu) ?0 : $get_revenue_data_2021_11_01_from_2022_01_31[0]->total_reveneu;
                                               
                                              $total_all_rev=$act_chunk+$chunk1+$chunk2+$chunk3+$chunk4+$chunk5;
                                              $total_all_rev=round($total_all_rev,4);
                                              ?>
                                              
                                        <h3 class="text-dark mt-1"><span>&#x62f;&#x2e;&#x625;</span> <span data-plugin="counterup"><?php echo $total_all_rev ; ?></span></h3>
                                       
                                        <p class="text-muted mb-1 text-truncate">
                                            
                                            <!--<a href="<?php echo base_url('auth/revenue/').$sx.'/'.$ex; ?>">Deliveries Revenue</a> </p>-->
                                   
                                     Deliveries Revenue </p>
                                   
                                   
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    <!--end delivery revenue-->
                    
                    <!--bag revenue-->
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20.165" height="22" viewBox="0 0 20.165 22">
  <g id="total_revenue" data-name="total revenue" transform="translate(-1800 -5340.816)">
    <path id="Path_349" data-name="Path 349" d="M173.14,470.42l4.464-4.6,4.681,4.546-.034.075h-1.163c-.332,0-.411.061-.5.385a16.454,16.454,0,0,1-2.441,5.219,13.217,13.217,0,0,1-6.321,4.966,12.916,12.916,0,0,1-3.156.742,16.98,16.98,0,0,1-5.235-.211c.262-.026.525-.049.788-.075a13.766,13.766,0,0,0,4.489-1.2,11.188,11.188,0,0,0,5.349-5.291,16.256,16.256,0,0,0,1.363-4.046.4.4,0,0,0-.416-.53c-.576-.006-1.15,0-1.725,0-.069,0-.138-.006-.207-.01Z" transform="translate(1637.88 4875)" fill="#1e97cb"/>
    <path id="Path_350" data-name="Path 350" d="M166.3,475.88a4.054,4.054,0,1,1,4.053-4A4.027,4.027,0,0,1,166.3,475.88Zm-.187-2.129c-.4-.149-.555-.344-.728-.874a.441.441,0,0,0-.4-.341.4.4,0,0,0-.438.244.771.771,0,0,0-.04.453,1.676,1.676,0,0,0,1.456,1.255c.167.027.209.091.205.249-.01.411,0,.411.4.38a.4.4,0,0,0,.078-.028,1.914,1.914,0,0,0,0-.229c-.021-.17.025-.254.218-.283a1.98,1.98,0,0,0,.566-.2,1.463,1.463,0,0,0,.847-1.37,1.363,1.363,0,0,0-.81-1.417c-.261-.111-.535-.192-.8-.288v-1.5a2.338,2.338,0,0,1,.357.306,2.568,2.568,0,0,1,.2.4.431.431,0,0,0,.545.259.463.463,0,0,0,.312-.58,1.367,1.367,0,0,0-.83-.954c-.2-.081-.423-.124-.654-.19v-.543h-.478c0,.121-.006.221,0,.32.014.17-.015.256-.226.291a1.422,1.422,0,0,0-1.247.922A1.464,1.464,0,0,0,165.7,472c.135.04.273.071.41.105Z" transform="translate(1637.976 4874.837)" fill="#1e97cb"/>
    <path id="Path_351" data-name="Path 351" d="M183.573,475.607v13.021H181.4v-1.059q0-4.116.005-8.233a.57.57,0,0,1,.089-.316,21,21,0,0,0,2.023-3.325C183.525,475.678,183.538,475.661,183.573,475.607Z" transform="translate(1636.382 4874.184)" fill="#1e97cb"/>
    <path id="Path_352" data-name="Path 352" d="M180.318,480.457v8.573h-2.172V488.8q0-3.061,0-6.12a.386.386,0,0,1,.153-.323c.621-.564,1.229-1.142,1.841-1.716C180.193,480.594,180.243,480.536,180.318,480.457Z" transform="translate(1636.654 4873.779)" fill="#1e97cb"/>
    <path id="Path_353" data-name="Path 353" d="M177.105,483.357v5.921h-2.172v-1.187c0-1.115,0-2.228.006-3.343a.3.3,0,0,1,.1-.228C175.72,484.126,176.411,483.746,177.105,483.357Z" transform="translate(1636.921 4873.537)" fill="#1e97cb"/>
    <path id="Path_354" data-name="Path 354" d="M173.884,489.417h-2.171v-.264c0-1.085,0-2.171-.005-3.256a.243.243,0,0,1,.21-.283c.654-.186,1.3-.388,1.967-.587Z" transform="translate(1637.19 4873.398)" fill="#1e97cb"/>
    <path id="Path_355" data-name="Path 355" d="M162,485.771l2.148.348v3.353H162Z" transform="translate(1638 4873.336)" fill="#1e97cb"/>
    <path id="Path_356" data-name="Path 356" d="M170.621,489.5h-2.15v-3.262l2.15-.267Z" transform="translate(1637.46 4873.319)" fill="#1e97cb"/>
    <path id="Path_357" data-name="Path 357" d="M165.261,489.517v-3.24h2.154v3.24Z" transform="translate(1637.728 4873.294)" fill="#1e97cb"/>
    <path id="Path_358" data-name="Path 358" d="M166.961,474.245v-1.513a.748.748,0,0,1,.746.665A.8.8,0,0,1,166.961,474.245Z" transform="translate(1637.586 4874.423)" fill="#1e97cb"/>
    <path id="Path_359" data-name="Path 359" d="M166.344,471.3c-.409-.09-.582-.266-.595-.6s.185-.585.595-.7Z" transform="translate(1637.687 4874.651)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span>&#x62f;&#x2e;&#x625;</span> <span data-plugin="counterup"><?php echo empty($revenue_bag[0]->total_reveneu_bag) ? 0 : round($revenue_bag[0]->total_reveneu_bag,4); ?></span></h3>
                                       
                                        <p class="text-muted mb-1 text-truncate">
                                            
                                            <!--<a href="<?php echo base_url('auth/revenue_bag/').$sx.'/'.$ex; ?>">Bags Revenue</a> </p>-->
                                    
                                     Bags Revenue </p>
                                   
                                    
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div>
                    <!--end bag revenue-->
                    
                    <!--total revenue-->
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20.165" height="22" viewBox="0 0 20.165 22">
  <g id="total_revenue" data-name="total revenue" transform="translate(-1800 -5340.816)">
    <path id="Path_349" data-name="Path 349" d="M173.14,470.42l4.464-4.6,4.681,4.546-.034.075h-1.163c-.332,0-.411.061-.5.385a16.454,16.454,0,0,1-2.441,5.219,13.217,13.217,0,0,1-6.321,4.966,12.916,12.916,0,0,1-3.156.742,16.98,16.98,0,0,1-5.235-.211c.262-.026.525-.049.788-.075a13.766,13.766,0,0,0,4.489-1.2,11.188,11.188,0,0,0,5.349-5.291,16.256,16.256,0,0,0,1.363-4.046.4.4,0,0,0-.416-.53c-.576-.006-1.15,0-1.725,0-.069,0-.138-.006-.207-.01Z" transform="translate(1637.88 4875)" fill="#1e97cb"/>
    <path id="Path_350" data-name="Path 350" d="M166.3,475.88a4.054,4.054,0,1,1,4.053-4A4.027,4.027,0,0,1,166.3,475.88Zm-.187-2.129c-.4-.149-.555-.344-.728-.874a.441.441,0,0,0-.4-.341.4.4,0,0,0-.438.244.771.771,0,0,0-.04.453,1.676,1.676,0,0,0,1.456,1.255c.167.027.209.091.205.249-.01.411,0,.411.4.38a.4.4,0,0,0,.078-.028,1.914,1.914,0,0,0,0-.229c-.021-.17.025-.254.218-.283a1.98,1.98,0,0,0,.566-.2,1.463,1.463,0,0,0,.847-1.37,1.363,1.363,0,0,0-.81-1.417c-.261-.111-.535-.192-.8-.288v-1.5a2.338,2.338,0,0,1,.357.306,2.568,2.568,0,0,1,.2.4.431.431,0,0,0,.545.259.463.463,0,0,0,.312-.58,1.367,1.367,0,0,0-.83-.954c-.2-.081-.423-.124-.654-.19v-.543h-.478c0,.121-.006.221,0,.32.014.17-.015.256-.226.291a1.422,1.422,0,0,0-1.247.922A1.464,1.464,0,0,0,165.7,472c.135.04.273.071.41.105Z" transform="translate(1637.976 4874.837)" fill="#1e97cb"/>
    <path id="Path_351" data-name="Path 351" d="M183.573,475.607v13.021H181.4v-1.059q0-4.116.005-8.233a.57.57,0,0,1,.089-.316,21,21,0,0,0,2.023-3.325C183.525,475.678,183.538,475.661,183.573,475.607Z" transform="translate(1636.382 4874.184)" fill="#1e97cb"/>
    <path id="Path_352" data-name="Path 352" d="M180.318,480.457v8.573h-2.172V488.8q0-3.061,0-6.12a.386.386,0,0,1,.153-.323c.621-.564,1.229-1.142,1.841-1.716C180.193,480.594,180.243,480.536,180.318,480.457Z" transform="translate(1636.654 4873.779)" fill="#1e97cb"/>
    <path id="Path_353" data-name="Path 353" d="M177.105,483.357v5.921h-2.172v-1.187c0-1.115,0-2.228.006-3.343a.3.3,0,0,1,.1-.228C175.72,484.126,176.411,483.746,177.105,483.357Z" transform="translate(1636.921 4873.537)" fill="#1e97cb"/>
    <path id="Path_354" data-name="Path 354" d="M173.884,489.417h-2.171v-.264c0-1.085,0-2.171-.005-3.256a.243.243,0,0,1,.21-.283c.654-.186,1.3-.388,1.967-.587Z" transform="translate(1637.19 4873.398)" fill="#1e97cb"/>
    <path id="Path_355" data-name="Path 355" d="M162,485.771l2.148.348v3.353H162Z" transform="translate(1638 4873.336)" fill="#1e97cb"/>
    <path id="Path_356" data-name="Path 356" d="M170.621,489.5h-2.15v-3.262l2.15-.267Z" transform="translate(1637.46 4873.319)" fill="#1e97cb"/>
    <path id="Path_357" data-name="Path 357" d="M165.261,489.517v-3.24h2.154v3.24Z" transform="translate(1637.728 4873.294)" fill="#1e97cb"/>
    <path id="Path_358" data-name="Path 358" d="M166.961,474.245v-1.513a.748.748,0,0,1,.746.665A.8.8,0,0,1,166.961,474.245Z" transform="translate(1637.586 4874.423)" fill="#1e97cb"/>
    <path id="Path_359" data-name="Path 359" d="M166.344,471.3c-.409-.09-.582-.266-.595-.6s.185-.585.595-.7Z" transform="translate(1637.687 4874.651)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span>&#x62f;&#x2e;&#x625;</span> <span data-plugin="counterup"><?php $deliv_revi=$total_all_rev; $bags_revi= empty($revenue_bag[0]->total_reveneu_bag) ? 0 : round($revenue_bag[0]->total_reveneu_bag,4); echo round($deliv_revi+$bags_revi,4)?></span></h3>
                                       
                                        <p class="text-muted mb-1 text-truncate">
                                            
                                            Total Revenue </p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div>
                    <!--end total revenue-->
                    
                  <!-- _15feb end-->

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="18.748" viewBox="0 0 22 18.748">
  <g id="total_feedback" data-name="total feedback" transform="translate(-1914 -5343.444)">
    <path id="Path_300" data-name="Path 300" d="M292.009,475.164c1.215-.051,2.352-.072,3.484-.156a2.292,2.292,0,0,1,1.918.509,1.886,1.886,0,0,1-.218,2.916c-.43.312-.43.312-.235.825a1.651,1.651,0,0,1-.319,1.555.879.879,0,0,0-.1.847,1.933,1.933,0,0,1-.507,2.021.736.736,0,0,0-.231.71,2.4,2.4,0,0,1-2.389,2.8,16.987,16.987,0,0,1-2.989-.243c-.856-.127-1.72-.2-2.577-.31-.6-.079-1.2-.206-1.8-.286-.745-.1-1.491-.191-2.24-.242-.331-.022-.461-.132-.46-.458.005-2.573,0-5.146.005-7.719a.926.926,0,0,1,.6-.862,3.515,3.515,0,0,1,.7-.25,2.142,2.142,0,0,0,1.114-.664c.962-1.059,1.945-2.1,2.877-3.186a5.331,5.331,0,0,0,1.058-2.77c.064-.41.092-.827.149-1.238a.534.534,0,0,1,.487-.485,2.377,2.377,0,0,1,2.63,2.026,5.009,5.009,0,0,1-.246,2.263C292.454,473.511,292.266,474.288,292.009,475.164Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_301" data-name="Path 301" d="M282.41,482.2c0,1.219-.008,2.438.005,3.656,0,.311-.119.468-.416.5-1.063.1-2.125.246-3.189.265a5.417,5.417,0,0,1-1.711-.33,1.493,1.493,0,0,1-.916-1.324,13.809,13.809,0,0,1-.033-4.271c.139-1.011.288-2.022.429-3.033a1.651,1.651,0,0,1,2.224-1.426c.735.169,1.468.342,2.2.513a2.023,2.023,0,0,1,1.4,1.763C282.413,479.738,282.41,480.968,282.41,482.2Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!--<div class="text-right">-->
                                    <!--    <h3 class="text-dark mt-1"><span data-plugin="counterup">0</span></h3>-->
                                    <!--    <p class="text-muted mb-1">Total +ve Feedback</p>-->
                                    <!--</div>-->
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($positive_fb[0]) ? $positive_fb[0]->total_positive : 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('positive_feedback') ?>" >Total +ve Feedback</a></p>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                   <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="18.747" viewBox="0 0 22 18.747">
  <g id="total_complaintss" data-name="total complaintss" transform="translate(-2028 -5343.444)">
    <path id="Path_302" data-name="Path 302" d="M395.992,480.47c-1.216.051-2.353.072-3.485.156a2.294,2.294,0,0,1-1.918-.509,1.886,1.886,0,0,1,.218-2.916c.43-.312.43-.312.236-.825a1.651,1.651,0,0,1,.318-1.555.879.879,0,0,0,.1-.847,1.932,1.932,0,0,1,.507-2.021.738.738,0,0,0,.23-.71,2.4,2.4,0,0,1,2.39-2.8,16.889,16.889,0,0,1,2.988.242c.856.127,1.72.2,2.578.31.6.08,1.2.206,1.8.286.744.1,1.491.191,2.239.242.332.022.461.132.461.459-.006,2.572,0,5.145,0,7.718a.928.928,0,0,1-.6.862,3.465,3.465,0,0,1-.7.25,2.135,2.135,0,0,0-1.113.664c-.963,1.059-1.945,2.1-2.878,3.186a5.342,5.342,0,0,0-1.058,2.77c-.064.411-.092.827-.149,1.239a.535.535,0,0,1-.487.485,2.379,2.379,0,0,1-2.63-2.027,5.01,5.01,0,0,1,.246-2.263C395.546,482.123,395.734,481.346,395.992,480.47Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_303" data-name="Path 303" d="M405.59,473.436c0-1.219.008-2.438-.005-3.656,0-.311.119-.468.417-.5,1.062-.1,2.124-.246,3.188-.265a5.424,5.424,0,0,1,1.712.33,1.493,1.493,0,0,1,.915,1.324,13.807,13.807,0,0,1,.034,4.271c-.139,1.011-.288,2.022-.43,3.033A1.651,1.651,0,0,1,409.2,479.4c-.734-.169-1.468-.342-2.2-.513a2.022,2.022,0,0,1-1.4-1.763C405.587,475.9,405.59,474.666,405.59,473.436Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!--<div class="text-right">-->
                                    <!--    <h3 class="text-dark mt-1"><span data-plugin="counterup">0</span></h3>-->
                                    <!--    <p class="text-muted mb-1">Total Complaints</p>-->
                                    <!--</div>-->
                                    
                                     <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($negative_fb[0]) ? $negative_fb[0]->total_negative : 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('negative_feedback_details') ?>">Total Complaints</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                   
                </div>
                <!-- end row-->
                <?php } ?>
                
                <!-- TAHA -->
                 <?php } ?>
              <!--END OF MAIN IF-->

                <?php if (strtolower($this->session->userdata('role')) == 'vendor') { ?>
                <!--start here new dasboard-->
          <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20.216" height="22" viewBox="0 0 20.216 22">
  <g id="Unassugned_deliveres" data-name="Unassugned deliveres" transform="translate(-1686 -4924.846)">
    <path id="Path_304" data-name="Path 304" d="M49.858,72.071C48.4,71.5,48,70.858,48,69.117q0-7.641,0-15.282a2.333,2.333,0,0,1,1.72-2.552,9.658,9.658,0,0,1,2.125-.033c.119,0,.331.286.318.418-.016.169-.2.431-.34.453a5.792,5.792,0,0,1-1.284.034c-1.128-.077-1.689.666-1.681,1.83.037,5.143.016,10.286.016,15.43,0,1.15.478,1.688,1.507,1.69,1.54,0,3.079.016,4.618-.009a1,1,0,0,1,.918.436,5.163,5.163,0,0,0,.514.54Z" transform="translate(1638 4874.775)" fill="#1e97cb"/>
    <path id="Path_305" data-name="Path 305" d="M54.628,53.555c0-.68,0-1.285,0-1.89a1.614,1.614,0,0,1,1.837-1.817c.578,0,1.155,0,1.733,0a1.565,1.565,0,0,1,1.646,1.642c0,.637,0,1.273.005,1.91a1.208,1.208,0,0,0,.042.158c.551,0,1.124-.014,1.7.005a.91.91,0,0,1,.881.738.929.929,0,0,1-.434,1.028,1.4,1.4,0,0,1-.635.15q-4.153.014-8.306,0c-.875,0-1.355-.715-.989-1.42a.9.9,0,0,1,.868-.507Zm2.578-.772a1.027,1.027,0,0,0,.088-2.052,1.027,1.027,0,1,0-.088,2.052Z" transform="translate(1638.124 4875)" fill="#1e97cb"/>
    <path id="Path_306" data-name="Path 306" d="M57.637,66.344a5.161,5.161,0,1,1,5.174,5.184A5.141,5.141,0,0,1,57.637,66.344Zm9.651.016a4.5,4.5,0,1,0-4.513,4.506A4.48,4.48,0,0,0,67.288,66.359Z" transform="translate(1638.256 4875.141)" fill="#1e97cb"/>
    <path id="Path_307" data-name="Path 307" d="M60.031,59a10.945,10.945,0,0,0-1.085.434,6.861,6.861,0,0,0-1.5.918,2.2,2.2,0,0,1-1.789.615c-.855-.052-1.716-.008-2.573-.013a.98.98,0,1,1,0-1.951C55.353,58.994,57.628,59,60.031,59Z" transform="translate(1637.936 4874.342)" fill="#1e97cb"/>
    <path id="Path_308" data-name="Path 308" d="M67.705,58.664a.989.989,0,0,1-.845-1.155c.065-1.284.022-2.574.018-3.862A1.39,1.39,0,0,0,65.3,52.071c-.429,0-.858,0-1.288-.006-.272,0-.471-.133-.469-.418,0-.306.2-.43.5-.425.547.008,1.095-.008,1.642.006A2.1,2.1,0,0,1,67.7,53.174C67.729,54.993,67.705,56.813,67.705,58.664Z" transform="translate(1637.281 4874.773)" fill="#1e97cb"/>
    <path id="Path_309" data-name="Path 309" d="M63.314,65.607c0-.428,0-.857,0-1.284,0-.3.073-.544.427-.544s.429.257.431.548c0,.782.011,1.565,0,2.347a.5.5,0,0,0,.3.52c.456.238.894.511,1.34.769.277.16.513.365.3.7-.2.32-.455.151-.688.007-.6-.372-1.217-.723-1.8-1.126a.868.868,0,0,1-.3-.57C63.284,66.524,63.314,66.064,63.314,65.607Z" transform="translate(1636.925 4874.267)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($undeliveries[0]) ? $undeliveries[0]->un_delivered_dels : 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('Order/uploaded/').$sx.'/'.$ex; ?>">Unas. Deliveries</a></p>
                                       
                                    </div>
                                </div>
                                
                               
                               
                                
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                               <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="18.334" height="21.885" viewBox="0 0 18.334 21.885">
  <g id="assigned_delivers" data-name="assigned delivers" transform="translate(-1800 -4923.686)">
    <path id="Path_310" data-name="Path 310" d="M170.787,48.686h.771a.6.6,0,0,0,.116.042,2.835,2.835,0,0,1,2.063,1.231.289.289,0,0,0,.209.093c.564.007,1.128,0,1.692,0a.756.756,0,0,1,.848.841c0,.262,0,.523,0,.8.152,0,.272,0,.393,0,.571.01,1.144-.015,1.71.041a1.914,1.914,0,0,1,1.745,1.935c-.019,1.384,0,2.769,0,4.153q0,5.408,0,10.814a1.794,1.794,0,0,1-.934,1.623,2.237,2.237,0,0,1-1.183.309q-7.045,0-14.089,0c-.057,0-.114,0-.172,0A2,2,0,0,1,162,68.575q.035-7.441,0-14.882a1.928,1.928,0,0,1,1.535-1.919,4.086,4.086,0,0,1,.742-.076c.512-.011,1.023,0,1.56,0,0-.294,0-.563,0-.833a.758.758,0,0,1,.823-.807c.571,0,1.142,0,1.713-.005a.312.312,0,0,0,.226-.1,2.72,2.72,0,0,1,1.629-1.135C170.414,48.766,170.6,48.729,170.787,48.686Zm-4.948,4.544c-.386,0-.741,0-1.1,0a7.088,7.088,0,0,0-.832.033c-.294.04-.366.153-.366.448V68.549a.413.413,0,0,0,.436.481c.077.008.157.005.235.005h13.9a1.924,1.924,0,0,0,.278-.008c.278-.041.405-.178.405-.428q0-7.461,0-14.923a.369.369,0,0,0-.287-.393,1.121,1.121,0,0,0-.337-.05c-.5-.006-1,0-1.5,0-.061,0-.122.009-.191.015v1.006a.785.785,0,0,1-.889.9h-8.863a.794.794,0,0,1-.894-.9C165.838,53.923,165.839,53.6,165.839,53.23Zm1.54.37h7.56V51.589H174.7c-.464,0-.928,0-1.392,0a.762.762,0,0,1-.8-.583.772.772,0,0,0-.412-.542,1.828,1.828,0,0,0-1.874.02.9.9,0,0,0-.366.445.819.819,0,0,1-.873.659c-.457,0-.913,0-1.37,0-.075,0-.151.007-.242.012,0,.613,0,1.2,0,1.8C167.371,53.459,167.376,53.522,167.379,53.6Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_311" data-name="Path 311" d="M170.841,63.845c.063-.059.119-.111.173-.165q1.931-1.928,3.863-3.854a1.225,1.225,0,0,1,1.825,1.635c-.06.07-.127.135-.193.2q-2.233,2.23-4.465,4.461a3.2,3.2,0,0,0-.278.323,1.273,1.273,0,0,1-1.87-.031,1.851,1.851,0,0,0-.194-.226c-.732-.73-1.471-1.455-2.2-2.19A1.227,1.227,0,0,1,168,61.946a1.162,1.162,0,0,1,1.221.3c.486.473.963.953,1.444,1.431C170.719,63.733,170.777,63.785,170.841,63.845Z" transform="translate(1637.144 4873.209)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                         <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($asdeliveries[0]) ? $asdeliveries[0]->as_delivered_dels : 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#"> Assi. Deliveries</a></p>
                                       
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                 

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16.499" height="22" viewBox="0 0 16.499 22">
  <g id="total_delivered" data-name="total delivered" transform="translate(-1914 -4922.15)">
    <path id="Paper" d="M290.609,51.275H288.89a.566.566,0,0,1-.517-.6V49.126a1.935,1.935,0,0,0-1.89-1.976H277.89A1.937,1.937,0,0,0,276,49.126V67.173a1.938,1.938,0,0,0,1.89,1.977h12.719a1.937,1.937,0,0,0,1.89-1.977V53.252A1.936,1.936,0,0,0,290.609,51.275Zm.514,15.9a.564.564,0,0,1-.516.6H277.89a.566.566,0,0,1-.517-.6V49.126a.565.565,0,0,1,.517-.6h8.594a.566.566,0,0,1,.517.6v1.548a1.937,1.937,0,0,0,1.89,1.977h1.719a.566.566,0,0,1,.517.6V67.173Zm-8.3-13.149h2.117a.687.687,0,1,0,0-1.373h-2.117a.687.687,0,1,0,0,1.373Zm6.241,1.375h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.751h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Check" d="M282.277,53.552a.369.369,0,0,0-.508,0l-1.18,1.181-.454-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.357.357,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.382-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.176.176,0,0,1,.126.052l.517.517a.088.088,0,0,0,.126,0L281.9,53.68a.179.179,0,0,1,.305.127A.184.184,0,0,1,282.151,53.934Z" transform="translate(1637.119 4873.425)" fill="#1e97cb"/>
    <path id="Check-2" data-name="Check" d="M282.277,57.22a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.379-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.174.174,0,0,1,.126.052l.517.516a.088.088,0,0,0,.126,0l1.243-1.243a.181.181,0,0,1,.253,0,.178.178,0,0,1,.052.127A.17.17,0,0,1,282.151,57.6Z" transform="translate(1637.119 4872.507)" fill="#1e97cb"/>
    <path id="Check-3" data-name="Check" d="M282.277,60.885a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.381L280.716,62.7a.183.183,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.127-.052.176.176,0,0,1,.126.052l.517.517a.09.09,0,0,0,.126,0l1.243-1.244a.182.182,0,0,1,.253,0,.178.178,0,0,1,.052.127.172.172,0,0,1-.049.126Z" transform="translate(1637.119 4871.591)" fill="#1e97cb"/>
    <path id="Path_364" data-name="Path 364" d="M280.864,55.439l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,55.439Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,0,1-.344-.344l1.237-1.236A.244.244,0,0,1,282.243,53.654Zm-1.379,4.521-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,58.176Zm1.379-1.783a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,0,1-.344-.344l1.237-1.237A.242.242,0,0,1,282.243,56.393Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,280.864,60.926Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.244.244,0,0,1,282.243,59.142Z" transform="translate(1637.087 4873.392)" fill="#1e97cb"/>
    <path id="Check-4" data-name="Check" d="M282.277,60.879a.369.369,0,0,0-.508,0l-1.18,1.181-.454-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.357.357,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.382-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.176.176,0,0,1,.126.052l.517.517a.088.088,0,0,0,.126,0l1.246-1.243a.179.179,0,0,1,.305.127A.184.184,0,0,1,282.151,61.261Z" transform="translate(1637.119 4871.593)" fill="#1e97cb"/>
    <path id="Check-5" data-name="Check" d="M282.277,64.547a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.366.366,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.507,0l1.435-1.435a.355.355,0,0,0,.1-.253A.351.351,0,0,0,282.277,64.547Zm-.126.379-1.435,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.127-.306.176.176,0,0,1,.126.052l.517.517a.088.088,0,0,0,.126,0l1.243-1.243a.181.181,0,0,1,.253,0,.178.178,0,0,1,.052.127A.17.17,0,0,1,282.151,64.927Z" transform="translate(1637.119 4870.675)" fill="#1e97cb"/>
    <path id="Check-6" data-name="Check" d="M282.277,68.212a.369.369,0,0,0-.508,0l-1.18,1.18-.454-.453a.366.366,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.507,0l1.435-1.435a.359.359,0,0,0,0-.507Zm-.126.381-1.435,1.435a.182.182,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.127-.052.176.176,0,0,1,.126.052l.517.517a.09.09,0,0,0,.126,0l1.243-1.244a.182.182,0,0,1,.253,0,.178.178,0,0,1,.052.127.172.172,0,0,1-.049.126Z" transform="translate(1637.119 4869.759)" fill="#1e97cb"/>
    <path id="Path_365" data-name="Path 365" d="M280.864,62.766l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,62.766Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,0,1-.344-.344l1.237-1.236A.244.244,0,0,1,282.243,60.981ZM280.864,65.5l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,280.864,65.5Zm1.379-1.783a.244.244,0,0,1,0,.344L281.007,65.3a.243.243,0,0,1-.344-.344L281.9,63.72A.242.242,0,0,1,282.243,63.72Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,280.864,68.253Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,0,1-.344-.344l1.237-1.237A.244.244,0,0,1,282.243,66.469Z" transform="translate(1637.087 4871.559)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($deliveries[0]) ? $deliveries[0]->delivered_dels : 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Total Delivered</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                       <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16.499" height="22" viewBox="0 0 16.499 22">
  <g id="total_deliveres_" data-name="total deliveres " transform="translate(-2028 -4922.15)">
    <g id="Group_159" data-name="Group 159" transform="translate(2028 4922.15)">
      <path id="Paper" d="M404.609,51.276h-1.72a.566.566,0,0,1-.516-.6V49.126a1.936,1.936,0,0,0-1.89-1.976H391.89A1.936,1.936,0,0,0,390,49.126V67.173a1.937,1.937,0,0,0,1.89,1.977h12.719a1.937,1.937,0,0,0,1.89-1.977V53.252A1.936,1.936,0,0,0,404.609,51.276Zm.514,15.9a.564.564,0,0,1-.516.6H391.89a.566.566,0,0,1-.517-.6V49.126a.565.565,0,0,1,.517-.6h8.594a.566.566,0,0,1,.516.6v1.548a1.938,1.938,0,0,0,1.89,1.977h1.72a.566.566,0,0,1,.517.6V67.173Zm-8.3-13.149h2.117a.687.687,0,1,0,0-1.373h-2.117a.687.687,0,1,0,0,1.373Zm6.241,1.375h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.751h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Zm0,2.75h-6.241a.687.687,0,1,0,0,1.373h6.241a.687.687,0,1,0,0-1.373Z" transform="translate(-390 -47.15)" fill="#1e97cb"/>
      <path id="Check" d="M396.276,53.552a.368.368,0,0,0-.507,0l-1.181,1.181-.453-.454a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.358.358,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.382-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,0-.254.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.087.087,0,0,0,.125,0L395.9,53.68a.181.181,0,0,1,.254,0,.179.179,0,0,1,.052.128A.182.182,0,0,1,396.15,53.934Z" transform="translate(-390.881 -48.725)" fill="#1e97cb"/>
      <path id="Check-2" data-name="Check" d="M396.276,57.22a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.379-1.434,1.434a.181.181,0,0,1-.253,0l-.707-.706a.179.179,0,0,1,.128-.306.175.175,0,0,1,.126.052l.517.516a.087.087,0,0,0,.125,0l1.244-1.243a.179.179,0,0,1,.305.127A.168.168,0,0,1,396.15,57.6Z" transform="translate(-390.881 -49.643)" fill="#1e97cb"/>
      <path id="Check-3" data-name="Check" d="M396.276,60.885a.368.368,0,0,0-.507,0l-1.181,1.18-.453-.453a.368.368,0,0,0-.507,0,.357.357,0,0,0,0,.507l.707.707a.359.359,0,0,0,.508,0l1.434-1.435a.357.357,0,0,0,0-.507Zm-.126.381L394.716,62.7a.182.182,0,0,1-.253,0l-.707-.707a.178.178,0,0,1,0-.253.181.181,0,0,1,.128-.052.178.178,0,0,1,.126.052l.517.517a.089.089,0,0,0,.125,0l1.244-1.244a.179.179,0,0,1,.305.127.17.17,0,0,1-.05.126Z" transform="translate(-390.881 -50.559)" fill="#1e97cb"/>
      <path id="images" d="M395.429,65.275h-1.16a.367.367,0,0,0-.367.367V66.8a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367v-1.16A.367.367,0,0,0,395.429,65.275Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1v-1.16a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -51.682)" fill="#1e97cb"/>
      <path id="images-2" data-name="images" d="M395.429,68.883h-1.16a.368.368,0,0,0-.367.367v1.16a.368.368,0,0,0,.367.367h1.16a.368.368,0,0,0,.367-.367V69.25A.368.368,0,0,0,395.429,68.883Zm.1,1.527a.1.1,0,0,1-.1.1h-1.16a.1.1,0,0,1-.1-.1V69.25a.1.1,0,0,1,.1-.1h1.16a.1.1,0,0,1,.1.1Z" transform="translate(-390.976 -52.584)" fill="#1e97cb"/>
      <path id="Path_314" data-name="Path 314" d="M394.864,55.439l-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,55.439Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.236a.243.243,0,1,1-.344-.344l1.237-1.236A.244.244,0,0,1,396.243,53.654Zm-1.379,4.522-.059.059a.2.2,0,0,1-.286,0l-.809-.809a.2.2,0,0,1,0-.286l.059-.059a.2.2,0,0,1,.287,0l.808.808A.206.206,0,0,1,394.864,58.176Zm1.379-1.783a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.242.242,0,0,1,396.243,56.393Zm-1.379,4.533-.059.059a.2.2,0,0,1-.286,0l-.809-.808a.2.2,0,0,1,0-.287l.059-.059a.2.2,0,0,1,.287,0l.808.809A.2.2,0,0,1,394.864,60.926Zm1.379-1.784a.244.244,0,0,1,0,.344l-1.237,1.237a.243.243,0,1,1-.344-.344l1.237-1.237A.244.244,0,0,1,396.243,59.142Zm-.857,5.013H394.2a.223.223,0,0,1-.222-.222V62.653a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.223.223,0,0,1,395.386,64.155Zm0,2.711H394.2a.222.222,0,0,1-.222-.222V65.365a.222.222,0,0,1,.222-.222h1.186a.222.222,0,0,1,.222.222v1.279A.222.222,0,0,1,395.386,66.866Z" transform="translate(-390.912 -48.759)" fill="#1e97cb"/>
    </g>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($deliveries[0]) ? $deliveries[0]->total_dels: 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('auth/Active_total_deliveries/').$sx.'/'.$ex; ?>">Total Deliveries</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                    

                
                </div>  
                
                <!--   BAGS R2 --->
                
            
                <div class="row">
                                  <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.989" viewBox="0 0 22 17.989">
  <g id="unassigned_bags" data-name="unassigned bags" transform="translate(-1686.904 -5029.557)">
    <g id="Group_161" data-name="Group 161" transform="translate(1686.904 5029.557)">
      <path id="Path_315" data-name="Path 315" d="M57.08,172.359c-.3-.156-.569-.295-.838-.437q-3.513-1.848-7.026-3.7a.513.513,0,0,1-.312-.5q.008-4.115,0-8.229v-.19c.177.094.333.176.488.261q3.753,2.057,7.507,4.111a.3.3,0,0,1,.182.306q-.008,4.065,0,8.129Z" transform="translate(-48.904 -154.557)" fill="#1e97cb"/>
      <path id="Path_316" data-name="Path 316" d="M53.75,156.507c.189-.1.363-.2.539-.291.992-.528,1.987-1.053,2.978-1.583a.5.5,0,0,1,.509-.011q3.813,2.007,7.63,4.01a.8.8,0,0,1,.066.045c-.047.032-.086.064-.128.087-1.15.629-2.3,1.259-3.453,1.881a.306.306,0,0,1-.248,0q-3.875-2.019-7.745-4.049C53.852,156.575,53.809,156.544,53.75,156.507Z" transform="translate(-48.904 -154.557)" fill="#1e97cb"/>
      <path id="Path_317" data-name="Path 317" d="M60.876,161.2c-.2.11-.375.21-.554.308-.893.488-1.787.974-2.678,1.466a.265.265,0,0,1-.292.005q-3.821-2.1-7.645-4.192c-.023-.012-.044-.03-.086-.059.054-.035.1-.069.145-.094.973-.522,1.945-1.044,2.923-1.557a.358.358,0,0,1,.288-.012q3.876,2.015,7.746,4.042C60.768,161.128,60.81,161.157,60.876,161.2Z" transform="translate(-48.904 -154.557)" fill="#1e97cb"/>
    </g>
    <path id="Path_318" data-name="Path 318" d="M61.253,167.7a4.826,4.826,0,1,1,4.837,4.846A4.8,4.8,0,0,1,61.253,167.7Zm9.022.015a4.206,4.206,0,1,0-4.219,4.212A4.188,4.188,0,0,0,70.275,167.715Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_319" data-name="Path 319" d="M60.863,167.7a5.172,5.172,0,0,1,5.215-5.226v-3.148c-.056.025-.086.036-.114.051Q62,161.542,58.029,163.7a.231.231,0,0,0-.126.24q0,4.095,0,8.19c0,.062.007.125.012.213l1.659-.866h0l1.981-1.162A5.232,5.232,0,0,1,60.863,167.7Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_320" data-name="Path 320" d="M65.686,166.609c0-.4,0-.8,0-1.2,0-.279.068-.508.4-.508s.4.241.4.512c0,.732.01,1.463,0,2.195a.465.465,0,0,0,.281.486c.427.222.837.478,1.254.719.259.15.479.341.283.658-.184.3-.426.141-.644.007-.562-.348-1.137-.676-1.679-1.053a.8.8,0,0,1-.279-.533C65.657,167.467,65.686,167.037,65.686,166.609Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($unbags) ? $unbags[0]['unbags_counts'] : '0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#"> Unas. Bags</a></p>
                                       
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                   
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.989" viewBox="0 0 22 17.989">
  <g id="assigned_bags" data-name="assigned bags" transform="translate(-1800 -5029.557)">
    <path id="Path_321" data-name="Path 321" d="M178.342,169.816a.456.456,0,0,1-.371-.156,1.138,1.138,0,0,0-.123-.144s-.934-.927-1.19-1.186a.5.5,0,0,1-.133-.473.47.47,0,0,1,.327-.342.538.538,0,0,1,.158-.026.459.459,0,0,1,.327.146l.845.835.123.115.156-.083,2.188-2.18a.527.527,0,0,1,.369-.161.471.471,0,0,1,.383.2.483.483,0,0,1-.024.6c-.028.031-2.513,2.513-2.513,2.513a2.151,2.151,0,0,0-.166.192A.452.452,0,0,1,178.342,169.816Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <g id="Group_164" data-name="Group 164" transform="translate(1800 5029.557)">
      <g id="Group_163" data-name="Group 163" transform="translate(0 0)">
        <path id="Path_322" data-name="Path 322" d="M170.176,172.359c-.3-.156-.569-.295-.837-.437q-3.513-1.848-7.027-3.695a.514.514,0,0,1-.312-.5q.008-4.115,0-8.229v-.19c.177.094.334.176.489.261q3.751,2.057,7.506,4.111a.3.3,0,0,1,.183.306q-.009,4.065-.005,8.129Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
        <path id="Path_323" data-name="Path 323" d="M166.847,156.507c.189-.1.363-.2.538-.291.993-.528,1.987-1.053,2.978-1.583a.5.5,0,0,1,.509-.011q3.814,2.007,7.63,4.01a.664.664,0,0,1,.066.045,1.533,1.533,0,0,1-.128.087c-1.15.629-2.3,1.259-3.453,1.881a.3.3,0,0,1-.247,0q-3.876-2.019-7.745-4.049C166.949,156.575,166.906,156.544,166.847,156.507Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
        <path id="Path_324" data-name="Path 324" d="M173.972,161.2c-.2.11-.375.21-.554.308-.893.488-1.787.974-2.678,1.466a.265.265,0,0,1-.292.005q-3.82-2.1-7.645-4.192a.932.932,0,0,1-.085-.059c.053-.035.1-.069.144-.094.973-.522,1.946-1.044,2.923-1.557a.358.358,0,0,1,.288-.012q3.878,2.015,7.747,4.042C173.865,161.128,173.907,161.157,173.972,161.2Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
      </g>
      <path id="Path_325" data-name="Path 325" d="M174.349,167.7a4.826,4.826,0,1,1,4.837,4.846A4.8,4.8,0,0,1,174.349,167.7Zm9.023.015a4.206,4.206,0,1,0-4.22,4.212A4.19,4.19,0,0,0,183.372,167.715Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
      <path id="Path_326" data-name="Path 326" d="M173.959,167.7a5.174,5.174,0,0,1,5.216-5.226c0-.753,0-1.448,0-1.975v-1.173c-.057.025-.087.036-.115.051q-3.966,2.165-7.934,4.327a.23.23,0,0,0-.127.24q0,4.1,0,8.19c0,.062.007.125.012.213l1.659-.866h0l1.981-1.162A5.232,5.232,0,0,1,173.959,167.7Z" transform="translate(-162 -154.557)" fill="#1e97cb"/>
    </g>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($asbags) ? $asbags[0]['asbags_counts'] : '0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="<?php echo base_url('assigned') ?>">Assi. Bags</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                 

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="19.819" viewBox="0 0 22 19.819">
  <g id="picked_bags" data-name="picked bags" transform="translate(-1914 -5030.908)">
    <path id="Path_327" data-name="Path 327" d="M297.77,168.341l.231.557-8.05,3.2a2.167,2.167,0,0,1,.62,1.992,2.026,2.026,0,0,1-.871,1.283,2.054,2.054,0,0,1-2.8-.5c-.714-.958-.49-2.1.612-3.029l-2.987-7.5a17.305,17.305,0,0,1-4.041-.5,2.26,2.26,0,0,0-.035.284c0,.507.043,1.018-.009,1.52a2.26,2.26,0,0,0,.863,2.014,11.585,11.585,0,0,1,3.436,6.85.922.922,0,0,1-.7,1,.9.9,0,0,1-1.1-.686,17.321,17.321,0,0,0-2.513-5.177,1.549,1.549,0,0,0-.137-.154c-.518,1.233-1.026,2.443-1.535,3.652-.266.632-.528,1.266-.8,1.9a.917.917,0,0,1-1.277.584.935.935,0,0,1-.584-1.309q.653-1.8,1.32-3.593a4.2,4.2,0,0,0-.1-3.168A4.311,4.311,0,0,1,277,166.1c-.04-1.471-.018-2.945-.013-4.417a1.734,1.734,0,0,1,3.445-.369c.014.11.178.243.3.292a10.479,10.479,0,0,0,3.338.73,1.014,1.014,0,0,1,.989,1.366.638.638,0,0,0,.026.374c.957,2.428,1.924,4.851,2.879,7.279a.357.357,0,0,0,.427.265c.225-.017.454.048.681.045a1.467,1.467,0,0,0,.518-.09q3.914-1.545,7.823-3.1C297.524,168.429,297.636,168.39,297.77,168.341Zm-9.188,4.212a1.116,1.116,0,0,0-1.142,1.1,1.119,1.119,0,1,0,2.237.01A1.113,1.113,0,0,0,288.581,172.553Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_328" data-name="Path 328" d="M291.4,162.134l3.014-1.2,2.807,7.06-3.014,1.2Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_329" data-name="Path 329" d="M290.7,162.41l1.287,3.224L287,167.617,285.71,164.4Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_330" data-name="Path 330" d="M293.507,169.474l-4.983,1.981-1.285-3.227,4.98-1.983Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_331" data-name="Path 331" d="M276.988,157.649a1.725,1.725,0,1,1,1.716,1.727A1.71,1.71,0,0,1,276.988,157.649Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($bags) ? $bags[0]['bags_counts'] : '0'; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Picked Bags</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                    
                  <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="21.999" height="21.99" viewBox="0 0 21.999 21.99">
  <g id="total_bags" data-name="total bags" transform="translate(-2028 -5029.822)">
    <path id="Path_332" data-name="Path 332" d="M408.781,169.481v-13.64a.939.939,0,0,1,.641-.976.921.921,0,0,1,1.194.827c0,.072,0,.144,0,.216q0,8.155,0,16.311a.288.288,0,0,0,.181.3,2.288,2.288,0,1,1-2.151-.024.21.21,0,0,0,.14-.218c-.008-.311,0-.623,0-.95-.061-.005-.113-.014-.165-.014-.39,0-.781,0-1.171,0a.911.911,0,0,0-.952.954c-.005.571,0,1.142,0,1.712a.916.916,0,0,1-1,1H395.04a1.691,1.691,0,0,1-.695,1.458,1.863,1.863,0,0,1-1.285.373,1.806,1.806,0,0,1-1.7-1.831c-.147,0-.3,0-.444,0a.911.911,0,0,1-.065-1.82c.084-.007.168-.006.252-.006h13.557c0-.114,0-.208,0-.3a8.186,8.186,0,0,1,.08-1.218,2.7,2.7,0,0,1,2.563-2.141c.42-.016.841-.005,1.261-.006Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_333" data-name="Path 333" d="M394.351,161.235c0,.382,0,.736,0,1.089a.7.7,0,0,0,.234.563.632.632,0,0,0,.7.132.672.672,0,0,0,.437-.628c.009-.312,0-.625,0-.937v-.2h4.12c0,.262,0,.524,0,.786a2.871,2.871,0,0,0,.025.483.678.678,0,0,0,1.344-.112c.009-.337.007-.673,0-1.009,0-.122.031-.169.161-.168.552.007,1.1,0,1.658,0a.679.679,0,0,1,.7.707q0,1.576,0,3.154a.685.685,0,0,1-.728.718q-2.451,0-4.9,0c-1.824,0-3.647-.01-5.471.007a.765.765,0,0,1-.809-.8c.023-1,.021-2.006,0-3.009a.741.741,0,0,1,.783-.785C393.182,161.248,393.752,161.235,394.351,161.235Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_334" data-name="Path 334" d="M395.753,166.743h4.093c0,.371,0,.735,0,1.1a.693.693,0,0,0,.482.686.675.675,0,0,0,.885-.606c.013-.336.01-.673,0-1.009,0-.135.027-.191.178-.188.534.009,1.069,0,1.6,0a.691.691,0,0,1,.739.745q0,1.54,0,3.081a.69.69,0,0,1-.761.756q-2.387,0-4.774,0-2.789,0-5.578,0a.693.693,0,0,1-.622-.255.83.83,0,0,1-.16-.424c-.013-1.075-.01-2.15-.006-3.225a.674.674,0,0,1,.677-.678c.57-.014,1.141,0,1.712-.006.113,0,.126.055.126.145,0,.313,0,.625,0,.937a.69.69,0,1,0,1.374,0c0-.343,0-.685.007-1.027C395.733,166.773,395.743,166.762,395.753,166.743Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_335" data-name="Path 335" d="M397.1,155.74c0,.39-.005.761,0,1.132a.684.684,0,0,0,1.367.047c.009-.336.008-.672,0-1.009,0-.127.023-.181.166-.179.541.007,1.082,0,1.622,0a.7.7,0,0,1,.735.754q0,1.541,0,3.081a.692.692,0,0,1-.739.747q-2.469,0-4.937,0a.689.689,0,0,1-.736-.733q0-1.559,0-3.117a.664.664,0,0,1,.631-.721C395.831,155.722,396.449,155.74,397.1,155.74Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $asbags[0]['asbags_counts'] + $bags[0]['bags_counts'] + $unbags[0]['unbags_counts'] ; ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Total Bags</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
            
                    
                </div>
                <!-- end row-->
                   <!-- R3 -->
                   <div class="row" >
                                     <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.275" viewBox="0 0 22 17.275">
  <g id="unassigned_cash" data-name="unassigned cash" transform="translate(-1686 -5136.18)">
    <path id="Path_336" data-name="Path 336" d="M48,261.18l10.419,0h9.554v7.141c-.228-.1-.435-.215-.655-.291a9.868,9.868,0,0,0-1.025-.3c-.158-.037-.188-.1-.187-.243.006-.759,0-1.518,0-2.277v-.228a1.955,1.955,0,0,1-1.885-1.9H60.38a10.242,10.242,0,0,1,.709.908,5.249,5.249,0,0,1,.494,4.67.435.435,0,0,1-.124.191,5.99,5.99,0,0,0-2.2,3.534.982.982,0,0,1-.029.1H48.107c-.036,0-.071,0-.107.006Zm1.9,7.513a1.886,1.886,0,0,1,1.294.574,1.957,1.957,0,0,1,.538,1.31h3.917a5.255,5.255,0,0,1,0-7.5H51.929a1.935,1.935,0,0,1-2.029,1.672Zm8.542-4.655h-.915v.724c-.644.1-.845.332-.849.96,0,.251,0,.5,0,.752a.77.77,0,0,0,.826.811h.881c0,.175-.008.331,0,.486.008.14-.04.19-.182.187-.351-.009-.7,0-1.053,0h-.459v.929h.841v.738h.914V268.9c.661-.109.856-.34.857-.993v-.73a.76.76,0,0,0-.785-.806c-.258,0-.516,0-.773-.007-.051,0-.14-.062-.143-.1-.015-.182-.007-.366-.007-.566h1.651v-.916h-.807Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_337" data-name="Path 337" d="M65.128,268.661a4.9,4.9,0,1,1-4.919,4.8A4.911,4.911,0,0,1,65.128,268.661Zm3.482,4.786a3.512,3.512,0,1,0-3.391,3.619A3.5,3.5,0,0,0,68.61,273.447Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_338" data-name="Path 338" d="M67.51,274.983l-.983.993c-.34-.345-.683-.7-1.029-1.046s-.68-.678-1.015-1.021a.331.331,0,0,1-.108-.2c-.007-.987,0-1.975,0-2.977h1.379v.728c0,.522,0,1.045,0,1.568a.421.421,0,0,0,.142.336C66.433,273.9,66.974,274.448,67.51,274.983Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Unas. Cash</a></p>
                                       
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                   
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="17.274" viewBox="0 0 22 17.274">
  <g id="assigned_cash" data-name="assigned cash" transform="translate(-1802.534 -5136.18)">
    <path id="Path_339" data-name="Path 339" d="M180.978,275.385a.456.456,0,0,1-.371-.155,1.146,1.146,0,0,0-.124-.145s-.933-.926-1.189-1.185a.5.5,0,0,1-.134-.473.474.474,0,0,1,.328-.343.534.534,0,0,1,.158-.025.455.455,0,0,1,.327.146l.845.835.123.115.156-.083,2.188-2.18a.524.524,0,0,1,.368-.161.468.468,0,0,1,.384.2.483.483,0,0,1-.024.6c-.028.031-2.513,2.513-2.513,2.513a1.88,1.88,0,0,0-.166.192A.451.451,0,0,1,180.978,275.385Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_340" data-name="Path 340" d="M164.534,261.18l10.419,0h9.554v7.141c-.228-.1-.435-.215-.655-.291a9.94,9.94,0,0,0-1.025-.3c-.158-.037-.188-.1-.187-.243.006-.759,0-1.518,0-2.277v-.228a1.955,1.955,0,0,1-1.885-1.9h-3.844a10.244,10.244,0,0,1,.709.908,5.249,5.249,0,0,1,.494,4.67.428.428,0,0,1-.125.191,5.989,5.989,0,0,0-2.2,3.534.8.8,0,0,1-.03.1H164.641c-.036,0-.071,0-.107.006Zm1.9,7.513a1.888,1.888,0,0,1,1.294.574,1.957,1.957,0,0,1,.538,1.31h3.917a5.256,5.256,0,0,1,0-7.5h-3.72a1.935,1.935,0,0,1-2.029,1.672Zm8.542-4.655h-.915v.724c-.644.1-.845.332-.849.96,0,.251,0,.5,0,.752a.77.77,0,0,0,.826.811h.881c0,.175-.008.331,0,.486.008.14-.04.19-.183.187-.35-.009-.7,0-1.052,0h-.459v.929h.841v.738h.914V268.9c.661-.109.856-.34.857-.993v-.73a.76.76,0,0,0-.785-.806c-.258,0-.516,0-.773-.007-.051,0-.14-.062-.143-.1-.015-.182-.007-.366-.007-.566h1.651v-.916h-.807Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_341" data-name="Path 341" d="M181.662,268.661a4.9,4.9,0,1,1-4.919,4.8A4.911,4.911,0,0,1,181.662,268.661Zm3.482,4.786a3.512,3.512,0,1,0-3.391,3.619A3.5,3.5,0,0,0,185.144,273.447Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Assi. Cash</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                 

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="21.943" height="17.565" viewBox="0 0 21.943 17.565">
  <g id="cash_picked" data-name="cash picked" transform="translate(-1914 -5136.012)">
    <g id="Group_148" data-name="Group 148" transform="translate(1914 5136.012)">
      <path id="Path_274" data-name="Path 274" d="M286.131,269.115l.378.061-.035.245.457.222-.182.424a2.286,2.286,0,0,0-.276-.154,1.036,1.036,0,0,0-.286-.063c-.042,0-.117.033-.125.065a.176.176,0,0,0,.054.139,1.669,1.669,0,0,0,.19.124,1.628,1.628,0,0,1,.282.213.5.5,0,0,1-.233.825c-.163.048-.228.12-.225.276v.046l-.305-.048c-.026,0-.051-.012-.085-.019l.032-.225c-.115-.055-.222-.1-.325-.159a.1.1,0,0,1-.035-.091c.042-.114.094-.224.146-.344a1.542,1.542,0,0,0,.2.109,1.45,1.45,0,0,0,.3.072.134.134,0,0,0,.108-.061c.012-.02-.019-.081-.048-.1-.072-.057-.155-.1-.23-.152a1.518,1.518,0,0,1-.223-.162.535.535,0,0,1,.248-.913c.153-.04.2-.1.206-.243A.5.5,0,0,1,286.131,269.115Z" transform="translate(-276.024 -261.033)" fill="#1e97cb"/>
      <path id="Path_275" data-name="Path 275" d="M276,268.416a.654.654,0,0,0,.652.3c.327-.021.655,0,.983,0,.47,0,.623-.154.623-.631q0-1.765,0-3.531,0-1.1,0-2.2c0-.433-.162-.593-.594-.6-.357,0-.713.008-1.07,0a.572.572,0,0,0-.593.324Z" transform="translate(-276 -261.014)" fill="#1e97cb"/>
      <path id="Path_276" data-name="Path 276" d="M297.994,271.955a.59.59,0,0,0-.6-.32c-.378.013-.756,0-1.134.007a.469.469,0,0,0-.527.53q0,2.943,0,5.884a.478.478,0,0,0,.539.541c.364,0,.728-.014,1.091.006a.625.625,0,0,0,.628-.3Z" transform="translate(-276.051 -261.039)" fill="#1e97cb"/>
      <path id="Path_277" data-name="Path 277" d="M279.579,267.175c.576-.079,1.14-.155,1.7-.234.655-.092,1.309-.221,1.969-.27a7.356,7.356,0,0,1,1.276.093c.708.074,1.415.181,2.126.231.542.039.895-.366.954-1.014a.941.941,0,0,0-.794-.988c-.473-.065-.948-.118-1.422-.174-.538-.063-1.075-.123-1.617-.217.433-.058.865-.117,1.3-.173.261-.034.527-.05.784-.1a1.017,1.017,0,0,1,.661.1q2.37,1.112,4.743,2.218a.934.934,0,1,0,.767-1.7c-.369-.167-.733-.342-1.094-.512a.99.99,0,0,0-.714-1.285c-1.591-.662-3.187-1.314-4.773-1.987a1.6,1.6,0,0,0-1.325-.005c-1.18.518-2.354,1.049-3.534,1.568-.286.125-.583.226-.881.322-.1.034-.154.07-.154.186q.006,1.927.006,3.855A.49.49,0,0,0,279.579,267.175Z" transform="translate(-276.009 -261.012)" fill="#1e97cb"/>
      <path id="Path_278" data-name="Path 278" d="M294.448,277.133v-3.806h-1.031a2.609,2.609,0,0,0-.385,0,1.6,1.6,0,0,1-1.45-.5,2.611,2.611,0,0,0-.388-.3,5.741,5.741,0,0,1-1.375-1.363,1,1,0,0,0-1.066-.388.939.939,0,0,0-.75.764.962.962,0,0,0,.126.7,4.614,4.614,0,0,0,1.528,1.784c.036.023.084.046.1.081a.493.493,0,0,1,.014.156c-.051,0-.12.029-.151,0a4.346,4.346,0,0,1-1.17-1.085c-.139-.225-.285-.445-.417-.673a.184.184,0,0,0-.256-.1q-1.649.527-3.3,1.034c-.139.043-.176.1-.16.241a2.611,2.611,0,0,0,1.573,2.207c.722.341,1.439.7,2.175,1a2.993,2.993,0,0,0,1.072.241c1.715.025,3.429.012,5.143.011C294.324,277.141,294.373,277.137,294.448,277.133Z" transform="translate(-276.021 -261.037)" fill="#1e97cb"/>
      <path id="Path_279" data-name="Path 279" d="M278.543,262.485v5.5a2.566,2.566,0,0,0,.48-.006c.2-.04.255-.2.255-.393,0-.678,0-1.357,0-2.036,0-.821-.011-1.643,0-2.464C279.294,262.526,279.158,262.4,278.543,262.485Z" transform="translate(-276.007 -261.016)" fill="#1e97cb"/>
      <path id="Path_280" data-name="Path 280" d="M295.447,272.357c-.662-.034-.727.027-.728.661v4.307c0,.5.071.566.576.557.049,0,.1-.007.153-.01Z" transform="translate(-276.048 -261.041)" fill="#1e97cb"/>
      <path id="Path_281" data-name="Path 281" d="M291.21,270.558q-.518-1.673-1.05-3.341a.438.438,0,0,0-.612-.292q-2.029.63-4.058,1.265l-3.994,1.25a.486.486,0,0,0-.371.7l.978,3.117c.132.419.323.527.738.4q2.374-.741,4.748-1.486c.053-.017.1-.039.163-.061a1.253,1.253,0,0,1,.4-1.343,1.333,1.333,0,0,1,1.872.228c.253.332.253.333.65.212.082-.025.165-.048.243-.08A.445.445,0,0,0,291.21,270.558Zm-3.442-.268a1.616,1.616,0,1,1-1.619-1.61A1.6,1.6,0,0,1,287.768,270.289Z" transform="translate(-276.013 -261.027)" fill="#1e97cb"/>
    </g>
  </g>
</svg>
</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"></span></h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Cash Picked</a></p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    
                       <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="13.547" viewBox="0 0 22 13.547">
  <g id="total_cash" data-name="total cash" transform="translate(-2028 -5138.044)">
    <path id="Path_342" data-name="Path 342" d="M399.641,263.044h8.817c.593,0,.788.2.788.8q0,4.618,0,9.238c0,.573-.205.777-.776.777H390.746c-.526,0-.745-.22-.745-.751q0-4.619,0-9.238c0-.639.185-.824.825-.824Zm-8.572,2.852a.84.84,0,0,0-.023.131c0,1.6,0,3.19,0,4.785,0,.171.069.213.227.236a1.729,1.729,0,0,1,1.482,1.233,4.2,4.2,0,0,1,.113.528h13.523a1.817,1.817,0,0,1,1.556-1.756c.224-.028.278-.1.277-.313-.009-1.535-.005-3.07-.006-4.6,0-.078-.012-.155-.019-.235a1.875,1.875,0,0,1-1.811-1.817h-13.5C392.507,265.389,392.168,265.73,391.069,265.9Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_343" data-name="Path 343" d="M411.3,275.884v-.409q0-4.44,0-8.88c0-.1-.028-.226.021-.294.079-.108.209-.244.32-.246s.243.132.324.238c.05.067.028.193.028.293q0,4.592,0,9.181c0,.581-.239.819-.823.819q-8.79,0-17.579,0c-.1,0-.225.021-.294-.029a.512.512,0,0,1-.226-.308.481.481,0,0,1,.2-.319.58.58,0,0,1,.32-.046q8.685,0,17.369,0Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_344" data-name="Path 344" d="M409.922,274.526v-9.27c0-.427.092-.587.341-.594s.361.164.361.6q0,4.545,0,9.088c0,.643-.205.853-.84.853q-8.786,0-17.573,0c-.08,0-.185.028-.235-.012-.114-.091-.263-.206-.284-.331-.03-.177.1-.317.307-.332.08-.005.161,0,.241,0h17.683Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_345" data-name="Path 345" d="M396.444,268.313a3.757,3.757,0,0,1,1.473-2.979,2.79,2.79,0,0,1,3.617.156,4.1,4.1,0,0,1,0,5.923,2.9,2.9,0,0,1-4.455-.738A4.245,4.245,0,0,1,396.444,268.313Zm3.619,2.136c.074-.027.169-.057.26-.1a1.129,1.129,0,0,0,.735-1.158.971.971,0,0,0-.563-.861c-.312-.16-.653-.263-.955-.437-.13-.075-.289-.287-.263-.4a.507.507,0,0,1,.391-.279,2.945,2.945,0,0,1,.824.114c.153.036.229.017.267-.132a2.329,2.329,0,0,1,.079-.29c.064-.16.012-.248-.148-.287a1.539,1.539,0,0,0-.232-.064c-.262-.02-.455-.074-.419-.418.022-.2-.172-.212-.328-.205-.172.007-.45-.055-.429.189.032.381-.168.5-.454.605a.736.736,0,0,0-.219.157,1.01,1.01,0,0,0,.118,1.606c.326.207.717.309,1.052.5a.642.642,0,0,1,.3.427c.017.237-.222.34-.423.335a6.418,6.418,0,0,1-.944-.124c-.13-.023-.255-.151-.341.066-.147.369-.132.561.093.636.244.081.5.132.746.2.081.586.081.573.471.583C400.226,271.132,399.938,270.69,400.063,270.449Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_346" data-name="Path 346" d="M394.208,268.444a.6.6,0,0,1-.6.61.6.6,0,1,1,.014-1.2A.593.593,0,0,1,394.208,268.444Z" transform="translate(1638 4875)" fill="#1e97cb"/>
    <path id="Path_347" data-name="Path 347" d="M406.235,268.453a.6.6,0,1,1-.582-.6A.605.605,0,0,1,406.235,268.453Z" transform="translate(1638 4875)" fill="#1e97cb"/>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup" ></span> </h3>
                                        <p class="text-muted mb-1 text-truncate"><a href="#">Total Cash</a></p>
                                        
                
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                  </div>
                   <!--END R3-->
 <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                        <i class="font-22 avatar-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="19.304" height="22" viewBox="0 0 19.304 22">
  <g id="total_patrens" data-name="total patrens" transform="translate(-1686 -5236.281)">
    <g id="Group_150" data-name="Group 150" transform="translate(1686 5236.281)">
      <path id="Path_282" data-name="Path 282" d="M58.5,377.868c.447,0,.894-.018,1.34,0a3.6,3.6,0,0,1,3.483,3.57c.017.857-.012,1.715.012,2.573a.491.491,0,0,1-.368.548,10.753,10.753,0,0,1-5.152.687c-1.252-.13-2.484-.45-3.727-.675a.446.446,0,0,1-.43-.537c.026-.893,0-1.787.015-2.681a3.543,3.543,0,0,1,3.38-3.482c.482-.023.965,0,1.447,0Z" transform="translate(-48.694 -363.313)" fill="#1e97cb"/>
      <path id="Path_283" data-name="Path 283" d="M55.17,376.966c-2.137.836-3.028,2.565-2.9,5.049-1.167-.225-2.251-.392-3.313-.648-.963-.232-.954-.275-.953-1.25,0-.678-.014-1.357.007-2.036a3.507,3.507,0,0,1,3.255-3.546c.97-.095,1.958-.017,2.839-.017Z" transform="translate(-48 -362.899)" fill="#1e97cb"/>
      <path id="Path_284" data-name="Path 284" d="M65.012,381.912a4.43,4.43,0,0,0-2.871-4.951l1.092-2.47c1.2.09,2.575-.262,3.847.419a3.389,3.389,0,0,1,1.926,2.941c.049.961.028,1.926.014,2.889a.538.538,0,0,1-.216.413A8.9,8.9,0,0,1,65.012,381.912Z" transform="translate(-49.733 -362.898)" fill="#1e97cb"/>
      <path id="Path_285" data-name="Path 285" d="M61.632,364.374a3.061,3.061,0,1,1-3.024-3.093A3.037,3.037,0,0,1,61.632,364.374Z" transform="translate(-48.921 -361.281)" fill="#1e97cb"/>
      <path id="Path_286" data-name="Path 286" d="M61.58,373.981a2.8,2.8,0,0,1-2.813,2.824,2.82,2.82,0,1,1,0-5.64A2.784,2.784,0,0,1,61.58,373.981Z" transform="translate(-48.972 -362.492)" fill="#1e97cb"/>
      <path id="Path_287" data-name="Path 287" d="M53.172,373.461a2.827,2.827,0,1,1,2.733-3.041,1.193,1.193,0,0,1-.247.595,5.825,5.825,0,0,0-.86,1.385,1.338,1.338,0,0,1-1.292,1.038A2.318,2.318,0,0,1,53.172,373.461Z" transform="translate(-48.278 -362.081)" fill="#1e97cb"/>
      <path id="Path_288" data-name="Path 288" d="M63.961,373.462c-.065-.01-.275-.046-.485-.076a.666.666,0,0,1-.645-.629,3.1,3.1,0,0,0-1.245-1.935.581.581,0,0,1-.252-.674,2.827,2.827,0,0,1,5.6.666A2.853,2.853,0,0,1,63.961,373.462Z" transform="translate(-49.632 -362.082)" fill="#1e97cb"/>
      <path id="Path_289" data-name="Path 289" d="M57.353,370.5l-.629-1.9h4.009l-.622,1.747A3.423,3.423,0,0,0,57.353,370.5Z" transform="translate(-49.069 -362.179)" fill="#1e97cb"/>
    </g>
  </g>
</svg></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo !empty($customers[0]) ? $customers[0]['total_customers'] : 0 ?></span></h3>
                                        <p class="text-muted mb-1 text-truncate text-truncate">Active Customers</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

</div>

                
                <!--End here new dasboard-->

            <?php } ?>


                <div class="row">
                    <!--<?php //TAHA if (strtolower($this->session->userdata('role')) == 'admin') { ?>-->
                    
                    <?php if (strtolower($this->session->userdata('role')) != 'vendor') { ?>
                    
                    
                    
                    <div class="col-xl-4">
                        <div class="card-box" dir="ltr">
                            <h4 class="header-title mb-3 text_color">Partner's Comparison Delivery Wise</h4>

                            <div class="widget-chart text-center">
                                <!-- pie chart here -->
                                <div id="pieChart">
                                    
                                </div>
                                
                                <?php if (strtolower($this->session->userdata('role')) == 'admin' OR strtolower($this->session->userdata('role')) == 'accounts manager') { ?>
                                <h5 class="text-muted mt-3">Total Sales Made Today</h5>
                                <h2 class="text_color"><span>&#x62f;&#x2e;&#x625;</span>
                                <?php //echo empty($revenue[0]->total_reveneu) ? 0 : $revenue[0]->total_reveneu ; ?>
                                 <?php $deliv_revi=$total_all_rev; $bags_revi= empty($revenue_bag[0]->total_reveneu_bag) ? 0 : round($revenue_bag[0]->total_reveneu_bag,4); echo round($deliv_revi+$bags_revi,4)?>
                               
                                </h2>
                                <?php } ?>
                                <!--<p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best in the meat of your page content.</p>-->

                                <!--<div class="row mt-3">-->
                                <!--    <div class="col-4">-->
                                <!--        <p class="text-muted font-15 mb-1 text-truncate text_color">Today</p>-->
                                <!--        <h4 class="text_color"><i class="fe-arrow-down text-danger mr-1 "></i>$7.8k</h4>-->
                                <!--    </div>-->
                                <!--    <div class="col-4">-->
                                <!--        <p class="text-muted font-15 mb-1 text-truncate text_color">Last week</p>-->
                                <!--        <h4 class="text_color"><i class="fe-arrow-up text-success mr-1 "></i>$1.4k</h4>-->
                                <!--    </div>-->
                                <!--    <div class="col-4">-->
                                <!--        <p class="text-muted font-15 mb-1 text-truncate text_color">Last Month</p>-->
                                <!--        <h4 class="text_color"><i class="fe-arrow-down text-danger mr-1 "></i>$15k</h4>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col-->
                <?php } ?>
                    <!--<div class="col-xl-8">-->
                    <!--    <div class="card-box">-->
                    <!--        <h4 class="header-title mb-3 text_color">Key Performance Indicator</h4>-->

                    <!--        <div id="sales-analytics" class="flot-chart mt-4 pt-1 " style="height: 369px;">-->
                    <!--            <div class="spinner-border avatar-lg text-dark m-2" role="status"></div>-->
                    <!--        </div>-->
                    <!--    </div> -->
                    <!--</div> -->
                    
                     <div id="here_table"></div>
                    
                </div>
                <!-- end row -->
             

            
                <?php  /* 
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Top 5 Users Balances</h4>

                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-centered m-0">

                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2">Profile</th>
                                            <th>Currency</th>
                                            <th>Balance</th>
                                            <th>Reserved in orders</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="<?php echo base_url('assets/images/users/user-2.jpg');?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                                                <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                            </td>

                                            <td>
                                                0.00816117 BTC
                                            </td>

                                            <td>
                                                0.00097036 BTC
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="<?php echo base_url('assets/images/users/user-3.jpg');?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 font-weight-normal">Erwin E. Brown</h5>
                                                <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-eth text-primary"></i> ETH
                                            </td>

                                            <td>
                                                3.16117008 ETH
                                            </td>

                                            <td>
                                                1.70360009 ETH
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="<?php echo base_url('assets/images/users/user-4.jpg');?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 font-weight-normal">Margeret V. Ligon</h5>
                                                <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-eur text-primary"></i> EUR
                                            </td>

                                            <td>
                                                25.08 EUR
                                            </td>

                                            <td>
                                                12.58 EUR
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="<?php echo base_url('assets/images/users/user-5.jpg');?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 font-weight-normal">Jose D. Delacruz</h5>
                                                <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-cny text-primary"></i> CNY
                                            </td>

                                            <td>
                                                82.00 CNY
                                            </td>

                                            <td>
                                                30.83 CNY
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="<?php echo base_url('assets/images/users/user-6.jpg');?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 font-weight-normal">Luke J. Sain</h5>
                                                <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                            </td>

                                            <td>
                                                2.00816117 BTC
                                            </td>

                                            <td>
                                                1.00097036 BTC
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Revenue History</h4>

                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-centered m-0">

                                    <thead class="thead-light">
                                        <tr>
                                            <th>Marketplaces</th>
                                            <th>Date</th>
                                            <th>Payouts</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="m-0 font-weight-normal">Themes Market</h5>
                                            </td>

                                            <td>
                                                Oct 15, 2018
                                            </td>

                                            <td>
                                                $5848.68
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 font-weight-normal">Freelance</h5>
                                            </td>

                                            <td>
                                                Oct 12, 2018
                                            </td>

                                            <td>
                                                $1247.25
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-success text-success">Paid</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 font-weight-normal">Share Holding</h5>
                                            </td>

                                            <td>
                                                Oct 10, 2018
                                            </td>

                                            <td>
                                                $815.89
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-success text-success">Paid</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 font-weight-normal">Envato's Affiliates</h5>
                                            </td>

                                            <td>
                                                Oct 03, 2018
                                            </td>

                                            <td>
                                                $248.75
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-danger text-danger">Overdue</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 font-weight-normal">Marketing Revenue</h5>
                                            </td>

                                            <td>
                                                Sep 21, 2018
                                            </td>

                                            <td>
                                                $978.21
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 font-weight-normal">Advertise Revenue</h5>
                                            </td>

                                            <td>
                                                Sep 15, 2018
                                            </td>

                                            <td>
                                                $358.10
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-success text-success">Paid</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive-->
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->
                </div>
             */ ?>
                <!-- end row -->
               
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

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
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
            <div class="slimscroll-menu rightbar-content">
                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="assets/images/user.png" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                    </div>
            
                    <h5><a href="javascript: void(0);">Geneva Kennedy</a> </h5>
                    <p class="text-muted mb-0"><small>Admin Head</small></p>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h5 class="pl-3">Basic Settings</h5>
                <hr class="mb-0" />

                <div class="p-3">
                    <div class="checkbox checkbox-primary mb-2">
                        <input id="Rcheckbox1" type="checkbox" checked>
                        <label for="Rcheckbox1">
                            Notifications
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary mb-2">
                        <input id="Rcheckbox2" type="checkbox" checked>
                        <label for="Rcheckbox2">
                            API Access
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary mb-2">
                        <input id="Rcheckbox3" type="checkbox">
                        <label for="Rcheckbox3">
                            Auto Updates
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary mb-2">
                        <input id="Rcheckbox4" type="checkbox" checked>
                        <label for="Rcheckbox4">
                            Online Status
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary mb-0">
                        <input id="Rcheckbox5" type="checkbox" checked>
                        <label for="Rcheckbox5">
                            Auto Payout
                        </label>
                    </div>
                </div>

                <!-- Timeline -->
                <hr class="mt-0" />
                <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
                <hr class="mb-0" />
                <div class="p-3">
                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                            <p class="inbox-item-text">Nice to meet you</p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                    </div> <!-- end inbox-widget -->
                </div> <!-- end .p-3-->

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>

        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--Comment by shan-->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php //echo base_url('assets/chat/js/csrChat.js') ?>"></script>-->
        <?php } ?>
        
        <!-- Plugins js-->
        <script src="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/jquery-knob/jquery.knob.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/jquery-sparkline/jquery.sparkline.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/flot-charts/jquery.flot.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/flot-charts/jquery.flot.resize.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/flot-charts/jquery.flot.time.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/flot-charts/jquery.flot.tooltip.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/flot-charts/jquery.flot.selection.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/flot-charts/jquery.flot.crosshair.js');?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url('assets/libs/morris-js/morris.min.js') ?>"></script>
        <!-- Dashboar 1 init js-->
        <script src="<?php echo base_url('assets/js/pages/dashboard-1.init.js');?>"></script>

        <!-- App js-->
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        
        <script type="text/javascript">
            from_date = '<?php echo $this->uri->segment(3) ? $this->uri->segment(3) : null ?>';
            to_date = '<?php echo $this->uri->segment(4) ? $this->uri->segment(4) : null ?>';
            //    maxDate: new Date(),
        // MyLOVE
            $("#from_date").flatpickr({
             
                onChange: function(sd, ds, ins){
                    from_date = ds;
                    $("#to_date").flatpickr({
                        defaultDate: new Date(),
                        maxDate: new Date('<?php echo date("Y-m-d", strtotime("+7 day")) ?>'),
                        minDate: ds,
                        onChange: function(sd, ds, ins){
                            to_date = ds;
                            window.location = '<?php echo base_url("auth/userdashboardxyz") ?>/'+from_date+'/'+to_date;
                        }
                    });
                }
            });

            $("#dashboard-date").change(function(e){
                var slt_date = $(this).val();
                window.location.href="<?php echo base_url('auth/userdashboard/') ?>"+slt_date;
            });

            $(document).ready(function(){
                $("#to_date").flatpickr({
                    minDate: $("#from_date").val(),
                    maxDate: new Date('<?php echo date("Y-m-d", strtotime("+7 day")) ?>')
                });
                $("#clear_filter").click(function(){
                    window.location = "<?php echo base_url('auth/userdashboard') ?>";
                });
                init_pie_chart();

            });


            function init_pie_chart()
            {
                $.ajax({
                    url: '<?php echo base_url() ?>dashboard/get_pie_chart_for_all',
                    type: 'post',
                    data: {'start_date': from_date, 'end_date': to_date},
                    success: function(res){
                        // console.log(res);
                        try{
                            res = JSON.parse(res);
                            var sho =res.sho;
                            // alert(sho[0].label);
                            // die();
                            
                            var content = "<h2>All Partner's Deliveries</h2><table class='table table-bordered table-hover'> <thead class='thead-dark'><tr><th scope='col'>#</th><th scope='col'>Name</th> <th scope='col'>Total Deliveries</th></tr></thead>";
                              var cnt=1;
                               for(i=0; i<sho.length; i++){
                                   content += '<tr><th scope="row">'+  cnt + '</th>';
                                   content += '<th scope="row">'+  sho[i].label + '</th>';
                                   content += '<th scope="row">'+  sho[i].value + '</th></tr>';
                                   
                                   cnt=(cnt)+(1);
                               }
                               content += "</table>";

                               $('#here_table').append(content);
                            
                            
                            
                            // console.log('HEYY'+res.results);
                            Morris.Donut({
                            element: 'pieChart',
                            data: res.results.length > 10 ? res.results.slice(0,10) : res.results, 
                            labelColor: '#dee2e6',
                            colors: [
                                '#118565',  
                                '#348387',
                                '#819e29',
                                '#3c454d',
                                '#5a626a',
                                '#74797f',
                                '#8c8e91',
                                '#a6a8aa',
                                '#c0c2c5',
                                '#d4d4d5'
                              ],
                            
                            //data: res.results
                        });
                        }
                        catch{
                            console.log('err in initing');
                        }

                        // init_comp_chart();
                    },
                    error: function(err){
                        console.log('error in pie chart');
                    }
                });
            }

            function init_comp_chart()
            {
                $.ajax({
                    url: base_url+'dashboard/get_comp_chart',
                    type: 'post',
                    data: {'start_date': from_date, 'end_date': to_date},
                    success: function(res){
                        res = JSON.parse(res);
                        let orders = res.orders;
                        let bags = res.bags;
                        let days = res.days;
                        map_data_over_comp_chart(orders, bags, days);    
                    },
                    error: function(err){
                        console.log('comp chart network error');
                    }
                });
            }

            function map_data_over_comp_chart(o, b, d)
            {
                bag_array = [];
                order_array = [];
                complain_array = [];
                days_array = [];
                d.forEach( (day, di) => {
                    days_array.push([di, day]);
                    bf = b.find( bag => bag.c_date == day);
                    bag_array.push(bf ? [di, Number(bf.bag_counts)] : [di, 0]);
                    of = o.find( order => order.c_date == day);
                    order_array.push(of ? [di, Number(of.order_counts)] : [di, 0]);
                    //complain_array.push([di, Math.floor(Math.random() * 50) + 1]);
                    complain_array.push([di, 0]);
                    if((di+1) == d.length)
                    {
                        // console.log({'o':order_array, 'b':bag_array});
                        window.jQuery.Dashboard1.createCombineGraph("#sales-analytics", days_array, ["Complains", "Bags", "Deliveries"], [complain_array, bag_array, order_array]);
                    }
                });
            }
        </script>
        
    </body>
</html>