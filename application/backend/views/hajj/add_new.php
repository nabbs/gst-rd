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
         
              <h3 class="box-title">Package Details</h3>
			 
        
            <!-- /.box-header -->
            <!-- form start -->
			 
            <form role="form" action="/admin/hajj/add_new" method="post">
              <div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_starting_date ">Hajj Starting Date*</label>
                  <input type="text" class="form-control" name="starting_date" id="hajj_starting_date" placeholder="From Date">
                </div>
                <div class="form-group">
                  <label for="hajj_price">Hajj Price* £</label>
                  <input type="text" class="form-control" id="hajj_price" name="price" placeholder="Hajj Price">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="hajj_end_date">Hajj End Date*</label>
                  <input type="text" class="form-control" id="hajj_end_date" name="hajj_end_date" placeholder="To Date">
                </div>
                
                <div class="form-group">
                  <label for="open_gallery">Choose Image*</label></br>
                  <button type="button" class="btn btn-secondary" id="open_gallery">Choose Image</button>

                  <p class="help-block">Choose Image Of Package</p>
                </div>
				 <div class="form-group">
						<div class="pic col-sm-4">
							

						</div>
				</div>
                
                </div>
               
				
				
			
					<h3 class="box-title">Makkah Hotel Details</h3>
			
				<div class="box-header row">
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="makkah_hotel_name">Makkah Hotel Name*</label>
                  <input type="text" class="form-control" id="makkah_hotel_name" name="makka_hotel" placeholder="Makkah Hotel Name">
                </div>
                <div class="form-group">
                  <label for="makkah_hotel_address">Makkah Hotel Address* £</label>
                  <input type="text" class="form-control" id="makkah_hotel_address" name="hotel_address" placeholder="Makkah Hotel Address">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_from_haram">Distance From Haram*</label>
                  <input type="text" class="form-control" id="distance_from_haram" name="distence_from_haram" placeholder="Distance From Haram">
                </div>
                
                <div class="form-group">
                  <label for="map_link">Map Link*</label>
                  <input type="text" class="form-control" id="map_link" name="map_link" placeholder="Place Map Link">
                </div>                
                </div>
                </div>
				
				<!-- Room details section -->
				
				
					<h3 class="box-title">Room Details</h3>
				
				<div class="box-header row">
					<div class="form-group col-md-12 col-sm-12">
            <div class="form-group col-md-12 col-sm-12">
        <label for="room_type">Makkah Room Type</label><br>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="makkha_room_type_quad" value="quad(4)">Quad (4)
          <input style="width: 76%;" type="text" name="makkha_room_type_quad_price" value="" placeholder="Enter Quad(4) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="makkha_room_type_triple"  value="triple(3)">Triple (3)
          <input style="width: 76%;" type="text" name="makkha_room_type_triple_price" value="" placeholder="Enter Triple(3) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox"  name="makkha_room_type_double" value="double(2)">Double (2)
          <input style="width: 76%;" type="text"  name="makkha_room_type_double_price" value="" placeholder="Enter Double(2) price">
        </div>
      </div>
    </div>
				<div class="col-xs-6">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="room_rating">
					<option value="">None</option>
					<option value="1">1 Star</option>
					<option value="2">2 Star</option>
					<option value="3">3 Star</option>
					<option value="4">4 Star</option>
					<option value="5">5 Star</option>
				</select>
				</div>
				<div class="col-xs-6">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="room_basis">
					<option value="">None</option>
					<option value="Bed &amp; Breakfast">Bed &amp; Breakfast</option>
					<option value="Full Board">Full Board</option>
					<option value="Half Board">Half Board</option>
					<option value="Room Only">Room Only</option>
					<option value="Laundry">Laundry</option>
					<option value="Food">Food</option>
				  </select>
				</div>
				</div>
				
				<div class="gp_empty" style="height:32px;"></div>
				
				<!-- Start Medina Hotel Details -->
		
					<h3 class="box-title">Medina Hotel Details</h3>
			
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="medina_hotel_name">Medina Hotel Name*</label>
                  <input type="text" class="form-control" id="medina_hotel_name" name="medina_hotel" placeholder="Medina Hotel Name">
                </div>
                <div class="form-group">
                  <label for="medina_hotel_address">Medina Hotel Address*</label>
                  <input type="text" class="form-control" id="medina_hotel_address" name="medina_hotel_address" placeholder="Medina Hotel Address">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_form_haram_2">Distance From Haram*</label>
                  <input type="text" class="form-control" name="medina_distence_from_haram" id="distance_form_haram_2" placeholder="Distance From Haram">
                </div>
                
                <div class="form-group">
                  <label for="map_link">Map Link*</label>
                  <input type="text" class="form-control" id="map_link_2" name="medina_map_link" placeholder="Map Link">
                </div>                
                </div>
				
				<!-- End Medina Hotel Details -->
				
				
						<div class="form-group col-md-12 col-sm-12">
            <div class="form-group col-md-12 col-sm-12">
        <label for="room_type">Medina Room Type</label><br>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="medina_room_type_quad" value="quad(4)">Quad (4)
          <input style="width: 76%;" type="text" name="medina_room_type_quad_price" value="" placeholder="Enter Quad(4) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox" name="medina_room_type_triple"  value="triple(3)">Triple (3)
          <input style="width: 76%;" type="text" name="medina_room_type_triple_price" value="" placeholder="Enter Triple(3) price">
        </div>
        <div class="col-md-4 col-sm-4">
          <input type="checkbox"  name="medina_room_type_double" value="double(2)">Double (2)
          <input style="width: 76%;" type="text"  name="medina_room_type_double_price" value="" placeholder="Enter Double(2) price">
        </div>
      </div>
    </div>
    </div>
	<div class="col-xs-6">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="medina_room_rating">
					<option value="">None</option>
					<option value="1">1 Star</option>
					<option value="2">2 Star</option>
					<option value="3">3 Star</option>
					<option value="4">4 Star</option>
					<option value="5">5 Star</option>
				</select>
				</div>
				<div class="col-xs-6">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="medina_room_basis">
					<option value="">None</option>
					<option value="Bed & Breakfast">Bed & Breakfast</option>
					<option value="Full Board">Full Board</option>
					<option value="Half Board">Half Board</option>
					<option value="Room Only">Room Only</option>
					<option value="Laundry">Laundry</option>
					<option value="Food">Food</option>
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
			   <input type="checkbox" name="publish" id="publish" value="1">
			
			 </label>  
		</div>
		
		</div>
	<div class="col-md-12 col-sm-12" id="deceased">
	<h5>Additional Features</h5>

		<div class="form-group col-md-3 col-sm-3">
			<label>
				<span class="label-text">Shifting :</span>
			   <input type="radio" name="shifting" id="shifting" value="1" checked="">
				<span class="label-text">Yes</span>
			   <input type="radio" name="shifting" id="shifting_no" value="0">
				<span class="label-text">No</span>
			 </label>  
		</div>
			
	 
		<div class="form-group col-md-3 col-sm-3">
			<label>
                <span class="label-text">Flights : </span>
                <input type="radio" name="flights" id="flights" value="1" checked="">
                <span class="label-text">yes</span>
                <input type="radio" name="flights" id="flights_no" value="0">
                <span class="label-text">No</span>
                
            </label>
		</div>
   
 
</div>	
 
				
				
				
				<div class="gp_empty" style="height:32px;"></div>
				
				<!-- Start agent Details -->
				
					<h3 class="box-title">Agent Info</h3>
				
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="medina_hotel_name">Company Name</label>
                  <input type="text" class="form-control" name="agent_company_name" placeholder="Company Name">
                </div>
                <div class="form-group">
                  <label for="medina_hotel_address">Contact no.</label>
                  <input type="text" class="form-control" name="agent_contact_no" placeholder="contact no">
                </div>
               
			    <div class="form-group">
                  <label for="medina_hotel_address">IATA Number</label>
                  <input type="text" class="form-control"  name="agent_iata_number" placeholder="IATA Number">
                </div>
				 <div class="form-group">
                  <label for="medina_hotel_address">Other Information (optional)</label>
                  <textarea  class="form-control" cols='5' name="agent_other_info">
				   </textarea>
						
                </div>
			   
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_form_haram_2">Email Id</label>
                  <input type="text" class="form-control" name="agent_email_id"  placeholder="Email id">
                </div>
                
                <div class="form-group">
                  <label for="map_link">ATOL Number</label>
                  <input type="text" class="form-control" name="agent_atol_number" placeholder="atol number">
                </div>  

				 <div class="form-group">
                  <label for="medina_hotel_address">ABTA Number</label>
                  <input type="text" class="form-control"  name="agent_abta_number" placeholder="ABTA Number">
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
		
		
		
		