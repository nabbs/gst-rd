<div class="page-content">
<div class="row" style="margin-bottom: -51px;">
    <div class="col-md-12">
        <h3 class="page-title">
            User Detail
        </h3>
    </div>
</div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row profile">
        <div class="col-md-12">
            <!--BEGIN TABS-->
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs">

                    <li class='active'>
                        <a href="#tab_1_3" data-toggle="tab">
                            Basic Info
                        </a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab">
                            Family Members
                        </a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab">
                            View Activities
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
                                       <img alt="" class="img-responsive" src="<?php echo THEME_URL; ?>/assets/img/profile/profile-img.png">
                                        <span class="after">
                                        </span>
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
                                                <label class="control-label">First Name:</label>
                                                <?php echo $userdata['fname'];?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name:</label>
                                                <?php echo $userdata['lname'];?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email:</label>
                                                <?php echo $userdata['email'];?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Total paths:</label>
                                                <?php echo "21";?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Total posts</label>
                                                <?php echo "35";?>
                                            </div>
                                            <div class="margiv-top-10">
                                                <a href="<?php echo BASEURL; ?>/users" class="btn green">
                                                    Go Back
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
