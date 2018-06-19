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
			 
            <form role="form" action="/admin/umrah/add_new" method="post">
              <div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="umrah_starting_date ">Umrah Starting Date*</label>
                  <input type="text" class="form-control" name="umrah_starting_date" id="umrah_starting_date" placeholder="From Date" required>
                </div>
                <div class="form-group">
                  <label for="umrah_price">Umrah Price* £</label>
                  <input type="text" class="form-control" id="umrah_price" name="umrah_price" placeholder="Umrah Price" required>
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="umrah_end_date">Umrah End Date*</label>
                  <input type="text" class="form-control" id="umrah_end_date" name="umrah_end_date" placeholder="To Date" required>
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
				
				
				<div class="box-header with-border">
					<h3 class="box-title">Makkah Hotel Details</h3>
				</div>
				<div class="box-header row">
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="makkah_hotel_name">Makkah Hotel Name*</label>
                  <input type="text" class="form-control" id="makkah_hotel_name" name="makkah_hotel_name" placeholder="Makkah Hotel Name" required>
                </div>
                <div class="form-group">
                  <label for="makkah_hotel_address">Makkah Hotel Address* £</label>
                  <input type="text" class="form-control" id="makkah_hotel_address" name="makkah_hotel_address" placeholder="Makkah Hotel Address" required>
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_from_haram">Distance From Haram*</label>
                  <input type="text" class="form-control" id="distance_from_haram" name="distance_from_haram" placeholder="Distance From Haram" required>
                </div>
                
                <div class="form-group">
                  <label for="map_link">Map Link*</label>
                  <input type="text" class="form-control" id="map_link" name="map_link" placeholder="Place Map Link" required>
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
                  <select class="form-control" name="room_type" required>
					<option value="">None</option>
					<option value="1">Quad (4)</option>
					<option value="2">Triple (3)</option>
					<option value="3">Double (2)</option>
					<option value="4">Quin (5)</option>					
				</select>
				</div>
				<div class="col-xs-4">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="room_rating" required>
					<option value="">None</option>
					<option value="1">1 Star</option>
					<option value="2">2 Star</option>
					<option value="3">3 Star</option>
					<option value="4">4 Star</option>
					<option value="5">5 Star</option>
				</select>
				</div>
				<div class="col-xs-4">
				<label for="">Makkah Room Rating</label>
				<select class="form-control" name="room_basis" required>
					<option value="">None</option>
					<option value="1">Bed &amp; Breakfast</option>
					<option value="2">Full Board</option>
					<option value="3">Half Board</option>
					<option value="4">Room Only</option>
					<option value="5">Laundry</option>
					<option value="6">Food</option>
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
                  <input type="text" class="form-control" id="medina_hotel_name" name="medina_hotel_name" placeholder="Medina Hotel Name" required>
                </div>
                <div class="form-group">
                  <label for="medina_hotel_address">Medina Hotel Address*</label>
                  <input type="text" class="form-control" id="medina_hotel_address" name="medina_hotel_address" placeholder="Medina Hotel Address" required>
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="distance_form_haram_2">Distance From Haram*</label>
                  <input type="text" class="form-control" name="distance_form_haram_2" id="distance_form_haram_2" placeholder="Distance From Haram" required>
                </div>
                
                <div class="form-group">
                  <label for="map_link">Map Link*</label>
                  <input type="text" class="form-control" id="map_link_2" name="map_link_2" placeholder="Map Link" required>
                </div>                
                </div>
				
				<!-- End Medina Hotel Details -->
				
			<div class="form-group col-md-12 col-sm-12">
		
          	<div class="form-group col-md-3 col-sm-3">
				<label for="room_type">Room Type</label>
				<select class="form-control" name="medina_room_type">
					<option value="">None</option>
					<option value="quad(4)">Quad (4)</option>
					<option value="triple(3)">Triple (3)</option>
					<option value="double(2)">Double (2)</option>
					<option value="quin(5)">Quin (5)</option>					
				</select>
			</div>

		<div class="form-group col-md-3 col-sm-3">
				<label for="room_rating">Medina Room Rating</label>
				<select class="form-control" name="medina_room_rating">
					<option value="">None</option>
					<option value="1">1 Star</option>
					<option value="2">2 Star</option>
					<option value="3">3 Star</option>
					<option value="4">4 Star</option>
					<option value="5">5 Star</option>
				</select>
			</div>
			<div class="form-group col-md-3 col-sm-3">
				<label for="room_basis">Room Details</label>
				 <select class="form-control" name="medina_room_basis">
					<option value="">None</option>
					<option value="bed">Bed &amp; Breakfast</option>
					<option value="full_board">Full Board</option>
					<option value="half_board">Half Board</option>
					<option value="room_only">Room Only</option>
					<option value="laundry">Laundry</option>
					<option value="food">Food</option>
				  </select>
			</div>	
	
	
	</div>	
					
				
				
			<div class="form-group col-md-12 col-sm-12">
	 <div class="form-group col-md-6 col-sm-6">
	      <label for="website">Package Link</label>
	      <input type="text" class="form-control input-sm" id="website" name="website" placeholder="Please add working link here of package" required="">
	   </div>
	 <div class="form-group col-md-6 col-sm-6" style="margin-top: 25px;">
		 <label>
			<span class="label-text"><b>Publish : </b></span>
			<input type="checkbox" name="publish" id="publish" value="1" checked="">
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
		<div class="clearfix"></div>	
	<!-- Start Medina Hotel Details -->
	<div class="box-header with-border">
		<h3 class="box-title">Agent Info</h3>
	</div>
				
	
        <div class="form-group col-md-6 col-sm-6">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control input-sm" id="company_name" name="company_name" placeholder="Agent Company Name" required="">
        </div>
		<div class="form-group col-md-6 col-sm-6">
	      <label for="contact_no">Contact No</label>
	      <input type="text" class="form-control input-sm" id="contact_no" name="contact_no" placeholder="Contact No" required="">
	   </div>
	   
	    <div class="form-group col-md-6 col-sm-6">
	      <label for="email">Email Id</label>
	      <input type="email" class="form-control input-sm" id="email" name="email" placeholder="Emaild Id" required="">
	   </div>
	   
	  
	   <div class="form-group col-md-6 col-sm-6">
	      <label for="alot_number">ATOL Number</label>	
	      <input type="text" class="form-control input-sm" id="alot_number" name="alot_number" placeholder="ATOL Number">
	   </div>
	    <div class="form-group col-md-6 col-sm-6">
	      <label for="iata_number">IATA Number</label>
	      <input type="text" class="form-control input-sm" id="iata_number" name="iata_number" placeholder="IATA Number">
	   </div>
	   <div class="form-group col-md-6 col-sm-6">
	      <label for="abta_number">ABTA Number</label>
	      <input type="text" class="form-control input-sm" id="abta_number" name="abta_number" placeholder="ABTA Number">
	   </div>
	   <div class="form-group col-md-6 col-sm-6">
	      <label for="other_information">Other Information (optional)</label>
	      <textarea class="form-control input-sm" id="other_information" name="other_information" rows="3"></textarea>
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
		
		
		
		