 <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
		<a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/" class="btn btn-primary">
		Back	
		</a>
		<div class="gp_empty" style="height:32px;" ></div>
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Package Details</h3>
			 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			 
            <form role="form" action="/admin/hotdeals/edit/<?php echo $results['id']; ?>" method="post">
              <div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-6">
                 <div class="form-group">
                  <label for="title">Title*</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $results['title']; ?>" required>
                </div>
				
                <div class="form-group">
                  <label for="link">Link*</label>
                  <input type="text" class="form-control" id="link" name="link" placeholder="Place Map Link" value="<?php echo $results['link']; ?>" required>
                </div> 
				
                <div class="form-group">
                  <label for="price">Price* £</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $results['price']; ?>" required>
                </div>
               
				 <div class="form-group">
                  <label for="price">Price type</label>
                  <input type="text" class="form-control" id="price" name="after_from_text_two" placeholder="enter two text" value="<?php echo $results['after_from_text_two']; ?>" required>
                </div>
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="city">City*</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="city" value="<?php echo $results['city']; ?>" required>
                </div>
				
				<div class="form-group">
                  <label for="description">Description*</label>
                  <textarea  class="form-control" id="description" name="description"><?php  echo $results['description']; ?></textarea>
                </div>
                
                <div class="form-group">
                  <label for="open_gallery">Choose Image*</label></br>
                  <button type="button" class="btn btn-secondary" id="open_gallery">Choose Image</button>

                  <p class="help-block">Choose Image Of Package</p>
                </div>
				 <div class="form-group">
						<div class="col-sm-4">
							<?php if($results['package_logo']){ ?>
						<img class="img-responsive image_selected" src="/../assets/files/<?php echo $results['package_logo']; ?>" alt="Photo" data-src="/../assets/files/<?php echo $results['package_logo']; ?>"><input type="hidden" id="package_logo" name="package_logo" value="<?php echo $results['package_logo']; ?>">
						<?php  } ?>

						</div>
				</div>
                
                </div>
                </div>
				
				
				
				<!-- End Medina Hotel Details -->
				
				
              </div>
              <!-- /.box-body -->
			  
			  
			  
			  

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
			   <div class="clearfix"></div>
            </form>
			
          </div>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
	
	
	
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
		
		
		
		