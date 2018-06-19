<!DOCTYPE html>
<html lang="en">   
    <?php include("includes/head.php"); ?>	
	<link href="https://www.gosearchtravel.com/assets/frontend/css/jquery.range.css" rel="stylesheet" type="text/css">
<body>

	<main>
	
	  <?php 
    if(!empty($userdata)){
      include("includes/enheader.php");
      }else{

        include("includes/header.php");
        } ?>
        <?php
        foreach ($this->_ci_view_paths as $key => $val) {
            $view_path = $key;
        }
        ?>
        <!-- BEGIN CONTENT -->
        <?php 
		
		if (isset($master_body) && $master_body != "") { ?>
            <?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
        <?php } ?>
        <!-- END CONTENT -->
        <?php include("includes/footer.php"); ?>
		</main>
        <?php include("includes/scripts.php"); ?>
		
<script src="https://esimakin.github.io/twbs-pagination/js/jquery.twbsPagination.js" type="text/javascript"></script>
<script src="https://www.gosearchtravel.com/assets/frontend/js/jquery.range.js"></script>
<script src="https://www.jqueryscript.net/demo/Easy-Any-Content-Pagination-Plugin-jQuery-Paginate-js/jquery.paginate.js"></script>

<script type="text/javascript">

$(document).ready(function(){
  $('.filter_more_options').click(function(){
      $('.room_basis').show();
      $('.filter_more_options').hide();
  });
          
 $("#load").click(function(){
  loadmore();
 });
 
 $(document).on('click', '.gp_more_details_map .inner_map_details .makkah_close', function(){
	 $('.gp_more_details_map').hide();
 });
  $(document).on('click', '.gp_more_details_map1 .inner_map_details .medina_close', function(){
	 $('.gp_more_details_map1').hide();
 });
 
 //view more details codexworld
 
 //$(".gp_view_more").click(function(){
  //$(this).next('.gp_more_details').toggle();
 //});

 $(document).on('click', '.gp_view_more', function(){
  $(this).parent().closest('div').siblings('.gp_more_details').toggle() ;
  //var res = str.split(' ');
  //alert(res);
    // what you want to happen when mouseover and mouseout 
 // $(this).find('.gp_more_details').toggle();
});
$(document).on('click', '.hajj_second_section .hotel_address'  , function(){
   // $(this).parent().closest('div').siblings('.gp_more_details_map .map').toggle();
});
$(document).on('click', '.hajj_second_section .hajj-royal-scot-medina'  , function(){
    $(this).parent().closest('div').siblings('.gp_more_details_map1').toggle();
});
$(document).on('click', '.hajj_second_section .hajj-royal-scot'  , function(){
    $(this).parent().closest('div').siblings('.gp_more_details_map').toggle();
});
/*$(document).on('click', '.hajj_second_section .hotel_address'  , function(){
    console.log('test123');
    //$('.hajj_second_section').siblings('.gp_more_details_map').toggle();
    //$(this).siblings('.gp_more_details_map').toggle();
    var parent = $(this).parent().closest('div').attr('class').split(' ');
    console.log(parent.pop());
    $('.' + parent.pop()).siblings('.gp_more_details_map').toggle();
});*/
/*****************FOR FLIGHT INCLUDED********************/
$(".flight_included").change(function(){
  $('.custom_pagination.pull-right.index_page').hide();
  $('#loading').show();
  $('.clickable-dummy').removeClass('abc');
  $('.hajj_results').css('opacity','0.4');
  var database_name = '<?php echo $page_name[1] ?>';
  /**MAKHA HOTEL**/
  var multiple_checkox_val = [];
  var makkah_checkbox_state = 'unchecked';
  $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
   });
  /**ROOM TYPE**/
  var roomtype_checkbox_state = 'unchecked';
  var roomtype_multiple_checkox_val = [];
  if($('.room_type').is(':checked')) { 
      $('input[name="room_type"]:checked').each(function(i){
          roomtype_multiple_checkox_val[i] = $(this).val();
          roomtype_checkbox_state = 'checked';
      });
    }  
  /**MEDINA HOTEL**/
  var medina_hotel_type = 'unchecked';
  var medina_multiple_checkox_val = [];
  if($('.medina_hotel_type').is(':checked')) { 
      $('input[name="medina_hotel_type"]:checked').each(function(i){
          medina_multiple_checkox_val[i] = $(this).val();
          medina_hotel_type = 'checked';
      });
    }
    /**ROOM BASIS**/
  var roombasis_checkbox_state = 'unchecked';
  var room_basis_multiple_checkox_val = [];
  if($('.room_basis').is(':checked')) { 
      $('input[name="room_basis"]:checked').each(function(i){
          room_basis_multiple_checkox_val[i] = $(this).val();
          roombasis_checkbox_state = 'checked';
      });
    }
var flight_included_checkbox_state = 'unchecked';
  var flight_included_multiple_checkox_val = [];
  if($('.flight_included').is(':checked')) { 
      $('input[name="flight_included"]:checked').each(function(i){
          flight_included_multiple_checkox_val[i] = $(this).val();
          flight_included_checkbox_state = 'checked';
      });
    }
    
  //console.log(multiple_checkox_val);
  
  var rangesValues = $( ".simple-slider" ).val();
    //if($('.room_type').is(':checked')) { var room_type = $('input[name="room_type"]:checked').val(); }
   // if($('.medina_hotel_type').is(':checked')) { var medina_val = $('input[name="medina_hotel_type"]:checked').val(); }
   // if($('.room_basis').is(':checked')) { var room_basis= $('input[name="room_basis"]:checked').val(); }
    var checkbox_val = $(this).val();
    var val = checkbox_val;
    var url1 = '<?php echo base_url(); ?>searchs/po/';
    $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>hajj/get_more_data/',
      data: {     
        makkah_val:multiple_checkox_val, 
        medina_val:medina_multiple_checkox_val ,
        room_type:roomtype_multiple_checkox_val,
        room_basis:room_basis_multiple_checkox_val,
        rangesValues:rangesValues,
        makkah_checkbox_state:makkah_checkbox_state,
        database_name:database_name,
         flight_included:flight_included_multiple_checkox_val,
         flight_included_checkbox_state:flight_included_checkbox_state
      },
      success: function(response)
      { 
        console.log(response);
        if (!$.trim(response))
        {   
            setTimeout(function() {
                $("#loading").hide();             
              $('#example').html('<h3 class="hajj_no_results" style="color:#FFF;">Sorry, No result found for this match ..</h3>') ;
              }, 500);
             $('.hajj_no_results').css('opacity','1');
          }
          else{      
              setTimeout(function() {
                $("#loading").hide(); //hide loading here
                $('.hajj_results').css('opacity','1');
                $('#example').html(response);
              }, 500);
              
          }
          var success =  $($.parseHTML(response)).filter(".hj-row");
       // var success =  $($.parseHTML(response)).filter(".hajj_results");
        console.log(success.length);
            $('.no-of-packages').html(success);
      } 
    });  
}); 
/******************************/
 /*****************FOR MAKKAH HOTEL TYPE********************/
$(".makkah_hotel_type").change(function(){
  $('.custom_pagination.pull-right.index_page').hide();
  $('#loading').show();
  $('.clickable-dummy').removeClass('abc');
  $('.hajj_results').css('opacity','0.4');
  var database_name = '<?php echo $page_name[1] ?>';
  /**MAKHA HOTEL**/
  var multiple_checkox_val = [];
  var makkah_checkbox_state = 'unchecked';
  $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
   });
  /**ROOM TYPE**/
  var roomtype_checkbox_state = 'unchecked';
  var roomtype_multiple_checkox_val = [];
  if($('.room_type').is(':checked')) { 
      $('input[name="room_type"]:checked').each(function(i){
          roomtype_multiple_checkox_val[i] = $(this).val();
          roomtype_checkbox_state = 'checked';
      });
    }  
  /**MEDINA HOTEL**/
  var medina_hotel_type = 'unchecked';
  var medina_multiple_checkox_val = [];
  if($('.medina_hotel_type').is(':checked')) { 
      $('input[name="medina_hotel_type"]:checked').each(function(i){
          medina_multiple_checkox_val[i] = $(this).val();
          medina_hotel_type = 'checked';
      });
    }
    /**ROOM BASIS**/
  var roombasis_checkbox_state = 'unchecked';
  var room_basis_multiple_checkox_val = [];
  if($('.room_basis').is(':checked')) { 
      $('input[name="room_basis"]:checked').each(function(i){
          room_basis_multiple_checkox_val[i] = $(this).val();
          roombasis_checkbox_state = 'checked';
      });
    }
var flight_included_checkbox_state = 'unchecked';
  var flight_included_multiple_checkox_val = [];
  if($('.flight_included').is(':checked')) { 
      $('input[name="flight_included"]:checked').each(function(i){
          flight_included_multiple_checkox_val[i] = $(this).val();
          flight_included_checkbox_state = 'checked';
      });
    }
    
  //console.log(multiple_checkox_val);
  
  var rangesValues = $( ".simple-slider" ).val();
    //if($('.room_type').is(':checked')) { var room_type = $('input[name="room_type"]:checked').val(); }
   // if($('.medina_hotel_type').is(':checked')) { var medina_val = $('input[name="medina_hotel_type"]:checked').val(); }
   // if($('.room_basis').is(':checked')) { var room_basis= $('input[name="room_basis"]:checked').val(); }
    var checkbox_val = $(this).val();
    var val = checkbox_val;
    var url1 = '<?php echo base_url(); ?>searchs/po/';
    $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>hajj/get_more_data/',
      data: {     
        makkah_val:multiple_checkox_val, 
        medina_val:medina_multiple_checkox_val ,
        room_type:roomtype_multiple_checkox_val,
        room_basis:room_basis_multiple_checkox_val,
        rangesValues:rangesValues,
        makkah_checkbox_state:makkah_checkbox_state,
        database_name:database_name,
         flight_included:flight_included_multiple_checkox_val
      },
      success: function(response)
      { 
        console.log(response);
        if (!$.trim(response))
        {   
            setTimeout(function() {
                $("#loading").hide();             
              $('#example').html('<h3 class="hajj_no_results" style="color:#FFF;">Sorry, No result found for this match ..</h3>') ;
              }, 500);
             $('.hajj_no_results').css('opacity','1');
          }
          else{      
              setTimeout(function() {
                $("#loading").hide(); //hide loading here
                $('.hajj_results').css('opacity','1');
                $('#example').html(response);
              }, 500);
              
          }
          var success =  $($.parseHTML(response)).filter(".hj-row");
       // var success =  $($.parseHTML(response)).filter(".hajj_results");
        console.log(success.length);
            $('.no-of-packages').html(success);
      } 
    });  
}); 
/******************************/
/*****************FOR MEDINA HOTEL TYPE********************/
$(".medina_hotel_type").change(function(){
  $('.custom_pagination.pull-right.index_page').hide();
  $('#loading').show();
  $('.clickable-dummy').removeClass('abc');
  $('.hajj_results').css('opacity','0.4');
  var database_name = '<?php echo $page_name[1] ?>';
  var medina_hotel_type = 'unchecked';
  /**MAKHA HOTEL**/
  var multiple_checkox_val = [];
  var makkah_checkbox_state = 'unchecked';
  $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
   });
  /**ROOM TYPE**/
  var roomtype_checkbox_state = 'unchecked';
  var roomtype_multiple_checkox_val = [];
  if($('.room_type').is(':checked')) { 
      $('input[name="room_type"]:checked').each(function(i){
          roomtype_multiple_checkox_val[i] = $(this).val();
          roomtype_checkbox_state = 'checked';
      });
    }  
  /**MEDINA HOTEL**/
  var medina_hotel_type = 'unchecked';
  var medina_multiple_checkox_val = [];
  if($('.medina_hotel_type').is(':checked')) { 
      $('input[name="medina_hotel_type"]:checked').each(function(i){
          medina_multiple_checkox_val[i] = $(this).val();
          medina_hotel_type = 'checked';
      });
    }
    /**ROOM BASIS**/
  var roombasis_checkbox_state = 'unchecked';
  var room_basis_multiple_checkox_val = [];
  if($('.room_basis').is(':checked')) { 
      $('input[name="room_basis"]:checked').each(function(i){
          room_basis_multiple_checkox_val[i] = $(this).val();
          roombasis_checkbox_state = 'checked';
      });
    }
    var flight_included_checkbox_state = 'unchecked';
  var flight_included_multiple_checkox_val = [];
  if($('.flight_included').is(':checked')) { 
      $('input[name="flight_included"]:checked').each(function(i){
          flight_included_multiple_checkox_val[i] = $(this).val();
          flight_included_checkbox_state = 'checked';
      });
    }
  var rangesValues = $( ".simple-slider" ).val();
    //if($('.room_type').is(':checked')) { var room_type = $('input[name="room_type"]:checked').val(); }
    //if($('.makkah_hotel_type').is(':checked')) { var makkah_val = $('input[name="room_rating"]:checked').val(); }
    //if($('.room_basis').is(':checked')) { var room_basis= $('input[name="room_basis"]:checked').val(); }
    var checkbox_val = $(this).val();
    var val = checkbox_val;
    var url1 = '<?php echo base_url(); ?>searchs/po/';
    $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>hajj/get_more_data/',
      data: {     
        medina_val:medina_multiple_checkox_val, 
        makkah_val:multiple_checkox_val ,
        room_type:roomtype_multiple_checkox_val,
        room_basis:room_basis_multiple_checkox_val,
        rangesValues:rangesValues,
        medina_hotel_type:medina_hotel_type,
        database_name:database_name,
         flight_included:flight_included_multiple_checkox_val
      },
      success: function(response){ 
        //$('#example').html(response)      ;
         if (!$.trim(response))
        {   
            setTimeout(function() {
                $("#loading").hide();             
              $('#example').html('<h3 class="hajj_no_results" style="color:#FFF;">Sorry, No result found for this match ..</h3>') ;
              }, 500);
             $('.hajj_no_results').css('opacity','1');
          }
          else{      
              setTimeout(function() {
                $("#loading").hide(); //hide loading here
                $('.hajj_results').css('opacity','1');
                $('#example').html(response);
              }, 500);
              if(($('#example').find('li').length) <= 3) {
                  $('.paginate-pagination').hide();
              }
          }
          var success =  $($.parseHTML(response)).filter(".hj-row"); 
          $('.no-of-packages').html(success);
      }
    });  
}); 
/******************************/
/*******FOR ROOM TYPE**********/ 
$(".room_type").change(function(){
 $('.custom_pagination.pull-right.index_page').hide();
  $('.clickable-dummy').removeClass('abc');
  $('#loading').show();
  $('.hajj_results').css('opacity','0.4');/**MAKHA HOTEL**/
  var multiple_checkox_val = [];
  var database_name = '<?php echo $page_name[1] ?>';
  var makkah_checkbox_state = 'unchecked';
  $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
   });
  /**ROOM TYPE**/
  var roomtype_checkbox_state = 'unchecked';
  var roomtype_multiple_checkox_val = [];
  if($('.room_type').is(':checked')) { 
      $('input[name="room_type"]:checked').each(function(i){
          roomtype_multiple_checkox_val[i] = $(this).val();
          roomtype_checkbox_state = 'checked';
      });
    }  
  /**MEDINA HOTEL**/
  var medina_hotel_type = 'unchecked';
  var medina_multiple_checkox_val = [];
  if($('.medina_hotel_type').is(':checked')) { 
      $('input[name="medina_hotel_type"]:checked').each(function(i){
          medina_multiple_checkox_val[i] = $(this).val();
          medina_hotel_type = 'checked';
      });
    }
    /**ROOM BASIS**/
  var roombasis_checkbox_state = 'unchecked';
  var room_basis_multiple_checkox_val = [];
  if($('.room_basis').is(':checked')) { 
      $('input[name="room_basis"]:checked').each(function(i){
          room_basis_multiple_checkox_val[i] = $(this).val();
          roombasis_checkbox_state = 'checked';
      });
    }
    var flight_included_checkbox_state = 'unchecked';
  var flight_included_multiple_checkox_val = [];
  if($('.flight_included').is(':checked')) { 
      $('input[name="flight_included"]:checked').each(function(i){
          flight_included_multiple_checkox_val[i] = $(this).val();
          flight_included_checkbox_state = 'checked';
      });
    }
  var rangesValues = $( ".simple-slider" ).val();
  if($('.room_basis').is(':checked')) { var room_basis= $('input[name="room_basis"]:checked').val(); }
    if($('.makkah_hotel_type').is(':checked')) { 
      $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
      });
       //makkah_val = $('input[name="room_rating[]"]:checked').val(); 
    }
    //alert(makkah_val);
    if($('.medina_hotel_type').is(':checked')) { var medina_val = $('input[name="medina_hotel_type"]:checked').val(); }
    var checkbox_val = $(this).val();
    var val = checkbox_val;
    var url1 = '<?php echo base_url(); ?>searchs/po/';
    $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>hajj/get_more_data/',
      data: {     
        makkah_val:multiple_checkox_val, 
        medina_val:medina_multiple_checkox_val ,
        room_type:roomtype_multiple_checkox_val,
        room_basis:room_basis_multiple_checkox_val,
        rangesValues:rangesValues,
        roomtype_checkbox_state:roomtype_checkbox_state,
        database_name:database_name,
         flight_included:flight_included_multiple_checkox_val
      },
      success: function(response){ 
        if (!$.trim(response))
        {   
            setTimeout(function() {
                $("#loading").hide();             
              $('#example').html('<h3 class="hajj_no_results" style="color:#FFF;">Sorry, No result found for this match ..</h3>') ;
              }, 500);
             $('.hajj_no_results').css('opacity','1');
          }
          else{      
              setTimeout(function() {
                $("#loading").hide(); //hide loading here
                $('.hajj_results').css('opacity','1');
                $('#example').html(response);
              }, 500);
              if(($('#example').find('li').length) <= 3) {
                  $('.paginate-pagination').hide();
              }
          } 
        var success =  $($.parseHTML(response)).filter(".hj-row"); 
          $('.no-of-packages').html(success);       
      }
    });  
}); 

/**********************************/  
/*******FOR ROOM BASIS**********/ 
$(".room_basis").change(function(){ 
  $('.custom_pagination.pull-right.index_page').hide();
  $('.clickable-dummy').removeClass('abc');
  $('#loading').show();
  $('.hajj_results').css('opacity','0.4');
  var database_name = '<?php echo $page_name[1] ?>';
  /**MAKHA HOTEL**/
  var multiple_checkox_val = [];
  var makkah_checkbox_state = 'unchecked';
  $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
   });
  /**ROOM TYPE**/
  var roomtype_checkbox_state = 'unchecked';
  var roomtype_multiple_checkox_val = [];
  if($('.room_type').is(':checked')) { 
      $('input[name="room_type"]:checked').each(function(i){
          roomtype_multiple_checkox_val[i] = $(this).val();
          roomtype_checkbox_state = 'checked';
      });
    }  
  /**MEDINA HOTEL**/
  var medina_hotel_type = 'unchecked';
  var medina_multiple_checkox_val = [];
  if($('.medina_hotel_type').is(':checked')) { 
      $('input[name="medina_hotel_type"]:checked').each(function(i){
          medina_multiple_checkox_val[i] = $(this).val();
          medina_hotel_type = 'checked';
      });
    }
    /**ROOM BASIS**/
  var roombasis_checkbox_state = 'unchecked';
  var room_basis_multiple_checkox_val = [];
  if($('.room_basis').is(':checked')) { 
      $('input[name="room_basis"]:checked').each(function(i){
          room_basis_multiple_checkox_val[i] = $(this).val();
          roombasis_checkbox_state = 'checked';
      });
    }
    var flight_included_checkbox_state = 'unchecked';
  var flight_included_multiple_checkox_val = [];
  if($('.flight_included').is(':checked')) { 
      $('input[name="flight_included"]:checked').each(function(i){
          flight_included_multiple_checkox_val[i] = $(this).val();
          flight_included_checkbox_state = 'checked';
      });
    }
  var rangesValues = $( ".simple-slider" ).val();
    //if($('.medina_hotel_type').is(':checked')) { var medina_val = $('input[name="medina_hotel_type"]:checked').val(); }
    //if($('.room_type').is(':checked')) { var room_type = $('input[name="room_type"]:checked').val(); }
    var checkbox_val = $(this).val();
    var val = checkbox_val;
    var url1 = '<?php echo base_url(); ?>searchs/po/';
    $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>hajj/get_more_data/',
      data: {     
        makkah_val:multiple_checkox_val, 
        medina_val:medina_multiple_checkox_val ,
        room_type:roomtype_multiple_checkox_val,
        room_basis:room_basis_multiple_checkox_val,
        rangesValues:rangesValues,
        roombasis_checkbox_state:roombasis_checkbox_state,
        database_name:database_name,
         flight_included:flight_included_multiple_checkox_val
      },
      success: function(response){ 
        if (!$.trim(response))
        {   
          setTimeout(function() {
              $("#loading").hide(); 
              $('#example').html('<h3 class="hajj_no_results" style="color:#FFF;">Sorry, No result found for this match ..</h3>') ;
            }, 500);
          $('.hajj_no_results').css('opacity','1');
        }
        else{      
            setTimeout(function() {
              $("#loading").hide(); //hide loading here
                $('.hajj_results').css('opacity','1');
              $('#example').html(response);
            }, 500);
        } 
        var success =  $($.parseHTML(response)).filter(".hj-row"); 
          $('.no-of-packages').html(success);       
      }
    });  
}); 

/**********************************/  
/*******FOR PRICE RANGE *******/ 
//$('.simple-slide').jRange({
 $('.simple-slider').jRange({
  from: 0,
  to: 6000,
  step: 1000,
  scale: [0,1000,2000,3000,4000,5000,6000],
  format: '%s',
  width: 220,
  showLabels: true,
   isRange : true
 });
 //$('.custom_pagination.pull-right.index_page').hide();
$('.clickable-dummy').removeClass('abc');
$(".simple-slider").change(function() {
  $('#loading').show();
  $('.hajj_results').css('opacity','0.4');
    var rangesValues = $( ".simple-slider" ).val();
    var database_name = '<?php echo $page_name[1] ?>';
    /**MAKHA HOTEL**/
  var multiple_checkox_val = [];
  var makkah_checkbox_state = 'unchecked';
  $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
   });
  /**ROOM TYPE**/
  var roomtype_checkbox_state = 'unchecked';
  var roomtype_multiple_checkox_val = [];
  if($('.room_type').is(':checked')) { 
      $('input[name="room_type"]:checked').each(function(i){
          roomtype_multiple_checkox_val[i] = $(this).val();
          roomtype_checkbox_state = 'checked';
      });
    }  
  /**MEDINA HOTEL**/
  var medina_hotel_type = 'unchecked';
  var medina_multiple_checkox_val = [];
  if($('.medina_hotel_type').is(':checked')) { 
      $('input[name="medina_hotel_type"]:checked').each(function(i){
          medina_multiple_checkox_val[i] = $(this).val();
          medina_hotel_type = 'checked';
      });
    }
    /**ROOM BASIS**/
  var roombasis_checkbox_state = 'unchecked';
  var room_basis_multiple_checkox_val = [];
  if($('.room_basis').is(':checked')) { 
      $('input[name="room_basis"]:checked').each(function(i){
          room_basis_multiple_checkox_val[i] = $(this).val();
          roombasis_checkbox_state = 'checked';
      });
    }
    var flight_included_checkbox_state = 'unchecked';
  var flight_included_multiple_checkox_val = [];
  if($('.flight_included').is(':checked')) { 
      $('input[name="flight_included"]:checked').each(function(i){
          flight_included_multiple_checkox_val[i] = $(this).val();
          flight_included_checkbox_state = 'checked';
      });
    }
    
    var checkbox_val = $(this).val();
    var val = checkbox_val;
    var url1 = '<?php echo base_url(); ?>searchs/po/';
    $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>hajj/get_more_data/',
      data: {     
        makkah_val:multiple_checkox_val, 
        medina_val:medina_multiple_checkox_val ,
        room_type:roomtype_multiple_checkox_val,
        room_basis:room_basis_multiple_checkox_val,
        rangesValues:rangesValues,
        database_name:database_name,
         flight_included:flight_included_multiple_checkox_val
      },
      success: function(response){ 
        $('.custom_pagination.pull-right.index_page').hide();
        //$('#example').html(response);
         if (!$.trim(response))
        {   
            setTimeout(function() {
                $("#loading").hide();             
              $('#example').html('<h3 class="hajj_no_results" style="color:#000;">Sorry, No result found for this match ..</h3>') ;
              }, 500);
             $('.hajj_no_results').css('opacity','1');
            $('.paginate-pagination').hide();
          }
          else{     
              setTimeout(function() {
                $("#loading").hide(); //hide loading here
                $('.hajj_results').css('opacity','1');
                $('#example').html(response);
              }, 500);
          }
          var success =  $($.parseHTML(response)).filter(".hj-row"); 
          $('.no-of-packages').html(success);
      }
    });   
});

/**********************************/  

});



function loadmore()
{
 var val = document.getElementById("result_no").value;
 $.ajax({
 type: 'post',
 url: '<?php echo base_url(); ?>searchs/1/',
 data: {
  getresult:val
 },
 success: function (response) {

  var content = document.getElementById("hajj_results");
  content.innerHTML = content.innerHTML+response;

  // We increase the value by 2 because we limit the results by 2
  document.getElementById("result_no").value = Number(val)+2;
 }
 });
}
function displayRecords_new(numRecords, pageNum) {
    $('#loading').show();
    $('.clickable-dummy').removeClass('abc');
    $('.hajj_results').css('opacity','0.4');
     var database_name = '<?php echo $page_name[1] ?>';
    //var rangesValues = $( ".simple-slider" ).val();
    var rangesValues = '0,6000';
    $.ajax({
                                    type: "POST",
                                    url: '<?php echo base_url(); ?>hajj/get_more_data/',
                                    data: {     
                                     // rangesValues:rangesValues,
                                      show:numRecords,
                                      pagenum:pageNum,
                                      database_name:database_name,
                                    },
                                    cache: false,
                                    beforeSend: function() {
                                        $('#loading').html('<img src="assets/images/Gear.gif" style="padding-left: 400px; margin-top:10px;" >');
                                    },
                                    success: function(html) {
                                      if (!$.trim(html))
                                      {   
                                          setTimeout(function() {
                                              $("#loading").hide();             
                                            $('#example').html('<h3 class="hajj_no_results" style="color:#000;">Sorry, No result found for this match ..</h3>') ;
                                            }, 500);
                                           $('.hajj_no_results').css('opacity','1');
                                          $('.paginate-pagination').hide();
                                        }
                                        else{ $('.hajj_results').css('opacity','1');  $("#loading").hide(); $("#example").html(html); }
                                    var success =  $($.parseHTML(html)).filter(".hj-row"); 
                                    $('.no-of-packages').html(success);
                                    }
                                });

}

function displayRecords(numRecords, pageNum) {
  $('.custom_pagination.pull-right.index_page').hide();
  $('#loading').show();
  $('.hajj_results').css('opacity','0.4');
   /**MAKHA HOTEL**/
  var multiple_checkox_val = [];
  var makkah_checkbox_state = 'unchecked';
  $('input[name="room_rating"]:checked').each(function(i){
          multiple_checkox_val[i] = $(this).val();
          makkah_checkbox_state = 'checked';
   });
  /**ROOM TYPE**/
  var roomtype_checkbox_state = 'unchecked';
  var roomtype_multiple_checkox_val = [];
  if($('.room_type').is(':checked')) { 
      $('input[name="room_type"]:checked').each(function(i){
          roomtype_multiple_checkox_val[i] = $(this).val();
          roomtype_checkbox_state = 'checked';
      });
    }  
  /**MEDINA HOTEL**/
  var medina_hotel_type = 'unchecked';
  var medina_multiple_checkox_val = [];
  if($('.medina_hotel_type').is(':checked')) { 
      $('input[name="medina_hotel_type"]:checked').each(function(i){
          medina_multiple_checkox_val[i] = $(this).val();
          medina_hotel_type = 'checked';
      });
    }
    /**ROOM BASIS**/
  var roombasis_checkbox_state = 'unchecked';
  var room_basis_multiple_checkox_val = [];
  if($('.room_basis').is(':checked')) { 
      $('input[name="room_basis"]:checked').each(function(i){
          room_basis_multiple_checkox_val[i] = $(this).val();
          roombasis_checkbox_state = 'checked';
      });
    }
    var flight_included_checkbox_state = 'unchecked';
  var flight_included_multiple_checkox_val = [];
  if($('.flight_included').is(':checked')) { 
      $('input[name="flight_included"]:checked').each(function(i){
          flight_included_multiple_checkox_val[i] = $(this).val();
          flight_included_checkbox_state = 'checked';
      });
    }
    var displayRecords = 'displayRecords';
    var database_name = '<?php echo $page_name[1] ?>';
    var rangesValues = $( ".simple-slider" ).val();
  console.log($( ".simple-slider" ).val());
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo base_url(); ?>hajj/get_more_data/',
                                    data: {     
                                      makkah_val:multiple_checkox_val, 
                                      medina_val:medina_multiple_checkox_val ,
                                      room_type:roomtype_multiple_checkox_val,
                                      room_basis:room_basis_multiple_checkox_val,
                                      rangesValues:rangesValues,
                                      roombasis_checkbox_state:roombasis_checkbox_state,
                                      show:numRecords,
                                      pagenum:pageNum,
                                      database_name:database_name,
                                      flight_included:flight_included_multiple_checkox_val
                                    },
                                    cache: false,
                                    beforeSend: function() {
                                        $('#loading').html('<img src="assets/images/Gear.gif" style="padding-left: 400px; margin-top:10px;" >');
                                    },
                                    success: function(html) {
                                      displayRecords=undefined;
                                      console.log(displayRecords + 'isplay');
                                      if (!$.trim(html))
                                      {   
                                          setTimeout(function() {
                                              $("#loading").hide();             
                                            $('#example').html('<h3 class="hajj_no_results" style="color:#000;">Sorry, No result found for this match ..</h3>') ;
                                            }, 500);
                                           $('.hajj_no_results').css('opacity','1');
                                          $('.paginate-pagination').hide();
                                        }
                                        else{ $('.hajj_results').css('opacity','1');  $("#loading").hide(); $("#example").html(html); }
                                    var success =  $($.parseHTML(html)).filter(".hj-row"); 
                                    $('.no-of-packages').html(success);
                                    }
                                });
                            }
/********************************************************/
$(".reset_filters").click(function(){ 
  $('.custom_pagination.pull-right.index_page').hide();
  var lowr_value = $('.slider-container div.scale span:first ins').html();
  var highr_value = $('.slider-container div.scale span:last ins').html();
  var result = highr_value.split('£');
  $('.pointer-label.high').html(result[1]);
//$('.pointer-label.high.last-active').attr('style',{'background:#da6c37 !important','left:100% !important'});

$('.pointer.high').attr('style','left:100% !important');
$('.pointer.low').attr('style','left:0% !important');
$('.selected-bar').attr('style','background:#da6c37 !important;width:100%;');
  //left: 202.203px;
  //$( ".simple-slider" ).val('0,'+result[1])
  //alert(result);
  $('#loading').show();
  $('.hajj_results').css('opacity','0.4');  $('input[type="checkbox"]').prop('checked' , false);;
  var reset = "reset_filters";
  var database_name = '<?php echo $page_name[1] ?>';
  //var rangesValues = $( ".simple-slider" ).val();
  var rangesValues = '0,'+result[1];

   $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>hajj/get_more_data/',
      data: {     
        reset_filters:reset,
        database_name:database_name,
        rangesValues:rangesValues
      },
      beforeSend: function() {
          $('#loading').html('<img src="assets/images/Gear.gif" style="padding-left: 400px; margin-top:10px;" >');
      },
      success: function(html) {
        $('.hajj_results').css('opacity','1'); 
        $("#loading").hide(); 
        $("#example").html(html);
        var success =  $($.parseHTML(html)).filter(".hj-row"); 
        $('.no-of-packages').html(success);
      }
  });

});
/********************************************************/
 $(document).ready(function() {
   var lowr_value = $('.slider-container div.scale span:first ins').html();
  var highr_value = $('.slider-container div.scale span:last ins').html();
  $('.slider-container').prepend('<span class="price_value">'+'£'+lowr_value + '-' + '£'+highr_value+'</span>');
  $(".slider-container div.scale span").each(function() {
    $(this).find('ins').prepend("£");
});
   // displayRecords_new(5, 1);
                            });
</script>
   
    </body>
	
	
	</html>