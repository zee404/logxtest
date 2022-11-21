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
        <link href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/libs/custombox/custombox.min.css');?>" rel="stylesheet">
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />

        <style type="text/css">
            .fixed-table-loading{
                display: none;
            }
            .fixed-table-container thead th .th-inner 
            {
                padding: .0rem !important;
            }
            input[name=btSelectAll], input[name=btSelectItem] {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
    display: none;
}
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
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Team </a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Outdoor Team</a></li>
                                   
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Track Driver</a></li>
                                  
                                </ol>
                            </div>
                            <h4 class="page-title">Track Drivers</h4>
                        </div>
                    </div>
                </div>     
              
                  <h2 class="page-title">Location</h2>
                 <div class="row">
                    <?php 
                    // echo "<pre>";
                    // print_r($drivers['records']);
                    ?>
                   <div class="col-md-6 card-box" style="background-color: cadetblue !important;">
                    <div class="portlet box blue">
                         <label>Select Driver</label>
                            <select class="form-control" name="role_name" id="role">
                                <option value="">Select Driver</option>
                                <?php 
                                if ($drivers['records']) {
                                    foreach ($drivers['records'] as $driver) {
                                        if ($driver->id == $this->uri->segment(3)) {
                                            
                                        echo '<option value="'.$driver->id.'" selected>'.$driver->full_name.'</option>';
                                        }else{
                                            
                                        echo '<option value="'.$driver->id.'">'.$driver->full_name.'</option>';
                                        }
                                    }
                                }
                                ?>
            
                        </select>    
                                   
                    </div>

                    </div>
                    
                 
            </div>
           <div class="col-lg-12 right" style=" width:100%; height:550px; " id="map" ><!-- end container -->
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
      
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?php echo base_url('assets/js/vendor.min.js');?>"></script>
<!--shan-->
        <?php if($this->session->userdata('role_id') == 2){ ?>
            <!--<script src="https://logxchat.com/js/tcb_chat.js"></script>;-->
        <?php } else if($this->session->userdata('role_id') == 1){ ?>
            <!-- <script type="text/javascript" src="<?php echo base_url('assets/chat/js/socket.io.js') ?>"></script> -->
            <!--<script src="https://logxchat.com/socket.io/socket.io.js"></script>-->
            <!--<script src="<?php echo base_url('assets/chat/js/csrChat.js').'?vvv='.date('YmdH') ?>"></script>-->
        <?php } ?>
        
        <script src="<?php echo base_url('assets/libs/custombox/custombox.min.js');?>"></script>
        <!-- Bootstrap Tables js -->
        <script src="<?php echo base_url('assets/libs/bootstrap-table/bootstrap-table.min.js');?>"></script>

        <!-- Init js --> 
        <script src="<?php echo base_url('assets/js/pages/bootstrap-tables.init.js');?>"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0sk96d2zQVJb0zOOLk6xxV_3EqfG4tRY">
         </script>
         <script src="<?php echo base_url('plugin/js/google-map.js');?>"></script>
        <!-- <script src="<?php //echo base_url('assets/js/app.min.js');?>"></script> -->
        <script src="<?php echo base_url('assets/js/collect_notifications.js');?>"></script>
        <script type="text/javascript">

            $('#role').change(function(e){
                var id = $(this).val();
                window.location.href="<?php echo base_url('Driver/track_driver/') ?>"+id;
                // window.location.reload()
            });


            var google;
            var lat = "<?php echo $this->uri->segment(4)?$this->uri->segment(4):'25.1859067'; ?>";
            var lng = "<?php echo $this->uri->segment(5)?$this->uri->segment(5):'55.2580765'; ?>";
            console.log("LAT:"+lat+ "LNG:"+lng);
            function init() {
                console.log('in init function')
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                // var myLatlng = new google.maps.LatLng(40.71751, -73.990922);
                var myLatlng = new google.maps.LatLng(lat,lng);
                // 39.399872
                // -8.224454

                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 16,

                    // The latitude and longitude to center the map (always required)
                    center: myLatlng,

                    // How you would like to style the map. 
                    scrollwheel: false,
                    styles: [{
                        "featureType": "administrative.country",
                        "elementType": "geometry",
                        "stylers": [{
                                "visibility": "simplified"
                            },
                            {
                                "hue": "#ff0000"
                            }
                        ]
                    }]
                };

                new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    icon: 'images/loc.png'
                });

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                var geocoder = new google.maps.Geocoder();

                var addresses = ['IRIS BAY TOWER, BUSINESS BAY, DUBAI, UAE.'];

                var coordinates = [];

                // for (var x = 0; x < addresses.length; x++) {
                //     $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
                //         var p = data.results[0].geometry.location
                //         var latlng = new google.maps.LatLng(p.lat, p.lng);
                //         new google.maps.Marker({
                //             position: latlng,
                //             map: map,
                //             icon: 'images/loc.png'
                //         });


                //     });
                //     console.log('in loop')

                //     geocodeAddress(geocoder, map, addresses[x]);
                // }

                // var latlng = new google.maps.LatLng(p.lat, p.lng);
                //         new google.maps.Marker({
                //             position: latlng,
                //             map: map,
                //             icon: 'images/loc.png'
                //         });




                function geocodeAddress(geocoder, resultsMap, address, coordinates) {
                    console.log('geocodeAddress called');
                    geocoder.geocode({
                        'address': address
                    }, function(results, status) {
                        if (status === 'OK') {
                            resultsMap.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: resultsMap,
                                position: results[0].geometry.location
                            });
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }


                function getRegionForCoordinates(points) {
                    // points should be an array of { latitude: X, longitude: Y }
                    let minX, maxX, minY, maxY;

                    // init first point
                    ((point) => {
                        minX = point.latitude;
                        maxX = point.latitude;
                        minY = point.longitude;
                        maxY = point.longitude;
                    })(points[0]);

                    // calculate rect
                    points.map((point) => {
                        minX = Math.min(minX, point.latitude);
                        maxX = Math.max(maxX, point.latitude);
                        minY = Math.min(minY, point.longitude);
                        maxY = Math.max(maxY, point.longitude);
                    });

                    const midX = (minX + maxX) / 2;
                    const midY = (minY + maxY) / 2;
                    const deltaX = (maxX - minX);
                    const deltaY = (maxY - minY);

                    return {
                        latitude: midX,
                        longitude: midY,
                        latitudeDelta: deltaX,
                        longitudeDelta: deltaY
                    };
                }

            }
            google.maps.event.addDomListener(window, 'load', init);
        </script>
    </body>
</html>