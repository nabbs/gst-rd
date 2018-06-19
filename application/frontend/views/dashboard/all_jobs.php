
<style>
.form-control {
    border-radius: unset;
    height: 54px;
    margin-top:0;
}
.help-block{color:red;}
.ng-binding{margin-bottom: 36px;}
.disabled {
   pointer-events: none;
   cursor: default;
}
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
        WelCome <?php echo ucfirst($userdata['display_name']); ?>
    </h2>
    <h3 class="page-subtitle">
        <ul class="User_info">
            <li class="location" itemprop="jobLocation">Email Id: <?php echo ucfirst($userdata['email']); ?> </li>
            <li class="date-posted" itemprop="datePosted">Contact No: <?php echo ucfirst($userdata['phone_no']); ?></li>
        </ul>
    </h3>
</div>

<!-- header -->

<section class="job-item-description" style="">


<div class="container">

<div class="row">
<?php  include('sidebar_menu.php'); ?>
        <div class="col-md-9">
        <div data-ng-view="" class="ng-scope"><h1 class="ng-scope">Jobs Listing</h1>
            <div ng-messages="vm.messages" class="ng-scope ng-inactive">
            <?php  if(empty($company_details['company_description']) || empty($company_details['company_address']) || empty($company_details['company_city']) ||  empty($company_details['company_state']) || empty($company_details['company_pincode']) || empty($company_details['company_email']) || empty($company_details['company_phone'])){ ?>
<p class="text-center" style="
    color: #f00;
    font-weight: 700;
    text-transform: uppercase;
    border: 1px solid;
    box-shadow: 5px 2px 7px #000;
">complete your company profile first</p>

<?php } ?>
            </div>

         <h2 class="m-md-bottom ng-scope">

          <?php  if(empty($company_details['company_description']) || empty($company_details['company_address']) || empty($company_details['company_city']) ||  empty($company_details['company_state']) || empty($company_details['company_pincode']) || empty($company_details['company_email']) || empty($company_details['company_phone'])){ ?>
            <a herf="javascript:void(0)" id="div_edit" type="button" class="pull-right disabled" ><i class="fa fa-plus"> Add New Job</i></a>


            <?php }else{ ?>

              <a herf="javascript:void(0)" id="div_edit" type="button" class="pull-right" ><i class="fa fa-plus"> Add New Job</i></a>

         <?php      } ?>
            <a herf="javascript:void(0)" id="div_close" type="button" class="pull-right" style="display:none;"><i class="fa fa-close" ></i></a>
            All Job Posts
            </h2>
        <hr class="ng-scope">
        <form id="useergp_" name="" class="" action="<?php echo BASEURL;?>/users/post_job/" method="post">
           <input type="hidden" name="user_id" value="<?php echo $userdata['id']; ?>">
<input type="hidden" name="company_email" value="<?php echo $company_details['company_email']; ?>">

           <table class="table table-striped table-bordered table-hover responsive" id="comapny_info" >
            <thead>
              <th>Job Title</th>
              <th>Status</th>
              <th>Action</th>
              <th>Post Date</th>
              <th>Last Modify</th>
       
            </thead>



            <tbody>
       
            <?php 
            /* company details */
           $user_jobs = get_job_details_by_user_id($userdata['id']);
             $srno = 1;

                         if(!empty($user_jobs)){
            foreach($user_jobs as $key=>$val){
             // $company_details = get_company_details_user_id($val['user_id']);
              ?>
                  <tr>
              <td> <?php echo ucfirst($val['job_title']); ?> </td>
              <td><?php echo ($val['status']==0)?'<b style="color:red">Pending</b>':'<b style="color:#7AA93C;">Publish</b>'; ?></td>
              <td><a href="<?php echo BASEURL; ?>/dashboard/view_job/?id=<?php echo $val['id']; ?>" Alt="<?php echo ucfirst($val['job_title']); ?>">Full View Post</td>
              <td><?php  
                  echo date('m/d/Y', $val['created']) .'|'.date("H:i", $val['created']) ; ?></td>
                      <td><?php  
                  echo date('m/d/Y', $val['modify']) .'|'.date("H:i", $val['modify']) ; ?></td>
               </tr>
              <?php } }else{?>

              <tr>
                <td colspan="5" class="text-center">Result No Found!</td>
              </tr>
               <?php  }?>
              </tr>
            </tbody>
          
           </table>
       

        
   
          
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
                     class="form-control">
                </div>
            </li>
             <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Job Position</label>
                </div>
                <div class="col-md-6 ng-binding">
                    
                    <input type="text" name="job_position" tabindex="1" placeholder="Enter Job Position" 
                     class="form-control">
                </div>
            </li>
             <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Job Description</label>
                </div>
                <div class="col-md-6 ng-binding">
                     <textarea class="form-control" name="job_description" tabindex="4" class="form-control" placeholder="Job Description"></textarea>
                </div>
            </li>

              <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Job Skills</label>
                </div>
                <div class="col-md-6 ng-binding">
                     <textarea class="form-control" name="job_required_skills" tabindex="4" class="form-control" placeholder="Job Skills"></textarea>
                    </div>
            </li>





            <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Job Experience</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                       
                        <textarea class="form-control" name="job_required_experience" tabindex="4" class="form-control" placeholder="Job Experience"></textarea>
                    </div>
                </li>

             <li class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Job Education</label>
                </div>
                <div class="col-md-6 ng-binding">
                  
                <textarea class="form-control" name="job_required_education" tabindex="4" class="form-control" placeholder="Job Education"></textarea>

                </div>
            </li> 
         

            <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Job Salary</label>
                </div>
                <div class="col-md-6 ng-binding">
                   
                     <input type="text" name="job_salary" tabindex="5" placeholder="Salary"  class="form-control">
                </div>
            </li>

             <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Job Type</label>
                </div>
                <div class="col-md-6 ng-binding">
                   
                     <select class="form-control" name="job_type" data-fv-field="job_type">
                        <option>Select Job Type</option>
                        <option value="full-time">Full Time</option>
                        <option value="part-time">Part Time</option>
                      </select>
                </div>
            </li>
       


             <li class="row ng-scope">
             <div class="gp_empty"></div>
                <div class="col-md-4 col-md-offset-4">
            <button tabindex="11" class="btn btn-primary btn-block btn-lg" type="submit">
                        Post  &nbsp; <i class="fa fa-play-circle"></i>
                        </button>
                        <p class="msgforu">&nbsp;</p>
             </div>
            </li>             
            </ul>







        </form>

        </div>
</div>
</div>
</section>




