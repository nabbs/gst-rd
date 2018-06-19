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
              <h3 class="box-title">Slider</h3>
			 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			 
            <form role="form" action="/admin/<?php echo $this->router->class; ?>/add_new" method="post">
              <div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_starting_date ">Price*</label>
                  <input type="text" class="form-control" name="text_above_title"  placeholder="From above title" required>
                </div>
                <div class="form-group">
                  <label for="title">Title*</label>
                  <input type="text" class="form-control"  name="title" placeholder="Title" required>
                </div>
               
                </div>
				
				<div class="col-xs-6">
				
				<div class="form-group">
                  <label for="open_gallery">Choose Image*</label></br>
                  <button type="button" class="btn btn-secondary" id="open_gallery">Choose Image</button>
                </div>
			
				
				 <div class="form-group">
						<div class="col-sm-4">
							

						</div>
				
				</div>
				</div>
				
				<div class="col-xs-6">
				<div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="content"  rows="3" placeholder="Enter ..." required></textarea>
                </div>
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Button text*</label>
                  <input type="text" class="form-control"  name="button_text" placeholder="Button text" required>
                </div>
            
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Button url*</label>
                  <input type="text" class="form-control"  name="button_url" placeholder="Button url" required>
                </div>
            
				</div>
				
                <div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Second Button text*</label>
                  <input type="text" class="form-control"  name="button_text_two" placeholder="Button text" value="<?php echo @$results['button_text_two'];  ?>">
                </div>
            
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Second Button url*</label>
                  <input type="text" class="form-control"  name="button_url_two" placeholder="Button url" value="<?php echo @$results['button_url_two'];  ?>">
                </div>
            
				</div>
                
<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Third Button text*</label>
                  <input type="text" class="form-control"  name="button_text_three" placeholder="Button text" value="<?php echo @$results['button_text_three'];  ?>" >
                </div>
            
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Third Button url*</label>
                  <input type="text" class="form-control"  name="button_url_three" placeholder="Button url" value="">
                </div>
            
				</div>

				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Fourth Button text*</label>
                  <input type="text" class="form-control"  name="button_text_four" placeholder="Button text" value="" >
                </div>
            
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Fourth Button url*</label>
                  <input type="text" class="form-control"  name="button_url_four" placeholder="Button url" value="">
                </div>
            
				</div>
              
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
		
		
		
		