 <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
		<a href="<?php echo $this->router->class; ?>/add_new" class="btn btn-primary">
		Add New Hajj Package
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
			 
            <form role="form">
              <div class="box-body">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Hajj Starting Date*</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Hajj Price* £</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Hajj End Date*</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Choose Image*</label></br>
                  <button type="button" class="btn btn-secondary" id="open_gallery">Choose Image</button>

                  <p class="help-block">Choose Image Of Package</p>
                </div>
				 <div class="form-group">
						<div class="col-sm-2">
							<img class="img-responsive image_selected" src="/../assets/files/online-marketing-1.jpg" alt="Photo" data-src="/../assets/files/online-marketing-1.jpg">
							<input type="hidden" id="package_logo" name="package_logo" value="" ?>
						</div>
				</div>
                
                </div>
				
				
				<div class="box-header with-border">
					<h3 class="box-title">Makkah Hotel Details</h3>
				</div>
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Hotel Name*</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Hotel Address* £</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Distence From Haram*</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Map Link*</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>                
                </div>
				
				<!-- Room details section -->
				
				<div class="box-header with-border">
					<h3 class="box-title">Room Details</h3>
				</div>
				<div class="box-header row">
				<div class="col-xs-4">
				<label for="exampleInputEmail1">Room Type</label>
                  <select class="form-control" name="room_type">
					<option value="">None</option>
					<option value="quad(4)">Quad (4)</option>
					<option value="triple(3)">Triple (3)</option>
					<option value="double(2)">Double (2)</option>
					<option value="quin(5)">Quin (5)</option>					
				</select>
				</div>
				<div class="col-xs-4">
				<label for="exampleInputEmail1">Makkah Room Rating</label>
				<select class="form-control" name="room_rating">
					<option value="">None</option>
					<option value="1">1 Star</option>
					<option value="2">2 Star</option>
					<option value="3">3 Star</option>
					<option value="4">4 Star</option>
					<option value="5">5 Star</option>
				</select>
				</div>
				<div class="col-xs-4">
				<label for="exampleInputEmail1">Makkah Room Rating</label>
				<select class="form-control" name="room_basis">
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
				
				<div class="gp_empty" style="height:32px;"></div>
				
				<!-- Start Medina Hotel Details -->
				<div class="box-header with-border">
					<h3 class="box-title">Medina Hotel Details</h3>
				</div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Medina Hotel Name*</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="medina_hotel_name" placeholder="Medina Hotel Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Medina Hotel Address*</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Medina Hotel Address">
                </div>
               
                </div>
				
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Distance From Haram*</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Distance From Haram">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Map Link*</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Map Link">
                </div>                
                </div>
				
				<!-- End Medina Hotel Details -->
				
				
              </div>
              <!-- /.box-body -->
			  
			  
			  
			  

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
			
          </div>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
	
	
	
	<div class="modal fade" id="open-gallery-box">
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
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->