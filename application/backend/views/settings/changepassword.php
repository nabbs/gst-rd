 <div class="page-content">
    <div class ="col-md-12">
        <div class="gp_empty" style="height:32px;" ></div>
 <form name="form_slider_text" id="form_slider_text"  method='post' action='<?php echo BASEURL; ?>/cms/slider_content'>   
  <div class=" box light-grey">       
   <div class="portlet-body">
	<div class="panel-body">
	<div class="row">

                            <div class="col-md-9">
                                <div class="tab-content">
      
                                    <div id="tab_1-1" class="tab-pane">
                                        <form role="form" action="<?php echo BASEURL; ?>/settings/profile" id='form_validation' method='post'>
                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <input type="text" placeholder="First Name" name="first_name" value="<?php echo $userdata['first_name'];?>" class="form-control" data-required="1"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $userdata['last_name'];?>" class="form-control" data-required="1"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="text" placeholder="Email" name="email" value="<?php echo $userdata['email'];?>" class="form-control" data-required="1"/>
                                            </div>
                                            <div class="margiv-top-10">
                                                <button type='submit' class="btn green">
                                                    Save Changes
                                                </button>
                                                <a href="#" class="btn default">
                                                    Cancel
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="tab_3-3" class="tab-pane active">
                                        <?php if(isset($update) && !empty($update) && $update=='wrong_old_pass'){ ?>
                                        <div class="pull-right">Wrong old password</div>
                                        <?php } else if(isset($update) && !empty($update) && $update=='successful'){ ?>
                                            <div class="pull-right">Password Updated Successfully</div>
                                        <?php }?>
                                        <form method='post' action="<?php echo BASEURL; ?>/settings/changepassword" id='form_validation_password'>
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <input type="password" name='old_password' id='old_password' class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input type="password" name='new_password' id='new_password' class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Re-type New Password</label>
                                                <input type="password" name='confirm_new_password' id='confirm_new_password' class="form-control"/>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type='submit' class="btn green">
                                                    Change Password
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          
	
	     </div>
	   </div>
      </div>
     </div>
    </form>
   </div>
  </div>
