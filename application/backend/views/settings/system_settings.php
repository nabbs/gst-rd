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
	<?php //print_r($result); die('ss');?>
    <section class="content">
	 <div class="row">
       
        <div class="col-md-12 ">
        <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
			  <a href="#" class="list-group-item active text-center">
                  <h4 class="fa fa-laptop fa-3x"></h4><br/>Genral Settings
                </a>
                
              </div>
            </div>
			
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- home section -->
                <div class="bhoechie-tab-content active">
					<form action="<?=base_url(); ?>settings/general_settings" method="post" name="home">
					<div class="col-xs-12">
					  <div class="form-group">
                  <label for="open_gallery">Choose logo*</label></br>
                  <button type="button" class="btn btn-secondary" id="open_gallery">Choose Image</button>

                  <p class="help-block">Choose Logo</p>
                </div>
				 <div class="form-group">
						<div class="col-sm-4">
							<?php if($result['logo']){ ?>
						<img class="img-responsive image_selected" src="/../assets/files/<?php echo $result['logo']; ?>" alt="Photo" data-src="/../assets/files/<?php echo $result['logo']; ?>"><input type="hidden" id="logo" name="logo" value="<?php echo $result['logo']; ?>">
						<?php  } ?>

						</div>
				</div>
				</div>
						<div class="col-xs-6">
							<div class="form-group">
							<label for="control">Site name</label>
							<input type="text" class="form-control" name="site_name" placeholder="site name" value="<?=$result['site_name']; ?>" required>
							</div>
						</div>
							
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Mail</label>
								<input type="text" class="form-control"  name="site_email" placeholder="site mail" value="<?=$result['site_email']; ?>" required>
							</div>
						</div>
						<div class="col-xs-6">	
							<div class="form-group">
								<label for="meta_keywords">Phone</label>
								<input type="text" class="form-control"  name="phone" placeholder="Phone" value="<?=$result['phone']; ?>">
							</div>
						</div>
				
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Address</label>
								<input type="text" class="form-control"  name="address" placeholder="address" value="<?=$result['address']; ?>">
							</div>
						</div>
						
						<div class="col-xs-6">
							<div class="form-group">
								<label for="meta_description">Website status</label>
								<select name='website_status'>
								<option value='1' <?php if($result['website_status']==1){ echo 'selected';} ?>>Online</option>
								<option value='0' <?php if($result['website_status']==0){ echo 'selected';} ?>>Offline</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="meta_description">Website off line message</label>
								
				   <textarea  class="form-control" id="editor1" name="website_offline_message" required>
				   <?=$result['website_offline_message']; ?></textarea>
							</div>
						</div>
						
						<div class="col-xs-6">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
                </div>
				
				
				
				
            </div>
        </div>
  </div>
  </div>
	
	</section>
	
	<div class="modal fade" id="open-gallery-box">
		<input hidden="image_name" id="image_name">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Gallery</h4>
              </div>
              <div class="modal-body" id="gallery_img">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button"  id="get_saved_img" data-dismiss="modal" class="btn btn-primary save_image">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->