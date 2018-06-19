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
			
            <form role="form" action="/admin/hajj/edit/<?php echo $results['id']; ?>" method="post">
			
              <div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_starting_date ">Hajj Starting Date*</label>
                  <input type="text" class="form-control" name="hajj_starting_date" id="hajj_starting_date" placeholder="From Date" value="<?php echo $results['hajj_starting_date']; ?>">
                </div>
                <div class="form-group">
                  <label for="hajj_price">Hajj Price* £</label>
                  <input type="text" class="form-control" id="hajj_price" name="hajj_price" placeholder="Hajj Price" value="<?php echo $results['hajj_price']; ?>">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Hajj End Date*</label>
                  <input type="text" class="form-control" id="hajj_end_date" name="hajj_end_date" placeholder="To Date" value="<?php echo $results['hajj_end_date']; ?>">
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
				
				
				<div class="box-header with-border">
					<h3 class="box-title">Makkah Hotel Details</h3>
				</div>
				<div class="box-header row">
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="makkah_hotel_name">Makkah Hotel Name*</label>
                  <input type="text" class="form-control" id="makkah_hotel_name" name="makkah_hotel_name" placeholder="Makkah Hotel Name" value="<?php echo $results['makkah_hotel_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="makkah_hotel_address">Makkah Hotel Address* £</label>
                  <input type="text" class="form-control" id="makkah_hotel_address" name="makkah_hotel_address" placeholder="Makkah Hotel Address" value="<?php echo $results['makkah_hotel_address']; ?>">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_from_haram">Distance From Haram*</label>
                  <input type="text" class="form-control" id="distance_from_haram" name="distance_from_haram" placeholder="Distance From Haram" value="<?php echo $results['distance_from_haram']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="map_link">Map Link*</label>
                  <input type="text" class="form-control" id="map_link" name="map_link" placeholder="Place Map Link" value="<?php echo $results['map_link']; ?>">
                </div>                
                </div>
                </div>
				
				<!-- Room details section -->
				
				<div class="box-header with-border">
					<h3 class="box-title">Room Details</h3>
				</div>
				<div class="box-header row">
				<div class="col-xs-4">
				<label for="">Room Type</label>
                  <select class="form-control" name="room_type">
					<option value="">None</option>
					<option value="1" <?php echo ($results['room_type']==1)?'selected':''; ?>>Quad (4)</option>
					<option value="2" <?php echo ($results['room_type']==2)?'selected':''; ?>>Triple (3)</option>
					<option value="3" <?php echo ($results['room_type']==3)?'selected':''; ?>>Double (2)</option>
					<option value="4" <?php echo ($results['room_type']==4)?'selected':''; ?>>Quin (5)</option>					
				</select>
				</div>
				<div class="col-xs-4">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="room_rating">
					<option value="">None</option>
					<option value="1" <?php echo ($results['room_rating']==1)?'selected':''; ?>>1 Star</option>
					<option value="2" <?php echo ($results['room_rating']==2)?'selected':''; ?>>2 Star</option>
					<option value="3"<?php echo ($results['room_rating']==3)?'selected':''; ?>>3 Star</option>
					<option value="4" <?php echo ($results['room_rating']==4)?'selected':''; ?>>4 Star</option>
					<option value="5" <?php echo ($results['room_rating']==5)?'selected':''; ?>>5 Star</option>
				</select>
				</div>
				<div class="col-xs-4">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="room_basis">
					<option value="">None</option>
					<option value="1" <?php echo ($results['room_basis']==1)?'selected':''; ?>>Bed &amp; Breakfast</option>
					<option value="2" <?php echo ($results['room_basis']==2)?'selected':''; ?>>Full Board</option>
					<option value="3" <?php echo ($results['room_basis']==3)?'selected':''; ?>>Half Board</option>
					<option value="4" <?php echo ($results['room_basis']==4)?'selected':''; ?>>Room Only</option>
					<option value="5" <?php echo ($results['room_basis']==5)?'selected':''; ?>>Laundry</option>
					<option value="6" <?php echo ($results['room_basis']==6)?'selected':''; ?>>Food</option>
				  </select>
				</div>
				</div>
				
				<div class="gp_empty" style="height:32px;"></div>
				
				<!-- Start Medina Hotel Details -->
				<div class="box-header with-border">
					<h3 class="box-title">Medina Hotel Details</h3>
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="medina_hotel_name">Medina Hotel Name*</label>
                  <input type="text" class="form-control" id="medina_hotel_name" name="medina_hotel_name" placeholder="Medina Hotel Name"  value="<?php echo $results['medina_hotel_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="medina_hotel_address">Medina Hotel Address*</label>
                  <input type="text" class="form-control" id="medina_hotel_address" name="medina_hotel_address" placeholder="Medina Hotel Address" value="<?php echo $results['medina_hotel_address']; ?>">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_form_haram_2">Distance From Haram*</label>
                  <input type="text" class="form-control" name="distance_form_haram_2" id="distance_form_haram_2" placeholder="Distance From Haram" value="<?php echo $results['distance_form_haram_2']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="map_link">Map Link*</label>
                  <input type="text" class="form-control" id="map_link_2" name="map_link_2" placeholder="Map Link" value="<?php echo $results['map_link_2']; ?>">
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
                <button type="button"  id="get_saved_img" data-dismiss="modal" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		
		
		