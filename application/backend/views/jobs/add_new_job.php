 <div class="page-content">
    <div class ="col-md-12">
    
    <div class="row">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
        <div class=" col-sm-4 col-xs-4">
          <a class="btn_reload" href="<?php echo BASEURL; ?>/jobs/add_new_job" title="Reload"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
      </div>
            
 
  <div class=" box light-grey">       
   <div class="portlet-body">
       <div id="edit-profile">
     	<div class="gp_empty"></div>		   
	<div class="row">     
      <!-- edit form column -->
   
<form id='add_new_job' name='add_new_users' method="post" action='<?php echo BASEURL; ?>/jobs/insert_job'  role="form" />
	
	 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		
		   <label>Select Company Name</label>		  
		     <select name="job_company_name" class="form-control">
			 <option>Select Company Name</option>
			 <?php foreach($companies as $key=>$val){ ?>
					<option value="<?php echo $val['id']; ?>"><?php echo $val['company_name']; ?></option>
			 <?php } ?>
			
		   </select>
	  </div>
	 </div>	
	 
	 
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Title</label>
		  
		   <input type="text" name="job_title" class="form-control" placeholder="Job Title"/>
		</div>
	 </div>	
	 
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Description</label>		  
		   <textarea type="text" name="job_description" class="form-control"></textarea>
	  </div>
	 </div>
	
	 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Required Knowledge, Skills, and Abilities</label>
		  
		   <textarea type="text" name="job_required_skills" class="form-control">skill_1,skill_2,skill_3</textarea>
		   <p>Include "," after end of every entered skill execpt last.</p>
		</div>
	 </div>	
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Experience</label>
		  
		   <textarea type="text" name="job_required_experience" class="form-control">experience_1,experience_2,experience_3</textarea>
		   <p>Include "," after end of every entered experience execpt last.</p>
		</div>
	 </div>	
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Education</label>
		  
		   <textarea type="text" name="job_required_education" class="form-control">education_1,education_2,education_3</textarea>
		   <p>Include "," after end of every entered education execpt last.</p>
		</div>
	 </div>	
	 
	 
 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Salary</label>
		  
		   <input type="text" name="job_salary" class="form-control" placeholder="Job Salary" />
		</div>
	 </div>	 
	
	  

<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Type</label>
		   <select name="job_type" class="form-control">
			<option>Select Job Type</option>
			<option value="full-time">Full Time</option>
			<option value="part-time">Part Time</option>
		   </select>
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
