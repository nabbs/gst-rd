
<style>
.form-control {
    border-radius: unset;
    height: 54px;
    margin-top:0;
}
.help-block{color:red;}
.ng-binding{margin-bottom: 36px;}
</style>

<?php if(empty($userdata)){ ?>  
redirect(BASEURL);
<?php  } ?>
<?php 

$company_details = get_company_details_user_id($userdata['id']);
//debug($company_details);
?>
<div class="page-header">
    <h2 class="page-title">
        <?php echo ucfirst($user_jobs['job_title']); ?> 
    </h2>
    <h3 class="page-subtitle">
        <ul class="User_info">
            <li class="location" itemprop="jobLocation">Post Date: <?php echo ucfirst($user_jobs['company_email']); ?> </li>
            <li class="date-posted" itemprop="datePosted">Contact No: <?php echo ucfirst($company_details['company_phone']); ?></li>
        </ul>
    </h3>
</div>

<!-- header -->

<section class="job-item-description" style="">


<div class="container">

<div class="row">
<?php  include('sidebar_menu.php'); ?>
        <div class="col-md-9">
        <div data-ng-view="" class="ng-scope"><h1 class="ng-scope"><?php echo ucfirst($user_jobs['job_title']); ?> Job Details</h1>
            <div ng-messages="vm.messages" class="ng-scope ng-inactive">

            </div>

            <h2 class="m-md-bottom ng-scope">
            <a herf="javascript:void(0)" id="div_edit" type="button" class="pull-right" ><i class="fa fa-edit" ></i></a>
            <a herf="javascript:void(0)" id="div_close" type="button" class="pull-right" style="display:none;"><i class="fa fa-close" ></i></a>
            Account
            </h2>
        <hr class="ng-scope">
        <form id="update_job" name="" class="" action="<?php echo BASEURL;?>/users/update_job/" method="post">
            <input type="hidden" name="id" value="<?php echo $user_jobs['id']; ?>">
           <ul class="list-unstyled" id="comapny_info">
           <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Company Name</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $company_details['company_name']; ?>
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Title</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo ucfirst($user_jobs['job_title']); ?>
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Position</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $user_jobs['job_position']; ?>
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Description</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $user_jobs['job_description']; ?>
                    </div>
                </li>
                 <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Skills</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $user_jobs['job_required_skills']; ?>
                    </div>
                </li>
                 <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Experience</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $user_jobs['job_required_experience']; ?>
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job education</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $user_jobs['job_required_education']; ?>
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Salary</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $user_jobs['job_salary']; ?>
                    </div>
                </li>

                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Type</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                          <?php echo($user_jobs['job_type']=="full-time")?'Full Time':'Part Time'; ?>
                    </div>
                </li>


                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Status</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                       <?php echo ($user_jobs['status']==0)?'<b style="color:red">Pending</b>':'<b style="color:#7AA93C;">Publish</b>'; ?>
                    </div>
                </li>


         </ul>
         
          
<!-- edit user section -->
<ul class="list-unstyled" id="comapny_edit" style="display:none;">
                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Company Name</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $company_details['company_name']; ?>
                    </div>
                </li>

           <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Job Title</label>
                </div>
                <div class="col-md-6 ng-binding">
                    
                    <input type="text" name="job_title" tabindex="1" placeholder="Enter Job Title" 
                     class="form-control" value="<?php echo $user_jobs['job_title']; ?>">
                </div>
            </li>
             <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Job Position</label>
                </div>
                <div class="col-md-6 ng-binding">
                    
                    <input type="text" name="job_position" tabindex="1" placeholder="Enter Job Position" 
                     class="form-control" value="<?php echo $user_jobs['job_position']; ?>">
                </div>
            </li>
             <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Job Description</label>
                </div>
                <div class="col-md-6 ng-binding">
                     <textarea class="form-control" name="job_description" tabindex="4" class="form-control" placeholder="Job Description"><?php echo $user_jobs['job_description']; ?></textarea>
                </div>
            </li>

              <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Job Skills</label>
                </div>
                <div class="col-md-6 ng-binding">
                     <textarea class="form-control" name="job_required_skills" tabindex="4" class="form-control" placeholder="Job Skills"><?php echo $user_jobs['job_required_skills']; ?></textarea>
                    </div>
            </li>





            <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Experience</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                       
                        <textarea class="form-control" name="job_required_experience" tabindex="4" class="form-control" placeholder="Job Experience"><?php echo $user_jobs['job_required_experience']; ?></textarea>
                    </div>
                </li>

             <li class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Job Education</label>
                </div>
                <div class="col-md-6 ng-binding">
                  
                <textarea class="form-control" name="job_required_education" tabindex="4" class="form-control" placeholder="Job Education"><?php echo $user_jobs['job_required_education']; ?></textarea>

                </div>
            </li> 
         

            <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Job Salary</label>
                </div>
                <div class="col-md-6 ng-binding">
                   
                     <input type="text" name="job_salary" tabindex="5" placeholder="Salary"  class="form-control" value="<?php echo $user_jobs['job_salary']; ?>">
                </div>
            </li>
       
            <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Type</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                 
                      <select class="form-control" name="job_type" data-fv-field="job_type">
                            <option>Select Job Type</option>
                           
                            <option  <?php echo ($user_jobs['job_type']=="full-time")?'selected':''; ?> value="full-time">Full Time</option>
                            <option <?php echo ($user_jobs['job_type']=="part-time")?'selected':''; ?> value="part-time">Part Time</option>
                            
                   </select>
                    </div>
                </li>

             <li class="row ng-scope">
             <div class="gp_empty"></div>
                <div class="col-md-4 col-md-offset-4">
            <button tabindex="11" class="btn btn-primary btn-block btn-lg" type="submit">
                        Update  &nbsp; <i class="fa fa-play-circle"></i>
                        </button>
                
             </div>
            </li>             
            </ul>







        </form>

        </div>
</div>
</div>
</section>