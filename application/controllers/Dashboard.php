<?php 
/**
 * a controller to deal all the calculations showed in Dashboard
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if(empty($this->session->userdata('email')))
			redirect(base_url());

		$this->load->model('dashboard_model', 'DM');
	}

	function index()
	{

	}

	// dashboard counter stats are calculated here
	function get_stats()
	{
		$data['deliveries'] = $this->DM->get_deliveries();
		$data['users'] = $this->DM->get_users();
	}

	function get_pie_chart()
	{
		$sd = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : date('Y-m-d');
		$ed = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : date('Y-m-d');
		$data['results'] = $this->DM->get_pie_charts($sd, $ed);
		
		echo json_encode($data);
	}
	function get_deliveries_chart()
	{
		$sd = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : date('Y-m-d');
		$ed = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : date('Y-m-d');
		$data['results'] = $this->DM->get_deliveries_by_slots($sd, $ed);
		
		echo json_encode($data);
	}

	function get_notifications()
	{
		$notis = $this->DM->collect_notifs(strtolower($this->session->userdata('role')));
		echo json_encode($notis);
	}

	function get_comp_chart()
	{
		$sd = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : null;
		$ed = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : null;
		if($sd == $ed)
		{	
			$sd = date('Y-m-d', strtotime('previous monday'));
			$ed = date('Y-m-d', strtotime('next monday'));
		}
		$d = $this->DM->calculate_compare_charts($sd, $ed);
		$timestamp = strtotime('previous Monday');
		$days = array();
		/*for ($i = 0; $i < 7; $i++) {
    		$days[] = date('Y-m-d', $timestamp);
    		$timestamp = strtotime('+1 day', $timestamp);
		}*/
		$sd = date('Y-m-d', strtotime($sd));
		$ed = date('Y-m-d', strtotime($ed));
		
		while($sd != $ed)
		{
			$days[] = $sd;
			$sd = date('Y-m-d', strtotime($sd.' +1 day'));	
		}

		$d['days'] = $days;
		echo json_encode($d);
	}
	
	
	function get_pie_chart_for_all()
	{
		$sd = !empty($this->input->post('start_date')) ? $this->input->post('start_date') : date('Y-m-d');
		$ed = !empty($this->input->post('end_date')) ? $this->input->post('end_date') : date('Y-m-d');
// 		$data['results']
	 $re1= $this->DM->get_pie_charts_for_all($sd, $ed);
	
// 	 $data['results']=$re1;
// 		echo json_encode($data);
// 		die();
// 		dd($data);
		$re2= $this->DM->re2($sd, $ed);
		$re3= $this->DM->re3($sd, $ed);
		$re4= $this->DM->re4($sd, $ed);
		
		$re5= $this->DM->re5($sd, $ed);
		$re6= $this->DM->re6($sd, $ed);
		
		
		
// 		$data['re2']=$re2;
// 		$data['re3']=$re3;
// 		$data['re4']=$re4;

$round1='';
$round2='';
$round3='';

$round4='';
$round5='';


      if(count($re6)!=''){
		   
		   if(count($re1) > count($re6) ){
		      // echo 're1 is big';
		       $c=count($re1);
		       $inn=$re6;
		       $out=$re1;
		       
		   }else{
		      // echo 're4 is big';
		       $c=count($re6);
		       $inn=$re1;
		       $out=$re6;
		   }
		  foreach($out as $key=>$val ){
		      //  echo 'val1:'.$val->label;
		      //  die();
		      foreach($inn as $key2=>$val2 ){
		          //echo 'val1:'.$val->label.'  val2:'.$val2->label;
		      if($val->label == $val2->label){
		          //echo 'Matched';
		          $v1=$val->value;
		          $v2=$val2->value;
		          $vfinal=$v1+$v2;
		          $val->value=$vfinal;
		          
		          //echo '<br> VAL IS:'.$vfinal;
		          //$inn->detach($val2);
		          
		         
		          unset($inn[$key2]);
		          break;
		      }
		      //else{
		      //     echo 'Not Matched';
		      //}
		      }
		   }
		   
		   
		   $round1 = array_merge( $out, $inn );
		  // echo 'OUT<pre>';
		  // print_r($out);
		  // echo 'IN<pre>';
		  // print_r($inn);
		  // die();
		  // dd($round1);
		   
		}
		
		if($round1 ==''){
		    $round1=$re6;
		}



       if(count($re5)!=''){
		   
		   if(count($re1) > count($re5) ){
		      // echo 're1 is big';
		       $c=count($re1);
		       $inn=$re5;
		       $out=$re1;
		       
		   }else{
		      // echo 're4 is big';
		       $c=count($re5);
		       $inn=$re1;
		       $out=$re5;
		   }
		  foreach($out as $key=>$val ){
		      //  echo 'val1:'.$val->label;
		      //  die();
		      foreach($inn as $key2=>$val2 ){
		          //echo 'val1:'.$val->label.'  val2:'.$val2->label;
		      if($val->label == $val2->label){
		          //echo 'Matched';
		          $v1=$val->value;
		          $v2=$val2->value;
		          $vfinal=$v1+$v2;
		          $val->value=$vfinal;
		          
		          //echo '<br> VAL IS:'.$vfinal;
		          //$inn->detach($val2);
		          
		         
		          unset($inn[$key2]);
		          break;
		      }
		      //else{
		      //     echo 'Not Matched';
		      //}
		      }
		   }
		   
		   
		   $round1 = array_merge( $out, $inn );
		  // echo 'OUT<pre>';
		  // print_r($out);
		  // echo 'IN<pre>';
		  // print_r($inn);
		  // die();
		  // dd($round1);
		   
		}
		
		if($round1 ==''){
		    $round1=$re5;
		}


		
		if(count($re4)!=''){
		   
		   if(count($re1) > count($re4) ){
		      // echo 're1 is big';
		       $c=count($re1);
		       $inn=$re4;
		       $out=$re1;
		       
		   }else{
		      // echo 're4 is big';
		       $c=count($re4);
		       $inn=$re1;
		       $out=$re4;
		   }
		  foreach($out as $key=>$val ){
		      //  echo 'val1:'.$val->label;
		      //  die();
		      foreach($inn as $key2=>$val2 ){
		          //echo 'val1:'.$val->label.'  val2:'.$val2->label;
		      if($val->label == $val2->label){
		          //echo 'Matched';
		          $v1=$val->value;
		          $v2=$val2->value;
		          $vfinal=$v1+$v2;
		          $val->value=$vfinal;
		          
		          //echo '<br> VAL IS:'.$vfinal;
		          //$inn->detach($val2);
		          
		         
		          unset($inn[$key2]);
		          break;
		      }
		      //else{
		      //     echo 'Not Matched';
		      //}
		      }
		   }
		   
		   
		   $round1 = array_merge( $out, $inn );
		  // echo 'OUT<pre>';
		  // print_r($out);
		  // echo 'IN<pre>';
		  // print_r($inn);
		  // die();
		  // dd($round1);
		   
		}
		
		if($round1 ==''){
		    $round1=$re4;
		}
// 		dd($round1);
		
		if(count($re3)!=''){
		   
		   if(count($round1) > count($re3) ){
		      // echo 're1 is big';
		       $c=count($round1);
		       $inn=$re3;
		       $out=$round1;
		       
		   }else{
		      // echo 're4 is big';
		       $c=count($re3);
		       $inn=$round1;
		       $out=$re3;
		   }
		  foreach($out as $key=>$val ){
		      //  echo 'val1:'.$val->label;
		      //  die();
		      foreach($inn as $key2=>$val2 ){
		          //echo '<br>val1:'.$val->label.'  val2:'.$val2->label;
		      if($val->label == $val2->label){
		          //echo 'Matched';
		          $v1=$val->value;
		          $v2=$val2->value;
		          $vfinal=$v1+$v2;
		          $val->value=$vfinal;
		          
		          //echo '<br> VAL IS:'.$vfinal;
		          //$inn->detach($val2);
		          
		         
		          unset($inn[$key2]);
		          break;
		      }
		      //else{
		      //     echo 'Not Matched';
		      //}
		      }
		   }
		   
		   $round1='';
		   $round1 = array_merge( $out, $inn );
		  // echo 'OUT<pre>';
		  // print_r($out);
		  // echo 'IN<pre>';
		  // print_r($inn);
		  // die();
		  // dd($round1);
		   
		}
		
		if(count($round1) ==''){
		    
		    $round1=$re3;
		}
		
		if(count($re2)!=''){
		   
		   if(count($round1) > count($re2) ){
		      // echo 're1 is big';
		       $c=count($round1);
		       $inn=$re2;
		       $out=$round1;
		       
		   }else{
		      // echo 're4 is big';
		       $c=count($re2);
		       $inn=$round1;
		       $out=$re2;
		   }
		  foreach($out as $key=>$val ){
		      //  echo 'val1:'.$val->label;
		      //  die();
		      foreach($inn as $key2=>$val2 ){
		          //echo '<br>val1:'.$val->label.'  val2:'.$val2->label;
		      if($val->label == $val2->label){
		          //echo 'Matched';
		          $v1=$val->value;
		          $v2=$val2->value;
		          $vfinal=$v1+$v2;
		          $val->value=$vfinal;
		          
		          //echo '<br> VAL IS:'.$vfinal;
		          //$inn->detach($val2);
		          
		         
		          unset($inn[$key2]);
		          break;
		      }
		      //else{
		      //     echo 'Not Matched';
		      //}
		      }
		   }
		   
		   $round1='';
		   $round1 = array_merge( $out, $inn );
		  // echo 'OUT<pre>';
		  // print_r($out);
		  // echo 'IN<pre>';
		  // print_r($inn);
		  // die();
		  // dd($round1);
		   
		}
		
		if(count($round1) ==''){
		    $round1=$re2;
		    
		}
	
		
		if(count($round1) ==''){
		    $round1=$re1;
		}

  $data['results']=$round1;	
  $array_p = (array)$round1;
  arsort($array_p);
  $myArray = array_values($array_p);
  $data['sho']=$myArray;
//   dd($data['sho']);
//   $array_p=(object)$array_p;
//   $array_p=json_encode($array_p);
//   $array_p=json_encode($array_p);
//   echo json_encode($round1);
//   die();
//   	dd($array_p);
//   $uff=json_encode($array_p);
//   $data['results']=(object)$array_p;
// 		dd($data['results']);
// 		die();
// 		dd($data);
 
		echo json_encode($data);
	}
}

 ?>