<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        
       
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
		
            <div class="portlet-body table-responsive">
                <table class="table table-striped table-bordered table-hover responsive" id="sample_1">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Display Name</th>
                            <th>Resume C/v</th>
                            <th>Status</th>
			    <th>Registered Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        foreach ($filled_jobs as $key => $val) {
							if(date('m/d/Y', $val['created']) == date('m/d/Y')){
                            ?>
                            <tr class="">

                                <td>
									 <?php  $job = get_job_details_by_id($val['job_id']); 
									echo $job['job_title'] ; 
									 ?>
                                </td>
                                <td>
                                    <?php echo $val['full_name']; ?>
                                </td>
								 <td>
                                    <?php echo $val['email_id']; ?>
                                </td>
                                <td>
                                    <?php echo $val['phone_no']; ?>                                    
                                </td>
								<td>
                                   <a href="<?php echo $this->config->item('front_base_url').'assets/files/'.$val['resume']; ?>" alt=" <?php echo $val['full_name']; ?>" download><?php echo $val['resume']; ?></a>                                     
                                </td>
							
								
								<td>      
                                    <span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
                                        <?php echo ($val['status']==1)?'Active':'Inactive'; ?>
                                    </span>
                                </td>

								<td>
									<?php  
									echo date('m/d/Y', $val['created']) .'|'.date("H:i", $val['created']) ; ?>
								</td>
								
							


                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
			<ul class="pagination" >
				<!-- Show pagination links -->
			<?php foreach ($links as $link) {
			      
				  echo "<li>".$link ."</li>";
					} ?>
				</ul>			
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
<!-- <script src="<?php echo THEME_URL; ?>assets/scripts/custom/table-managed.js"></script> -->
<script>
    jQuery(document).ready(function () {
        App.init();
        //TableManaged.init();
    });
</script>
</body>
<!-- END BODY -->