<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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
 <link href="<?php echo base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />          
 
 
 
        <style type="text/css">
            /*
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
            .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #00b6eb;
    border-color: #7e57c2;
}
 td, th {
         border: 1px solid #dddddd;
        }
             .columns {
    float: right!important;
    display: none;
}
.btn-group{
    margin-top: -10px;
    margin-bottom: 10px;

}
               .yellow {
  background-color: lightblue;
}
            .btn-danger {
    color: #fff;
    background-color: #197990 !important;
     border-color: white;
}
.badge {
    color: #72747b;
    font-size: 10.5px !important;
}
.updatebtn{
    background-color: black;
    color: white;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin-top: -32px;
} */





.select2-drop-active{
    margin-top: -25px;
}

.select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    /* border: 1px solid #aaa; */
    border-radius: 4px;
    height: 36px;
}


.select2-container--default .select2-results>.select2-results__options {
    max-height: 400px;
    overflow-y: auto;
}




  
 
        </style>
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header');?>        <!-- End Navigation Bar-->
       
       <!--======================SELECT BOX CODE START================================-->
       <?php
         //Assign default value of Active for every Emirate-Service pair in 2D array of PHP
        //   echo "<br>My Service Tracker<br>";
            foreach ($emirites_typ as $key => $value) {
                //to get the emirate out of $value array
                // foreach($value as $key1 => $value1){
                    // if($key1=='emirate_name'){
                        $emirate= $value;
                    // }
                // }
                //  echo "Emirate: ".$emirate."i am key :".$key."<br>";
                //  die();
               
                foreach ($service_typ as $key => $value) {
                    $service=$service_typ[$key]->area_name;
                    //echo "Service: ".$service."<br>";
                      /*echo 'i am service:'.$service.':i am key:'.$key.'<br>';*/
                    $service_tracker[$emirate][$service]='active';
                   // echo '<h1>i am tracker <pre>';
                  //   print_r($service_tracker);
                    // echo '<h1/>';
                }
                //echo "----------------------------------";
            }
            // echo "<h1> <br>My Service Tracker<br><pre>";
            // print_r($service_tracker);
            //  echo '<h1/>';
            // die();
            $emirates=json_encode($emirites_typ);
            // echo '<h1>I AM EMIRATES JSON ENCODE:<pre>'.$emirates.'</h1>';
            $services=json_encode($service_typ);
            // echo '<br><h1>I AM SERVICES JSON ENCODE:<pre>'.$services.'</h1>';
            $service_tracker=json_encode($service_tracker);
            //   echo '<br><h1>I AM TRACKER JSON ENCODE:<pre>'.$service_tracker.'</h1>';
        ?>
        <script type="text/javascript">//for unique emirate-service pairs
        //getting emirates from php
        // console.log('i am zzzzzzzz');
        // $("select[name='delivery_emirate[]']").html("emirate_options");
        var emirates = '<?php echo $emirates; ?>';
        emirates=JSON.parse(emirates);
        // console.log('i am getting emi at top::::'.emirates);
        
        //getting services from php
        var services = '<?php echo $services; ?>';
        services=JSON.parse(services);
        
        var service_tracker = '<?php echo $service_tracker; ?>';
        service_tracker=JSON.parse(service_tracker);
       
        //assgning php value to js array; afterwards, all unique emirate-service pair work will be in js only
        function changeSES(status='active',emirate='all',service='all'){
    		//changeSES=changeStatusOfEmirateServices
    		if(status=='active'){//change status to active STARTS
    			if(emirate=='all'){//all emirates STARTS
    				if(service=='all'){//all emirates, all services STARTS
    					for (let emirate in service_tracker){//getting all emirates
    					   if(service_tracker.hasOwnProperty(emirate)){
    					    	var emirate_services=service_tracker[emirate];
    					    	for (let service in emirate_services){//getting all services of all emirates
    								if(emirate_services.hasOwnProperty(service)){
    									service_tracker[emirate][service]='active';	//changing status to active	
    								}
    							}
    						}
    					}
    				}///all emirates, all services ENDS
    				else{//all emirates specific services STARTS
    					for (let emirate in service_tracker){//getting all emirates
    							service_tracker[emirate][service]='active';	//changing status to active	
    					}
    				}//all emirates specific services ENDS
    			}//all emirates ELSE
    			else{//specic emirate STARTS
    				if(service=='all'){//specific emirate, all services STARTS
    			    	var emirate_services=service_tracker[emirate];
    			    	for (let service in emirate_services){//getting all services of all emirates
    						if(emirate_services.hasOwnProperty(service)){
    							service_tracker[emirate][service]='active';	//changing status to active	
    						}
    					}
    				}//specific emirate, all services ENDS
    				else{//specific emirate specific service STARTS
    					service_tracker[emirate][service]='active';	//changing status to active	
    				}//specific emirate specific service ENDS
    			}//specic emirate ENDS
    		}//change status to active ENDS
    		else if(status=='inactive'){//change status to inactive STARTS
    			if(emirate=='all'){//all emirates STARTS
    				if(service=='all'){//all emirates, all services STARTS
    					for (let emirate in service_tracker){//getting all emirates
    					   if(service_tracker.hasOwnProperty(emirate)){
    					    	var emirate_services=service_tracker[emirate];
    					    	for (let service in emirate_services){//getting all services of all emirates
    								if(emirate_services.hasOwnProperty(service)){
    									service_tracker[emirate][service]='inactive';	//changing status to inactive	
    								}
    							}
    						}
    					}
    				}///all emirates, all services ENDS
    				else{//all emirates specific services STARTS
    					for (let emirate in service_tracker){//getting all emirates
    						service_tracker[emirate][service]='inactive';	//changing status to inactive	
    					}
    				}//all emirates specific services ENDS
    			}//all emirates ELSE
    			else{//specic emirate STARTS
    				if(service=='all'){//specific emirate, all services STARTS
    			    	var emirate_services=service_tracker[emirate];
    			    	for (let service in emirate_services){//getting all services of all emirates
    						if(emirate_services.hasOwnProperty(service)){
    							service_tracker[emirate][service]='inactive';	//changing status to inactive	
    						}
    					}
    				}//specific emirate, all services ENDS
    				else{//specific emirate specific service STARTS
    					service_tracker[emirate][service]='inactive';	//changing status to inactive	
    				}//specific emirate specific service ENDS
    			}//specic emirate ENDS
    		}//change status to inactive ENDS
    		else{
    			return false;
    		}
    	}//changeSES ENDS
    
    	function show_service_tracker(){
		for (let emirate in service_tracker){
		   if(service_tracker.hasOwnProperty(emirate)){
		  //  	console.log(emirate);//emirate name -> Dubai,  Sharjah ...
		  //  	console.log(service_tracker[emirate]);//services in emirate
		    	var emirate_services=service_tracker[emirate];
		    	for (let service in emirate_services){
					if(emirate_services.hasOwnProperty(service)){
				// 		console.log(service+" : "+emirate_services[service]);		
					}
				}
				console.log("_____________________________");
			}
		}
	}//show_service_tracker ENDS
	
   
        </script>
       <!--======================SELECT BOX CODE END==================================-->

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
                                <ol class="breadcrumb m-0">
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Team </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Outdoor Team</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Driver List</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Driver List</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                           <!--  <h4 class="header-title">Vender list</h4> -->
                          
                              <a href="#responsive" onclick="javascript:show_model(this)" flag="add" data-toggle="modal">
                                <button class="btn blue" style="color: #fff;background-color: #197990 !important;border-color: white;">Add New Drivers &nbsp;<i class="icon-plus"></i></button>
                            </a>
                           <!--   <input type="file" name="userfile"class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="" data-overlaycolor="#38414a" style="width: 250px;height: 35px;margin-left: 597px;">
                              
                          
                               <a href="#custom-modals" class="btn btn-danger waves-effect waves-light" data-animation="fadein" data-plugin="custommodal" data-overlaycolor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i>CSV Tips</a> -->
                                
                                   <br>
                                   <button style="margin-left: 167px;margin-top: -55px;color: #fff;background-color: #197990 !important;border-color: white;" class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" id="button" aria-controls="demo-custom-toolbar" disabled type="button"><span>Delete</span></button>

                                    <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <table  class="example table">

                                <thead class="thead-light">

                                <tr>
                                  <th class="table-checkbox"><input type="checkbox" class="group-checkable checkAll" ></th>
                                    <th data-field="id" data-sortable="true" data-formatter="">SR No</th>
                                    <th data-field="name" data-sortable="true">Full Name</th>
                                     <th data-field="" data-align="center" data-sortable="true" data-formatter="">Email</th>
                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Phone</th>
                               
                                    <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Address</th>
                                    <th data-field="qq" data-align="center" data-sortable="true" data-formatter="">Password</th>
                                    <th data-field="sta" data-align="center" data-sortable="true" data-formatter="">Status</th>
                                    <th data-field="salary" data-align="center" data-sortable="true" data-formatter="">Salary</th>
                                    <th data-field="contact" data-align="center" data-sortable="true" data-formatter="">Contract file</th>
                                    <th data-field="v" data-align="center" data-sortable="true" data-formatter="">Visa Card</th>
                                      <th data-field="v" data-align="center" data-sortable="true" data-formatter="">Visa Issue</th>
                                        <th data-field="v" data-align="center" data-sortable="true" data-formatter="">Visa Expiry</th>
                                    <th data-field="i" data-align="center" data-sortable="true" data-formatter="">ID Card</th>
                                    <th data-field="i" data-align="center" data-sortable="true" data-formatter="">ID Issue</th>
                                    <th data-field="i" data-align="center" data-sortable="true" data-formatter="">ID Expiry</th>
                                    <th data-field="l" data-align="center" data-sortable="true" data-formatter="">License Card</th>
                                    <th data-field="l" data-align="center" data-sortable="true" data-formatter="">License Issue</th>
                                    <th data-field="l" data-align="center" data-sortable="true" data-formatter="">License Expiry</th>
                                    
                                    <th data-field="o" data-align="center" data-sortable="true" data-formatter="">Other Card</th>
                                        <th data-field="o" data-align="center" data-sortable="true" data-formatter="">Other Issue</th>
                                            <th data-field="o" data-align="center" data-sortable="true" data-formatter="">Other Expiry</th>
                                    <th style="min-width: 300px" data-field="s" data-align="center" data-sortable="true" data-formatter="">Assigned Slots[emirate,area,slot]</th>
                                   
                                     <th data-field="Action" data-align="center" data-sortable="true" data-formatter="">Action</th>
                                    

                                </tr>
                                </thead>

                                <tbody>
                               <?php if(!empty($drivers['records'])){
                                $count=0; foreach ($drivers['records'] as $key => $driver) {?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" value="<?php echo $driver->id;?>" / id="" /  name="checkbox"></td>
                                            <td ><?php echo $key+1;?></td>
                                            <td ><?php echo $driver->full_name;?></td>
                                            <td ><?php echo $driver->email;?></td>
                                            <td ><?php echo $driver->phone;?></td>
                                            <td style="min-width:300px;" ><?php echo $driver->address;?></td>
                                            <td ><?php echo $driver->Password_partner;?></td>
                                            
                                            <td ><?php echo !empty($driver->login_date) ? 'active' : 'inactive' ?></td>
                                            
                                            <td ><?php echo $driver->salary;?></td>
                                            <td ><?php if($driver->contract_file!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo base_url($driver->contract_file) ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                           
                                            
                                            <td ><?php if($driver->visa_card!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo base_url($driver->visa_card) ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                            <td ><?php echo $driver->visa_issue;?></td>
                                            <td ><?php echo $driver->visa_exp;?></td>
                                            
                                             <td ><?php if($driver->id_card!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo base_url($driver->id_card) ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                            <td ><?php echo $driver->id_issue;?></td>
                                            <td ><?php echo $driver->id_exp;?></td>
                                            
                                             <td ><?php if($driver->license_card!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo base_url($driver->license_card) ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                            <td ><?php echo $driver->license_issue;?></td>
                                            <td ><?php echo $driver->license_exp;?></td>


                                            <td ><?php if($driver->other_card!=''){ ?>
                                             <a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="<?php echo base_url($driver->other_card) ?>" target="_blank">Available</a>
                                            <?php }else{ ?>
                                             <p class="red">Not Available</p>
                                            <?php } ?></td>
                                            <td ><?php echo $driver->other_issue;?></td>
                                           <td ><?php echo $driver->other_exp;?></td>
                                           
                                           
                                            
                                           










                                            <td >
                                            <?php foreach($driver_Sch as $kaye2 => $val2) {?>
                                              <?php if($driver->id == $val2->DRIVER_ID ){  ?>
                                              <?php echo '<span style="color:#2AB1C9">[</span>'.$val2->emirate_name.','.$val2->area_name.','.$val2->name.'<span style="color:#2AB1C9">]</span>,&nbsp'; ?>
                                            <?php }}?>
                                            </td>

                                            
                                         
                                           
                                          
                                            <td>
                                            <a class="" title="Edit" data-toggle="modal" onclick="javascript:show_model(this)" href="#responsive" flag="edit"  pk="<?php echo $driver->id?>">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                                
                                                <!-- <button  class=""  title="delete"  onclick="delete_driver(<?php echo $driver->id ?>)"  >-->
                                                <!--    <i class="mdi mdi-delete-outline"></i>-->
                                                <!--</button>-->
                                                <!-- <a href="#" class="" title="Email" onclick="sendMail(<?php echo $driver->id; ?>)">
                                                    <i class="mdi mdi-email"></i>
                                                </a> -->
                                               
                                            </td>

                                            
                                           </tr>
                                  <?php }} ?>

                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- end container -->
        </div>
  <div id="responsive" class="modal fade "  aria-hidden="true" data-keyboard="false" data-backdrop="static">>
                <div class="modal-dialog" style="width: 500px">
                    <div class="modal-content" style="min-width: 150%;">
                        <div class="modal-header" style="background: linear-gradient(to right, #004C5D 0%, #00BAF1 100%);">
                            <button type="button" onclick="close_model()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="mod_title" style="color: white;">Add New Driver</h4>
                        </div>

                        <div class="modal-body " >

                            <div id="error_container" class="alert " style="display: none">
                                <button class="close" aria-hidden="true" data-dismiss="alert_" onclick="hide_msg(this)" type="button"></button>
                                <p id="error_msg"></p>
                            </div>

                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form name="form" id="add_vendor_form" action="<?php echo base_url('Driver/save_driver') ?>" method="post" class="horizontal-form" >
                                    <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">

                                     <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Full Name<span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Email<span class="required">*</span></label>
                                                <input type="text" name="email" id="email" class="form-control" required>
                                                <span id="mailcheckmsg" style="color: red"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Phone<span class="required">*</span></label>
                                                <input type="text" name="phone" placeholder="971-123456789" id="phone" class="form-control" required>
                                                <span id="phonecheckmsg" style="color: red"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group input-group-sm">
                                                <label class="control-label">Address</label>
                                                <input type="text" name="address" id="address" class="form-control">
                                            </div>
                                            
                                        </div>
                                        
                            <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="control-label">Contract</label>
                                <input type="file" name="contract_image" id="contract_image" class="form-control">
                                <span id="contract_img_msg" style="color: red"></span>
                                <img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_contract_image">
                            <span id="contract_span"></span>
                            </div>
                           
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm">
                                <label class="control-label">Salary<span style="color: red;">*</span></label>
                                <input type="number" name="salary" id="salary" class="form-control" required>
                            </div>
                        </div>
                                        
                                        <!--New Edits-->
                                         
                     
                        <div class="col-md-4">
                            <div class="form-group input-group-sm">
                                <label class="control-label">License Card</label>
                                <input type="file" name="license_image" id="license_image" class="form-control">
                                <span id="license_img_msg" style="color: red"></span>
                                <img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_license_image">
                            <span id="license_span"></span>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Expiry<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d'); ?>" name="license_exp" id="license_exp" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm  date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Issue<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d',strtotime("-1 days")); ?>" name="license_issue" id="license_issue" class="form-control" required>
                                <span style="color: red;" id="license_date"></span>
                            </div>
                        </div>
                  
                    
                        <div class="col-md-4">
                            <div class="form-group input-group-sm">
                                <label class="control-label">Visa Card</label>
                                <input type="file" name="visa_image" id="visa_image" class="form-control">
                                <span id="visa_img_msg" style="color: red"></span>
                                <img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_visa_image">
                                 <span id="visa_span"></span>
                            </div>
                           
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Expiry<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d'); ?>" name="visa_exp" id="visa_exp" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Issue<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d',strtotime("-1 days")); ?>" name="visa_issue" id="visa_issue" class="form-control" required>
                                <span style="color: red;" id="visa_date"></span>
                            </div>
                        </div>
                    
                    
                        <div class="col-md-4">
                            <div class="form-group input-group-sm">
                                <label class="control-label">ID Card</label>
                                <input type="file" name="id_card_image" id="id_card_image" class="form-control">
                                <span id="id_card_img_msg" style="color: red"></span>
                                <img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_id_card_image">
                           <span id="id_span"></span>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Expiry<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d'); ?>" name="id_card_exp" id="id_card_exp" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Issue<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d',strtotime("-1 days")); ?>" name="id_card_issue" id="id_card_issue" class="form-control" required>
                                <span style="color: red;" id="id_card_date"></span>

                            </div>
                        </div>
                    
                    
                    
                        <div class="col-md-4">
                            <div class="form-group input-group-sm">
                                <label class="control-label">Other Card</label>
                                <input type="file" name="other_image" id="other_image" class="form-control">
                                <span id="other_img_msg" style="color: red"></span>
                                <img style="max-width: 40px;max-height: 40px;" src="" alt="" id="s_other_image">
                                 <span id="other_span"></span>
                            </div>
                           
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Expiry<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d'); ?>" name="other_exp" id="other_exp" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group input-group-sm date-picker input-daterange" data-date="<?= date('Y-m-d'); ?>">
                                <label class="control-label">Date Of Issue<span style="color: red;">*</span></label>
                                <input type="text" value="<?= date('Y-m-d',strtotime("-1 days")); ?>" name="other_issue" id="other_issue" class="form-control" required>
                                <span style="color: red;" id="other_date"></span>

                            </div>
                        </div>
                   
                    
                      
                    
                                        <!--New Edits ends-->
                                         <div class="col-sm-8">
                                        <div class="input-group" style="margin-top: 22px;">
                                            <input type="text" name="s_pass" placeholder="Password Here" class="form-control"  id="s_pass" required>&nbsp;&nbsp;
                                        <span class="input-group-btn">
                                        <button style="background-color:black;" class="btn btn-default" type="button" onclick="gen_password()"><span class="glyphicon glyphicon-lock" aria-hidden="true">
                                        </span> Generate </button>
                                        </span>
                                        </div>
                                        </div>
                                     </div>     <!--End Row -->
                                        <!--Schedule Driver's Shift-->
                                          <h4><br>Schedule Driver's Shift<br></h4>
                                <div class="delivery_firstbox">
                                    <div class="row" id="delivery_row_block_0">
                                        <div class="col-sm-4">
                                            <label for="emirate">Emirate With Time *</label>
                                            <select name="delivery_emirate[]" id="emirate" class="form-control" required></select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="service_type">Select Area *</label>
                                            <select name="delivery_service_type[]" id="service_type" class="form-control search_option" required></select>
                                        </div>
                                        <div class="col-sm-2">
                                        
                                             <input type="hidden" name="delivHid[]" value="" class="form-control"/>
                                        </div>
                                      
                                        <div class="col-sm-2" id="btn_box_0">
                                            <button id="add_delivery_row_btn_0" onclick="add_new_deliver_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button id="remove_delivery_row_btn_0" onclick="remove_delivery_row(0)" type="button" style="background: black;color: white;margin-top: 26px; " class="btn green" title="REMOVE"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                        </div>
                                       
                                    </div>
                                    <hr>
                                </div>
                                  <div class="delivery_pricing-box"></div>
                                        
                                       <!--Schedule Ends-->
                                  

                               
                            </div>

                        </div>

                        <div class="modal-footer">
                             <button id="save_vendor_btn" type="button" onclick="save_vendor()" style="background: black;color: white;" class="btn green">Save</button>
                              <button id="add_delivery_row_btn_x" onclick="add_new_deliver_row(0)" type="button" style="display: none; background: black;color: white;" class="btn green" title="ADD">ADD New Slot</button>
                              &nbsp; &nbsp;              
                             <button id="edit_vendor_btn" style="display: none; background: black;color: white;" onclick="update_vendor()" type="button" class="btn green updatebtn" style="background: black;color: white;">Update</button>
                            <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>

                           
                        </div>
                         </form>
                    </div>
                </div>
                
              
            </div>
              
                 <div id="custom-modals" class="modal-demo" style="padding: 35px;">
                      <blockquote class="hero">
                                        <p> Click <a href="<?php echo base_url(); ?>download/DriverCSVFormate.csv">HERE</a> to Download Driver CSV File Format!</p>
                                    </blockquote>

                                    <ul class="list-unstyled  margin-top-10 margin-bottom-10">
                                        <li><i class="icon-ok"></i> Driver Full Name ( Optional: Max. 90 characters )</li>
                                        <li><i class="icon-ok"></i> Driver Phone( Required: Max. 12 characters with country code )</li>
                                        <li><i class="icon-ok"></i> Driver Address ( Optional ) </li>
                                        <li><i class="icon-ok"></i> Driver Email ( Optional )</li>
                                    </ul>
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

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- shan -->
         <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--from below-->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
         
        <!-- Sweet alert init js-->
        <script src="<?php echo base_url('assets/js/pages/sweet-alerts.init.js');?>"></script>
           <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>
         <script src="<?php echo base_url('assets/libs/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.bootstrap4.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.responsive.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/responsive.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.buttons.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.html5.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.flash.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/buttons.print.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.keyTable.min.js');?>"></script>
        <script src="<?php echo base_url('assets/libs/datatables/dataTables.select.min.js');?>"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/flatpickr/flatpickr.min.js"></script>
        

        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <!-- App js-->
        
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        
              <script src="<?php echo base_url() ?>assets/libs/select2/select2.min.js"></script> 
        <script type="text/javascript">
        
        // START SCHEDULE CODE
        // Again Enable select to get complete data of Schedule Drivers shift
            $('#add_vendor_form').submit(function() {
                $('select').removeAttr('disabled');
            });
        //this script is related to emirates+services=service_tracker (unique pairs) (updating)
    
    function dynamicEmirateOptions(selector="select[name='delivery_emirate[]']"){
        // console.log('i am dynamic emi option function');
		//producing emirate options dynamically
		var emirate_options='<option value="">---Select---</option>';
// 		console.log('i am emirate:'+emirate);
		for (let emirate in emirates){
		  //  console.log('Loop'+emirate);
			emirate_options+="<option value="+emirate+">"+emirates[emirate]+"</option>";
		
		}
		$(selector).html('');
		$(selector).append(emirate_options);
	}
	

	function dynamicServiceOptions(selector="select[name='delivery_service_type[]']"){
		//producing conditional services options dynamically
// 		console.log('hello i am dynamic service option creator');
		var service_options='<option value="">---Select---</option>';
		for (let service in services){
			service_options+="<option value="+services[service].area_id+">"+services[service].area_name+"</option>";
		}
		$(selector).html('');
		$(selector).append(service_options);
	}
	function dynamicConServiceOptions(emirate,selector="select[name='delivery_service_type[]']"){
		//producing conditional services options dynamically
		var service_options='<option value="">---Select---</option>';
// 		console.log('the services are:'+services);
		for (let service in services){
			service_name=services[service].area_name;
			if(service_tracker[emirate][service_name]=='inactive'){ //dadag style='color:red'
				service_options+="<option value="+services[service].area_id+" disabled  data-class='color: red;' >"+services[service].area_name+"</option>";
			}else{
				service_options+="<option value="+services[service].area_id+">"+services[service].area_name+"</option>";
			}
		}
		
// 		console.log('service options areee:'+service_options);
		$(selector).html('');
		$(selector).append(service_options);
	}
	
    
	//for delivery
	dynamicEmirateOptions();
	dynamicServiceOptions();
	
	
    $('body').on('click', 'select[name="delivery_emirate[]"]', function() {
        
        
        
        
        
        var emirate_selected= $(this).find('option:selected').text();
        var id=$(this).parent().parent().attr('id');
        
         if($("#mod_title").text() == "Edit Driver"){
         $('#'+id+' >div>select[name="delivery_service_type[]"]').attr("disabled", false);
        $('#'+id+' >div>select[name="delivery_service_type[]"]').css('background-color', '#36404a');
         }
        
        ConServiceSelector="#"+id+">div>select[name='delivery_service_type[]']";
       
    //   alert('emirate_selected'+emirate_selected);
    //   alert('ConServiceSelector'+ConServiceSelector);
        dynamicConServiceOptions(emirate_selected,ConServiceSelector);
        
        
        
        
        
    });
    
    
    
    	
    $('body').on('change', 'select[name="delivery_service_type[]"]', function() {
        
    //  console.log('hi tayyab');
             if($("#mod_title").text() == "Edit Driver"){
                 
                 
           var id=$(this).parent().parent().attr('id');      
                 
            // ConServiceSelector="#"+id+">div>select[name='delivery_service_type[]']";
              var emi_2=$("#"+id+">div>select[name='delivery_emirate[]']>option:selected").text();
            //   dynamicConServiceOptions(emi_2,ConServiceSelector);
                 
    //              console.log('i in');delivery_emirate[]
        var serveicetypeselectedis=$(this).find('option:selected').text();
            //   console.log('Ayesha serveicetypeselectedis:'+serveicetypeselectedis);
               
               
        
        // console.log("id is:"+id);
      
        // console.log('Ayesha emirate selected is with method 2:'+emi_2);
        
    
    var emirate= $('#'+id+' >div>select[name="delivery_emirate[]"]>option:selected').text();
    var service= $('#'+id+' >div>select[name="delivery_service_type[]"]>option:selected').text();
     var emirateval= $('#'+id+' >div>select[name="delivery_emirate[]"]>option:selected').val();
    
    // console.log('this is from lasttt: emi'+emirate);
    // console.log('this is from lasttt: ser'+service);
    // console.log('emi val is'+emirateval);
    
    
    var emirate_selector="#"+id+">div>select[name='delivery_emirate[]']";
        dynamicEmirateOptions(emirate_selector);
        var service_selector="#"+id+" >div>select[name='delivery_service_type[]]'";
        dynamicServiceOptions(service_selector); 
  changeSES('inactive',emirate,service);
  
  $('#'+id+' >div>select[name="delivery_emirate[]"]').val(emirateval);
//   console.log($('#'+id+' >div>select[name="delivery_emirate[]"]>option:selected').text());
  
      $('#'+id+' >div>select[name="delivery_service_type[]"]').attr("disabled", true);
        $('#'+id+' >div>select[name="delivery_service_type[]"]').css('background-color', 'silver');
   
        }
        
    });
    
    
    var deliv_row_counter=0;
function add_new_deliver_row(id){
    
    //getting values of emirates and service selected
    var emirate= $('#delivery_row_block_'+deliv_row_counter+' >div>select[name="delivery_emirate[]"]>option:selected').text();
    var service= $('#delivery_row_block_'+deliv_row_counter+' >div>select[name="delivery_service_type[]"]>option:selected').text();

    // console.log('i am deliv counter JUst start  value:'+deliv_row_counter);
    if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //producing new row
      //  id = parseInt(id) + 1;
       
          deliv_row_counter=deliv_row_counter+1;
    //  console.log('i am deliv counter after add a row:'+id+' and i am counter value:'+deliv_row_counter);
        var delivery_row = '<div class="row del_when_open_new" id="delivery_row_block_'+deliv_row_counter+'"><div class="col-sm-4"><label for="emirate">Emirate With Time *</label><select name="delivery_emirate[]" id="emirate" class="form-control" required "></select></div><div class="col-sm-4"><label for="service_type">Select Area *</label><select name="delivery_service_type[]" id="service_type" class="form-control search_option_area" required></select></div><div class="col-sm-2"><input type="hidden" name="delivHid[]" value="" class="form-control" /></div><div class="col-sm-2" id="btn_box_0"><button id="remove_delivery_row_btn_'+deliv_row_counter+'" onclick="remove_delivery_row('+deliv_row_counter+')" type="button" style="background: black;color: white;margin-top: 26px; " class="btn green" title="REMOVE"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></div></div><hr>';
        $(".delivery_pricing-box").append(delivery_row);
        var emirate_selector="#delivery_row_block_"+deliv_row_counter+">div>select[name='delivery_emirate[]']";
        dynamicEmirateOptions(emirate_selector);
        var service_selector="#delivery_row_block_"+deliv_row_counter+" >div>select[name='delivery_service_type[]]'";
        dynamicServiceOptions(service_selector);  
        
        //getting original id back
        id = parseInt(deliv_row_counter) - 1;
        
        //making emirate and service uneditable after new row appended
        
        if($("#mod_title").text() != "Edit Driver"){
         $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]').attr("disabled", true);
        $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]').css('background-color', 'silver');
        
        $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').attr("disabled", true);
        $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').css('background-color', 'silver');
        }else{
            $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').attr("disabled", true);
        $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').css('background-color', 'silver');
         $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').attr("title", "Click on 'Emirate with Time' to unblock.");
        }
        
        changeSES('inactive',emirate,service);
        
        //change icon only after current row processed successfully
        // $("#add_delivery_row_btn_"+id).hide();
         $("#remove_delivery_row_btn_"+id+1).show();
         
          must_run();
    }else{
        
        swal("Please Select Emirate With Time and Area Carefully", "", "warning");
       
    }
}//function ends
function remove_delivery_row(id) {
    
    if(id !=deliv_row_counter){
        // console.log('i am id not match counter is:'+deliv_row_counter);
        
    }else{
        deliv_row_counter=deliv_row_counter-1;
    }
    //  console.log('i am deliv counter after del a row:'+id+' and i am counter value:'+deliv_row_counter);
    //getting values of emirates and service selected (updating)
   
    var emirate= $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]>option:selected').text();
    
    var service= $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]>option:selected').text();
     if(emirate!='---Select---' && service!='' && service!='---Select---'){
                changeSES('active',emirate,service);
                show_service_tracker();
        
    }
    $("#delivery_row_block_"+id).remove();
   
}


        // END ABOVE SELECT SCHEDULE CODE
  var tmp = [];
   $(document).ready(function () {

  
            <?php if (!empty($this->session->flashdata('error'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('error') ?>';
                swal(msgg, "", "error");
            <?php } ?>

            <?php if (!empty($this->session->flashdata('success'))) { ?>
                var msgg = '<?php echo $this->session->flashdata('success') ?>';
                swal(msgg, "", "success");
            <?php } ?>

    $(document).on('change', "input[name='checkbox']", function() {
    var checked = $(this).val();
    if ($(this).is(':checked')) {
      tmp.push(checked);
    }else{
    tmp.splice($.inArray(checked, tmp),1);
    }

    $("#button").prop("disabled", tmp.length == 0);
  });

  $('#button').on('click', function () {
      
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    delAll();
  }
})
     
          
     
  });
  
});


function delAll()
{
    
    $.ajax({
            url:'<?php echo base_url("Driver/del") ?>',
            method:'post',
            data:{ids: tmp.join()},
            success:function(res)
            {
               swal.fire("Deleted", "", "success");
               $("tbody").find("input[type='checkbox']:checked").each(function(){
                $(this).parent().parent().remove();
               });
            },
            error:function(err)
            {
                console.log('not Delete');
            }
        });
}
 $(document).on('change', '.checkAll', function(){
    tmp = [];
       $this = $(this);
        $("tbody").find("input[type='checkbox']").each(function(){
             
            if($this.prop('checked'))
            {
              tmp.push($(this).val());
              $(this).prop('checked', true);
              $(this).parent().parent().addClass('yellow');
            }
            else
            {
                $(this).prop('checked', false);
                $(this).parent().parent().removeClass('yellow');
            }
        });

        if(tmp.length > 0)
        {
            $("#button").prop("disabled", false);
        }
        else
            $("#button").prop("disabled", true);
    });

</script>
        <script type="text/javascript">
        
           $(document).ready(function () {
               onetry();
                     $('input[name="checkbox"]').on('change', function() {
  $(this).closest('tr').toggleClass('yellow', $(this).is(':checked'));
});
              $('#abc').on('click', function () {
               swal("Delete", "Successfully Delete", "success");
              });

         
               $('.example').DataTable( {
                   "scrollX": true,
                    dom: 'Blifrtip',
                    buttons: [
           
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
            ],
            "lengthMenu": [[ 10, 25, 50, 75, 100,-1], [ 10, 25, 50, 75, 100,"All"]]
                });
                
                
                
                
                 $("#license_exp").flatpickr({
                     defaultDate: new Date(),
                     minDate: new Date(),
            
                 });
                 
                 
                 $("#license_issue").flatpickr({
                     defaultDate: new Date(),
                     
            
                 });
                 $("#visa_exp").flatpickr({
                     defaultDate: new Date(),
                     minDate: new Date(),
            
                 });
                 $("#visa_issue").flatpickr({
                     defaultDate: new Date(),
                     
            
                 });
                 $("#id_card_exp").flatpickr({
                     defaultDate: new Date(),
                     minDate: new Date(),
            
                 });
                 $("#id_card_issue").flatpickr({
                     defaultDate: new Date(),
                     
            
                 });
                 $("#other_exp").flatpickr({
                     defaultDate: new Date(),
                     minDate: new Date(),
            
                 });
                 $("#other_issue").flatpickr({
                     defaultDate: new Date(),
                     
            
                 });
                 
                 
                
                
                
                });
        </script>
       
<script type="text/javascript">

     contract ='';
    license ='';
    visa ='';
    id_card ='';
    other ='';
  function gen_password()
{
    $("input[name='s_pass']").val(Math.random().toString(36).slice(-8));
}

// function delete_driver(id){
//     console.log('i want to remove:'+id);
// }
 function show_model(ele){
        hide_error();
        var flag = $(ele).attr('flag');
        //reset form values
         $('select').removeAttr('disabled');
     //  $('.del_when_open_new').remove();
        $('#add_vendor_form')[0].reset();
        $("#email").prop("readonly", false);
        $("#phone").prop("readonly", false);

        if(flag == 'add'){
            //changed model title
            $("#mod_title").html('Add New Driver');
            
            //change model button
            $("#edit_vendor_btn").hide();
            $("#save_vendor_btn").show();
            $("#remove_delivery_row_btn_0").hide();
              $("#add_delivery_row_btn_x").hide();
        }

        if(flag == 'edit'){
            //changed model title
            $("#mod_title").html('Edit Driver');
            //change model button
            $("#edit_vendor_btn").show();
            $("#save_vendor_btn").hide();
            $("#remove_delivery_row_btn_0").show();
            
             $("#add_delivery_row_btn_x").show();
            var vendor_id = $(ele).attr('pk');
            
             var deliv_row_counter=0;


        //    $("#email").prop("readonly", true);
         //   $("#phone").prop("readonly", true);
        
            get_vendor_by_id(vendor_id);

        }

    }

    function close_model(){
        $("#responsive").removeClass('in');
        $("#responsive").hide();
        $("#responsive").attr("aria-hidden","true");
        hide_error();
        location.reload();
    }
    
    
    

    function show_msg(msg, class_){
        $("#error_container").removeClass('alert-success');
        $("#error_container").removeClass('alert-danger');
        $("#error_msg").html(msg);
        $("#error_container").addClass(class_);
        $("#error_container").show();
    }

    function hide_error(){
        $("#error_msg").html('');
        $("#error_container").hide();
    }

    //UPDATE vendor METHODS
    function get_vendor_by_id(id){
        hide_error();
         $('select').removeAttr('disabled');
         $('form')[0].reset();

        var url = "<?php echo base_url(); ?>"+"Driver/get_vendor_by_id";
        $fields = {'vendor_id':id};
        $.post(url, $fields, function(response){
            if(response.success) {
                var vendor = response.vendor[0];
                $("#name").val(vendor.full_name);
                $("#email").val(vendor.email);
                   oldEmail = vendor.email;
                $("#phone").val(vendor.phone);
                $("#address").val(vendor.address);
                $("#s_pass").val(vendor.Password_partner);
                $("#vendor_id").val(vendor.id);
                $("#salary").val(vendor.salary);
                
                // console.log(vendor.license_card);
                if(vendor.license_card !=''){
                    $("#license_exp").val(vendor.license_exp);
                    $("#license_issue").val(vendor.license_issue);
                     $("#license_span").html('<br><a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="'+vendor.license_card+'" target="_blank">Available</a>');
                       $('#s_license_image').attr('src', vendor.license_card);
                }else{
                     $("#license_span").html('&nbsp;Not Available');
                     $("#license_span").addClass('red');
                }
                
                if(vendor.visa_card !=''){
                    $("#visa_exp").val(vendor.visa_exp);
                    $("#visa_issue").val(vendor.visa_issue);
                    $("#visa_span").html('<br><a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="'+vendor.visa_card+'" target="_blank">Available</a>');
                    $('#s_visa_image').attr('src', vendor.visa_card);
                }else{
                     $("#visa_span").html('&nbsp;Not Available');
                     $("#visa_span").addClass('red');
                }
                
                if(vendor.other_card !=''){
                     $("#other_exp").val(vendor.other_exp);
                $("#other_issue").val(vendor.other_issue);
                $("#other_span").html('<br><a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="'+vendor.other_card+'" target="_blank">Available</a>');
               $('#s_other_image').attr('src', vendor.other_card);
                }else{
                     $("#other_span").html('&nbsp;Not Available');
                     $("#other_span").addClass('red');
                }
                
                
                 if(vendor.id_card !=''){
                    //  console.log(vendor.id_card);
                  $("#id_card_exp").val(vendor.id_exp);
                 $("#id_card_issue").val(vendor.id_issue);
                $("#id_span").html('<br><a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="'+vendor.id_card+'" target="_blank">Available</a>');
               $('#s_id_card_image').attr('src', vendor.id_card);
                }else{
                    // console.log(vendor.id_card);
                     $("#id_span").html('&nbsp;Not Available');
                     $("#id_span").addClass('red');
                }
                
                if(vendor.contract_file !=''){
                 
                $("#contract_span").html('<br><a class="big-link green" data-animation="fade" data-reveal-id="Carpet" href="'+vendor.contract_file+'" target="_blank">Available</a>');
                 $('#s_contract_image').attr('src', vendor.contract_file);
                }else{
                     $("#contract_span").html('&nbsp;Not Available');
                     $("#contract_span").addClass('red');
                }
                
               
                
                
              
                
                
               
                
                
                
                 //  //Schedule   
            for(let i = 0; i < response.schedule.length; i++){
                
                let childArray = response.schedule[i];
                // console.log(childArray);
                 if(i>0){
                     var idd=childArray.id;
                     var jj=i-1;
                    //  console.log('i am jj:'+jj);
                        add_new_deliver_row(jj);
                    }
            //  console.log('i am counter of i :'+i);
            $('#delivery_row_block_'+i+' >div>select[name="delivery_emirate[]"]').val(childArray.emi_slot_id);
           
                        
                            var emirate_selected= $("#delivery_row_block_"+i+">div>select[name='delivery_emirate[]']>option:selected").text();
                            var temp_id='delivery_row_block_'+i;
                             ConServiceSelector="#"+temp_id+">div>select[name='delivery_service_type[]']";
                             dynamicConServiceOptions(emirate_selected,ConServiceSelector);
     
           
            $('#delivery_row_block_'+i+' >div>select[name="delivery_service_type[]"]').val(childArray.area_id);
             $('#delivery_row_block_'+i+' >div>input[name="delivHid[]"]').val(childArray.id);
            
        $("#remove_delivery_row_btn_"+i).attr("onclick","delete_rows_('"+i+"','d', '"+childArray.id+"')");
       //document.getElementById("remove_delivery_row_btn_"+i+").attribute("onclick","new_function_name()");
          
                  
            
         }
            }
        },'json');
    }

    function update_vendor(){
        hide_error();
        
        
        // var v_id=$("#vendor_id");
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var Password_partner=$("#s_pass").val();
        var vendor_id = $("#vendor_id").val();
        var emirates =$('#emirate').val();
        var services =$('#service_type').val();
        
         var salary = $("#salary").val();
        var l_issue= $("#license_issue").val();
        var l_exp = $("#license_exp").val();
        var v_issue= $("#visa_issue").val();
        var v_exp= $("#visa_exp").val();
        var i_issue=$("#id_card_issue").val();
        var i_exp=$("#id_card_exp").val();
        var o_issue=$("#other_issue").val();
        var o_exp=$("#other_exp").val();
        
        
          
        
        //FIRST CHECK EMPTY VALIDATIONS


    $('select').removeAttr('disabled');

  

    var valid_check=1;
    
    
    //DELIVERY EMPTY FIELD CHECK
  
     
       var deliv_emi_array = new Array();
       var deliv_ser_array = new Array();
       
        
            
        var deliv_emi_array = $("select[name='delivery_emirate[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<deliv_emi_array.length;i++){
                if(deliv_emi_array[i] === ""){
                   valid_check=0;
                    }
            }
            
         var deliv_ser_array = $("select[name='delivery_service_type[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<deliv_ser_array.length;i++){
                if(deliv_ser_array[i] === ""){
                   valid_check=0;
                    }
            }
            
            var deliv_hid_array = $("select[name='delivHid[]']")
              .map(function(){return $(this).val();}).get();
              
            
   
    
       var formData = new FormData($('form')[0]);
    //     var fd = new FormData();
    // var file_data = $('input[type="file"]')[0].files; // for multiple files
    // for(var i = 0;i<file_data.length;i++){
    //     fd.append("file_"+i, file_data[i]);
    // }
    //var other_data = $('form').serializeArray();
   
        formData.append('visa',visa);
        formData.append('license',license);
        formData.append('other',other);
        formData.append('id_card',id_card);
        formData.append('contract',contract);
       

       
        if(name && email && vendor_id && valid_check == 1 && address && phone && s_pass && salary && deliv_emi_array && deliv_ser_array ){
           
        
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "<?php echo base_url(); ?>"+"Driver/update_vendor",
            data:formData,
            processData: false,
            contentType: false,

            success: function (data) {
            //   console.log(data);
              var msg = '<strong>Success!</strong> Vendor updated.';
                    show_msg(msg, 'alert-success');
                    swal.fire("", "Data Update Successfully!", "success");
                    location.reload();
            }
          });
        
        }else{
            var error = '<strong>Error!</strong> Fill All Required Fields.';
            show_msg(error, 'alert-danger');
            swal.fire("Error", "Fill All Required Fields", "error");
        }
        
       


    }

    function update_vendor_status(ele){
        hide_error();
         var status = $(ele).attr('status');
      var st = "";
      if(status==0){
        alert("You are going to suspend..");
      }else{
        alert("You are going to activate..");
      }

if (window.confirm('Are you sure to continue?'))
{
     var status = $(ele).attr('status');
        var vendor_id = $(ele).attr("vendor_id");

        var url = "<?php echo base_url(); ?>"+"vendor/update_vendor_status";

        if(status && vendor_id){
            $fields = {'status':status, 'vendor_id':vendor_id};
            $.post(url, $fields, function(response){
                if(response.success){
                    var msg = '<strong>Success!</strong> Vendor updated.';
                    show_msg(msg, 'alert-success');
                    location.reload();
                }else{
                    show_msg('<strong>Error!</strong> Not Saved try latter.', 'alert-danger');
                }
            },'json');
        }else{
            var error = '<strong>Error!</strong> Vendor not given.';
            show_msg(error, 'alert-danger');
        }

}
else
{
    // They clicked no
}
       
    }

function delete_rows_(rid,id1,id2){
    var rid=rid;
    var aci=id1;
    var id=id2;
    
    Swal.fire({
                         title: 'Are you sure?',
                         html: 'Record will delete permanently',
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#005266',
                         cancelButtonColor: '#B22E06',
                         confirmButtonText: 'Yes, Delete it!'
                      }).then((result) => {
                         if (result.value) {
                            
                           
                            Swal.fire({title:"Deleted!",
                            text:"",
                            type:"success",
                            confirmButtonClass:"btn btn-confirm mt-2"}).then((result)=>{
                                if(result.value){
                                    
                                     $.ajax({
                                        type: 'post',
                                        dataTye: 'json',
                                        data:{id:id,aci:aci},
                    url: "<?php echo base_url('Driver/deli') ?>",
                  success: function (data) {
                    //   console.log(aci);
                      
                      if(aci =='d'){
                          remove_delivery_row(rid)
                      }
                   
                     
           
                   }
               });
                                    

                                }
                            })

                            //...//
                            
                          
                          }
                      })
    
}


    //SAVE vendor METHODS
    function save_vendor(){
        hide_error();

        //var num_regex = /^\$?[0-9]+(\.[0-9][0-9])?$/;
       // var num_regex = /^([0-9]{3})\-\$?[0-9]+(\.[0-9][0-9])?$/;
        var name = $("#name").val().trim();
        var email = $("#email").val().trim();
        var phone = $("#phone").val();
        var address = $("#address").val().trim();
        
        var salary = $("#salary").val();
        var l_issue= $("#license_issue").val();
        var l_exp = $("#license_exp").val();
        var v_issue= $("#visa_issue").val();
        var v_exp= $("#visa_exp").val();
        var i_issue=$("#id_card_issue").val();
        var i_exp=$("#id_card_exp").val();
        var o_issue=$("#other_issue").val();
        var o_exp=$("#other_exp").val();
        
        var deliv_emi_array = new Array();
      var deliv_ser_array = new Array();
    
     var s_pass=$("#s_pass").val();
       
       
        $('select').removeAttr('disabled');
        
       

       
        var valid_check=1;
            
        var deliv_emi_array = $("select[name='delivery_emirate[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<deliv_emi_array.length;i++){
                if(deliv_emi_array[i] === ""){
                   valid_check=0;
                    }
            }
            
         var deliv_ser_array = $("select[name='delivery_service_type[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<deliv_ser_array.length;i++){
                if(deliv_ser_array[i] === ""){
                   valid_check=0;
                    }
            }
            
            // console.log(deliv_emi_array);
            //  console.log(deliv_ser_array);

        var url = "<?php echo base_url(); ?>"+"Driver/save_driver";

        if (phone == ''){
            var error = '<strong>Error!</strong> Please Enter Phone number';
            show_msg(error, 'alert-danger');
            return false;
        }


        // if (!phone.match(num_regex)){
        //     var error = '<strong>Error!</strong> Please Enter Valid Phone number';
        //     show_msg(error, 'alert-danger');
        //     return false;
        // }
        
        

        if(valid_check && name && email && address && phone && s_pass && salary && deliv_emi_array && deliv_ser_array &&  license && l_issue && l_exp && visa && v_issue && v_exp && id_card && i_issue && i_exp && other && o_issue && o_exp && contract ){
            $fields = {'name':name, 'email': email, 'phone':phone, 'address':address ,'s_pass':s_pass, 'license':license , 'l_issue':l_issue, 'l_exp':l_exp, 'visa':visa, 'v_issue':v_issue, 'v_exp':v_exp, 'id_card':id_card, 'i_issue':i_issue, 'i_exp':i_exp, 'other':other,'contract':contract, 'o_issue':o_issue, 'o_exp':o_exp, 'salary':salary, 'delivery_emirate':deliv_emi_array,'delivery_service_type':deliv_ser_array};
            $.post(url, $fields, function(response){
                // console.log('i am respoooooooooooonnnnnnnnnnnnnnssssssssseeeeeeee');
                // console.log(response);
                //response=JSON.parse(response);
                if(response.success){
                    // console.log(response.success);
                    // var msg = '<strong>Success!</strong> Driver has saved.';
                    // show_msg(msg, 'alert-success');
                    swal.fire("Driver has been Registered Successfully.", "", "success");
                    location.reload();
                }else{
                    // console.log('i am working')
                    show_msg('<strong>Error!</strong> Email already exist.', 'alert-danger');
                }
            },'json');
            //location.reload();
        }else{
            // var error = '<strong>Error!</strong> Fill All Required fields.';
            // show_msg(error, 'alert-danger');
             swal.fire("Error", "Fill All Required fields", "error");
        }

    }

    function sendMail(id) {
        $.ajax({
            type:"POST",
            url:"<?php echo base_url('Driver/sendEmail') ?>",
            data:{id:id},
            success:function(res){
                swal.fire("E-Mail Sent Successfully", "", "success");
            }
        });
    }

$("#email").change(function(e){
    var email = $(this).val();
    // console.log("Called email fun");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('Vendor/check_email_validation') ?>",
        data:{email:email,role_type_id:3},
        success:function(response){
            // console.log("response:"+response);
            if (response == "already available") {
                $("#mailcheckmsg").text("Email ("+email+") Already exist");
                $("#email").val("");
            }else{
                $("#mailcheckmsg").text("");
            }

        }
    });
});

$("#phone").change(function(e){
    var phone = $(this).val();
    // console.log("Called PHone fun");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('Vendor/check_phone_validation') ?>",
        data:{phone:phone,role_type_id:3},
        success:function(response){
            // console.log("response:"+response);
            if (response == "already available") {
                $("#phonecheckmsg").text("Phone ("+phone+") Already exist");
                $("#phone").val("");
            }else{
                $("#phonecheckmsg").text("");
            }

        }
    });
});




// New Edits

   
   

    function check_image(input,id) {
        // console.log('I AM IN');
        // console.log(input.files[0]);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {

                var type = input.files[0].type;
                var res=  type.split('/');
                if (res.length > 0){
                    if (res[1] !== 'png' && res[1] !== 'jpg' &&  res[1] !== 'jpeg' &&  res[1] !== 'pdf'){
                       
                        $("#"+id+"_img_msg").text('');
                        $("#"+id+"_img_msg").append('invalid format');
                        $("#"+id+"_image").val('');
                    }else {
                        $("#"+id+"_img_msg").text('');
                    }
                }else {
                    $("#"+id+"_img_msg").text('');
                    $("#"+id+"_img_msg").append('invalid format');
                    $("#"+id+"_image").val('');
                }

                if (input.files[0].size > 1057152) {
                    $("#"+id+"_img_msg").text('');
                    $("#"+id+"_img_msg").append('Try to upload file less than 1MB!');
                    $("#"+id+"_image").val('');
                } else {
                    $("#"+id+"_img_msg").text('');
                    
                    _image = e.target.result;
                    // console.log(id);
                   if(id=='license'){
                        license = _image;
                        // console.log('i  am license');
                        // console.log(license);
                    }else if(id=='visa'){
                       visa = _image;
                    //   console.log('i  am visa');
                    //     console.log(visa);
                    }else if(id=='id_card'){
                       id_card = _image;
                    //   console.log('i  am id_card');
                    //     console.log(id_card);
                    }else if(id=='contract'){
                      contract  = _image;
                    //   console.log('i  am contract');
                    //     console.log(contract);
                    }else if(id == 'other'){
                       other = _image;
                    //   console.log('i  am other');
                    //     console.log(other);
                    }else{
                        console.log('not any condition is working');
                    }
                     
                    
                    
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    
    function check_date_range(id){
         
         if ($("#"+id+"_exp").val() < $("#"+id+"_issue").val()){
            $("#"+id+"_exp").val("");
            $("#"+id+"_issue").val("");
            $("#"+id+"_date").text('');
            $("#"+id+"_date").append('Invalid dates');
        }else {
           $("#"+id+"_date").text('');
        }
         
         
     }



    $("#contract_image").on('change', function () {
       check_image(this,'contract');
    });

    $("#license_image").on('change', function () {
       
        check_image(this,'license');
    });

    $("#visa_image").on('change', function () {
        check_image(this,'visa');
    });

    $("#id_card_image").on('change', function () {
        check_image(this,'id_card');
    });
    
     $("#other_image").on('change', function () {
        check_image(this,'other');
    });

    $("#contract_issue").on('change', function () {
        
        check_date_range('contract');
        
    });
    
    $("#license_issue").on('change', function () {
        
        check_date_range('license');
        
    });
    
    $("#visa_issue").on('change', function () {
        
        check_date_range('visa');
        
    });
    
    $("#id_card_issue").on('change', function () {
        
        check_date_range('id_card');
        
    });
    
    $("#other_issue").on('change', function () {
        
        check_date_range('other');
        
    });
    
    
     
     

function must_run(){
    $('.search_option_area').select2({
  placeholder: 'Select an option'
    });
}

function onetry(){
    $('.search_option').select2({
  placeholder: 'Select an option'
 
});
}

     
     
    
</script>
<!--shan-->
<?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
    </body>
</html>

<style type="text/css">
    .table {
        min-width: 100%;
    }
    .green{
        color:green;
    }
    .red{
        color:red;
    }
</style>