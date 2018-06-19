<div class="page-content">
    <div class="row" style="margin:0px;">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
        
      </div>
    <div class="col-md-12">
      
       
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">

            <div class="portlet-body table-responsive">
                <table class="table table-striped table-bordered table-hover responsive" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone No.</th>
							
                            <th class="text-center">Earnings Amount</th>
							
                            
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        foreach ($earning_data as $key => $val) {
							 $userdata = get_user_details($val['user_id']);
                            ?>
                            <tr>
                                 <td>
                                    <?php  echo  $userdata['fname'].' '.$userdata['lname'] ; ?>
                                </td>
								 <td>
                                     <?php  echo  $userdata['email']; ?>
                                <td>
                                      <?php  echo  $userdata['phone_no']; ?>                              
                                </td>
							
								<td>
								<?php  echo '$'.$amount= number_format($val['amount']/100,2); ?> 
								</td>
								
							


                            </tr>
                        <?php } ?>
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

<!-- END BODY -->