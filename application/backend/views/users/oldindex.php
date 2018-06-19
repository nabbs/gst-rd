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
	
  <?php //include("../themes/includes/flash.php"); ?>	
	  
<div class="page-content">
<div class="gp_empty" style="height:32px;" ></div>
    <div class ="col-md-12">
    <!--div class="row">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
      </div-->
    
	
		
		<!--<div class="col-sm-4 text-right">
			
		<form method="get" action="<?php echo BASEURL; ?>/users/">
			 <span>  
			 <input type="text"  id="drop" name="search" placeholder="Type Search Here"></span>
		     <span><input type="submit" id="searchdrop" value="Search">
			</span>
		   </form>
		 </div>-->
	

        <form  onsubmit="return confirm('Are You Sure To Perform This Action!')"; action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="row table-btn">
         <div class="col-sm-8" style="padding:0px; display:none">
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
					   <th class="text-center"><!--input class="check_all" type="checkbox" onchange="checkAll(this)" name="chk[]" /--> #</th>
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
                      ///  debug($user_data);
					  $i=1;
						if(!empty($user_data)){
                        foreach ($user_data as $key => $val) {
                            ?>
                            <tr class="">
						<td>
							<?php echo  $i;//$user_ids = $val['id']; ?>
							<!--input type="checkbox" class="check_all" name="action[]" value="<?php echo $user_ids; ?>"-->
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
				  </td>		
<td><a href="<?php echo BASEURL."/users/delete_user/".$val['id']; ?>" onclick="return confirm('Are You sure want to delete this?');"><i class="fa fa-trash-o"></i></a></td>				  
                                <!--td>
                                  <?php if($val['status']==1) { ?>
                                  <a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL."/users/changestatus/".$val['id'].'/?status=0'; ?>'><i class="fa fa-minus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } else if($val['status']==0 ) { ?>
                                  <a title="Activate" onclick="return confirm('Are you sure you want to activate the user')" href='<?php echo BASEURL."/users/changestatus/".$val['id'].'/?status=1'; ?>'><i class="fa fa-plus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } ?>
                              <a title="Edit"  href='<?php echo BASEURL."/users/edit_users/".$val['id']; ?>' ><i class="fa fa-edit"></i></a>
                                  </td>
								  <td><a title="Delete" onclick="return confirm('Are You sure want to delete this?');" href='<?php echo BASEURL."/companies/delete_company/".$val['id']; ?>'><i class="fa fa-trash-o"></i></a></td-->
							
                            </tr>
                        <?php  $i++; }}else{ ?>
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