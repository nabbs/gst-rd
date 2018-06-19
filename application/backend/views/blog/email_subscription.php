 <!-- Content Header (Page header) -->   

    <!-- Main content -->
    <section class="content">
		<!-- <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/add_new" class="btn btn-primary">
		Add New
		</a> -->
		<div class="gp_empty" style="height:32px;" ></div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
			<strong><?php echo $this->session->flashdata('message_name'); ?><strong></p>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>Email</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				

				foreach($results as $key=>$val){ 
				?>
                <tr>
                 
                  <td><?=$val['email']; ?></td>
				  <td><?=date('l Y/m/d H:i', $val['created']); ?></td>  
                  <td><?= ($val['status']=1)?'<span class="alert-success">Active</span>':'<span class="alert-danger">Inactive</span>'; ?></td>                 
                  
                  <td><a href="/admin/blog/delete_subscription/<?php echo $val['id']; ?>"onclick="return confirm('Are You sure want to delete this?');"><i class="fa fa-trash-o"></i></a></td>				 		  
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