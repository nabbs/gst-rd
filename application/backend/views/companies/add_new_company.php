 <div class="page-content">
    <div class ="col-md-12">
    
    <div class="row">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
        <div class=" col-sm-4 col-xs-4">
          <a class="btn_reload" href="<?php echo BASEURL; ?>/companies/add_new_company" title="Reload"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
      </div>
            
 
  <div class=" box light-grey">       
   <div class="portlet-body">
       <div id="edit-profile">
     	<div class="gp_empty"></div>		   
	<div class="row">     
      <!-- edit form column -->
   
<form id='add_new_company' name='add_new_users' method="post" action='<?php echo BASEURL; ?>/companies/insert_company'  role="form"  enctype="multipart/form-data" />
	
	
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Company Name</label>
		  
		   <input type="text" name="company_name" class="form-control" placeholder="Company Name"/>
	  </div>
	 </div>	
	
		<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Company Logo Link</label>
		   <input type="text" id="fileupload" name="company_logo_link" class="form-control" />
	  </div>
	

	</div>
	
	  <div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Company Description</label>
		  	   <textarea type="text" name="company_description" class="form-control"></textarea>
	  </div>
	 </div>	
	 
	
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
		   <b>Company Location</b>		   
	    </div>
		<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Address</label>
		    <input type="text" name="company_address" class="form-control" placeholder="Address"/>
	  </div>
	</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>City</label>
		    <input type="text" name="company_city" class="form-control" placeholder="City"/>
	  </div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>State</label>
		    <input type="text" name="company_state" class="form-control" placeholder="State"/>
	  </div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Pincode</label>
		     <input type="text" name="company_pincode" class="form-control" placeholder="Pincode"/>
	  </div>
	</div>
	
	</div>


	<div class="col-md-12 col-sm-12 col-xs-12">
	<div id="loader1" class="text-center" ></div>
    </div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			
			<button type="submit" name="submit_video" class="btn btn-primary" style="background: #54718d;border: 1px solid #54718d;"><i class="fa fa-send"></i> Submit</button>
           <a href="<?php echo BASEURL; ?>/users" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	    
   </div>
 </form>
            </div> <!-- /.row (main row) -->

       </div>
   
   </div>
  </div>
     
   </div>
  </div>
