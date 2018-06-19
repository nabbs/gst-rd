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
  <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/add_template" class="btn btn-primary">
		Add new	
		</a>
		<div class="gp_empty" style="height:30px;" ></div>
	    
       
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body table-responsive">
		
                <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                    <thead >
                        <tr >
                            <th class="text-center">Sr no</th>
                            <th class="text-center">Template name</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
						<?php 

                        $srno=1; 
							 foreach($template_data as $key => $val){ ?>
							<tr role="row" class="even text-center">
								<td class="sorting_1"><?php echo $srno++ ; ?></td>
								<td><?php echo $val['template_name']; ?></td>
								<td><?php echo $val['subject']; ?></td>
								<td><?php echo $val['description']; ?></td>
								<td> 
								 <?php //if($val['status']==1) { ?>
								 <a  href='<?php echo BASEURL; ?>/template/duplicate/<?php echo $val['id']; ?>'style='color:red;' title='Duplicate'><i class="fa  fa-files-o"></i></a>
								 &nbsp;
                                  <a  href='<?php echo BASEURL; ?>/template/edit_template/<?php echo $val['id']; ?>'style='color:red;' title='Edit'><i class="fa fa-edit"></i></a>
								  &nbsp;
								  <a  href='<?php echo BASEURL; ?>/template/sendmailsubscribe/<?php echo $val['id']; ?>'style='color:red;' title='Send mail'><i class="fa fa-user-md"></i></a>
								  &nbsp;
								  <a  href='<?php echo BASEURL; ?>/template/test_mail/<?php echo $val['id']; ?>' style='color:red;' title='Send Test mail'><i class="fa fa-send "></i></a>
								  
								  &nbsp;
								  <a  href='<?php echo BASEURL; ?>/template/sendtolist/<?php echo $val['id']; ?>'style='color:red;' title='Send mail to list'><i class="fa fa-list"></i><i class="fa fa-send "></i></a>
								  &nbsp;
								  <a  href='<?php echo BASEURL; ?>/template/delete/<?php echo $val['id']; ?>'style='color:red;' title='Send Test mail'><i class="fa fa-trash "></i></a>
                                  <?php //} ?>
								 </td>
							</tr>
						<?php } ?>	
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