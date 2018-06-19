<div class="container">
    <div class="row">
        <div class="col-sm-12">
		
           <div style="background:#fff; padding-bottom:10px; border-radius:8px;margin-top:2%;" class="col-xs-12 col-sm-12 col-md-12 ">
               
                <div class="panel-body">
                   
          
                       <div class="col-sm-12" id="logo_st">
                           <div align="center"><a href='<?php echo BASEURL ;?>'><img src="<?php echo FRONT_END_LAYOUT;?>/assets/img/logo-white.png" /></div></a>
                       </div>
                     <div class="col-md-12"><br></div>
                   <div class="col-md-12"><div class="text-center">
	   <i style="" class="fa fa-check fa-3x colour" ></i>
	   </div>
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1>Thank You !</h1>
			<p  style="text-align:justify" class="descp" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			
			</div>
                   </div>
                   <div class="col-md-12"><br></div>
                          <div class="col-sm-12 " style="" >
						  <div class="row " style="padding-left:27%">
						  
                          <a href='<?php echo BASEURL;?>/account/dashboard' class="btn btn-success btn-block text-center" style="background:#000; border:#000; color:#fff ; width:30%"  ><b>View Your Profile</b></a>
                          </div></div> 


                </div>
				<div class="col-md-12"><br></div>

            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$("#logo_st").fadeOut('fast');	
$("#logo_st").fadeIn(4500);	
 $(".colour").fadeOut('slow');	
 $(".colour").css("color","lime").fadeIn(2000);	
  $(".descp").hide("fast"); 
 $(".descp").show(500);	
});
</script>