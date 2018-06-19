<style>
	.form-group.new-form-g{text-align:left}
	input[type=radio].css-checkbox {
position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
}

input[type=radio] + label.css-label {
    padding-left: 30px;
    height: 21px;
    display: inline-block;
    line-height: 21px;
    background-repeat: no-repeat;
    background-position: 0 0;
    font-size: 16px;
    vertical-align: middle;
    cursor: pointer;
    padding-right: 10px;
}
.hide_form{
	display:none;
}

input[type=radio].css-checkbox:checked + label.css-label {
background-position: 0 -21px;
}
label.css-label {
background-image:url('<?php echo FRONT_END_LAYOUT;?>/assets/new_registration/images/csscheckbox_d9f116903286cc58c421041a7becfbc6.png');
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}
	
</style>
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
								<p class="text-center"style="font-size: 20px;">Recover Your Account Below</p>
							</div>
							<form  action="<?php echo BASEURL ; ?>/users/cant_access_my_account" method="post" id="cant_access_my_account" >
							
								<div class="form-group new-form-g">
									
									<input type="radio"  name="a" value="username" id="display_name" class="radio1 css-checkbox forget_radio" />
									<label for="display_name" class="css-label radGroup1" style="color: rgb(255, 255, 255);">I Remember My Username</label><br/>
									<input type="radio" value="email"   name="a" id="email"  class="radio1 css-checkbox forget_radio"/>
									<label for="email" class="css-label radGroup1" style="color: rgb(255, 255, 255);">I Remember My Email</label>
									<input type="text" class="form-control hide_form" style="margin-top:15px;" value="" name="recover_user" placeholder='' id="user_data_id" />
									<!--
<input type="text" placeholder="User Name" class="form-control hide_username" style="margin-top:15px;" value="" name="user_name" id="user_name" />
									<input type="text"  placeholder="Email" class="form-control hide_email" style="margin-top:15px;" value="" name="user_email" id="user_email" />
									-->
								</div>
								<div class="login-button">
									<input type="submit" value="NEXT" class="btn hide_form btn-primary" />
								</div>
							</form>	
							<div id="loading_icon"  class="text-center"></div>
							<div id="message"  class="text-center"></div>
							
							<div class="forget-text">
								<div class="footer">
<p class="text-center">Need Help? <a href='<?php echo BASEURL;?>/ticket' target='_blank'>Contact  Support Here </a></p>
									<p class="text-center">COPYRIGHT &copy; <?php echo date('Y',time());?> Unit Of Prosperity LLC. All Rights Reserved</p>
								</div>
							</div>	
							
							
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>


