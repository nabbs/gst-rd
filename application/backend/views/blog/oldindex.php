 <!-- Content Header (Page header) -->   

    <!-- Main content -->
    <section class="content">
		<a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/add_new" class="btn btn-primary">
		Add New
		</a>
		<div class="gp_empty" style="height:32px;" ></div>
      <div class="row">
        <div class="col-xs-12">
          <div class=" box light-grey">
            <div class="portlet-body table-responsive">
		
                <table class="table table-striped table-bordered table-hover table-responsive" id="example1">
                <thead>
                <tr>
				  <th>Image</th>
                  <th>Umrah Start Date</th>
                  <th>Umrah End Date</th>
                  <th>Price</th>
                  <th>Makkah Hotel Name</th>
                  <th>Makkah Hotel Address</th>
                  <th>Room Type</th>
                  <th>Room Rating</th>
                  <th>Room Basis</th>
                  <th>Medina Hotel Name</th>
                  <th>Medina Hotel Address</th>
                  <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($results as $key=>$val){ 
				?>
                <tr>
                  <td><img class="img-responsive image_selected" src="/../assets/files/<?=$val['package_logo']; ?>" style="height: 80px;"></td>
                  <td><?=$val['umrah_starting_date']; ?></td>
                  <td><?=$val['umrah_end_date']; ?></td>
                  <td><?=$val['umrah_price']; ?></td>
                  <td><?=$val['makkah_hotel_name']; ?></td>
                  <td><?=$val['makkah_hotel_address']; ?></td>
                  <td><?=$val['room_type']; ?></td>
                  <td><?=$val['room_rating']; ?></td>
                  <td><?=$val['room_basis']; ?></td>
                  <td><?=$val['medina_hotel_name']; ?></td>
                  <td><?=$val['medina_hotel_address']; ?></td>
                  <td>
				  <a href="/admin/umrah/edit/<?php echo  $val['id']; ?>"><i class="fa fa-edit"></i></a>
				  </td>
                  
                  <td><a href="/admin/umrah/delete/<?php echo $val['id']; ?>" onclick="return confirm('Are You sure to delete this?');"><i class="fa fa-trash-o"></i></a></td>				 		  
                </tr>
				<?php } ?>
                </tfoot>
              </table>
			  
			  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->