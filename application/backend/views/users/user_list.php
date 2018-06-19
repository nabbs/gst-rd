<div class="page-content">
    <div class ="col-md-12">
	    <div class="row">
	    <div class="col-sm-6">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
		    </div>
		    
	    <div class="col-sm-6">
 		  <a href="<?php echo BASEURL; ?>/users/get_user/<?php echo $status; ?>/" title="Reload"><h4 class="text-right"><i class="fa fa-refresh" aria-hidden="true"></i></h4></a>
		    
		    </div>
		    </div>
       
	    <div class="row">
		<div class="col-sm-2">
            <a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
	    </div>
		<div class="col-sm-10 text-right">
			<form method="get" action="<?php echo BASEURL; ?>/users/get_user/<?php echo $status; ?>/">
		   	<span><input type="text"  id="drop" name="search" placeholder="Please enter username"></span>
		   <input type="hidden"  name="status" value="<?php echo $status; ?>" >
		   <span><input  id="searchdrop" type="submit" value="Search"></span>
		   </form>
			
		 </div>
		    
	</div>   
		    
		    
	    
        <form action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">

            <div class="portlet-body table-responsive">
			  <div class="gp_empty"></div>
                <table class="table table-striped table-bordered table-hover responsive" id="sample_1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Display Name</th>
                            <th>Email</th>
							<th>Total Amount</th>
                            <th>Status</th>
			                <th>Registered Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
						if(!empty($user_data)){
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
								<td>$<?php echo number_format(($val['total']/100),2);  ?></td>
								<td>      
                                    <span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
                                        <?php echo ($val['status']==1)?'Active':'Inactive'; ?>
                                    </span>
                                </td>

								<td>
			                       <?php  echo date('m/d/Y', $val['created']); ?>
                                </td>
							


                            </tr>
                        <?php } }else{  ?>
						<td colspan="8"><h4>No data available </h4></td>
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