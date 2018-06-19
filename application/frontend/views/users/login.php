        <div class="container" style="margin-top:146px;">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">                    
                  <div class="panel panel-info" >
    
                        <div style="padding-top:30px" class="panel-body" >

                             <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>



                                <div class="account-wrapper">

                                <div class="account-body text-center" >
                                <img style="/*width: 160px;*/ text-align: center;" alt="Chandigarh Recruiters" src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/logo_243.png">
                                <h3><strong style="font-weight: 500;">Login to your account</strong></h3>

                                <form class="form account-form" id="loginform" method="POST" action="<?php echo BASEURL; ?>/users/login">

                                <div class="form-group">

                                <input type="text" class="form-control" id="login-username" placeholder="Email Or Username" tabindex="1" name="email">
                                </div> <!-- /.form-group -->

                                <div class="form-group">

                                <input type="password" class="form-control" id="login-password" placeholder="Password" tabindex="2" name="password"/>
                                </div> <!-- /.form-group -->

                                <div class="form-group clearfix pull-right">
                              <!--  <div class="col-sm-6 gp_padding">
                                <label class="checkbox-inline">
                                
                                <i class="fa fa-lock"></i>  <small><a href="<?php echo BASEURL; ?>/forgetpassword" alt="Register">Forget Password?</a></small>
                                </label>
                                </div>-->
                                <div class="col-sm-12 gp_padding">
                                <label class="checkbox-inline">
                                <!-- <input type="checkbox" class="" value="" tabindex="3" name="remember"> <small>Remember me</small>-->
                                <i class="fa fa-user"></i>  <small><a href="<?php echo BASEURL; ?>/register" alt="Register">Register Here?</a></small>
                                </label>
                                </div>
                                </div>

                                <div class="form-group" id="gp_d_d">
                                <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4">
                                Signin &nbsp; <i class="fa fa-play-circle"></i>
                                </button>
                                <p id="get_access_now_icon"></p>
                                </div> <!-- /.form-group -->

                                </form>



                                </div> <!-- /.account-body -->


                                </div> <!-- /.account-wrapper -->


                         </div>                     
                  </div>  
                 <div class="clearfix"></div>
             </div>
        </div>

        <div class="" style="height:30px;margin-bottom: 100px;"></div>