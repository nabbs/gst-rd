<div class="page-content">
<div class="row" style="margin-bottom: -51px;">
    <div class="col-md-12">
        <h3 class="page-title">
            User Profile
        </h3>
    </div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row profile">
        <div class="col-md-12">
            <!--BEGIN TABS-->
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs">

                    <li class='active'>
                        <a href="#tab_1_3" data-toggle="tab">
                            Profile
                        </a>
                    </li>
                </ul>
                <div class="tab-content">

                    <!--tab_1_2-->
                    <div class="tab-pane active" id="tab_1_3">
                        <div class="row profile-account">
                            <div class="col-md-3">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <li class="active">
                                        <a href="<?php echo BASEURL;?>/settings/profile">
                                            <i class="fa fa-cog"></i> Personal info
                                        </a>
                                        <span class="after">
                                        </span>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASEURL;?>/settings/changepassword">
                                            <i class="fa fa-lock"></i> Change Password
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <?php if(isset($update) && !empty($update)){ ?>
                                    <div class="pull-right">Profile updated successfully</div>
                                    <?php } ?>
                                    <div id="tab_1-1" class="tab-pane active">
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
                                    <div id="tab_3-3" class="tab-pane">
                                        <form method='post' action="<?php echo BASEURL; ?>/settings/changepassword" id='form_validation_password'>
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <input type="password" name='old_password' class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input type="password" name='new_password' class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Re-type New Password</label>
                                                <input type="password" name='confirm_new_password' class="form-control"/>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type='submit' class="btn green">
                                                    Change Password
                                                </button>>
                                                <a href="#" class="btn default">
                                                    Cancel
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col-md-9-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
            <!--END TABS-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
