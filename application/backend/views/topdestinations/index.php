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
                  <th>Title</th>
                  <th>Description</th>
                  <th>Link</th>
                  <th>Price</th>
                  <th>City</th>
				  <th>Popular</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($results as $key=>$val){ 
				?>
                <tr>
                  <td><img class="img-responsive image_selected" src="/../assets/files/<?=$val['package_logo']; ?>" style="height: 80px;"></td>
                  <td><?=$val['title']; ?></td>
                  <td><?=$val['description	']; ?></td>
                  <td><?=$val['link']; ?></td>
                  <td><?=$val['price']; ?></td>
                  <td><?=$val['city']; ?></td>
                  <td><?php if($val['popular']==1){ echo 'Yes';}else{ echo 'No';}; ?></td>
                  <td><?=date('l Y/m/d H:i', $val['created']); ?></td>
                  
                  <td>
				  <a href="/admin/topdestinations/edit/<?php echo  $val['id']; ?>"><i class="fa fa-edit"></i></a>
				   &nbsp;
				  <a href="/admin/topdestinations/delete/<?php echo $val['id']; ?>"  onclick="return confirm('Are you sure to delete this?');"><i class="fa fa-trash-o"></i></a></td>				 		  
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