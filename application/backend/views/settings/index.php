<!--section class="content-header">
      <h1>
        <?php echo $master_title; ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section-->

    <!-- Main content -->
    <section class="content">
	 <div class="row">
       
        <div class="col-md-12 ">
        <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
			  <a href="#" class="list-group-item active text-center">
                  <h4 class="fa fa-home fa-3x"></h4><br/>Home
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-plane fa-3x"></h4><br/>Flight
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-bed fa-3x"></h4><br/>Hotel
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-car fa-3x"></h4><br/>Car Hire
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-suitcase fa-3x"></h4><br/>Holidays
                </a>
				<a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-cube fa-3x"></h4><br/>Hajj
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-hand-paper-o fa-3x"></h4><br/>Umrah
                </a>
				<a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-bookmark-o fa-3x"></h4><br/>About
                </a>
				<a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-lock fa-3x"></h4><br/>Privacy Policy
                </a>
				<a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-chain-broken fa-3x"></h4><br/>Cookie
                </a>
					<a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-support  fa-3x"></h4><br/>Support
                </a>
				<a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-step-forward fa-3x"></h4><br/>Footer
                </a>
              </div>
            </div>
			
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- home section -->
                <div class="bhoechie-tab-content active">
					<form action="<?=base_url(); ?>settings" method="post" name="home">
					<input type="hidden" name="page_name" value="home">
					<h4 class="fa fa-home fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$home['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$home['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$home['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$home['meta_description']; ?>" required>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				 <!-- flight section -->
                <div class="bhoechie-tab-content">
                   <form action="<?=base_url(); ?>settings" method="post" name="flight">
					<input type="hidden" name="page_name" value="flight">
					<h4 class="fa fa-plane fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$flight['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$flight['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$flight['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$flight['meta_description']; ?>" required>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
				
                    <form action="<?=base_url(); ?>settings" method="post" name="hotel">
					<input type="hidden" name="page_name" value="hotels">
					<h4 class="fa fa-bed fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$hotel['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$hotel['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$hotel['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$hotel['meta_description']; ?>" required>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                    <form action="<?=base_url(); ?>settings" method="post" name="car_hire">
					<input type="hidden" name="page_name" value="car_hire">
					<h4 class="fa fa-car fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$car_hire['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$car_hire['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$car_hire['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$car_hire['meta_description']; ?>" required>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
               
			   <!-- Holidays search -->
			   <div class="bhoechie-tab-content">
                    <form action="<?=base_url(); ?>settings" method="post" name="holidays">
					<input type="hidden" name="page_name" value="holidays">
					<h4 class="fa fa-suitcase fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$holidays['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$holidays['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$holidays['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$holidays['meta_description']; ?>" required>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				
				
				<!-- Hajj search -->
				<div class="bhoechie-tab-content">
					<form action="<?=base_url(); ?>settings" method="post" name="hajj">
					<input type="hidden" name="page_name" value="hajj">
					<h4 class="fa fa-cube fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$hajj['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$hajj['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$hajj['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$hajj['meta_description']; ?>" required>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
                
				<!-- Umrah search -->
				<div class="bhoechie-tab-content">
					<form action="<?=base_url(); ?>settings" method="post" name="umrah">
					<input type="hidden" name="page_name" value="umrah">
					<h4 class="fa fa-hand-paper-o fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$umrah['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$umrah['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$umrah['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$umrah['meta_description']; ?>" required>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				
				<!-- about page-->
				<div class="bhoechie-tab-content">
					<form action="<?=base_url(); ?>settings" method="post" name="about">
					<input type="hidden" name="page_name" value="about">
					<h4 class="fa fa-bookmark-o fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$about['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$about['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$about['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$about['meta_description']; ?>" required>
							</div>
						</div>
							<div class="col-xs-12">	
							<div class="form-group">
								<label for="title">Heading</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="headding" value="<?=$about['title']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="description">Page Description</label>
								
								<textarea id='editor1' name ='page_description' placeholder="Page Description">
								<?=$about['page_description']; ?>
								</textarea>
								
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				
				<!-- privacy policy -->
				<div class="bhoechie-tab-content">
					<form action="<?=base_url(); ?>settings" method="post" name="privacy-policy"">
					<input type="hidden" name="page_name" value="privacy-policy">
					<h4 class="fa fa-lock fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$privacy['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$privacy['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$privacy['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$privacy['meta_description']; ?>" required>
							</div>
						</div>
							<div class="col-xs-12">	
							<div class="form-group">
								<label for="title">Heading</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="headding" value="<?=$privacy['title']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="description">Page Description</label>
								
								<textarea class='ckeditor' name ='page_description' placeholder="Page Description">
								<?=$privacy['page_description']; ?>
								</textarea>
								
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				
					<!-- Cookie-->
				<div class="bhoechie-tab-content">
					<form action="<?=base_url(); ?>settings" method="post" name="cookie">
					<input type="hidden" name="page_name" value="cookie">
					<h4 class="fa fa-chain-broken fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$cookie['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$cookie['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$cookie['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$cookie['meta_description']; ?>" required>
							</div>
						</div>
							<div class="col-xs-12">	
							<div class="form-group">
								<label for="title">Heading</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="headding" value="<?=$cookie['title']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="description">Page Description</label>
								
								<textarea class='ckeditor' name ='page_description' placeholder="Page Description">
								<?=$cookie['page_description']; ?>
								</textarea>
								
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				
				
				
					<!-- support -->
				<div class="bhoechie-tab-content">
					<form action="<?=base_url(); ?>settings" method="post" name="support">
					<input type="hidden" name="page_name" value="support">
					<h4 class="fa fa-support  fa-3x"></h4><br/>
					<div class="col-xs-12">
							<div class="form-group">
							<label for="control">Page Title*</label>
							<input type="text" class="form-control" name="page_title"  placeholder="Page Title" value="<?=$support['page_title']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Meta Title*</label>
							<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" value="<?=$support['meta_title']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Meta Keywords* £</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?=$support['meta_keywords']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="<?=$support['meta_description']; ?>" required>
							</div>
						</div>
							<div class="col-xs-12">	
							<div class="form-group">
								<label for="title">Heading</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="headding" value="<?=$support['title']; ?>" required>
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="description">Page Description</label>
								
								<textarea class='ckeditor' name ='page_description' placeholder="Page Description">
								<?=$support['page_description']; ?>
								</textarea>
								
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				<!-- Footer search -->
				<div class="bhoechie-tab-content">
					<form action="<?=base_url(); ?>settings" method="post" name="footer">
					<input type="hidden" name="page_name" value="footer">
					<h4 class="fa fa-step-forward fa-3x"></h4><br/>
					
					<div class="col-xs-12">
				
					<div class="form-group">
								<label for="meta_description">Left side text</label>
								<textarea type="text" class="form-control" id="" name="meta_description" required><?=$meta_description; ?></textarea>
							</div>
					
							<div class="form-group">
								<label for="meta_description">Google Analytic Code</label>
								<textarea type="text" class="form-control" id="analytic_code" name="analytic_code" required><?=$footer; ?></textarea>
							</div>
							<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
						</div>
					</form>

				</div>
				
				
				
            </div>
        </div>
  </div>
  </div>
	
	</section>