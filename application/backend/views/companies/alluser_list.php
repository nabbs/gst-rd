<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        <div class=" pull-right" style="margin-top: -55px;">
		<form method="get" action="<?php echo BASEURL; ?>/users/get_all_user">
		   <input type="text"  name="search" placeholder="Please enter username">
		   <input type="hidden"  name="status" value="<?php echo $status; ?>" >
		   <input type="submit" value="Search">
		   </form>
		  <a href="<?php echo BASEURL; ?>/users/get_all_user" ><h4 style="padding-left:63px;">Reload</h4></a>
        </div>
        <form action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">

            <div class="portlet-body table-responsive">
                <table class="table table-striped table-bordered table-hover responsive" id="sample_1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Display Name</th>
                            <th>Email</th>
                            <th>Status</th>
			    <th>Registered Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        foreach ($user_data as $key => $val) {
                            ?>
                            <tr class="">

                                <td>
                                    <!--<a href="<?php echo BASEURL ; ?>/users/view_profile/<?php echo $val['id'];  ?>">--><b><?php echo $val['fname']; ?></b><!--</a>-->
                                </td>
                                <td>
                                    <?php echo $val['lname']; ?>
                                </td>
								 <td>
                                    <?php echo $val['display_name']; ?>
                                </td>
                                <td>
                                    <?php echo $val['email']; ?>                                    
                                </td>
								<td>      
                                    <span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
                                        <?php echo ($val['status']==1)?'Active':'Inactive'; ?>
                                    </span>
                                </td>

								<td>
			                       <?php  echo date('m/d/Y', $val['created']); ?>
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
<!-- <script src="<?php echo THEME_URL; ?>assets/scripts/custom/table-managed.js"></script> -->
<script>
    jQuery(document).ready(function () {
        App.init();
        //TableManaged.init();
    });
</script>
</body>
<!-- END BODY -->