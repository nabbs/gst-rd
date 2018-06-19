<style>
	#drop{
		background: white;
		border: 1px solid gray;
		width: 167px;
	}
	#searchdrop{
		background: white;
        border: 1px solid gray;
        width: 67px;
	}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{    padding: 5px;}
	</style>
<div class="page-content">
    <div class ="col-md-12">
    <div class="row">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
        <div class=" col-sm-4 col-xs-4">
          <a class="btn_reload" href="<?php echo BASEURL; ?>/companies/" id="user_reload" title="Reload"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
      </div>
    
	<div class="col-sm-5">
               <a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
	    	 	<a href="<?php echo BASEURL ?>/companies/add_new_company" class="btn green" name="submit">Add New Company</a>
			
			<?php //echo '<a href="'.BASEURL.'/users/outputCSV/?'.$qstring.'" class="btn green">Export CSV</a>';?>
		 </div>
		
	

        <form  onsubmit="return confirm('Are You Sure To Perform This Action!')"; action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="row table-btn">
         <div class="col-sm-8" style="padding:0px;">
           <?php if(!empty($user_data)){?>
           <div class="col-sm-4">
             <input type="submit" id="activate" class="btn green" name="submit" value="Activate">
           </div>
           <div class="col-sm-4">
            <input type="submit" id="deactivate" name="submit" class="btn green" value="Deactivate">
           </div>
           <div class="col-sm-4">
             <input type="submit" id="delete" name="submit" class="btn green"  value="Delete">
           </div>
           
            
           
           <?php  } ?>
        </div>
        <div class="col-sm-4">
          <span style="color:green; line-height:34px"><?php echo $msg = 
             $this->session->flashdata('msg'); ?></span>
        </div>
        </div>   
        <div class=" box light-grey">
		   
           <div class="portlet-body table-responsive">
			<div class="gp_empty"></div>
                <table class="table table-striped table-bordered table-hover table-responsive" >
				         <thead>
                        <tr>
					 
							
                            <th class="text-center">Comapany Name</th>
                            <th class="text-center">Company Description</th>
                            <th class="text-center">Company Logo</th>
                            <th class="text-center">Company Address </th>
                            <th class="text-center">Company City </th>
                            <th class="text-center">Company State </th>
                            <th class="text-center">Company Pincode </th>
                         
					
					 
                            <th class="text-center">Status</th>
                            

                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
						if(!empty($companies)){
                        foreach ($companies as $key => $val) {
                            ?>
                            <tr class="">
						
                                <td>
                                   <b><?php echo $val['company_name']; ?></b>
                                </td>
                                <td>
                                    <?php echo $val['company_description']; ?>
                                </td>  
								<td class="text-center">
                                    <img src="<?php echo $val['company_logo_link']; ?>" style="width: 200px;" Alt="---">
                                </td>
                                <td>
                                    <?php echo $val['company_address']; ?>                                    
                                </td>
								<td>
                                    <?php echo $val['company_city']; ?>                                    
                                </td>
								<td>
                                    <?php echo $val['company_state']; ?>                                    
                                </td>
								<td>
                                    <?php echo $val['company_pincode']; ?>                                    
                                </td>
								
								
								
						
						   
						   
						  
								<td>      
                                    <span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
                                        <?php echo ($val['status']==1)?'Active':'Inactive'; ?>
                                    </span>
                                </td>								

                                <td>
                                  <?php if($val['status']==1) { ?>
                                  <a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL."/companies/changestatus/".$val['id'].'/?status=0'; ?>'><i class="fa fa-minus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } else if($val['status']==0 ) { ?>
                                  <a title="Activate" onclick="return confirm('Are you sure you want to activate the user')" href='<?php echo BASEURL."/companies/changestatus/".$val['id'].'/?status=1'; ?>'><i class="fa fa-plus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } ?>
							  <a title="Edit"  href='<?php echo BASEURL."/companies/edit_company/".$val['id']; ?>' ><i class="fa fa-pencil-square fa-2x" aria-hidden="true" style="color:#000;"></i></a>
                                  <a title="Delete" onclick="return confirm('Are you sire you want to delete the user')" href='<?php echo BASEURL."/companies/delete_company/".$val['id']; ?>'><i class="fa fa-trash-o-o fa-2x" style="color:#DB4D4D;"></i></a></td>
                            </tr>
                        <?php }}else{ ?>
						      <tr class="" >
                                <td colspan="10">
                                    <center><h3>No records found</h3></center>
                                </td>
								</tr>
						
						<?php } ?>
                    </tbody>
                </table>
            </div>
			<div class="mydiv" style="display:none;"><?php debug($links); ?></div>
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
<script src="<?php echo THEME_URL; ?>assets/scripts/custom/table-managed.js"></script>

<script>
	function checkAll(ele) {
     var checkboxes = document.getElementsByClassName('check_all');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
	

	
    jQuery(document).ready(function () {
        App.init();
        //TableManaged.init();
    });
</script>

<!-- END BODY -->