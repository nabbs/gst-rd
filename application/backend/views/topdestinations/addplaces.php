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
			
			<p class="alert-success text-center gp_white"><strong><?php echo $this->session->flashdata('message_name'); ?><strong>
            <!-- /.box-header -->
            <!-- form start -->
		<?php 	 if($city_data['city']) {?>
            <form role="form" action="/admin/topdestinations/addplaces/<?= $city_data['id'] ?>" method="post">
			
		<?php }else{?>
            <form role="form" action="/admin/topdestinations/addplaces" method="post">
			
		<?php } ?>
              <div class="box-body">
			  <div class="box-header row">
             
			
				<div class="col-xs-6">
                <div class="form-group">
                  <label for="city">Type City Name*</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="city" required value="<?php echo $city_data['city']; ?>">
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
			
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>City Name</th>                  
                  <th>Created</th>
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($results as $key=>$val){ 
				?>
                <tr>
                 
                  <td><?=$val['city']; ?></td>
                  
                  <td><?=date('l Y/m/d H:i', $val['created']); ?></td>
                  
                  
                  <td>
				   <a href="/admin/topdestinations/addplaces/<?php echo  $val['id']; ?>"><i class="fa fa-edit"></i></a>
				  <a href="/admin/topdestinations/deleteplace/<?php echo $val['id']; ?>"  onclick="return confirm('Are you sure to delete this?');"><i class="fa fa-trash-o"></i></a></td>				 		  
                </tr>
				<?php } ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
      </div>
	  
	  
    </section>
    <!-- /.content -->
	
	
	