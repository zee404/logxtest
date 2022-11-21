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
          <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
            .yellow {
          background-color: lightblue;
        }
            .columns {
            float: right!important;
            display: none;
        }
         td, th {
                 border: 1px solid #dddddd;
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
        }
        .btn-group{
            margin-top: -10px;
            margin-bottom: 10px;

        }
        </style>
<style type="text/css">
   

form {
    margin-top: 0px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #00b6eb;
    border-color: #7e57c2;
}

select {
  width: 900px;
}
.chosen-container-multi .chosen-choices {
    width: 274px !important;
}
.chosen-container{
  width: 100% !important;
}

</style>
  
    </head>

    <body>

        <!-- Navigation Bar-->
       <?php $this->load->view('common/header'); //End Navigation Bar
            //Assign default value of Active for every Emirate-Service pair in 2D array of PHP
            foreach ($emirites_typ as $key => $value) {
                $emirate=$emirites_typ[$key]->emirate_name;
                foreach ($service_typ as $key => $value) {
                    $service=$service_typ[$key]->name;
                    $service_tracker[$emirate][$service]='active';
                }
            }
            $emirates=json_encode($emirites_typ);
            $services=json_encode($service_typ);
            $service_tracker=json_encode($service_tracker);
        ?>
        <script type="text/javascript">//for unique emirate-service pairs
        //getting emirates from php
        $("select[name='delivery_emirate[]']").html("emirate_options");
        var emirates = '<?php echo $emirates; ?>';
        emirates=JSON.parse(emirates);
        
        //getting services from php
        var services = '<?php echo $services; ?>';
        services=JSON.parse(services);
        
        var service_tracker = '<?php echo $service_tracker; ?>';
        service_tracker=JSON.parse(service_tracker);
        var bag_service_tracker = '<?php echo $service_tracker; ?>';//for bags
        bag_service_tracker=JSON.parse(bag_service_tracker);
        var cash_service_tracker = '<?php echo $service_tracker; ?>';//for cash
        cash_service_tracker=JSON.parse(cash_service_tracker);
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
    	function changeBagSES(status='active',emirate='all',service='all'){
            //changeBagSES=changeStatusOfEmirateServices
            if(status=='active'){//change status to active STARTS
                if(emirate=='all'){//all emirates STARTS
                    if(service=='all'){//all emirates, all services STARTS
                        for (let emirate in bag_service_tracker){//getting all emirates
                           if(bag_service_tracker.hasOwnProperty(emirate)){
                                var emirate_services=bag_service_tracker[emirate];
                                for (let service in emirate_services){//getting all services of all emirates
                                    if(emirate_services.hasOwnProperty(service)){
                                        bag_service_tracker[emirate][service]='active'; //changing status to active 
                                    }
                                }
                            }
                        }
                    }///all emirates, all services ENDS
                    else{//all emirates specific services STARTS
                        for (let emirate in bag_service_tracker){//getting all emirates
                                bag_service_tracker[emirate][service]='active'; //changing status to active 
                        }
                    }//all emirates specific services ENDS
                }//all emirates ELSE
                else{//specic emirate STARTS
                    if(service=='all'){//specific emirate, all services STARTS
                        var emirate_services=bag_service_tracker[emirate];
                        for (let service in emirate_services){//getting all services of all emirates
                            if(emirate_services.hasOwnProperty(service)){
                                bag_service_tracker[emirate][service]='active'; //changing status to active 
                            }
                        }
                    }//specific emirate, all services ENDS
                    else{//specific emirate specific service STARTS
                        bag_service_tracker[emirate][service]='active'; //changing status to active 
                    }//specific emirate specific service ENDS
                }//specic emirate ENDS
            }//change status to active ENDS
            else if(status=='inactive'){//change status to inactive STARTS
                if(emirate=='all'){//all emirates STARTS
                    if(service=='all'){//all emirates, all services STARTS
                        for (let emirate in bag_service_tracker){//getting all emirates
                           if(bag_service_tracker.hasOwnProperty(emirate)){
                                var emirate_services=bag_service_tracker[emirate];
                                for (let service in emirate_services){//getting all services of all emirates
                                    if(emirate_services.hasOwnProperty(service)){
                                        bag_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                                    }
                                }
                            }
                        }
                    }///all emirates, all services ENDS
                    else{//all emirates specific services STARTS
                        for (let emirate in bag_service_tracker){//getting all emirates
                            bag_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                        }
                    }//all emirates specific services ENDS
                }//all emirates ELSE
                else{//specic emirate STARTS
                    if(service=='all'){//specific emirate, all services STARTS
                        var emirate_services=bag_service_tracker[emirate];
                        for (let service in emirate_services){//getting all services of all emirates
                            if(emirate_services.hasOwnProperty(service)){
                                bag_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                            }
                        }
                    }//specific emirate, all services ENDS
                    else{//specific emirate specific service STARTS
                        bag_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                    }//specific emirate specific service ENDS
                }//specic emirate ENDS
            }//change status to inactive ENDS
            else{
                return false;
            }
        }//changeBagSES ENDS
    	function show_service_tracker(){
		for (let emirate in service_tracker){
		   if(service_tracker.hasOwnProperty(emirate)){
		    	console.log(emirate);//emirate name -> Dubai,  Sharjah ...
		    	//console.log(service_tracker[emirate]);//services in emirate
		    	var emirate_services=service_tracker[emirate];
		    	for (let service in emirate_services){
					if(emirate_services.hasOwnProperty(service)){
						console.log(service+" : "+emirate_services[service]);		
					}
				}
				console.log("_____________________________");
			}
		}
	}//show_service_tracker ENDS
	function show_bag_service_tracker(){
        for (let emirate in bag_service_tracker){
           if(bag_service_tracker.hasOwnProperty(emirate)){
                console.log(emirate);//emirate name -> Dubai,  Sharjah ...
                //console.log(bag_service_tracker[emirate]);//services in emirate
                var emirate_services=bag_service_tracker[emirate];
                for (let service in emirate_services){
                    if(emirate_services.hasOwnProperty(service)){
                        console.log(service+" : "+emirate_services[service]);       
                    }
                }
                console.log("_____________________________");
            }
        }
    }//show_bag_service_tracker ENDS
    function changeCashSES(status='active',emirate='all',service='all'){
            //changecashSES=changeStatusOfEmirateServices
            if(status=='active'){//change status to active STARTS
                if(emirate=='all'){//all emirates STARTS
                    if(service=='all'){//all emirates, all services STARTS
                        for (let emirate in cash_service_tracker){//getting all emirates
                           if(cash_service_tracker.hasOwnProperty(emirate)){
                                var emirate_services=cash_service_tracker[emirate];
                                for (let service in emirate_services){//getting all services of all emirates
                                    if(emirate_services.hasOwnProperty(service)){
                                        cash_service_tracker[emirate][service]='active'; //changing status to active 
                                    }
                                }
                            }
                        }
                    }///all emirates, all services ENDS
                    else{//all emirates specific services STARTS
                        for (let emirate in cash_service_tracker){//getting all emirates
                                cash_service_tracker[emirate][service]='active'; //changing status to active 
                        }
                    }//all emirates specific services ENDS
                }//all emirates ELSE
                else{//specic emirate STARTS
                    if(service=='all'){//specific emirate, all services STARTS
                        var emirate_services=cash_service_tracker[emirate];
                        for (let service in emirate_services){//getting all services of all emirates
                            if(emirate_services.hasOwnProperty(service)){
                                cash_service_tracker[emirate][service]='active'; //changing status to active 
                            }
                        }
                    }//specific emirate, all services ENDS
                    else{//specific emirate specific service STARTS
                        cash_service_tracker[emirate][service]='active'; //changing status to active 
                    }//specific emirate specific service ENDS
                }//specic emirate ENDS
            }//change status to active ENDS
            else if(status=='inactive'){//change status to inactive STARTS
                if(emirate=='all'){//all emirates STARTS
                    if(service=='all'){//all emirates, all services STARTS
                        for (let emirate in cash_service_tracker){//getting all emirates
                           if(cash_service_tracker.hasOwnProperty(emirate)){
                                var emirate_services=cash_service_tracker[emirate];
                                for (let service in emirate_services){//getting all services of all emirates
                                    if(emirate_services.hasOwnProperty(service)){
                                        cash_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                                    }
                                }
                            }
                        }
                    }///all emirates, all services ENDS
                    else{//all emirates specific services STARTS
                        for (let emirate in cash_service_tracker){//getting all emirates
                            cash_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                        }
                    }//all emirates specific services ENDS
                }//all emirates ELSE
                else{//specic emirate STARTS
                    if(service=='all'){//specific emirate, all services STARTS
                        var emirate_services=cash_service_tracker[emirate];
                        for (let service in emirate_services){//getting all services of all emirates
                            if(emirate_services.hasOwnProperty(service)){
                                cash_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                            }
                        }
                    }//specific emirate, all services ENDS
                    else{//specific emirate specific service STARTS
                        cash_service_tracker[emirate][service]='inactive';   //changing status to inactive   
                    }//specific emirate specific service ENDS
                }//specic emirate ENDS
            }//change status to inactive ENDS
            else{
                return false;
            }
        }//changecashSES ENDS
        
    function show_cash_service_tracker(){
        for (let emirate in cash_service_tracker){
           if(cash_service_tracker.hasOwnProperty(emirate)){
                console.log(emirate);//emirate name -> Dubai,  Sharjah ...
                //console.log(cash_service_tracker[emirate]);//services in emirate
                var emirate_services=cash_service_tracker[emirate];
                for (let service in emirate_services){
                    if(emirate_services.hasOwnProperty(service)){
                        console.log(service+" : "+emirate_services[service]);       
                    }
                }
                console.log("_____________________________");
            }
        }
    }//show_cash_service_tracker ENDS
        </script>
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
                                   <li class="breadcrumb-item"><a href="javascript: void(0);">Partner </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Partner Detail</a></li>
                                  
                                </ol>
                            </div>
                           <!--   <?php echo validation_errors();?>
                               <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-success" id="error" style="align-content: center; background-color: red;">
                                    <?php echo $this->session->flashdata('error') ?>
                                </div>
                                <?php } ?>
                                 <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success" id="success" style="align-content: center; background-color: green;color: white;">
                                        <?php echo $this->session->flashdata('success') ?>
                                    </div>
                                    <?php } ?> -->
                            <h4 class="page-title"> Partner Detail</h4>
                        </div>
                    </div>
                </div>     
              


                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card-box">
                            <?php if (!empty($error)) {
                                print_r($error);
                            } 
                            ?>
                            <form action="<?php echo base_url('vendor/save_new_vendor') ?>" id="add_vendor_form"  method="post" class="horizontal-form" enctype="multipart/form-data">
                                <input type="hidden" name="vendor_id" value="" id="vendor_id" class="form-control">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Full Name*</label>
                                            <input type="text" name="name" id="name" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Email<span class="required">*</span></label>
                                            <input type="text" name="email" id="email" class="form-control" required="">
                                            <span id="mailcheckmsg" style="color: red"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Phone<span class="required">*</span></label>
                                            <input type="text" name="phone" placeholder="971123456789" id="phone" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Address*</label>
                                            <input type="text" name="address" id="address" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Password*</label>
                                        <div class="input-group" style="">
                                            <input type="text" name="s_pass" placeholder="Password Here" class="form-control" required="" id="s_pass">&nbsp;&nbsp;&nbsp;<span class="input-group-btn">
                                            <button style="color:white;background-color: black;" class="btn btn-default" type="button" onclick="gen_password()"><span class="glyphicon glyphicon-lock" aria-hidden="true">  </span> Generate</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div id="output"></div>
                                            <label class="control-label">Select Modules<span class="required">*</span></label>
                                            <select data-placeholder="Choose tags ..." name="tags[]" multiple="" class="chosen-select" id="module" required style="display:none" >
                                                <option value="dashboards">Dashboards</option>
                                                <option value="partners">Partners</option>
                                                <!-- <option value="Team">Team</option> -->
                                                <option value="oprations">Operations</option>
                                                <option value="reports">Reports</option>
                                                <option value="setting">Setting</option>
                                                <!--<option value="chat">Live Support Chat</option>-->
                                            </select>
                                            <span id="msgmod" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" id="cf">
                                        <label for="contract_file">Contract File* <small>(.Pdf / .Doc) file format only</small></label>
                                        <input type="file" name="contract_file" id="contract_file" class="form-control" required>
                                        <input type="hidden" name="contr_file" id="contr_file" value="" class="form-control" />
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                     <div class="col-sm-2">
                                        <label for="">Term*</label>
                                        <div class="input-group" style="">
                                            
                                            <input name="term" class="form-control" placeholder="eg:7" required id="term" oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "2"
                                                            
                                                             min="0"
                                                            />
                                            
                                             </span>
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Invoice Email<span class="required">*</span></label>
                                            <input type="text" name="inv_email" id="inv_email" class="form-control" required="">
                                            <span id="inv_mailcheckmsg" style="color: red"></span>
                                        </div>
                                    </div>
                                    
                                    <br>
                                     <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Other Email</label>
                                            <input type="text" name="other_email" id="other_email" class="form-control">
                                            
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">MealPlaner Email</label>
                                            <input type="text" name="plan_email" id="plan_email" class="form-control">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">Invoice Address*</label>
                                            <input type="text" name="inv_address" id="inv_address" class="form-control" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label class="control-label">TRN Number*</label>
                                            <input type="text" name="trn" id="trn" class="form-control" required="">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                                
                                <h4>Delivery Quotations</h4>
                                <div class="delivery_firstbox">
                                    <div class="row" id="delivery_row_block_0">
                                        <div class="col-sm-3">
                                            <label for="emirate">Select Emirate *</label>
                                            <select name="delivery_emirate[]" id="emirate" class="form-control" required></select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="service_type">Service Type *</label>
                                            <select name="delivery_service_type[]" id="service_type" class="form-control" required></select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="price">Price*</label>
                                            <input  class="form-control" name="delivery_price[]" id="price" placeholder="(AED)" required 
                                            oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0">
                                        </div>
                                        <div class="col-sm-2">
                                        <label for="same_loc_price">Same Location Price*</label>
                                            <input class="form-control" name="delivery_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required 
                                            oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0">
                                             <input type="hidden" name="delivHid[]" value="" class="form-control"/>
                                        </div>
                                        <div class="col-sm-2" id="btn_box_0">
                                            <button id="add_delivery_row_btn_0" onclick="add_new_deliver_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button id="remove_delivery_row_btn_0" onclick="remove_delivery_row(0)" type="button" style="background: black;color: white;margin-top: 26px; display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>
                                        </div>
                                       
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="delivery_pricing-box"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message">Custom delivery message for customer*</label>
                                        <textarea name="delivery_message" id="delivery_message" rows="5" class="form-control" style="width:100%;" required></textarea>
                                    </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <h4>Bags Collection Quotation</h4>
                                <div class="bag_firstbox">
                                    <div class="row" id="bag_row_block_0">
                                        <div class="col-sm-3">
                                            <label for="emirate">Select Emirate *</label>
                                            <select name="bag_emirate[]" id="emirate" class="form-control" required></select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="service_type">Service Type *</label>
                                            <select name="bag_service_type[]" id="service_type" class="form-control" required></select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="price">Price*</label>
                                            <input  class="form-control" name="bag_price[]" id="price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0">
                                        </div>
                                        <div class="col-sm-2">
                                        <label for="same_loc_price">Same Location Price*</label>
                                            <input  class="form-control" name="bag_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0">
                                            <input type="hidden" name="bagsHid[]" value="" class="form-control"/>
                                        </div>
                                        <div class="col-sm-2" id="btn_box_0">
                                            <button id="add_bag_row_btn_0" onclick="add_new_bag_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button id="remove_bag_row_btn_0" onclick="remove_bag_row(0)" type="button" style="background: black;color: white;margin-top: 26px; display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="bag_pricing-box"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message">Custom bag message for customer*</label>
                                        <textarea name="bag_message" id="bag_message" rows="5" class="form-control" style="width:100%;" required></textarea>
                                    </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <h4>Cash Collection Quotation</h4>
                                <div class="cash_firstbox">
                                    <div class="row" id="cash_row_block_0">
                                        <div class="col-sm-3">
                                            <label for="emirate">Select Emirate *</label>
                                            <select name="cash_emirate[]" id="emirate" class="form-control" required></select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="service_type">Service Type *</label>
                                            <select name="cash_service_type[]" id="service_type" class="form-control" required></select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="price">Price*</label>
                                            <input  class="form-control" name="cash_price[]" id="price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0">
                                        </div>
                                        <div class="col-sm-2">
                                        <label for="same_loc_price">Same Location Price*</label>
                                            <input  class="form-control" name="cash_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;"
                                                           type = "number"
                                                             maxlength = "8"
                                                             step="0.01"
                                                             min="0">
                                            <input type="hidden" name="cashHid[]" value="" class="form-control"/>
                                        </div>
                                        <div class="col-sm-2" id="btn_box_0">
                                            <button id="add_cash_row_btn_0" onclick="add_new_cash_row(0)" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="ADD"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            <button id="remove_cash_row_btn_0" onclick="remove_cash_row(0)" type="button" style="background: black;color: white;margin-top: 26px;display: none;" class="btn green" title="REMOVE"><i class="icon-close"></i></button>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                </div>
                                
                                <div class="cash_pricing-box"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message">Custom cash collection message for customer*</label>
                                        <textarea name="cash_message" id="cash_message" rows="5" class="form-control" style="width:100%;" required></textarea>
                                    </div>
                                    </div>
                                    
                                </div>
                                <br>
                                
                                <?php if (!empty($this->uri->segment(3))) { ?>
                                    <?php if ($this->uri->segment(2) == 'edit') { ?>
                                        <input type="button" id="edit_vendor_btn" onclick="update_vendor()"  class=" btn green updatebtn" value="Update">
                                    <?php } ?>
                                    <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>
                                <?php }else{ ?>
                                    <button id="save_vendor_btn" type="submit" style="background: black;color: white;" class="btn green">Save</button>
                                    <button id="responsive" style="background: black;color: white;" onclick="close_model()" type="button" data-dismiss="modal" class="btn default">Close</button>
                                <?php } ?>
                             
                            </form>
                        </div>
                    </div> <!-- end col-->
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

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script>

<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>

          <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
         <script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js');?>"></script>

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

        <!-- Init js -->
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>
         <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>
        <!-- App js-->
<!--         <script src="<?php echo base_url('assets/plugins/jquery-1.10.2.min.js');?>"></script> -->
         
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
       
        <script type="text/javascript">
          document.getElementById('output').innerHTML = location.search;
            $(".chosen-select").chosen();
        </script>

<script type="text/javascript">
    function close_model() {
        window.location.href="<?php echo base_url('Partner') ?>";
    }

    $(document).ready(function () {
        <?php if (!empty($this->session->flashdata('error'))) { ?>
            var msgg = '<?php echo $this->session->flashdata('error') ?>';
            swal(msgg, "", "error");
        <?php } ?>
        <?php if (!empty($this->session->flashdata('success'))) { ?>
            var msgg = '<?php echo $this->session->flashdata('success') ?>';
            swal(msgg, "", "success");
        <?php } ?>
    });
</script>
<script type="text/javascript">
var status = false;
function gen_password()
{
    $("input[name='s_pass']").val(Math.random().toString(36).slice(-8));
}

$('#add_vendor_form').submit(function() {
    $('select').removeAttr('disabled');
});
  
</script>
 
<script type="text/javascript">

// function delivery_serv(){
//   // var get_servic=$(this).children("option:selected").val();
//   var i=0;
//   var get_servic= $('#delivery_row_block_'+i+' >div>select[name="delivery_service_type[]"]').val();
//   var get_emi= $('#delivery_row_block_'+i+' >div>select[name="delivery_emirate[]"]').val();
//   console.log('get servic:'+get_servic);
//   console.log('get servic:'+get_emi);
//   console.log('i is:'+i);
//   if(get_emi != ''){
//       //  $("#theSelect option:selected").attr('disabled','disabled')
//       i=i+1;
//       //for(let jj=0; jj<3; jj--){
//       if($('#delivery_row_block_'+i+' >div>select[name="delivery_service_type['+"0"+']"]').val() == get_servic){
//           $('#delivery_row_block_'+i+' >div>select[name="delivery_service_type[]"]').attr('disabled','disabled');
//           console.log('i run');
//       }
      
//         console.log('emi is not empty so service is disabled');
//         console.log('i is:'+i);
        
//       //}
//   }
    
// }
$("#email").change(function(e){
    var email = $(this).val();
    console.log("Called email fun");
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('Vendor/check_email_validation') ?>",
        data:{email:email,role_type_id:2},
        success:function(response){
            console.log("response:"+response);
            if (response == "already available") {
                $("#mailcheckmsg").text("Email ("+email+") Already exist");
                $("#email").val("");
            }else{
                $("#mailcheckmsg").text("");
            }

        }
    });
});

    //this script is related to emirates+services=service_tracker (unique pairs) (updating)
    
    function dynamicEmirateOptions(selector="select[name='delivery_emirate[]']"){
		//producing emirate options dynamically
		var emirate_options='<option value="">---Select---</option>';
		for (let emirate in emirates){
			emirate_options+="<option value="+emirates[emirate].id+">"+emirates[emirate].emirate_name+"</option>";
		
		}
		$(selector).html('');
		$(selector).append(emirate_options);
	}
	

	function dynamicServiceOptions(selector="select[name='delivery_service_type[]']"){
		//producing conditional services options dynamically
		console.log('hello i am dynamic service option creator');
		var service_options='<option value="">---Select---</option>';
		for (let service in services){
			service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
		}
		$(selector).html('');
		$(selector).append(service_options);
	}
	function dynamicConServiceOptions(emirate,selector="select[name='delivery_service_type[]']"){
		//producing conditional services options dynamically
		var service_options='<option value="">---Select---</option>';
		for (let service in services){
			service_name=services[service].name;
			if(service_tracker[emirate][service_name]=='inactive'){
				service_options+="<option value="+services[service].id+" disabled style='color:red'>"+services[service].name+"</option>";
			}else{
				service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
			}
		}
		$(selector).html('');
		$(selector).append(service_options);
	}
	function dynamicBagConServiceOptions(emirate,selector="select[name='bag_service_type[]']"){
        //producing conditional services options dynamically
        var service_options='<option value="">---Select---</option>';
        for (let service in services){
            service_name=services[service].name;
            if(bag_service_tracker[emirate][service_name]=='inactive'){
                service_options+="<option value="+services[service].id+" disabled style='color:red'>"+services[service].name+"</option>";
            }else{
                service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
            }
        }
        $(selector).html('');
        $(selector).append(service_options);
    }
    function dynamicCashConServiceOptions(emirate,selector="select[name='cash_service_type[]']"){
        //producing conditional services options dynamically
        var service_options='<option value="">---Select---</option>';
        for (let service in services){
            service_name=services[service].name;
            if(cash_service_tracker[emirate][service_name]=='inactive'){
                service_options+="<option value="+services[service].id+" disabled style='color:red'>"+services[service].name+"</option>";
            }else{
                service_options+="<option value="+services[service].id+">"+services[service].name+"</option>";
            }
        }
        $(selector).html('');
        $(selector).append(service_options);
    }
	//for delivery
	dynamicEmirateOptions();
	dynamicServiceOptions();
	//for bags
	dynamicEmirateOptions("select[name='bag_emirate[]']");
	dynamicServiceOptions("select[name='bag_service_type[]']");
	//for cash
	dynamicEmirateOptions("select[name='cash_emirate[]']");
	dynamicServiceOptions("select[name='cash_service_type[]']");
	
    $('body').on('click', 'select[name="delivery_emirate[]"]', function() {
        var emirate_selected= $(this).find('option:selected').text();
        var id=$(this).parent().parent().attr('id');
        ConServiceSelector="#"+id+">div>select[name='delivery_service_type[]']";
       
        dynamicConServiceOptions(emirate_selected,ConServiceSelector);
        
        
    });
    $('body').on('click', 'select[name="bag_emirate[]"]', function() {
        var emirate_selected= $(this).find('option:selected').text();
        var id=$(this).parent().parent().attr('id');
      //  console.log("show_bag_service_tracker")
	   // show_bag_service_tracker();
	    //console.log("show_service_tracker");
	   // show_service_tracker();
	   console.log('yyyyyyyy'+id);
        bagConServiceSelector="#"+id+">div>select[name='bag_service_type[]']";
        dynamicBagConServiceOptions(emirate_selected,bagConServiceSelector);
        
        
    });
    $('body').on('click', 'select[name="cash_emirate[]"]', function() {
        var emirate_selected= $(this).find('option:selected').text();
        var id=$(this).parent().parent().attr('id');
        cashConServiceSelector="#"+id+">div>select[name='cash_service_type[]']";
        dynamicCashConServiceOptions(emirate_selected,cashConServiceSelector);
        
        
    });
    var deliv_row_counter=0;
function add_new_deliver_row(id){
    
    //getting values of emirates and service selected
    var emirate= $('#delivery_row_block_'+deliv_row_counter+' >div>select[name="delivery_emirate[]"]>option:selected').text();
    var service= $('#delivery_row_block_'+deliv_row_counter+' >div>select[name="delivery_service_type[]"]>option:selected').text();

    console.log('i am deliv counter JUst start  value:'+deliv_row_counter);
    if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //producing new row
      //  id = parseInt(id) + 1;
       
          deliv_row_counter=deliv_row_counter+1;
     console.log('i am deliv counter after add a row:'+id+' and i am counter value:'+deliv_row_counter);
        var delivery_row = '<div class="row" id="delivery_row_block_'+deliv_row_counter+'"><div class="col-sm-3"><label for="emirate">Select Emirate *</label><select name="delivery_emirate[]" id="emirate" class="form-control" required "></select></div><div class="col-sm-3"><label for="service_type">Service Type *</label><select name="delivery_service_type[]" id="service_type" class="form-control" required></select></div><div class="col-sm-2"><label for="price">Price*</label><input class="form-control" name="delivery_price[]" id="price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='+"''"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /></div><div class="col-sm-2"><label for="same_loc_price">Same Location Price*</label><input class="form-control" name="delivery_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='+"''"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /><input type="hidden" name="delivHid[]" value="" class="form-control" /></div><div class="col-sm-2" id="btn_box_0"><button id="remove_delivery_row_btn_'+deliv_row_counter+'" onclick="remove_delivery_row('+deliv_row_counter+')" type="button" style="background: black;color: white;margin-top: 26px; " class="btn green" title="REMOVE"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></div></div><hr>';
        $(".delivery_pricing-box").append(delivery_row);
        var emirate_selector="#delivery_row_block_"+deliv_row_counter+">div>select[name='delivery_emirate[]']";
        dynamicEmirateOptions(emirate_selector);
        var service_selector="#delivery_row_block_"+deliv_row_counter+" >div>select[name='delivery_service_type[]]'";
        dynamicServiceOptions(service_selector);  
        
        //getting original id back
        id = parseInt(deliv_row_counter) - 1;
        
        //making emirate and service uneditable after new row appended
         $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]').attr("disabled", true);
        $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]').css('background-color', 'silver');
        
        $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').attr("disabled", true);
        $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]').css('background-color', 'silver');
        
        changeSES('inactive',emirate,service);
        
        //change icon only after current row processed successfully
        // $("#add_delivery_row_btn_"+id).hide();
         $("#remove_delivery_row_btn_"+id+1).show();
    }else{
        
        swal("Please Select Emirate and Service Carefully", "", "warning");
       
    }
}//function ends
function remove_delivery_row(id) {
    
    if(id !=deliv_row_counter){
        console.log('i am id not match counter is:'+deliv_row_counter);
        
    }else{
        deliv_row_counter=deliv_row_counter-1;
    }
     console.log('i am deliv counter after del a row:'+id+' and i am counter value:'+deliv_row_counter);
    //getting values of emirates and service selected (updating)
   
    var emirate= $('#delivery_row_block_'+id+' >div>select[name="delivery_emirate[]"]>option:selected').text();
    
    var service= $('#delivery_row_block_'+id+' >div>select[name="delivery_service_type[]"]>option:selected').text();
     if(emirate!='---Select---' && service!='' && service!='---Select---'){
                changeSES('active',emirate,service);
                show_service_tracker();
        
    }
    $("#delivery_row_block_"+id).remove();
   
}



 var bag_row_counter=0;
function add_new_bag_row(id){
    //getting values of emirates and service selected
    var emirate= $('#bag_row_block_'+bag_row_counter+' >div>select[name="bag_emirate[]"]>option:selected').text();
    var service= $('#bag_row_block_'+bag_row_counter+' >div>select[name="bag_service_type[]"]>option:selected').text();
    console.log('i am bag counter JUst start  value:'+bag_row_counter);
   if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //producing new row
        bag_row_counter=bag_row_counter+1;
        console.log('i am bag counter after add a row:'+id+' and i am counter value:'+bag_row_counter);
        var bag_row = '<div class="row" id="bag_row_block_'+bag_row_counter+'"> <div class="col-sm-3"> <label for="emirate">Select Emirate *</label> <select  name="bag_emirate[]" id="emirate" class="form-control abc" required></select> </div> <div class="col-sm-3"> <label for="service_type">Service Type *</label> <select name="bag_service_type[]" id="service_type" class="form-control" required></select> </div> <div class="col-sm-2"> <label for="price">Price*</label> <input class="form-control" name="bag_price[]" id="price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='+"''"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /> </div> <div class="col-sm-2"> <label for="same_loc_price">Same Location Price*</label> <input  class="form-control" name="bag_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='+"''"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /> <input type="hidden" name="bagsHid[]" value="" class="form-control" /> </div> <div class="col-sm-2" id="btn_box_0">  <button id="remove_bag_row_btn_'+bag_row_counter+'" onclick="remove_bag_row('+bag_row_counter+')" type="button" style="background: black;color: white;margin-top: 26px; " class="btn green" title="REMOVE"><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </div></div><hr>';
        
        $(".bag_pricing-box").append(bag_row);
        var emirate_selector="#bag_row_block_"+bag_row_counter+">div>select[name='bag_emirate[]']";
        dynamicEmirateOptions(emirate_selector);
        var service_selector="#bag_row_block_"+bag_row_counter+" >div>select[name='bag_service_type[]]'";
        dynamicServiceOptions(service_selector);
        
        //getting original id back
        id = parseInt(bag_row_counter) - 1;
        
        //making emirate and service uneditable after new row appended
        $('#bag_row_block_'+id+' >div>select[name="bag_emirate[]"]').attr("disabled", true); 
        $('#bag_row_block_'+id+' >div>select[name="bag_emirate[]"]').css('background-color', 'silver');
        $('#bag_row_block_'+id+' >div>select[name="bag_service_type[]"]').attr("disabled", true);
        $('#bag_row_block_'+id+' >div>select[name="bag_service_type[]"]').css('background-color', 'silver');
        changeBagSES('inactive',emirate,service);
          
        //  $("#bag_row_block_"+bag_row_counter+">div>select[name='bag_emirate[]']").trigger('click');
           

        //show_bag_service_tracker();
        //change icon only after current row processed successfully
        // $("#add_bag_row_btn_"+id).hide();
        // $("#remove_bag_row_btn_"+id).show();
        
      var element = $("#bag_row_block_"+bag_row_counter+">div>select[name='bag_emirate[]']").prop('id');
      console.log('i am idddddddddd:'+element);
            // var e = document.createEvent('MouseEvents');
            // e.initEvent('click', true, true);
            // $('#'+element).dispatchEvent(e);
     
   }else{
        swal("Please Select Emirate and Service Carefully", "", "warning");
    }
}//function ends



    function remove_bag_row(id) {
         if(id !=bag_row_counter){
        console.log('i am id not match counter is:'+bag_row_counter);
        
    }else{
        bag_row_counter=bag_row_counter-1;
    }
    
        //getting values of emirates and service selected (updating)
        var emirate= $('#bag_row_block_'+id+' >div>select[name="bag_emirate[]"]>option:selected').text();
        
        var service= $('#bag_row_block_'+id+' >div>select[name="bag_service_type[]"]>option:selected').text();
         if(emirate!='---Select---' && service!='' && service!='---Select---'){
          changeBagSES('active',emirate,service);
         }
        $("#bag_row_block_"+id).remove();
    }

var cash_row_counter=0;
function add_new_cash_row(id){
    //getting values of emirates and service selected
    var emirate= $('#cash_row_block_'+cash_row_counter+' >div>select[name="cash_emirate[]"]>option:selected').text();
    var service= $('#cash_row_block_'+cash_row_counter+' >div>select[name="cash_service_type[]"]>option:selected').text();

   if(emirate!='---Select---' && service!='' && service!='---Select---'){
        //producing new row
       cash_row_counter=cash_row_counter+1;
        var cash_row = '<div class="row" id="cash_row_block_'+cash_row_counter+'"><div class="col-sm-3"><label for="emirate">Select Emirate *</label><select name="cash_emirate[]" id="emirate" class="form-control" required></select></div><div class="col-sm-3"><label for="service_type">Service Type *</label><select name="cash_service_type[]" id="service_type" class="form-control" required></select></div><div class="col-sm-2"><label for="price">Price*</label><input  class="form-control" name="cash_price[]" id="price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='+"''"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /><input type="hidden" name="cashHid[]" value="" class="form-control"/></div><div class="col-sm-2"><label for="same_loc_price">Same Location Price*</label><input class="form-control" name="cash_same_loc_price[]" id="same_loc_price" placeholder="(AED)" required oninput="javascript:validity.valid||(value='+"''"+');if(this.value.length < 0) this.value = this.value.slice(0, -0) ; if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength) ;" type = "number" maxlength = "8" step="0.01" min="0" /></div><div class="col-sm-2" id="btn_box_0"><button id="remove_cash_row_btn_'+cash_row_counter+'" onclick="remove_cash_row('+cash_row_counter+')" type="button" style="background: black;color: white;margin-top: 26px;" class="btn green" title="REMOVE"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></div></div><hr>';
        
        $(".cash_pricing-box").append(cash_row);
        var emirate_selector="#cash_row_block_"+cash_row_counter+">div>select[name='cash_emirate[]']";
        dynamicEmirateOptions(emirate_selector);
        var service_selector="#cash_row_block_"+cash_row_counter+" >div>select[name='cash_service_type[]]'";
        dynamicServiceOptions(service_selector);
        
        //getting original id back
        id = parseInt(cash_row_counter) - 1;
        
        //making emirate and service uneditable after new row appended
        $('#cash_row_block_'+id+' >div>select[name="cash_emirate[]"]').attr("disabled", true);
        $('#cash_row_block_'+id+' >div>select[name="cash_emirate[]"]').css('background-color', 'silver');
        $('#cash_row_block_'+id+' >div>select[name="cash_service_type[]"]').attr("disabled", true);
        $('#cash_row_block_'+id+' >div>select[name="cash_service_type[]"]').css('background-color', 'silver');
        changeCashSES('inactive',emirate,service);
        //show_cash_service_tracker();
        //change icon only after current row processed successfully
        // $("#add_cash_row_btn_"+id).hide();
        // $("#remove_cash_row_btn_"+id).show();
   }else{
        swal("Please Select Emirate and Service Carefully", "", "warning");
    }
}//function ends

function remove_cash_row(id) {
     if(id !=cash_row_counter){
        console.log('i am id not match counter is:'+cash_row_counter);
        
    }else{
        cash_row_counter=cash_row_counter-1;
    }
        //getting values of emirates and service selected (updating)
        var emirate= $('#cash_row_block_'+id+' >div>select[name="cash_emirate[]"]>option:selected').text();
        
        var service= $('#cash_row_block_'+id+' >div>select[name="cash_service_type[]"]>option:selected').text();
         if(emirate!='---Select---' && service!='' && service!='---Select---'){
           changeCashSES('active',emirate,service);
         }
        $("#cash_row_block_"+id).remove();
    }


// $("#add_vendor_form").submit(function());
<?php// if (!empty($this->uri->segment(3))) { ?>
<?php if($this->uri->segment(2)=='edit') { ?>
    get_vendor_by_id(<?php echo $this->uri->segment(3) ?>);
     var deliv_row_counter=0;
      var bag_row_counter=0;
       var cash_row_counter=0;
<?php } ?>
 function get_vendor_by_id(id){
    var url = "<?php echo base_url(); ?>"+"vendor/get_vendor_by_id";
    $fields = {'vendor_id':id};
    $.post(url, $fields, function(response){
        if(response.success) {
            console.log(response);
            var vendor = response.vendor[0];
            $("#name").val(vendor.full_name);
            $("#email").val(vendor.email);
            oldEmail = vendor.email;
             console.log(vendor.email);
            $("#phone").val(vendor.phone);
            $("#address").val(vendor.address);
            $("#s_pass").val(vendor.Password_partner);
            $("#delivery_message").text(vendor.delivery_message);
            $("#bag_message").text(vendor.bag_message);
            $("#cash_message").text(vendor.cash_message);
            
             $("#term").val(vendor.term);
             console.log(vendor.term);
             
              $("#inv_email").val(vendor.inv_email);
               $("#other_email").val(vendor.other_email);
                $("#inv_address").val(vendor.inv_address);
                $("#trn").val(vendor.trn);
                
                  $("#plan_email").val(vendor.emails_for_mealplan);
                
            

         
            var selectedMods = vendor.modules ? vendor.modules.split(',') : [];
            selectedMods.forEach(function(mod){
                $("#module option[value='"+mod+"']").attr("selected", "selected");
                console.log('hey abcd:'+mod);
                
                
            });

            $("#module").trigger("chosen:updated");
            // $("#module").trigger("chosen-select");
              var xyz_file=vendor.contract_file;
              if(xyz_file == ''){
                  $("#cf").append("<span><a id='av' style='color:red;'><b>Not Available</b></a></span>");
                   $('#av').removeAttr("href");
              }else{
                   $("#cf").append("<span><a id='av' style='color:green;'><b>Already Available</b></a></span>");
            $('#av').attr("href",xyz_file);
           $('#contr_file').val(xyz_file);
              }
           
            
            
            // var filename = uurl.split('//').pop();
            // filename =filename.split('/').pop();
            // console.log(filename);
           //  $("#contract_file").val(filename);
            
            console.log('i am start loop');
          
            
        //  //DELIVERY QOUTS   
            for(let i = 0; i < response.deliv_qout.length; i++){
                
                let childArray = response.deliv_qout[i];
                 if(i>0){
                     var idd=childArray.id;
                     var jj=i-1;
                     console.log('i am jj:'+jj);
                        add_new_deliver_row(jj);
                    }
             console.log('i am deliv qouts counter of i :'+i);
            $('#delivery_row_block_'+i+' >div>select[name="delivery_emirate[]"]').val(childArray.tbl_deliv_emi);
              <?php if($this->uri->segment(2)=='edit') { ?> 
                        
                            var emirate_selected= $("#delivery_row_block_"+i+">div>select[name='delivery_emirate[]']>option:selected").text();
                            var temp_id='delivery_row_block_'+i;
                             ConServiceSelector="#"+temp_id+">div>select[name='delivery_service_type[]']";
                             dynamicConServiceOptions(emirate_selected,ConServiceSelector);
           <?php } ?>
           
            $('#delivery_row_block_'+i+' >div>select[name="delivery_service_type[]"]').val(childArray.tbl_deliv_servi);
            $('#delivery_row_block_'+i+' >div>input[name="delivery_price[]"]').val(childArray.tbl_deliv_price);
            $('#delivery_row_block_'+i+' >div>input[name="delivery_same_loc_price[]"]').val(childArray.tbl_deliv_same_loc_p);
            $('#delivery_row_block_'+i+' >div>input[name="delivHid[]"]').val(childArray.id);
            
        $("#remove_delivery_row_btn_"+i).attr("onclick","delete_rows_('"+i+"','d', '"+childArray.id+"')");
       //document.getElementById("remove_delivery_row_btn_"+i+").attribute("onclick","new_function_name()");
          
                  
            
         }
         
        //BAGS QOUTS
        
            for(let i = 0; i < response.bags_qout.length; i++){
                
                let childArray = response.bags_qout[i];
                
                 if(i>0){
                    var idd=childArray.id;
                    var jj=i-1;
                    console.log('i am jj:'+jj);
                     add_new_bag_row(jj);
                        
                    }
                   console.log('i am bags qouts counter of i :'+i);
              $('#bag_row_block_'+i+' >div>select[name="bag_emirate[]"]').val(childArray.tbl_bag_emi);
                <?php if($this->uri->segment(2)=='edit') { ?> 
                        
                            var emirate_selected= $("#bag_row_block_"+i+">div>select[name='bag_emirate[]']>option:selected").text();
                            var temp_id='bag_row_block_'+i;
                            bagConServiceSelector="#"+temp_id+">div>select[name='bag_service_type[]']";
                            dynamicBagConServiceOptions(emirate_selected,bagConServiceSelector);
           <?php } ?>
              $('#bag_row_block_'+i+' >div>select[name="bag_service_type[]"]').val(childArray.tbl_bag_servi);
              $('#bag_row_block_'+i+' >div>input[name="bag_price[]"]').val(childArray.tbl_bag_price);
              $('#bag_row_block_'+i+' >div>input[name="bag_same_loc_price[]"]').val(childArray.tbl_bag_same_loc_p);
              $('#bag_row_block_'+i+' >div>input[name="bagsHid[]"]').val(childArray.id);
              $("#remove_bag_row_btn_"+i).attr("onclick","delete_rows_('"+i+"','b', '"+childArray.id+"')");
                  
                }
                
        //CASH QOUTS
        
         for(let i = 0; i < response.cash_qout.length; i++){
                
                let childArray = response.cash_qout[i];
                
                if(i>0){
                    var idd=childArray.id;
                    var jj=i-1;
                     add_new_cash_row(jj);
                        
                    }
                  
             $('#cash_row_block_'+i+' >div>select[name="cash_emirate[]"]').val(childArray.tbl_cash_emi);
               <?php if($this->uri->segment(2)=='edit') { ?> 
                        
                            var emirate_selected= $("#cash_row_block_"+i+">div>select[name='cash_emirate[]']>option:selected").text();
                            var temp_id='cash_row_block_'+i;
                            cashConServiceSelector="#"+temp_id+">div>select[name='cash_service_type[]']";
                            dynamicCashConServiceOptions(emirate_selected,cashConServiceSelector);
           <?php } ?>
              $('#cash_row_block_'+i+' >div>select[name="cash_service_type[]"]').val(childArray.tbl_cash_servi);
              $('#cash_row_block_'+i+' >div>input[name="cash_price[]"]').val(childArray.tbl_cash_price);
              $('#cash_row_block_'+i+' >div>input[name="cash_same_loc_price[]"]').val(childArray.tbl_cash_same_loc_p);
              $('#cash_row_block_'+i+' >div>input[name="cashHid[]"]').val(childArray.id);
              $("#remove_cash_row_btn_"+i).attr("onclick","delete_rows_('"+i+"','c', '"+childArray.id+"')");
                   
                  
                }
        }
    },'json');
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
                    url: "<?php echo base_url('vendor/deli') ?>",
                  success: function (data) {
                      console.log(aci);
                      if(aci=='b'){
                          remove_bag_row(rid)
                      }else if(aci=='c'){
                       remove_cash_row(rid)
                      }else if(aci =='d'){
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

function update_vendor(){
    
//FIRST CHECK EMPTY VALIDATIONS


    $('select').removeAttr('disabled');

  

    var valid_check=1;
    var term_check=1;
    if($("#term").val() =='' || $("#inv_email").val() =='' || $("#inv_address").val() =='' || $("#trn").val() =='' || $("#name").val() =='' || $("#email").val() =='' || $("#phone").val() =='' || $("#address").val() =='' || $("#s_pass").val() =='' || $("#module").val() =='' || $("#delivery_message").val() ==''  || $("#bag_message").val() ==''  || $("#cash_message").val() ==''   ){
      
      
      
        valid_check=0;
         console.log('Error :'+valid_check);
    }
    
    
    if($("#term").val() =='00' || $("#term").val() =='0' || $("#term").val() ==00 || $("#term").val() ==0){
        
               valid_check=0;
               term_check=0;
             console.log('Error in term :'+valid_check);
        
         }
    
    
    
    //DELIVERY EMPTY FIELD CHECK
  
       var deliv_price_array = new Array();
       var deliv_samprice_array = new Array();
       var deliv_emi_array = new Array();
       var deliv_ser_array = new Array();
       
        var deliv_price_array = $("input[name='delivery_price[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<deliv_price_array.length;i++){
                if(deliv_price_array[i] === ""){
                  valid_check=0;
                    }
            }
       
       var deliv_samprice_array = $("input[name='delivery_same_loc_price[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<deliv_samprice_array.length;i++){
                if(deliv_samprice_array[i] === ""){
                   valid_check=0;
                    }
            }
            
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
            
    //CASH EMPTY FIELD CHECK
     var cash_price_array = new Array();
       var cash_samprice_array = new Array();
       var cash_emi_array = new Array();
       var cash_ser_array = new Array();
       
        var cash_price_array = $("input[name='cash_price[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<cash_price_array.length;i++){
                if(cash_price_array[i] === ""){
                  valid_check=0;
                    }
            }
       
       var cash_samprice_array = $("input[name='cash_same_loc_price[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<cash_samprice_array.length;i++){
                if(cash_samprice_array[i] === ""){
                   valid_check=0;
                    }
            }
            
        var cash_emi_array = $("select[name='cash_emirate[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<cash_emi_array.length;i++){
                if(cash_emi_array[i] === ""){
                   valid_check=0;
                    }
            }
            
         var cash_ser_array = $("select[name='cash_service_type[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<cash_ser_array.length;i++){
                if(cash_ser_array[i] === ""){
                   valid_check=0;
                    }
            }
            
    
    //BAGS EMPTY FIELD CHECk
    
       var bag_price_array = new Array();
       var bag_samprice_array = new Array();
       var bag_emi_array = new Array();
       var bag_ser_array = new Array();
       
        var bag_price_array = $("input[name='bag_price[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<bag_price_array.length;i++){
                if(bag_price_array[i] === ""){
                  valid_check=0;
                    }
            }
       
       var bag_samprice_array = $("input[name='bag_same_loc_price[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<bag_samprice_array.length;i++){
                if(bag_samprice_array[i] === ""){
                   valid_check=0;
                    }
            }
            
        var bag_emi_array = $("select[name='bag_emirate[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<bag_emi_array.length;i++){
                if(bag_emi_array[i] === ""){
                   valid_check=0;
                    }
            }
            
         var bag_ser_array = $("select[name='bag_service_type[]']")
              .map(function(){return $(this).val();}).get();
              for(var i=0;i<bag_ser_array.length;i++){
                if(bag_ser_array[i] === ""){
                   valid_check=0;
                    }
            }
    
    
    if(valid_check == 1){
        
   
        // hide_error();

    //     var name = $("#name").val();
         var email = $("#email").val();
    //     var phone = $("#phone").val();
    //     var address = $("#address").val();
    //     var Password_partner=$("#s_pass").val();
       
    //   // var deliv_emi=$('#delivery_emirate');
    //     // var values = $("select[name='delivery_emirate[]']")
    //     //       .map(function(){return $(this).val();}).get();
    //     console.log($("select[name='delivery_emirate[]']"));
    //     var myArray=$("select[name='delivery_emirate[]']");
        
    //     var deliv_qouts = new Array();
    //     //array('first' => 'Item 1', 'second' => 'Item 2') 
    //     $.each(myArray, function (index, value) {
    //         deliv_qouts=(
    //             'emirate' =>'+$("select[name='delivery_emirate[]']")+',
    //             // 'service_type' =>delivery_service_type[index],
    //             // 'price' =>delivery_price[index],
    //             // 'same_loc_price' =>delivery_same_loc_price[index]
                
    //             );
       
    // });
    
    //  console.log(deliv_qouts);
     
     
    //     var modules=$("#module").val();
    //     if (modules == '') 
    //         modules = 'Not Assignd';
    //     else
    //         modules = modules.join(',');

    //     //console.log(modules);
    //   var contract_file=$('input:file').text();
         //var vendor_id = $("#vendor_id").val();
         var urll=window.location.pathname;
         var vid = urll.substring(urll.lastIndexOf('/') + 1);
            $("#vendor_id").val(vid);
    
   //$('#add_vendor_form').attr('action', 'vendor/update_vendor'); 
  // $('form').get(0).setAttribute('action', '<?php echo base_url()+'Vendor/update_vendor'; ?>');
// $('#add_vendor_form').attr('action', '<?php echo base_url()+'Vendor/update_vendor'; ?>');
 
    // $('form').on('submit', function (e) {

    //       e.preventDefault();
    // var fileInput = document.getElementById('contract_file');
    //         var file = fileInput.files[0];
    //         var formData = new FormData();
    //         formData.append('file', file);
    //         console.log(fileInput);$('form').serialize()
     console.log($('#contract_file').val());
     if($('#contract_file').val() == ''){
         var n_f_is=0;
     }else{
         var n_f_is=1;
     }
    // var inp2 =$('#av').attr('href');
         
          
    
    var formData = new FormData($('form')[0]);
    
    
   
   // console.log(inp2);

          $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "<?php echo base_url('vendor/update_vendor/') ?>"+n_f_is,
            data:formData,
            processData: false,
            contentType: false,

            success: function (data) {
               console.log(data);
              Swal.fire({position:"center",
                    type:"success",
                    title:"Data has been updated successfully!",
                    showConfirmButton:!1,
                    timer:49000});

                   window.location.replace("<?php echo base_url(Partner); ?>");
            }
          });

      
    }else{
        
        
        if(term_check ==0){
        
       
             swal('Term can not be "0 ,00 ,- "', 'Please Fill the Required(*) Field Carefully', 'error');
             console.log('Error in term :'+valid_check);
        
         }else{
              swal('missing fields', 'Please Fill the Required(*) Fields', 'error');
               console.log('Error :'+valid_check);
        
           }
    }
        
        

    }
  
//shan 
<?php if($this->session->userdata('role_id') == 2){ ?>
<!--<script src="https://logxchat.com/js/tcb_chat.js"></script>-->
<?php } ?>
</script>



    </body>
</html>