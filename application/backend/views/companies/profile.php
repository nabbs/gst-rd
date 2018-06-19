<div class="page-content">
    <div class="row" >
        <div class="col-md-12">
            <h3 class="page-title">
                User Detail
            </h3>
        </div>
    
    <!-- BEGIN PAGE CONTENT-->
    <div class="row profile">
        <div class="col-md-12">
            <!--BEGIN TABS-->

            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Basic Info</a></li>
                    <li class="" role="presentation"><a aria-expanded="false" href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Members</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="col-md-3">
                            <div class="row profile-account">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <?php
                                    if (file_exists('../assets/users/profilepictures/' . $userdata['image'])) {
                                        $filename = $this->config->item('front_base_url') . 'assets/users/profilepictures/' . $userdata['image'];
                                    } else {
                                        $filename = $this->config->item('front_base_url') . 'assets/files/users/imageDefault.jpg';
                                    }
                                    ?>
                                    <li class="active">
                                        <img alt="" class="img-responsive" src="<?php echo $filename; ?>">
                                        <span class="after">
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <form role="form" action="<?php echo BASEURL; ?>/settings/profile" id='form_validation' method='post'>
                                <div class="form-group">
                                    <label class="control-label">First Name:</label>
                                    <?php echo $userdata['fname']; ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Last Name:</label>
                                    <?php echo $userdata['lname']; ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email:</label>
                                    <?php echo $userdata['email']; ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Gender:</label>
                                    <?php echo ucfirst($userdata['gender']); ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Total paths:</label>
                                    <?php echo "21"; ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Total posts</label>
                                    <?php echo "35"; ?>
                                </div>
                                <div class="margiv-top-10">
                                    <a href="<?php echo BASEURL; ?>/users" class="btn green">
                                        Go Back
                                    </a>
                                </div>
                            </form>



                        </div>  </div> 
                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                        <?php foreach ($relation_data as $key => $val) { ?>

                            <div class="col-sm-6 boxed">
                                <div class="col-md-3">
                                    <div class="row profile-account">
                                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                                            <li class="active">
                                                <?php
                                                if (file_exists('../assets/users/profilepictures/' . $val['image'])) {
                                                    $filename = $this->config->item('front_base_url') . 'assets/users/profilepictures/' . $val['image'];
                                                } else {
                                                    $filename = $this->config->item('front_base_url') . 'assets/files/users/imageDefault.jpg';
                                                }
                                                ?>
                                                <img alt="" class="img-responsive" src="<?php echo $filename; ?>">
                                                <span class="after"> <?php echo $val['relation_name']; ?>
                                                </span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-9">                     
                                    <div class="form-group">
                                        <label class="control-label">First Name:</label>
                                        <?php echo $val['fname']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name:</label>
                                        <?php echo $val['lname']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gender:</label>
                                        <?php echo $val['gender']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email:</label>
                                        <?php echo $val['email']; ?>
                                    </div>
										<div class="margin-top-10">
										<?php if(getfamilyinsurance($val['id'])){ ?>
                                    <a href="<?php echo BASEURL; ?>/insurance/viewinsurance/<?php echo $val['id'];?>" class="btn green">
                                        View Insurance
                                    </a>
										<?php } else { ?> 
										No Insurance available
										<?php } ?>
                                </div>
                                </div>

                            </div>
                        <?php } ?>

                    </div>

                </div>
            </div>



            <!--END TABS-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>