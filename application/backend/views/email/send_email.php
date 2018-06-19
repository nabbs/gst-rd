<style>
.ui-tooltip-content{display:none;}	
</style>
<style>
	.black_overlay{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: absolute;
        top: 25%;
        left: 25%;
        width: 50%;
        height: 170px;
        padding: 16px;
        border: 2px solid orange;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
</style>


<div class="page-content">
    <div class ="col-md-12 col-sm-12 col-xs-12">
     <div class="row">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
        <div class=" col-sm-4 col-xs-4">
          <a class="btn_reload" href="<?php echo BASEURL; ?>/email" title="Reload"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
      </div>
    
		<div class="row header-btn">
		<div class="col-sm-12">
            <a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
	    </div>
		
	</div>   
	
	<form action='<?php echo BASEURL; ?>/email/send_email' name="form_send_email" id="form_send_email"  method='post'>
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class=" box light-grey">
		<div class="portlet-body">
		<div class="gp_empty"></div>
		
		<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group pull-left" >
		
        <label><strong>Users List</strong></label>
        <select class="form-control" id="state_id" name="email[]" multiple="multiple">
         <?php  foreach($user_data as $key=>$val){ ?>	
		<option name="<?php echo $val['id'] ; ?>" value="<?php echo $val['email'] ; ?>"><?php echo $val['fname'].' '.$val['lname'].'  ('.$val['display_name'].')' ?></option>
		<?php } ?>
        </select>
		

		</div>	
        <button type="button" id="select_all_state" name="select_all_state" class="btn green"> Select All </button> 
		<button type="button" id="unselect_all_state"  name="unselect_all_state" class="btn btn-primary">Unselect All </button>  

		</div>

		<div class="col-md-6 col-sm-6 col-xs-12 col">
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
		<label><strong>Subject</strong></label>
		<input type="text" name="subject" id="subject" class="form-control"   / >
		</div>
		</div>
		</div>		 
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
		<label for="comment"><strong>Description:</strong></label>
		<textarea class="form-control" rows="5" id="description" name="description" ></textarea>
		</div>
		</div>
		</div>	
        <div class="col-sm-12 form-group  text-left" style="padding:0px">		
		<button type="submit" name="submit" class="btn green"><i class="fa fa-send"></i> Confirm Details</button>
		<a href="<?php echo BASEURL; ?>" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>		 

		</div>

     <div class="col-md-12 col-sm-12 col-xs-12">
		<div id="loader" class="text-center" ></div>
	   
		</div>

  </div>
		   </div>
	</form>
	
        <!-- END EXAMPLE TABLE PORTLET-->
		
		
		
		
 
	
	
	<div class="col-md-12 col-sm-12 col-xs-12" style="position:static">
    <a onclick = "document.getElementById('light').style.display='block';">
	<button id="email_send"  class="btn btn-primary">Send Test Email</button></a>
	<div id="light" class="white_content" style="top:72% !important;left:12% !important">
	<form id="test_email" name="test_email" method="post" action="<?php echo BASEURL;  ?>/email/test_email">
	<label>Email</label>
	<input type="hidden" name="sub" id="sub">
	<input type="hidden" name="des" id="des">
	<input type="text" name="email" id="email" class="form-control" / >
	<br/>
	
	<button type="submit" id="send_email" class="btn green">Send Email</button>
	
	</form>
  </div>
    </div>
	<?php if(isset($msg) || !empty($msg)){ ?>
	<div style="color:green"><?php echo $msg;  ?></div>
     <?php } ?>


<script>

$(document).ready(function(){

	$('#email_send').click(function() {
	   
	    var subject = $('#subject').val();
		var data = CKEDITOR.instances.editor.getData();
	
		
		  $("#sub").val(subject);
		  $("#des").val(data);
    });
	
	
$('#select_all_state').click(function() {
    $('#state_id option').prop('selected', true);
});


$('#unselect_all_state').click(function() {
    $('#state_id option').prop('selected', false);
});


});
</script>
<script>
	CKEDITOR.replace( 'description' , {
	enterMode: CKEDITOR.ENTER_BR
});
</script>
<!-- END BODY -->