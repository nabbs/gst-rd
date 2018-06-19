
<div class="page-content">
    <div class ="col-md-12">
	 <div class="gp_empty" style="height:10px;" ></div>
  <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/add_new" class="btn btn-primary">
		Add new blog	
		</a>
		<div class="gp_empty" style="height:30px;" ></div>
	    
       
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body table-responsive">
		
                <table class="table table-striped table-bordered table-hover table-responsive" id="example1">
                    <thead >
                        <tr >
                            <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Created</th>
                  <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
						<?php foreach($results as $key=>$val){ 
				?>
                <tr>
                  <td><img class="img-responsive image_selected" src="/../assets/files/<?=$val['post_attachment_name']; ?>" style="height: 80px;"></td>
                  <td><?=$val['post_title']; ?></td>
                  <td><?=substr($val['post_description'], 0, 100); ?></td>   
			  
                  <td><?=date('l Y/m/d H:i', $val['created']); ?></td>                
                  <td>
				  <a href="/admin/blog/edit/<?php echo  $val['id']; ?>"><i class="fa fa-edit"></i></a>
				  &nbsp;
				  <a href="/admin/blog/delete/<?php echo $val['id']; ?>" onclick="return confirm('Are You sure want to delete this?');"><i class="fa fa-trash-o"></i></a></td>				 		  
                </tr>
				<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<!-- END BODY -->