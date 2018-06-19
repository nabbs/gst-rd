 
    <!-- Header -->
		<div class="page-header parallax-window" data-parallax="scroll" data-image-src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/office_back.jpg">
			<h2 class="page-title">
			Find Jobs  <meta itemprop="title" content="Find Jobs">
			</h2>
			</div>
        </div>
		
		<section class="job-item-description">
		<?php $data = $this->input->get(); ?>
			<div class="row">
			<div class="container">
		
			<div class="col-sm-12">
				<form name="search" id="search" action="<?php echo BASEURL; ?>/search/">
				<div class="col-md-5">
				<div class="form-group">
					<input class="form-control gp_dash_filter text-center" placeholder="job title, keywords" name="title" type="text" value="<?php echo $data['title']; ?>">
				</div>
				</div>
				<div class="col-md-5">
				<div class="form-group">
					<input class="form-control gp_dash_filter text-center" placeholder="City" type="text" name="city"  value="<?php echo $data['city']; ?>">
				</div>
				</div>
				<!--<div class="col-md-3">
				<div class="form-group">
					<select class="form-control gp_dash_filter text-center"> 
						<option value="">Select City</option>
						<option value="chandigarh">Chandiagrh</option>
						<option value="mohali">Mohali</option>
					</select>
				</div> 
				</div>-->
				<div class="col-md-2">
				<div class="form-group">
					<button type="submit" class="btn btn-xl gp_dash_filter_btn col-sm-12 col-xs-12">Search</button>
				</div>
				</div>
				</form>
			</div>					
			</div>
			<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-left"></h2>
                    <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
                </div>
            </div>
         		
				<?php 
				if(!empty($result_search)){
				$count = count($result_search);
				$srno =1;	
			
				foreach($result_search as $key=>$val){ 
					
				?>
			
				<div class="job-listing <?php echo ($srno++ == $count)?'last-listed':''; ?>"> 
					<a href="<?php echo BASEURL; ?>/job_description/?id=<?php echo base64_encode($val['job_id']); ?>" alt="<?php echo $val['job_title']; ?>">
						<div class="row">
							<div class="col-md-12">
								<div class="col-sm-1 col-md-1 profile_img text-center">
									<img class="company_logo" src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/logo_243.png" alt="Chandigarh Recruiters">
							</div>
							<div class="col-sm-5 col-md-5 job-info">						
								<div class="col-xs-12">
							  <h4 class="job__title"><?php echo ucfirst($val['job_title']); ?></h4>
							  <p class="job__company"><?php echo  substr($val['job_description'], 0, 100); ?></p>
							  	</div>
							</div>
							
							<div class="col-sm-3 col-md-3  job_city">
							<i class="fa fa-map-marker job__location"></i><?php echo $val['company_city']; ?>, <?php echo $val['company_state']; ?>
							</div>
							<div class="col-sm-3 col-md-3 job_post_time" style="margin: 0 auto;"> 
							
							  <div class="job-type <?php echo $val['job_type']; ?> term-2"><?php echo ($val['job_type']=='full-time')?'Full Time':'Part Time'; ?></div>
							  <p class="text-center" style="margin-top:2px;"> <?php 

									$timestamp = $val['created'];		
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
							  ?> </p>
							</div>
							
						  </div>
						</div>	
						</a>
				</div>
				 
				<?php } ?> 
				 <ul class="pagination gp_theme_color pull-right">
				<!-- Show pagination links -->
			<?php foreach ($links as $link) {			      
				  echo "<li>".$link ."</li>";
					} ?>
					
			  </ul>
				<?php }else{ ?>
					<!--<div class="col-sm-12"><h3 class="text-center">Sorry ! No results were found.</h3></div>-->

					 <!-- Services Section -->
    <section class="job-item-description ">
	
	
	
			<div class="row">
			 
			<div class="container">
           
         
			<?php 
				$count = count($jobs);
				$srno =1;				
				foreach($jobs as $key=>$val){ 
					  $id_array = array('id'=>$val['job_company_name'],'user_id'=>$val['user_id']);
				$company_name = get_company_details_by_id($id_array);	
				
			
				?>
			
				<div class="job-listing <?php echo ($srno++ == $count)?'last-listed':''; ?>"> 
					<a href="<?php echo BASEURL; ?>/job/?id=<?php echo base64_encode($val['id']); ?>" alt="<?php echo ucfirst($val['job_title']); ?>">
						<div class="row">
							<div class="col-md-12">
								<div class="col-sm-1 col-md-1 profile_img text-center">
									<img class="company_logo" src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/company_logo.png" alt="Chandigarh Recruiters">
							</div>
							<div class="col-sm-5 col-md-5 job-info">						
								<div class="col-xs-12">
							  <h4 class="job__title"><?php echo ucfirst($val['job_title']); ?></h4>
							  <p class="job__company"><?php echo  substr($val['job_description'], 0, 100).'..'; ?></p>
							 
							  	</div>
							</div>
							
							<div class="col-sm-3 col-md-3  job_city">
							<i class="fa fa-map-marker job__location"></i><?php echo ucfirst($company_name['company_city']); ?>, <?php echo ucfirst($company_name['company_state']); ?>
							</div>
							<div class="col-sm-3 col-md-3 job_post_time" style="margin: 0 auto;"> 
							
							  <div class="job-type <?php echo $val['job_type']; ?> term-2"><?php echo ($val['job_type']=='full-time')?'Full Time':'Part Time'; ?></div>
							  <p class="text-center" style="margin-top:2px;"> <?php 
									$timestamp = $val['created'];		
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
							  ?> </p>
							</div>
							
						  </div>
						</div>	
						</a>
				</div>
				
				<?php } ?>
							
				
				 <ul class="pagination gp_theme_color pull-right">
				<!-- Show pagination links -->
			<?php foreach ($links as $link) {			      
				  echo "<li>".$link ."</li>";
					} ?>
					
			  </ul>
					
				</div>
			</div>
		</section>

				<?php }?>
				
				
							
			
					
					
				</div>
			</div>
		</section>