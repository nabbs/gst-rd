<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        <div class=" pull-right" style="margin-top:-50px">
            <!--<button id="" class="btn green">
                Add New <i class="fa fa-plus"></i>
            </button> -->
			<!--<a href="<?php echo BASEURL ?>/users" class="btn green">Go back to users list</a>-->
	<div class="clearfix"></div>
        </div>

        
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">
			<div class="gp_empty"></div>
<!--  --------------------------------------------USER DETAILS STARTS--------------------------------------------- -->	
<form method="post"  action="<?php echo BASEURL; ?>/settings/system_settings" id="default_email_set" name="default_email_form">

			
		     <div class="col-md-12 col-sm-12 col-xs-12">
           <?php $user_details['enable_link_rotator']; ?>
             <label><strong>Default Email Sending API:</strong></label></div>
			 <div class="col-md-2">
			  <input type="radio" name="default_email" class="enable_link" value="Amazon" <?php if($default_setting['system_settings']=="Amazon") echo 'checked="checked"'; ?>  style="float: left; margin:4px;width: 0px!important;"/>
			 Amazon SES
               </div>
				<div class="col-md-2">
			SendGrid
				<input type="radio" name="default_email" class="enable_link"  value="SendGrid" <?php if($default_setting['system_settings']=="SendGrid") echo 'checked="checked"'; ?> style="float: left; margin:4px;width: 0px!important;"/>
			</div>
			<div class="col-md-2">
			Mandrill
				<input type="radio" name="default_email" class="enable_link" value="Mandrill" <?php if($default_setting['system_settings']=="Mandrill") echo 'checked="checked"';?> style="float: left; margin:4px;width: 0px!important;"/>
			</div> 
			
			<div class="col-md-2">
			Sparkpost
				<input type="radio" name="default_email" class="enable_link" value="Sparkpost" <?php if($default_setting['system_settings']=="Sparkpost") echo 'checked="checked"';?> style="float: left; margin:4px;width: 0px!important;"/>
			</div>
			
			
	    <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="text-center"><?php echo $msg; ?></div>
		<div class="form-group pull-right" >
				<br/>
			<button type="submit" name="submit_profile" class="btn green"><i class="fa fa-send"></i>Confirm Details</button>
            
		</div>
		
	</div>			 
</form>			 
			 
			  
<div class="col-sm-12 tab-content text-center">
					<!--<a href="" target="_blank" class="btn btn-warning btn-block "><i class="fa fa-chevron-right"></i> SIGN UP NOW <i class="fa fa-chevron-left"></i></a>-->
																															
					  						
									<!---- for one time and monthly subscription -->			
		<form method="post"  action="<?php echo BASEURL; ?>/settings/set_gatway" id="default_gatway" name="default_gatway">								
								<div class="row" style="margin:20px;">
									<label>Select Subscription Type :</label>
									<select name="admin_reseller_gatway" id="gateway_type" class="gateway_type">
										<option value="" <?php echo ($default_setting['admin_reseller_gatway']=="")?'selected':'' ;?>>Choose Subscription</option>
										<option value="stripe" <?php echo ($default_setting['admin_reseller_gatway']=="stripe")?'selected':'' ;?>>Stripe </option>
										<option value="authorizenet" <?php echo ($default_setting['admin_reseller_gatway']=="authorizenet")?'selected':'' ;?>>Authorize.Net</option>
									</select>
									
								</div>
						
							<div class="blank" style="height:20px"></div>
					<!---- end html  for one time and monthly subscription -->	
								
							<div id="stripe">
							  
							<div class="col-sm-12 col">
								<div class=" form-group"><label>Secret Key</label>
									<input class=" form-control" name="secret_key" value="<?php echo ($default_setting['secret_key']!="")?$default_setting['secret_key']:'' ;?>" data-fv-field="secret_key" type="text">  
								<small style="display: none;" class="help-block" data-fv-validator="notEmpty" data-fv-for="secret_key" data-fv-result="NOT_VALIDATED">Cant't be Empty</small></div>
							</div> 
<div class="col-sm-12 col">   
								<div class=" form-group"> 
									
									<label>Publisher Key</label> 
								<input class=" form-control" name="publisher_key" value="<?php echo ($default_setting['publisher_key']!="")?$default_setting['publisher_key']:'' ;?>" data-fv-field="publisher_key" type="text"><small style="display: none;" class="help-block" data-fv-validator="notEmpty" data-fv-for="publisher_key" data-fv-result="NOT_VALIDATED">Cant't be Empty</small></div> 
							</div>
							</div>
	
							<div id="authorized_Net" style="display: block;">
								<div class="col-sm-12 col">   
									<div class=" form-group"> 	
										<label>Authorize.net ARB Login Key</label> 
										<input class=" form-control" id="authorizedLogin_id" name="authorizedLogin_id" value="<?php echo ($default_setting['authorizedLogin_id']!="")?$default_setting['authorizedLogin_id']:'' ;?>" data-fv-field="authorizedLogin_id" type="text">       
										<small style="display: none;" class="help-block" data-fv-validator="notEmpty" data-fv-for="authorizedLogin_id" data-fv-result="NOT_VALIDATED">Cant't be Empty</small></div> 
									</div>  
									<div class="col-sm-12 col">
									<div class=" form-group">
										<label>Authorize.net ARB Transaction Key</label>
										<input class=" form-control" id="authorizedTransaction_key" name="authorizedTransaction_key" value="<?php echo ($default_setting['authorizedTransaction_key']!="")?$default_setting['authorizedTransaction_key']:'' ;?>" data-fv-field="authorizedTransaction_key" type="text">  
									<small style="display: none;" class="help-block" data-fv-validator="notEmpty" data-fv-for="authorizedTransaction_key" data-fv-result="NOT_VALIDATED">Cant't be Empty</small></div>
								</div>
									
								
								
								
					
								
							</div>
<button class="btn green" type="submit" >
<i class="fa fa-send"></i>
Submit
</button>
			</form>	
							</div>			  
			  
  
<!--  --------------------------------------------USER DETAILS ENDS--------------------------------------------- -->

	
 
	

            </div>
        </div>
 
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<style>
.col-sm-12.tab-content.text-center > form {
    margin: 0 auto;
    width: 60%;
}
	.form-group{text-align:left;}
</style>
<script>
	$(document).ready(function(){
		var default_gat = $("#gateway_type").val();
		
		if(default_gat==""){
			$("#stripe").hide();
			$("#authorized_Net").hide();
		}
		if(default_gat=="stripe"){
			$("#stripe").show();
			$("#authorized_Net").hide();
		}
		if(default_gat=="authorizenet"){
			$("#stripe").hide();
			$("#authorized_Net").show();
		}
		
		$("#gateway_type").change(function(){
			var default_gat = $(this).val();
			if(default_gat==""){
				$("#stripe").hide();
				$("#authorized_Net").hide();
			}
			if(default_gat=="stripe"){
				$("#stripe").show();
				$("#authorized_Net").hide();
			}
			if(default_gat=="authorizenet"){
				$("#stripe").hide();
				$("#authorized_Net").show();
			}
		});
		
	});
</script>

