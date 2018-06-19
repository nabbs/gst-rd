<style>
.has-error .help-block {
    text-align:left;
}
</style>

<div class="page-header">

			<h2 class="page-title">
			<?php echo $job['job_title']; ?>   <meta itemprop="title" content="Art Director">
			</h2>
			<h3 class="page-subtitle">

			<ul class="job-listing-meta meta">

			<li class="job-type part-time" itemprop="employmentType"><?php echo ($job['job_type']=='full-time')?'Full Time':'Part Time'; ?></li>

			<li class="location" itemprop="jobLocation"><a href="#" rel="tag"><?php $job['job_description']; ?></a></li>

			<li class="date-posted" itemprop="datePosted"><date><?php 
				$timestamp = $job['created'];		
				$how_log_ago = '';				
				$seconds = time() - $timestamp;			
				$minutes = (int)($seconds / 60);		
				$hours = (int)($minutes / 60);	
				$days = (int)($hours / 24);	
				if ($days >= 1) {			
				$how_log_ago = $days . ' day' . ($days != 1 ? 's' : '');	
				} else if ($hours >= 1) {		
				$how_log_ago = $hours . ' hour' . ($hours != 1 ? 's' : '');				
				} else if ($minutes >= 1) {				
				$how_log_ago = $minutes . ' minute' . ($minutes != 1 ? 's' : '');		
				} else {
				$how_log_ago = $seconds . ' second' . ($seconds != 1 ? 's' : '');							
				}				
				echo  'Posted '.$how_log_ago .' ago';

			?> </date></li>


			<li class="job-company">
			<!--<a href="#" target="_blank">Senior Associate, Renewable Energy</a>-->
			<?php 
  			$id_array = array('id'=>$job['job_company_name'],'user_id'=>$job['user_id']);
			$company =  get_company_details_by_id($id_array); 
			echo ucfirst($company['company_city']).' , '.ucfirst($company['company_state']);
			?>
			</li>
			</ul>

			</h3>
			</div>
			
			
			
			<!-- header --->
			
			
			<section class="job-item-description">
			<div class="row">
			<div class="container">
			 <h2 class="section-heading text-left">Overview</h2>
				<div class="col-sm-8 col-xs-12 col-md-9">
				<!--- mention below function is used for featured post if post is featured than company overviews showing here -->
				<?php// if(!$featured_post){ ?>
				<!-- <h2 class="section-heading text-left">Company Description</h2>
					<p>Company is a 2016 Iowa City-born start-up that develops consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
					-->
				<?php //} ?>
					<h2 class="section-heading text-left">Job Description</h2>
				
					<p><?php echo  $job['job_description']; ?></p>
					<h2 class="section-heading text-left">Required Knowledge, Skills, and Abilities</h2>
					<ul class="gp_maring_bottom">
					<?php $job['job_required_skills']; 
					$job_skills = explode(',', $job['job_required_skills']);
					foreach($job_skills as $key=>$val){
					?>
					<li>&nbsp; <i class="fa fa-check theme_color" aria-hidden="true"></i><?php echo $val; ?></li>					
					<?php } ?>
						</ul>
						<h2 class="section-heading text-left">Experience</h2>
				
					<ul class="gp_maring_bottom">
					<?php 
					$job_experience = explode(',', $job['job_required_experience']);
					foreach($job_experience as $key=>$val){
					?>
						<li>&nbsp; <i class="fa fa-check theme_color" aria-hidden="true"></i><?php echo $val; ?></li>
						
					<?php } ?>
						</ul>
						<h2 class="section-heading text-left">Education</h2>
					<ul class="gp_maring_bottom">
					<?php 
					$job_edu = explode(',', $job['job_required_education']);
					foreach($job_edu as $key=>$val){
					?>
					<li>&nbsp; <i class="fa fa-check theme_color" aria-hidden="true"></i><?php echo $val; ?></li>
					<?php } ?>
						</ul>
					<h2 class="section-heading text-left">Salary</h2>
					<ul class="gp_maring_bottom">
						<li>&nbsp;  <i class="fa fa-check theme_color" aria-hidden="true"></i><strong><?php echo $job['job_salary']; ?></strong></li>
					</ul>
					
					
				</div>
				<div class="col-sm-4 col-xs-5 col-md-3 text-center">
				<aside class="widget widget--job_listing">
					<?php// if(!$featured_post){ ?>
					<a href="#" target="_blank" disabled="disabled">
				<img class="company_logo" src="http://chandigarhrecruiters.com/recruiters/application/frontend/layout/advanced/assets/img/logo_243.png" alt="Chandigarh Recruiters"style="padding: 35px;border: 1px solid;" ></a></aside>
					<?php //} ?>
				<aside class="widget widget--job_listing"><div class="job-type part-time term-3"><?php echo ($job['job_type']=='full-time')?'Full Time':'Part Time'; ?></div></aside>
				<aside class="widget widget--job_listing">	
				<div class="job_application application">
				
					<input class="btn btn-xl gp_dash_filter_btn" value="Apply for job" data-toggle="modal" data-target="#myModal" type="button">
					
					<!-- Modal -->
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-xs">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">×</button>
						  <h5 class="modal-title"></h5>
						</div>
						<div class="modal-body main-login main-center">
						<style>
										</style>
							<form class="" id="appliedform" method="post" action="<?php echo BASEURL; ?>/job_submit/" style="width:100%;" enctype="multipart/form-data">
							<?php //echo form_open_multipart('/home/job_application/','id="appliedform"');?>
									<input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
									<div class="form-group">
										<label for="name" class="cols-sm-2 control-label">Your Full Name</label>
										<div class="cols-sm-10">
											
											
												<input class="form-control" name="name" id="name" placeholder="Enter your Name" type="text">
											
										</div>
									</div>

									<div class="form-group">
										<label for="email" class="cols-sm-2 control-label">Your Email</label>
										<div class="cols-sm-10">
											
											
												<input class="form-control" name="email" id="email" placeholder="Enter your Email" type="text">
											
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="cols-sm-2 control-label">Contact No</label>
										<div class="cols-sm-10">
											
												
												<input class="form-control" name="phone" id="phone" placeholder="Enter Contact No" type="text">
											
										</div>
									</div>
									
									
									<div class="form-group">
										<label for="email" class="cols-sm-2 control-label">Your Cv/Resume</label>
										<div class="cols-sm-10">
											
												<input id="uploadFile" placeholder="Choose File" disabled="disabled">
												<div class="fileUpload btn btn-primary">
													<span>Upload</span>
													<input id="uploadBtn" class="upload" name="userfile"  type="file" id="file_upload" type="file">
											
											</div>
										</div>
									</div>

									<!--<input type = "file" name = "userfile" id="file_upload"  /> -->
									<div class="form-group pull-right">
										<button type="submit" class="btn btn-xl gp_dash_filter_btn" id="upload_file">Apply</button>
									
									</div>
								
									<div class="clearfix"></div>
								</form>
							
						</div>
					
					  </div>
					</div>
				  </div>
				  
					<!--end  Modal -->
						</div>
			</aside>
				<div class="clearfix"></div>
				</div>
			</div>
			</div>
		</section>