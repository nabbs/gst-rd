<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();
	class hajj  extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('flights_model');
			$this->load->model('hajj_model');
			$this->load->helper('url');
		}
		public function index($slug=null) {
		//this function will retrive all entry in the database
		 //$data['results'] = $this->flights_model->get_all_flights();
		 $data['get_hajj'] = $this->hajj_model->all();
		if(@$_GET){
		$data['get_hajj'] = $this->hajj_model->get_search(@$_GET);
		     if(!@$_GET['room_type'] and !@$_GET['room_rating'] and !@$_GET['starting_date'] and !@$_GET['hajj_end_date']){
			 $data['get_hajj'] = $this->hajj_model->all();
			 }
		 }
		 
		$data['page_title'] = "Flights";
		$data['master_body'] = "index";
		$this->load->layout('hajj',$data);
 		}
		public function view($slug=null){
			$this->db->select('*');
			$this->db->where_in('post_slug',array($slug));
			$this->db->where('post_type','hajj');
			$this->db->from('gp_post');
			$query = $this->db->get();
			$data['results'] = $query->row_array();
			$this->db->select('post_title,post_slug');
			$this->db->where('post_type','hajj');
			$this->db->from('gp_post');
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			$data['recent_posts'] = $query->result_array();
			
			
			$data['page_title'] = $data['results']['post_title'];
			$data['master_body'] = "view";
			$this->load->layout('hajj',$data);
		}
		public function subscription(){
			$reqData = $this->input->post();
			$this->db->select('*');
			$this->db->where('email',$reqData['email']);
			$this->db->from('gp_subscription');
			$query = $this->db->get();
			$res = $query->num_rows();
			if($res<=0){
				$sendData = ['email'=>$reqData['email'],'created'=>time(),'modified'=>time()];
				if($this->db->insert('gp_subscription',$sendData)){
					echo "<p class='alert-success' style='  margin-top: 6px;
    padding: 10px;  color: #155724;    background-color: #d4edda; border-color: #c3e6cb;'><strong>You are Subscribe in Our Newsletter</strong></p>";
					die;
				}
			}else{
				echo "<p class='alert-alert' style='margin-top: 6px;
    padding: 10px; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;'><strong>Email Already Exists ! </strong></p>";
					die;				
			}
		}
		
		
		
		
		
	public	function get_more_data(){
	
    $abc = $this->input->post();
    $database_name = 'gp_hajj';
   //print_r($abc);
   $rowVal = $_POST['room_type'];
  //print_r("popopop"); die;
  array_unshift($rowVal,"flana");
  unset($rowVal[0]);
  $cArr = count($rowVal);
  $likeStr = '';
 foreach($rowVal as $key => $value){
	if($_POST['medina_val']){
		$likeStr .= 'medina_room_type LIKE '.'"%'.$value.'%"';
	       }else{
		$likeStr .= 'room_type LIKE '.'"%'.$value.'%"';
	 }
 If ($cArr > 1 && $cArr != $key){
   $likeStr .= " OR ";
     }
   }
  // print_r($likeStr); die;

    //$conditions = array();
    //$conditions = array('room_rating' => $_POST['makkah_val']);

//print_r($abc);  :flight_included_multiple_checkox_val
    if($_POST['flight_included'] != ''){   
        //$conditions['room_rating']= $_POST['makkah_val']; 
        $con_flight_included = $_POST['flight_included'];
    }
    if($_POST['makkah_val'] != ''){   
        //$conditions['room_rating']= $_POST['makkah_val']; 
        $con_makha = $_POST['makkah_val'];
    }
    if($_POST['medina_val'] != ''){ 
      $con_medina = $_POST['medina_val'];
    }
    if($_POST['room_type'] != ''){
      //$conditions = array('room_rating' => $_POST['makkah_val'] . ',');
      //$conditions['room_type']=$_POST['room_type'];
      //$this->db->where_in('room_type', $_POST['room_type']);
      $con_roomtype = $_POST['room_type'];
    }
    if($_POST['room_basis'] != ''){
      //$conditions = array('room_rating' => $_POST['makkah_val'] . ',');
      $con_roombasis=$_POST['room_basis'];
    }
    if($_POST['rangesValues'] != ''){
      //$conditions = array('room_rating' => $_POST['makkah_val'] . ',');
      $conditions['rangesValues']=explode(',', $_POST['rangesValues']);
    }
    if($_POST['makkah_checkbox_state'] == 'unchecked'){
     // unset($conditions['room_rating']);
      unset($con_makha);
    }
    if($_POST['medina_checkbox_state'] == 'unchecked'){
      //unset($conditions['medina_val']);
      unset($con_medina);
    }
    if($_POST['roomtype_checkbox_state'] == 'unchecked'){
      //unset($conditions['room_type']);
      unset($con_roomtype);
    }
    if($_POST['roombasis_checkbox_state'] == 'unchecked'){
      //unset($conditions['room_basis']);
      unset($con_roombasis);
    }
    if($_POST['rangesValues'] == 'unchecked'){
      unset($conditions['rangesValues']);
    }
    if($_POST['flight_included_checkbox_state'] == 'unchecked'){
      unset($con_flight_included);
    }
    
    if($_POST['reset_filters'] ){
      unset($con_makha);
      unset($con_medina);
      unset($con_roomtype);
      unset($con_roombasis);
    // unset($conditions);
     /* $this->db->select('*');
      $po = $this->db->from($database_name);
      $query1= $this->db->get();
      $query = $query1->result_array();
      $rows = $query1->num_rows();*/
    }
  
$this->db->select('*');
$po = $this->db->from($database_name);

if($con_makha){
       $this->db->where_in('room_rating',  $con_makha);
}
if($con_medina){
       $this->db->where_in('medina_room_rating',  $con_medina);
}
//$this->db->group_end();
if($con_roomtype){
       //$this->db->where_in('room_type',  $con_roomtype);$likeStr
	   $this->db->where($likeStr);
}
if($con_roombasis){
       $this->db->where_in('room_basis',  $con_roombasis);
}
if($con_flight_included){
       $this->db->where_in('flights',  $con_flight_included);
}
if($conditions){
  //$this->db->where($conditions);
  //$this->db->where("room_type_quad_value BETWEEN ".$conditions['rangesValues'][0] ." AND ". $conditions['rangesValues'][1]);
}
    // $this->db->where_in('room_type',  array('triple(3)','quad(4)'));
    $query1= $this->db->get();
    $query = $query1->result_array();
    $rows = $query1->num_rows();
 //echo $this->db->last_query();
    $data.="<p class='hj-row' >".$rows."</p>";
//print_r($conditions);
//print_r($po); 
    if($rows != '' || $rows != 0  || $rows != undefined){
/*************************************************************************************/
    if (!(isset($_POST['pagenum']))) { 
       $pagenum = 1; 
    } else {
      $pagenum = $_POST['pagenum'];     
    }
    //Number of results displayed per page  by default its 10.
    $page_limit =  ($_POST["show"] <> "" && is_numeric($_POST["show"]) ) ? intval($_POST["show"]) : 5;
    $last = ceil($rows/$page_limit); 
    if ($pagenum < 1) { 
      $pagenum = 1; 
    } elseif ($pagenum > $last)  { 
      $pagenum = $last; 
    }
    $lower_limit = ($pagenum - 1) * $page_limit;
    //print_r($lower_limit . 'dfdf'); die;
    $this->db->select('*');
    $po = $this->db->from($database_name);

    if($con_makha){
           $this->db->where_in('room_rating',$con_makha);
    }
    if($con_medina){
           $this->db->where_in('medina_room_rating',  $con_medina);
    }
    if($con_roomtype){
           //$this->db->where_in('room_type',  $con_roomtype);
		   $this->db->where($likeStr);
    }
    if($con_roombasis){
           $this->db->where_in('room_basis',  $con_roombasis);
    }
    if($con_flight_included){
       $this->db->where_in('flights',  $con_flight_included);
}
    if($conditions){
      $this->db->where("price BETWEEN ".$conditions['rangesValues'][0] ." AND ". $conditions['rangesValues'][1]);
    }
    $this->db->limit($page_limit,$lower_limit);
    $query2= $this->db->get();
    $query = $query2->result_array();
	//echo $this->db->last_query();
	//print_r($query);
    $rows_new = $query2->num_rows();
$data.="<p class='hj-row-new' >".$rows_new."</p>";
/*************************************************************************************/
 // print_r($rows);  
    $rowCount = 1;
    foreach($query as $val):
      $address = $val['hotel_address']; // Address
      $medina_address = $val['medina_hotel_address']; // Address
      $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
      $geo = json_decode($geo, true); // Convert the JSON to an array
      if ($geo['status'] == 'OK') {
        $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
        $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
      }
      $iframe = '<iframe width="100%" 
  height="270" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
  $iframe1 = '<iframe width="100%" 
  height="270" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $medina_address)) . '&z=14&output=embed"></iframe>';
 

   //   print_r($val);
       if ($rowCount++ % 2 == 1 ){ $class="hajj_results_even"; }
        else{$class="hajj_results_odd";}  

      $data .= '<li class="jplist-panel box panel-top" style="list-style:none;">
      <div class="triangle-top-right"></div>
      <div class="hajj_results">
       <div class="panel panel-default '. $class .'">
        <div class="panel-body gp_package" >
          <div class="topcorner"></div>
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 hajj_upper_section">'.$val['company_name'].'</div>
             <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6"></div>
            <!--div class="col-md-3 col-sm-3 col-xs-3 col-lg-3"></div>
            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3"></div-->
          </div>
          <div class="row" style="margin-left:0;margin-right:0;">
        <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 hajj_first_section" style=" background: url(/../assets/files/100X100/'.$val['package_logo'].') no-repeat; height: 130px;  background-size:contain;">
        </div><!--hajj_first_section-->
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 hajj_second_section">
          <ul class="gp_remove_bullets">
          <li><b>Makkah Hotel:</b></li>
          <li class="hajj-royal-scot"><span>'.$val['makka_hotel']. '</span>';
          for($i=1;$i<=$val['room_rating'];$i++){
            $data .= '<i class="fa fa-star yellow_star" aria-hidden="true"></i>'; 
          }
          for($i=1;$i<=5-$val['room_rating'];$i++){
            $data .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
          } 
          $data .= '</li> ';
          $data .= '<li><b>Medina Hotel:</b></li>
          <li class="hajj-royal-scot-medina"><span>'.$val['medina_hotel']. '</span> ';
          for($i=1;$i<=$val['medina_room_rating'];$i++){
            $data .= '<i class="fa fa-star yellow_star" aria-hidden="true"></i>'; }
          for($i=1;$i<=5-$val['medina_room_rating'];$i++){
            $data .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
          }
          $data .='<li class="hajj-more-infoo"><a href="'.$val['website_url'] .'" target="_blank">More Info</a></li>';
          $data .='</li> </ul></div>';
		  

          $data .='<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 hajj_third_section">
           <ul>';
		   if($val['makkha_room_type_quad']!= '' || $val['makkha_room_type_triple']!= '' || $val['makkha_room_type_double']!= ''){
          $data .= '<li>';
          if($val['makkha_room_type_quad']!= ''){
            $data .=  '<span class="room_type_heading">Quad</span>';
          } 
          if($val['makkha_room_type_triple']!= ''){
           $data .= '<span class="room_type_heading">Triple</span>';
         } 
         if($val['makkha_room_type_double']!= ''){
          $data .= '<span class="room_type_heading">Double</span>';
        }
        $data .= '</li>
        <li>';
          if($val['makkha_room_type_quad_price']!= ''){
            $data .= '<span class="hajj_room_type">'.$val['makkha_room_type_quad_price'].'</span>';
          } 
          if($val['makkha_room_type_triple_price']!= ''){
           $data .= '<span class="hajj_room_type">'.$val['makkha_room_type_triple_price'].'</span>';
         } 
         if($val['makkha_room_type_double_price']!= ''){
          $data .= '<span class="hajj_room_type">'.$val['makkha_room_type_double_price'].'</span>';
        }
        $data .= '</li>';
		   }else if($val['medina_room_type_quad']!= '' || $val['medina_room_type_triple']!= '' || $val['medina_room_type_double']!= ''){
			   $data .= '<li>';
          if($val['medina_room_type_quad']!= ''){
            $data .=  '<span class="room_type_heading">Quad</span>';
          } 
          if($val['medina_room_type_triple']!= ''){
           $data .= '<span class="room_type_heading">Triple</span>';
         } 
         if($val['medina_room_type_double']!= ''){
          $data .= '<span class="room_type_heading">Double</span>';
        }
        $data .= '</li>
        <li>';
          if($val['medina_room_type_quad_price']!= ''){
            $data .= '<span class="hajj_room_type">'.$val['medina_room_type_quad_price'].'</span>';
          } 
          if($val['medina_room_type_triple_price']!= ''){
           $data .= '<span class="hajj_room_type">'.$val['medina_room_type_triple_price'].'</span>';
         } 
         if($val['medina_room_type_double_price']!= ''){
          $data .= '<span class="hajj_room_type">'.$val['medina_room_type_double_price'].'</span>';
        }
        $data .= '</li>';
		   }   
         $data .= '<li><b>Room Basis:</b> '.$val['room_basis'].'</li>
          <li><b>Shifting:</b>';
          if($val['shifting'] == '1'){ 
            $data .= 'Yes'; }
            else{ 
              $data .= 'No'; } 
            $data .= '</li>
            <li><b>Flights Included:</b>';
          if($val['flights'] == '1'){ 
            $data .= 'Yes'; }
            else{ 
              $data .= 'No'; } 
            $data .= '</li>
      </ul>
        </div>';
     
      $data .='<button class="btn gp_view_more hajj_view_detail pull-right" >VIEW DEAL</button>';
       $data .='<div class="gp_more_details" style="display:none;">
           <ul>
              <li class="row">
              <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"><b>Makkah Hotel:   </b></div>
              <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 moreVal">'.$val['distence_from_haram'].'</div>
              <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"></div>
        </li>
        <li class="row">
              <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"><b>Medinah Hotel:   </b></div>
              <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 moreVal">'.$val['medina_distence_from_haram'].'</div>
              <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 "></div>
      </li>
       </ul>
     
      </div> ';
      $data .='<div class="row gp_more_details_map" style="display:none;"><div class="inner_map_details">
           <ul class="abc">
              <li style="list-style: none;">
              <div class="col-sm-8 col-md-8 col-xs-8 col-lg-8 "><b>Makkah Hotel Address   </b></div>
			  <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 makkah_close" style="text-align:right;cursor: pointer;"><span>&#10006;</span></div>
        </li>
        <li style="list-style: none;">
              <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 map">'.$iframe . '</div>
        </li>
        
       </ul></div>
      </div> ';
      $data .='<div class="row gp_more_details_map1" style="display:none;"><div class="inner_map_details">
           <ul>
              <li style="list-style: none;">
              <div class="col-sm-8 col-md-8 col-xs-8 col-lg-8 "><b>Medina Hotel Address   </b></div>
			  <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4 medina_close" style="text-align:right;cursor: pointer;"><span>&#10006;</span></div>
        </li>
        <li style="list-style: none;">
              <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 map">'.$iframe1 . '</div>
        </li>
        
       </ul></div>
      </div> </li>
     </ul>';

        endforeach;
        echo $data;
/************************************************************************/
echo '</div></div></div></ul><div class="custom_pagination pull-right">';
  if ( ($pagenum-1) > 0) {
  ?>  
   <!--<a href="javascript:void(0);" class="links" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo 1; ?>');">First</a>-->
  <a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $pagenum-1; ?>');"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
  <?php
  }
  //Show page links
  for($i=1; $i<=$last; $i++) {
    if ($i == $pagenum ) {
?>
    <a href="javascript:void(0);" class="selected" ><?php echo $i ?></a>
<?php
  } else {  
?>
  <a href="javascript:void(0);" class="links"  onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a>
<?php 
  }
} 
if ( ($pagenum+1) <= $last) {
?>
  <a href="javascript:void(0);" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $pagenum+1; ?>');" class="links"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
</a>
<?php } if ( ($pagenum) != $last) { ?>  
  <!-- <a href="javascript:void(0);" onclick="displayRecords('<?php echo $page_limit;  ?>', '<?php echo $last; ?>');" class="links" >Last</a>  -->
<?php
  } 

echo '</div>';
}else{
  echo "<div class='no_result'><img src='assets/images/sademoji.png'><h3>Oops, No Result found ...</h3></div>";
}

/************************************************************************/
        } 	
	}	