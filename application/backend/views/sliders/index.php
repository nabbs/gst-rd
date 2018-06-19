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
				  <th>#</th>
                  <th>Image</th>
                  <th>Title</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=1;
				foreach($results as $key=>$val){ 
				?>
                <tr>
				<td><?=$i; ?></td>
                  <td><?php if(@$val['pic']){ 
				 $logo= $val['pic'];
				 }else{
				 $logo='hajj-logo.png';
				 } ?>
				  
				  <img class="img-responsive image_selected" src="/../assets/files/<?=$logo; ?>" style="height: 80px;width:143px"></td>
                  
                  <td><?=$val['title']; ?></td>
                  
                  <td>
				  <a href="/admin/sliders/edit/<?php echo  $val['id']; ?>" style="color:red"><i class="fa fa-edit"></i></a>
				  &nbsp; <a href="/admin/sliders/delete/<?php echo $val['id']; ?>" onclick="return confirm('Are You sure want to delete this?');"><i class="fa fa-trash-o"></i></a></td>				 		  
                </tr>
				<?php $i++;} ?>
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