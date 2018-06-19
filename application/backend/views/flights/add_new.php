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
			 
            <form role="form" action="/admin/flights/add_new" method="post">
              <div class="box-body">				
				<!-- Room details section -->				
				<div class="box-header with-border">
					<h3 class="box-title">Flights Details</h3>
				</div>
				<div class="box-header row " id="added_selected">
				<div class="col-xs-4">
					<label for="">Destination Name</label>
					<select class="form-control" name="flights_id" required>
						<option value="">None</option>	
						<?php foreach($results as $key=>$val){ ?>
						<option value="<?php echo $val['id']; ?>"><?php echo $val['destination_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				
				</div>
				
				<div class="gp_empty" style="height:32px;"></div>
				
				<!-- Start Medina Hotel Details -->
				
			
				
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
		
		
		
		