<script>
	// $(document).ready(function(){
    // $("#display_name").val('');
    // $("#password").val('');
	// }); 
	
</script>

<div id="header">
	<div class="container">
		<div class="top">
			<div class="thank">
				
				<div class="middle">
					<div class="bor-panel">
						<div class="panel">
							
							<div style='display:none'><?php print_r($data); ?></div>
							
							
							
							<div class="logo">
								<img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo.png" class="img-responsive" />
							</div>
							<div class="login-text">
								<p class="text-center">Login In Your BackOffice Below</p>
							</div>
							<form name="login_form" action="<?php echo BASEURL ; ?>/users/login" method="post" id="loginForm" >
							
							<?php echo form_open('/users/login', array('id' => 'loginForm_','method'=>'post')); ?>
							<div class="form-group">
									<input type="text" class="form-control"  name="display_name" id="display_name" placeholder="Username" />
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" />
								</div>
								<div class="login-button">
									<input type="submit" name="login" value="Log In" class="btn btn-primary" />
								</div>
							</form>	
							<div id="validating"  class="text-center">
								<?php if(isset($result) && $result=="error") {
									echo $message;
								}?>
							</div>
							<div class="forget-text">
								<div class="col-sm-6">
									<p class="pull-left"><a href="<?php echo BASEURL ; ?>/users/forgetpassword" class="forgot" style="color:#fff;">Forgot Password ?</a> 
									</p>
								</div>
								<div class="col-sm-6"  style="padding-right: 0px;">
									<p class="pull-right"><a href="<?php echo BASEURL ; ?>/users/cant_access_my_account" class="forgot" style="color:#fff;">Can't Access My Account?</a> 
									</p>
								</div>
								
								
								<div class="footer">
<p class="text-center">Need Help? <a href='<?php echo BASEURL;?>/ticket' target='_blank'>Contact  Support Here </a></p>
									<p class="text-center">COPYRIGHT &copy; 2016 Unit Of Prosperity LLC. All Rights Reserved</p>
								</div>
							</div>	
							
							
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>


