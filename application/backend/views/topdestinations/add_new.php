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
			 
            <form role="form" action="/admin/topdestinations/add_new" method="post">
              <div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-6">
                 
				 <div class="form-group">
                  <label for="title">Title*</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                </div> 
				 
                <div class="form-group">
                  <label for="link">Link*</label>
                  <input type="text" class="form-control" id="link" name="link" placeholder="Place Map Link" required>
                </div> 
				
                <div class="form-group">
                  <label for="price">Price* £</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
                </div>
               <div class="form-group">
                  <label for="city">Popular</label>
                  <input type="checkbox" name='popular' value='1'>
                </div>
				
				
				 <div class="form-group">
                  <label for="city">Tour url</label>
                  <input type="text" class="form-control" name="tours_url" placeholder="tours url" value="<?php echo $results['tours_url']; ?>" required>
                </div>
				
				 <div class="form-group">
                  <label for="city">Criuses url</label>
                 <input type="text" class="form-control"  name="criuses_url" placeholder="criuses url" value="<?php echo $results['criuses_url']; ?>" required>
                </div>
				
				 <div class="form-group">
                  <label for="city">Flight url </label>
                  <input type="text" class="form-control"  name="flight_url" placeholder="flight url" value="<?php echo $results['flight_url']; ?>" required>  </div>
				
				 <div class="form-group">
                  <label for="city">Hotel url</label>
                 <input type="text" class="form-control" name="hotel_url" placeholder="Hotel url" value="<?php echo $results['hotel_url']; ?>" required>
				 </div>
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="city">City*</label>
                 
				 
				  <select class="form-control" id="city" name="city">
					<option value="">Select city</option>
					<?php foreach($get_cities as $val){ ?>
					<option value="<?= $val['city']; ?>"><?= $val['city']; ?></option>
					<?php } ?>
					
				  </select>
                </div>
				
				<div class="form-group">
                  <label for="description">Description*</label>
                  <textarea  class="form-control" id="description" name="description"></textarea>
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
		
		
		
		