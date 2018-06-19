
<div class="page-content">
    <div class ="col-md-12">
	 <div class="gp_empty" style="height:10px;" ></div>
  <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/add_new_users" class="btn btn-primary">
		Add user	
		</a>
		<div class="gp_empty" style="height:30px;" ></div>
	    
       
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body table-responsive">
		
                <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                    <thead >
                        <tr >
                           <th class="text-center"> #</th>
					   <th class="text-center">User name</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Email</th>
                                <th class="text-center">Menu access</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
						<?php 

                        $i=1; 
							 foreach($user_data as $key => $val){ ?>
							<tr role="row" class="even text-center">
								<td>
							<?php echo  $i;?>
						     </td>
                                <td>
                                    <a href="<?php echo BASEURL ; ?>/users/view_profile/<?php echo $val['id'];  ?>"><b><?php echo $val['display_name']; ?></b></a>
                                </td>
								<td>
                                    <?php echo $val['fname']; ?>
                                </td>
                                <td>
                                    <?php echo $val['lname']; ?>
                                </td>
                                <td>
                                    <?php echo $val['email']; ?>                                    
                                </td>
					<td>
                                    <?php echo @$val['menu_show']; ?>                                    
                                </td>
                   <td>
				  <a href="<?php echo BASEURL."/users/edit_users/".$val['id']; ?>" style='color:red;'><i class="fa fa-edit"></i></a>
				 &nbsp; <a href="<?php echo BASEURL."/users/delete_user/".$val['id']; ?>" onclick="return confirm('Are You sure want to delete this?');"><i class="fa fa-trash-o"></i></a></td>			
							</tr>
						<?php $i++; } ?>	
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo THEME_URL; ?>assets/scripts/core/app.js"></script>
<script src="<?php echo THEME_URL; ?>assets/scripts/custom/table-managed.js"></script>
<script>
    jQuery(document).ready(function () {
        //App.init();
        //TableManaged.init();
    });
</script>
</body>
<!-- END BODY -->