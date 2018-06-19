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
              <h3 class="box-title">Add New Post</h3>
			 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			 
            <form role="form" action="/admin/blog/add_new" method="post">
              <div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-12">
                 <input type="hidden" name="post_type" value="blog" >
				 <div class="form-group">
                  <label for="post_title">Post Title*</label>
                  <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Title" required>
                </div> 				
             
               
                
                
				
				<div class="form-group">
                  <label for="editor1">Description*</label>
                  <textarea  class="form-control" id="editor1" name="post_description" required></textarea>
                </div>
                
                <div class="form-group">
                  <label for="open_gallery">Choose Image*</label></br>
                  <button type="button" class="btn btn-secondary" id="open_gallery">Choose Image</button>

                  <p class="help-block">Choose Image Of Package</p>
                </div>
				 <div class="form-group">
						<div class="col-sm-4">
							

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
		
		
		
		