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
                  <input type="text" class="form-control" name="starting_date" id="hajj_starting_date" placeholder="From Date" value="<?php echo $results['starting_date']; ?>">
                </div>
                <div class="form-group">
                  <label for="hajj_price">Hajj Price* £</label>
                  <input type="text" class="form-control" id="hajj_price" name="price" placeholder="Hajj Price" value="<?php echo $results['price']; ?>">
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
						<div class="pic col-sm-4">
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
                  <input type="text" class="form-control" id="makkah_hotel_name" name="makka_hotel" placeholder="Makkah Hotel Name" value="<?php echo $results['makka_hotel']; ?>">
                </div>
                <div class="form-group">
                  <label for="makkah_hotel_address">Makkah Hotel Address* £</label>
                  <input type="text" class="form-control" id="makkah_hotel_address" name="hotel_address" placeholder="Makkah Hotel Address" value="<?php echo $results['hotel_address']; ?>">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_from_haram">Distance From Haram*</label>
                  <input type="text" class="form-control" id="distance_from_haram" name="distence_from_haram" placeholder="Distance From Haram" value="<?php echo $results['distence_from_haram']; ?>">
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
				<div class="form-group col-md-12 col-sm-12">
            <div class="form-group col-md-12 col-sm-12">
        <label for="room_type">Makkah Room Type</label><br>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="makkha_room_type_quad" <?php echo ($results['makkha_room_type_quad']=='quad(4)')?'checked':''; ?> value="quad(4)">Quad (4)
          <input style="width: 76%;" type="text" name="makkha_room_type_quad_price" value="<?php echo @$results['makkha_room_type_quad_price']; ?>" placeholder="Enter Quad(4) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="makkha_room_type_triple" <?php echo ($results['makkha_room_type_triple']=='triple(3)')?'checked':''; ?>  value="triple(3)">Triple (3)
          <input style="width: 76%;" type="text" name="makkha_room_type_triple_price" value="<?php echo @$results['makkha_room_type_triple_price']; ?>" placeholder="Enter Triple(3) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox"  name="makkha_room_type_double" <?php echo ($results['makkha_room_type_double']=='double(2)')?'checked':''; ?> value="double(2)">Double (2)
          <input style="width: 76%;" type="text"  name="makkha_room_type_double_price" value="<?php echo @$results['makkha_room_type_double_price']; ?>" placeholder="Enter Double(2) price">
        </div>
      </div>
    </div>
				
				<div class="col-xs-6">
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
				<div class="col-xs-6">
				<label for="">Makkah Room Basis</label>
				<select class="form-control" name="room_basis">
					<option value="">None</option>
					<option value="Bed &amp; Breakfast" <?php echo ($results['room_basis']=='Bed &amp; Breakfast')?'selected':''; ?>>Bed &amp; Breakfast</option>
					<option value="Full Board" <?php echo ($results['room_basis']=='Full Board')?'selected':''; ?>>Full Board</option>
					<option value="Half Board" <?php echo ($results['room_basis']=='Half Board')?'selected':''; ?>>Half Board</option>
					<option value="Room Only" <?php echo ($results['room_basis']=='Room Only')?'selected':''; ?>>Room Only</option>
					<option value="Laundry" <?php echo ($results['room_basis']=='Laundry')?'selected':''; ?>>Laundry</option>
					<option value="Food" <?php echo ($results['room_basis']=='Food')?'selected':''; ?>>Food</option>
				  </select>
				</div>
				
		<div class='col-xs-12'>		
				<div class="gp_empty" style="height:32px;"></div>
				
				<!-- Start Medina Hotel Details -->
				<div class="box-header with-border">
					<h3 class="box-title">Medina Hotel Details</h3>
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="medina_hotel_name">Medina Hotel Name*</label>
                  <input type="text" class="form-control" id="medina_hotel_name" name="medina_hotel" placeholder="Medina Hotel Name"  value="<?php echo $results['medina_hotel']; ?>">
                </div>
                <div class="form-group">
                  <label for="medina_hotel_address">Medina Hotel Address*</label>
                  <input type="text" class="form-control" id="medina_hotel_address" name="medina_hotel_address" placeholder="Medina Hotel Address" value="<?php echo $results['medina_hotel_address']; ?>">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_form_haram_2">Distance From Haram*</label>
                  <input type="text" class="form-control" name="medina_distence_from_haram" id="distance_form_haram_2" placeholder="Distance From Haram" value="<?php echo $results['medina_distence_from_haram']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="map_link">Map Link*</label>
                  <input type="text" class="form-control" id="map_link_2" name="medina_map_link" placeholder="Map Link" value="<?php echo $results['medina_map_link']; ?>">
                </div>                
               
				</div>
				
				
						<div class="form-group col-md-12 col-sm-12">
            <div class="form-group col-md-12 col-sm-12">
        <label for="room_type">Medina Room Type</label><br>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="medina_room_type_quad" <?php echo ($results['medina_room_type_quad']=='quad(4)')?'checked':''; ?> value="quad(4)">Quad (4)
          <input style="width: 76%;" type="text" name="medina_room_type_quad_price" value="<?php echo @$results['medina_room_type_quad_price']; ?>" placeholder="Enter Quad(4) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="medina_room_type_triple" <?php echo ($results['medina_room_type_triple']=='triple(3)')?'checked':''; ?>  value="triple(3)">Triple (3)
          <input style="width: 76%;" type="text" name="medina_room_type_triple_price" value="<?php echo @$results['medina_room_type_triple_price']; ?>" placeholder="Enter Triple(3) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox"  name="medina_room_type_double" <?php echo ($results['medina_room_type_double']=='double(2)')?'checked':''; ?> value="double(2)">Double (2)
          <input style="width: 76%;" type="text"  name="medina_room_type_double_price" value="<?php echo @$results['medina_room_type_double_price']; ?>" placeholder="Enter Double(2) price">
        </div>
      </div>
    </div>
    </div>
	
	<div class="col-xs-6">
				<label for="">Medina Room Rating</label>
				<select class="form-control" name="medina_room_rating">
					<option value="">None</option>
					<option value="1" <?php echo ($results['medina_room_rating']==1)?'selected':''; ?>>1 Star</option>
					<option value="2" <?php echo ($results['medina_room_rating']==2)?'selected':''; ?>>2 Star</option>
					<option value="3"<?php echo ($results['medina_room_rating']==3)?'selected':''; ?>>3 Star</option>
					<option value="4" <?php echo ($results['medina_room_rating']==4)?'selected':''; ?>>4 Star</option>
					<option value="5" <?php echo ($results['medina_room_rating']==5)?'selected':''; ?>>5 Star</option>
				</select>
				</div>
				<div class="col-xs-6">
				<label for="">Medina Room Basis</label>
				<select class="form-control" name="medina_room_basis">
					<option value="">None</option>
					<option value="Bed &amp; Breakfast" <?php echo ($results['medina_room_basis']=='Bed & Breakfast')?'selected':''; ?>>Bed & Breakfast</option>
					<option value="Full Board" <?php echo ($results['medina_room_basis']=='Full Board')?'selected':''; ?>>Full Board</option>
					<option value="Half Board" <?php echo ($results['medina_room_basis']=='Half Board')?'selected':''; ?>>Half Board</option>
					<option value="Room Only" <?php echo ($results['medina_room_basis']=='Room Only')?'selected':''; ?>>Room Only</option>
					<option value="Laundry" <?php echo ($results['medina_room_basis']=='Laundry')?'selected':''; ?>>Laundry</option>
					<option value="Food" <?php echo ($results['medina_room_basis']=='Food')?'selected':''; ?>>Food</option>
				  </select>
				</div>
	
	<div class="col-xs-12">
		<div class="form-group">
                  <label for="medina_hotel_address">Package Link*</label>
                  <input type="text" class="form-control" id="website_url" name="website_url" placeholder="Medina Hotel Address" value="<?php echo $results['website_url']; ?>">
                </div>
				
				  <div class="form-group">
			<label>
				<span class="label-text">Publish :</span>
				 <input type='hidden' value='0' name='publish'>
			   <input type="checkbox" name="publish" id="publish" value='1' <?php if($results['publish']==1){ echo 'checked'; }?>>
			
  
			 </label>  
		</div>
				</div>
	<div class="col-md-12 col-sm-12" id="deceased">
	<h5>Additional Features</h5>

		<div class="form-group col-md-3 col-sm-3">
			<label>
				<span class="label-text">Shifting :</span>
			   <input type="radio" name="shifting" id="shifting" value="1" <?php if($results['shifting']==1){ echo 'checked'; }?>>
				<span class="label-text">Yes</span>
			   <input type="radio" name="shifting" id="shifting_no" <?php if($results['shifting']==0){ echo 'checked'; }?> value="0">
				<span class="label-text">No</span>
			 </label>  
		</div>
			
	 
		<div class="form-group col-md-3 col-sm-3">
			<label>
                <span class="label-text">Flights : </span>
                <input type="radio" name="flights" id="flights" value="1" <?php if($results['flights']==1){ echo 'checked'; }?>>
                <span class="label-text">yes</span>
                <input type="radio" name="flights" id="flights_no" <?php if($results['flights']==0){ echo 'checked'; }?> value="0">
                <span class="label-text">No</span>
                
            </label>
		</div>
   

</div>
	
</div>
 
	<!-- End Medina Hotel Details -->
	
		<hr>
				
				
				<div class="gp_empty" style="height:32px;"></div>
				
				<!-- Start agent Details -->
				<div class="box-header with-border">
					<h3 class="box-title">Agent Info</h3>
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="medina_hotel_name">Company Name</label>
                  <input type="text" class="form-control" name="agent_company_name" placeholder="Company Name" value="<?php echo $results['agent_company_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="medina_hotel_address">Contact no.</label>
                  <input type="text" class="form-control" name="agent_contact_no" placeholder="contact no" value="<?php echo $results['agent_contact_no']; ?>">
                </div>
               
			    <div class="form-group">
                  <label for="medina_hotel_address">IATA Number</label>
                  <input type="text" class="form-control"  name="agent_iata_number" placeholder="IATA Number" value="<?php echo $results['agent_iata_number']; ?>">
                </div>
				 <div class="form-group">
                  <label for="medina_hotel_address">Other Information (optional)</label>
                  <textarea  class="form-control" cols='5' name="agent_other_info">
				  <?php echo $results['agent_other_info']; ?>
				   </textarea>
						
                </div>
			   
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_form_haram_2">Email Id</label>
                  <input type="text" class="form-control" name="agent_email_id"  placeholder="Email id" value="<?php echo $results['agent_email_id']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="map_link">ATOL Number</label>
                  <input type="text" class="form-control" name="agent_atol_number" placeholder="atol number" value="<?php echo $results['agent_atol_number']; ?>">
                </div>  

				 <div class="form-group">
                  <label for="medina_hotel_address">ABTA Number</label>
                  <input type="text" class="form-control"  name="agent_abta_number" placeholder="ABTA Number" value="<?php echo $results['agent_abta_number']; ?>">
                </div>
				 
                </div>
				
				<!-- End agent hajj Details -->
				
				
              </div>
              <!-- /.box-body -->
			  
			  
			  
			  

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
			   <div class="clearfix"></div>
            </form>
			
          </div>
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
		
		
		
		