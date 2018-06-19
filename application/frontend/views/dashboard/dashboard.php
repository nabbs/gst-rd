
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

         $userdetails =  get_Users_details($userdata['id']); 
      
   
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
        <div data-ng-view="" class="ng-scope"><h1 class="ng-scope">Contact Info</h1>
            <div ng-messages="vm.messages" class="ng-scope ng-inactive">

            </div>

            <h2 class="m-md-bottom ng-scope">
            <a herf="javascript:void(0)" id="div_edit" type="button" class="pull-right" ><i class="fa fa-edit" ></i></a>
            <a herf="javascript:void(0)" id="div_close" type="button" class="pull-right" style="display:none;"><i class="fa fa-close" ></i></a>
            Account
            </h2>
        <hr class="ng-scope">
        <form id="formcompanyinfo" name="" class="" action="<?php echo BASEURL;?>/users/update_profile/" method="post">
            <input type="hidden" name="id" value="<?php echo $userdata['id']; ?>">
            <ul class="list-unstyled" id="comapny_info">
                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">User Id</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $userdata['display_name']; ?>
                    </div>
                </li>

            <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Full Name</label>
                </div>
                <div class="col-md-6 ng-binding">
                    <?php 
                    echo (empty($userdetails['fname']) AND empty($userdetails['lname']))?"No filled":$userdetails['fname'].' '.$userdetails['lname'];
                    ?>
                </div>
            </li>
            <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Company Name</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                       <?php echo (empty($company_details['company_name']))?"":$company_details['company_name'];   ?>
                    </div>
                </li>

             <li class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Description</label>
                </div>
                <div class="col-md-6 ng-binding">
                    <?php 
                    echo (empty($company_details))?"No filled":$company_details['company_description'];
                    ?>
                </div>
            </li> 
         

            <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Email</label>
                </div>
                <div class="col-md-6 ng-binding">
                    <?php echo $userdata['email']; ?>
                </div>
            </li>

             <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Company Email</label>
                </div>
                <div class="col-md-6 ng-binding">
                      <?php 
                    echo $company_details['company_address'];
                    ?> 
                </div>
            </li>

            <li class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Address</label>
                </div>
            <div class="col-md-6">
                <div class="ng-binding ng-scope">
                <?php 
                    echo (empty($company_details['company_address']))?"":$company_details['company_address'];
                    ?> 
                <br>
                </div>
           
            <div  class="ng-binding ng-scope">
            
             <?php 
                    echo (empty($company_details['company_city']))?"":$company_details['company_city'];
                    ?> 
            <span class="ng-binding ng-scope">&nbsp; <?php 
                    echo (empty($company_details['company_pincode']))?"No filled":$company_details['company_pincode'];
                    ?> </span><!-- end ngIf: vm.address.zip -->
            <br>
            </div>
            <div class="ng-binding ng-scope">
           
            <?php 
                    echo (empty($company_details['company_state']))?"":$company_details['company_state'];
                    ?> 
            <br>
            </div>
            
            </div>
            </li>
            <li class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Phone</label>
                </div>
                <div class="col-md-6 ng-binding">
                   <?php 
                    

                    echo (empty($company_details['company_phone']))?"no filled":$company_details['company_phone'];
                    ?> 
                </div>
            </li>
            </ul>


         
          
<!-- edit user section -->
<ul class="list-unstyled" id="comapny_edit" style="display:none;">
    

                <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">User Id</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                        <?php echo $userdetails['display_name'];?>
                    </div>
                </li>

            <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">First Name</label>
                </div>
                <div class="col-md-6 ng-binding">
                    
                    <input type="text" name="fname" tabindex="1" placeholder="Enter First Name"  class="form-control" 
                    value="<?php echo (empty($userdetails['fname']))?"":$userdetails['fname'];?>">
                </div>
            </li>
             <li  class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Last Name</label>
                </div>
                <div class="col-md-6 ng-binding">
                   
                    <input type="text" name="lname" tabindex="2" placeholder="Enter First Name"  class="form-control" 
                    value="<?php echo (empty($userdetails['lname']))?"":$userdetails['lname'];?>">
                </div>
            </li>

              <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Email</label>
                </div>
                <div class="col-md-6 ng-binding">
                    <?php echo trim($userdata['email']); ?>
                    </div>
            </li>





            <li class="row">
                    <div class="col-md-3">
                        <label class="control-label">Company Name</label>
                    </div>
                    <div class="col-md-6 ng-binding">
                       
                         <input type="text" name="company_name" tabindex="3" placeholder="Enter Comapny Name"  class="form-control" 
                         value="<?php echo (empty($company_details['company_name']))?"":$company_details['company_name'];?>">
                    </div>
                </li>

             <li class="row ng-scope">
            <div class="col-md-3">
                    <label class="control-label">Description</label>
                </div>
                <div class="col-md-6 ng-binding">
                  
                <textarea class="form-control" name="company_description" tabindex="4" class="form-control"><?php  echo $company_details['company_description'];?></textarea>

                </div>
            </li> 
         

            <li  class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Company Email</label>
                </div>
                <div class="col-md-6 ng-binding">
                   
                     <input type="text" name="company_email" tabindex="5" placeholder="Enter comapny Name"  class="form-control" 
                     value="<?php echo $company_details['company_email'];?>">
                </div>
            </li>

            <li class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Address</label>
                </div>
            <div class="col-md-6">
                <div class="ng-binding ng-scope">
                      <input type="text" name="company_address" tabindex="6" placeholder="Enter Comapny Address"  class="form-control" 
                 value="<?php echo $company_details['company_address'];?>">  
                </div>
           
                 
            </div>
            </li>
              <li class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">City</label>
                </div>
            <div class="col-md-6">   
              <div  class="ng-binding ng-scope">
               <input type="text" name="company_city" tabindex="7" placeholder="Enter Comapny City"  class="form-control" 
               value="<?php echo $company_details['company_city'];?>">   
       
            </div>
            

            </div>

            </li>

             <li class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">PinCode</label>
                </div>
            <div class="col-md-6">   
              <div class="ng-binding ng-scope">
           
                     <input type="text" name="company_pincode" tabindex="8" placeholder="Enter Comapny Pin Code"  class="form-control" 
                     value="<?php echo $company_details['company_pincode'];?>">  
           
            </div>
         

            </div>

            </li>

            <li class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">State</label>
                </div>
                <div class="col-md-6">   
                    <div class="ng-binding ng-scope">
                           <input type="text" name="company_state" tabindex="9" placeholder="Enter Comapny State"  class="form-control" 
                           value="<?php echo trim($company_details['company_state']);?>">  
                    </div>

                </div>

            </li>

            <li class="row ng-scope">
                <div class="col-md-3">
                    <label class="control-label">Company Phone</label>
                </div>
                <div class="col-md-6 ng-binding">
                   
                    <input type="text" name="company_phone" tabindex="10" placeholder="Enter Comapny Phone"  class="form-control"
                     value="<?php echo trim($company_details['company_phone']);  ?>">  
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