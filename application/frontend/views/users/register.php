<div class="container" style="margin-top:146px;">    
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-md-offset-4 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
				<div style="padding-top:30px" class="panel-body" >
					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						<div class="account-wrapper">
				<div class="account-body text-center" >
				<div class="gp_empty"></div>
				<img style="/*width: 160px;*/ text-align: center;" alt="Chandigarh Recruiters" src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/logo_243.png">
				<h3><strong style="font-weight: 500;">Registration For Company</strong></h3>

						<form class="text-center" method="post" id="user_register" action="<?php echo BASEURL; ?>/register/" style="width:100%;">
						<input type="hidden" name="user_type" value="recruiters"/>

						<div class="form-group">
						<input class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" type="text">
						</div>

						<div class="form-group">
						<input class="form-control" name="username" id="username" placeholder="Enter Username" type="text">
						</div>

						<div class="form-group">
						<input class="form-control" name="email" id="email" placeholder="Enter your Email" type="text">
						</div>

						<div class="form-group">
						<input class="form-control" name="password" id="password" placeholder="Enter Password" type="password">
						</div>

						<div class="form-group">
						<input class="form-control" name="mobile" id="mobile" placeholder="Mobile" type="text">
						</div>

						<div class="form-group terms" style="text-transform: uppercase;">
						<label><input type="checkbox" name="agree" id="agree"></label>
						<b>I agree to the <a href="<?php BASEURL; ?>/termsconditions">Terms & Conditions</a>
						</b>
						<style>
						.terms .help-block{text-align: center;text-transform: capitalize;}
						</style>
						</div>
						<div class="form-group " id="gp_d_d">
						<button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4">
						Register &nbsp; <i class="fa fa-play-circle"></i>
						</button>
						<p id="get_access_now_icon"></p>
						</div> <!-- /.form-group -->

						<div class="clearfix"></div>
						</form>
				</div> <!-- /.account-body -->
				</div> <!-- /.account-wrapper -->
			</div>                     
		</div>  
		<div class="clearfix"></div>
	</div>
</div>
<div class="" style="height:30px;margin-bottom: 100px;"></div>