<?php

@$message = $this->session->flashdata('success_msg');
@$error_message = $this->session->flashdata('error_msg');
 if(@$success){ ?>	
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               <?php echo $success; ?>
              </div>
<?php }elseif(@$error_message){ ?> 
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Error!</h4>
               <?php echo $error_message; ?>
              </div>
<?php } ?>
<div class="page-content">
    <div class ="col-md-12">
     <div class="gp_empty" style="height:10px;" ></div>
  <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/" class="btn btn-primary">
		Back	
		</a>
		<div class="gp_empty" style="height:32px;" ></div>
	    
        <form action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body table-responsive">
		
                <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                    <thead >
                        <tr >
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Date</th>
                            
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
						<?php 
                   // print_r($subscribers);
                        $srno=1; 
							 foreach($subscribers as $key => $val){ ?>
							<tr role="row" class="even text-center">
								<td class="sorting_1"><?php echo $srno++ ; ?></td>
								<td><?php echo $val['email']; ?></td>
								<td><?php echo date('Y-m-d',$val['created']); ?></td>
								
								<td> 
								 <?php //if($val['status']==1) { ?>
                                  
								  
								  <a  href='<?php echo BASEURL; ?>/template/remove_subscriber/<?php echo $val['id']; ?>'style='color:red;'><i class="fa fa-trash " title='Remove'></i></a>
                                  <?php //} ?>
								 </td>
							</tr>
						<?php } ?>	
                    </tbody>
                </table>
            </div>
        </div>
        </form>
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