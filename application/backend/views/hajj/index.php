 <!-- Content Header (Page header) -->   

    <!-- Main content -->
    <section class="content">
		<a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/add_new" class="btn btn-primary">
		Add New
		</a>
		<div class="gp_empty" style="height:32px;" ></div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="portlet-body table-responsive">
		
                <table class="table table-striped table-bordered table-hover table-responsive" id="example1">
                <thead>
                <tr>
				  <th>Image</th>
                  <th>Hajj Start Date</th>
                  <th>Hajj End Date</th>
                  <th>Price</th>
                  <th>Makkah Hotel Name</th>
                  <th>Makkah Hotel Address</th>
                  <th>Room Type</th>
                  <th>Room Rating</th>
                  <th>Room Basis</th>
                  <th>Medina Hotel Name</th>
                  <th>Medina Hotel Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($results as $key=>$val){ 
				?>
                <tr>
                  <td><?php if(@$val['package_logo']){ 
				 $logo= $val['package_logo'];
				 }else{
				 $logo='hajj-logo.png';
				 } ?>
				  
				  <img class="img-responsive image_selected" src="/../assets/files/<?=$logo; ?>" style="height: 80px;width:143px"></td>
                  <td><?=$val['starting_date']; ?></td>
                  <td><?=$val['hajj_end_date']; ?></td>
                  <td><?=$val['hajj_price']; ?></td>
                  <td><?=$val['makka_hotel']; ?></td>
                  <td><?=$val['hotel_address']; ?></td>
                  <td><?=@$val['makkha_room_type_quad'].' '.@$val['makkha_room_type_triple']. ' '.@$val['makkha_room_type_double']; ?></td>
                  <td><?=$val['room_rating']; ?></td>
                  <td><?=$val['room_basis']; ?></td>
                  <td><?=$val['medina_hotel_name']; ?></td>
                  <td><?=$val['medina_hotel_address']; ?></td>
                  <td>
				  <a href="/admin/hajj/edit/<?php echo  $val['id']; ?>"><i class="fa fa-edit"></i></a>
				  <a href="/admin/hajj/delete/<?php echo $val['id']; ?>" onclick="return confirm('Are You sure want to delete this?');"><i class="fa fa-trash-o"></i></a></td>				 		  
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
      <!-- /.row -->
    </section>
    <!-- /.content -->