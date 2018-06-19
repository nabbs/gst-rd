
 <h3><?php echo $master_title; ?></h3>
<div class="well">
    <form id="add_new_job" name="add_new_users" method="post" action="http://chandigarhrecruiters.com/admin/jobs/insert_job" role="form" novalidate="novalidate" class="fv-form fv-form-bootstrap"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
	
	 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		
		   <label>Select Company Name</label>		  
		     <select name="job_company_name" class="form-control">
			 <option>Select Company Name</option>
			 					<option value="4">N.C Medical College</option>
			 					<option value="5">Advance Institute of medical science and research </option>
			 					<option value="7">Index Medical College Indore</option>
			 					<option value="8">Adesh medical College </option>
			 					<option value="9">Web Tunix</option>
			 					<option value="10">IT COMPANY ( Mr kaushik )</option>
			 					<option value="11">Dara group</option>
			 					<option value="12">Bpo ( anurag )</option>
			 					<option value="13">webtunix</option>
			 					<option value="14">Harkamal singh ( Hotel Royal Plaza )</option>
			 					<option value="15">sind co.(Mr. Agarwal)</option>
			 					<option value="16">sind co.(Mr. Agarwal)</option>
			 			
		   </select>
	  </div>
	 </div>	
	 
	 
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Title</label>
		  
		   <input type="text" name="job_title" class="form-control" placeholder="Job Title" data-fv-field="job_title">
		<small class="help-block" data-fv-validator="notEmpty" data-fv-for="job_title" data-fv-result="NOT_VALIDATED" style="display: none;">This feild can't be empty</small></div>
	 </div>	
	 
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Description</label>		  
		   <textarea type="text" name="job_description" class="form-control" data-fv-field="job_description"></textarea>
	  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="job_description" data-fv-result="NOT_VALIDATED" style="display: none;">This feild can't be empty</small></div>
	 </div>
	
	 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Required Knowledge, Skills, and Abilities</label>
		  
		   <textarea type="text" name="job_required_skills" class="form-control" data-fv-field="job_required_skills">skill_1,skill_2,skill_3</textarea>
		   <p>Include "," after end of every entered skill execpt last.</p>
		<small class="help-block" data-fv-validator="notEmpty" data-fv-for="job_required_skills" data-fv-result="NOT_VALIDATED" style="display: none;">This feild can't be empty</small></div>
	 </div>	
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Experience</label>
		  
		   <textarea type="text" name="job_required_experience" class="form-control" data-fv-field="job_required_experience">experience_1,experience_2,experience_3</textarea>
		   <p>Include "," after end of every entered experience execpt last.</p>
		<small class="help-block" data-fv-validator="notEmpty" data-fv-for="job_required_experience" data-fv-result="NOT_VALIDATED" style="display: none;">This feild can't be empty</small></div>
	 </div>	
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Education</label>
		  
		   <textarea type="text" name="job_required_education" class="form-control" data-fv-field="job_required_education">education_1,education_2,education_3</textarea>
		   <p>Include "," after end of every entered education execpt last.</p>
		<small class="help-block" data-fv-validator="notEmpty" data-fv-for="job_required_education" data-fv-result="NOT_VALIDATED" style="display: none;">This feild can't be empty</small></div>
	 </div>	
	 
	 
 <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Salary</label>
		  
		   <input type="text" name="job_salary" class="form-control" placeholder="Job Salary" data-fv-field="job_salary">
		<small class="help-block" data-fv-validator="notEmpty" data-fv-for="job_salary" data-fv-result="NOT_VALIDATED" style="display: none;">Salary feild can't be empty</small></div>
	 </div>	 
	
	  

<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Job Type</label>
		   <select name="job_type" class="form-control" data-fv-field="job_type">
			<option>Select Job Type</option>
			<option value="full-time">Full Time</option>
			<option value="part-time">Part Time</option>
		   </select>
	  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="job_type" data-fv-result="NOT_VALIDATED" style="display: none;">This feild can't be empty</small></div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
	<div id="loader1" class="text-center"></div>
    </div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			
			<button type="submit" name="submit_video" class="btn btn-primary" style="background: #54718d;border: 1px solid #54718d;"><i class="fa fa-send"></i> Submit</button>
           <a href="http://chandigarhrecruiters.com/admin/users" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	    
   </div>
 </form>

 <div class="clearfix"></div>
            </div>