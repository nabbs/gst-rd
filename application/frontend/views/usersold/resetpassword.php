
<div id="header">
	<div class="container">
		<div class="top">
			<div class="thank">
				
				<div class="middle">
				<div class="bor-panel">
					<div class="panel">
						<div class="logo">
							<img src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/login-logo.png" class="img-responsive" />
						</div>
			<form action="<?php echo BASEURL ;?>/users/resetpassword" method="post" id="resetpasswordForm"  novalidate="novalidate">
 <input type="hidden" name='password_reset_token' value="<?php echo $passwordtoken; ?>">
						<div class="login-text">
							<p class="text-center">Reset Password</p>
						</div>
						 <div class="form-group">
						
						<input type="password" class="form-control" id="email" name="password" placeholder="Enter New Password">
						</div>

						 <div class="form-group">
						
                   <input type="password" class="form-control" id="password" name="new_password" placeholder="Repeat Password">
						</div>
						
							<div class="login-button">
								<button type="submit" name="login" class="btn btn-primary"> Update Password</button>
							</div>
					 </form>	
				
					 <p id='forgotvalidating1' class="text-center"></p>
					  <p id='resetpasswordvalidating' style="color:red" class="text-center"></p>
							<div class="forget-text">
							<p class="text-center"> <a href="<?php echo BASEURL; ?>/users/register" class="account" style="color:#fff;">Create an account</a></p>
						</div>
					
					</div>
				</div>
				</div>
			
				
			</div>
		</div>
	</div>
</div>


