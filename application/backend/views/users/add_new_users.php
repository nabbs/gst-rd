 <?php if(@$error){ ?>	
<!--div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               <?php echo $error; ?>
              </div-->
<?php } ?>
 <div class="page-content">
    <div class ="col-md-12">
<div class="gp_empty" style="height:10px;" ></div>
  <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/" class="btn btn-primary">
		Back	
		</a>
		<div class="gp_empty" style="height:30px;" ></div>      
 
  <div class=" box light-grey">       
   <div class="portlet-body">
       <div id="edit-profile">
     	<div class="gp_empty"></div>		   
	<div class="row">     
      <!-- edit form column -->
    <div class="col-xs-12">
        <div class="box">
		
<form id='add_new_users' name='add_new_users' method="post" action='<?php echo BASEURL; ?>/users/add_new_users'  role="form" />
	<div class="box-body">
	
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>First Name</label>
		  
		   <input type="text" name="fname" class="form-control"/>
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Last Name</label>
		   <input type="text" name="lname" class="form-control"/>
	  </div>
	</div>
	

	
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Username</label>
		  
		   <input type="text" name="display_name" class="form-control"/>
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Email</label>
		   <input type="email" name="email" class="form-control"/>
	  </div>
	</div>
	
		 

	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Password</label>
		  
		   <input type="password" name="password" class="form-control"/>
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Confirm Password</label>
		   <input type="password" name="confirmPassword" class="form-control"/>
	  </div>
	</div>
			 
	
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Phone Number</label>
		  
		   <input type="text" name="phone_no" class="form-control"/>
	  </div>
	 </div>	
	 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Reference By</label>
		   <input type="text" name="reference_by" class="form-control"/>
	  </div>
	</div>
	

	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Reference Name</label>
		  
		   <input type="text" name="reference_name" class="form-control"/>
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Payment Method</label>
		   <select name="payment_method" class="form-control">
			<option value="0">Select your payment method</option> 
			<option value="Stripe">Stripe</option> 
			<option value="Paypal">Paypal</option> 
			</select>
	  </div>
	</div>
<div class="col-xs-12">
		        <div class="form-group">
				<label>Navigation Menu access</label>
			 <select class="form-control select2" multiple="multiple" data-placeholder="Select option" name='menu_show[]' style="width: 100%;" required>
                     <?php 
					@$menu_show=explode(',',@$single_fetch[0]->menu_show);
					
					foreach($menuarray as $val)
					 {					
					?>
						<option <?php if(in_array($val,$menu_show)){ echo 'Selected'; } ?> ><?php echo $val; ?></option>
					<?php } ?>
		
                    </select>
	    </div></div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div id="loader1" class="text-center" ></div>
    </div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			
			<button type="submit" name="submit_video" class="btn btn-primary" style="background: #54718d;border: 1px solid #54718d;"><i class="fa fa-send"></i> Submit</button>
           <a href="<?php echo BASEURL; ?>/users" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	    
   </div>
   </div>
 </form>
  </div>
 </div>
 
            </div> <!-- /.row (main row) -->

       </div>
   
   </div>
  </div>
     
   </div>
  </div>
