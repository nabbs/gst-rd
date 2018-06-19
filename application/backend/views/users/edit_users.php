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
	<form id='edit_new_users' method="post" action='<?php echo BASEURL; ?>/users/edit_users/<?php echo $user_data['id'];?>' enctype="multipart/form-data" role="form" >
<?php //debug($step_data); ?>	
	<div class="box-body">
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>First Name</label>		  
		   <input type="text" name="fname" value="<?php echo $user_data['fname'];?>" class="form-control"/>
			 <input type="hidden" name="id"  value="<?php echo $id; ?>" />
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Last Name</label>
		   <input type="text" name="lname" value="<?php echo $user_data['lname'];?>" class="form-control"/>
	  </div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Username</label>
		  
		   <input type="text" name="display_name" value="<?php echo $user_data['display_name'];?>" class="form-control"/>
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Email</label>
		   <input type="email" name="email" value="<?php echo $user_data['email'];?>" class="form-control"/>
	  </div>
	</div>
	
		 
		 
	<!--	 <div class="row">   
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Password</label>
		  
		   <input type="password" name="password" value="<?php echo $user_data['fname'];?>" class="form-control"/>
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Confirm Password</label>
		   <input type="password" name="confirmPassword" value="<?php echo $user_data['fname'];?>" class="form-control"/>
	  </div>
	</div>
	</div>
	</div> -->
		 
	
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Phone Number</label>
		  
		   <input type="text" name="phone_no" value="<?php echo $user_data['phone_no'];?>" class="form-control"/>
	  </div>
	 </div>	
	 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Reference By</label>
		   <input type="text" name="reference_by" value="<?php echo $user_data['reference_by'];?>" class="form-control"/>
	  </div>
	</div>
	
	         <div class="col-md-6 col-sm-6 col-xs-12">
		        <div class="form-group">
		           <label>Update Password</label>
		           <input type="password" name="password" class="form-control"/>
	            </div>
	         </div>	
	         <div class="col-md-6 col-sm-6 col-xs-12">
		        <div class="form-group">
		          <label>Confirm Password</label>
		          <input type="password" name="confirmPassword" class="form-control"/>
	            </div>
	         </div>
			  <div class="col-xs-12">
		        <div class="form-group">
				<label>Navigation Menu access</label>
			 <select class="form-control select2" multiple="multiple" data-placeholder="Select option" name='menu_show[]' style="width: 100%;" required>
                     <?php 
					@$menu_show=explode(',',@$user_data['menu_show']);
					
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
				
			<button type="submit" name="Button" class="btn green"><i class="fa fa-send"></i> Submit</button>
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


