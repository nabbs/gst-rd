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
          <a class="btn_reload" href="<?php echo BASEURL; ?>/jobs/" id="user_reload" title="Reload"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
      </div>
    
		<form method="get" id="user_search" action="<?php echo BASEURL; ?>/users/">

		<div class="row header-btn">
			<div class="col-sm-5">
			<a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
			<a href="<?php echo BASEURL ?>/jobs/add_new_job" class="btn green" name="submit">Add New Job</a>

			<?php //echo '<a href="'.BASEURL.'/users/outputCSV/?'.$qstring.'" class="btn green">Export CSV</a>';?>
			</div>
		</div>
		<div class="gp_empty"></div>
		<div class="clear"></div>

		</form>
		 

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
					 
                            <th class="text-center">Company Name</th>
                            <th class="text-center">Job Title</th>
                            <th class="text-center">Job Description</th>
                            <th class="text-center">Job Skills</th>
                            <th class="text-center">Job Experience</th>
                            <th class="text-center">Job Education</th>
                            <th class="text-center">Job Type</th>
                         				
					 
                            <th class="text-center">Status</th>
                            

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
						if(!empty($jobs)){
                        foreach ($jobs as $key => $val) {

                              $id_array = array('id'=>$val['job_company_name'],'user_id'=>$val['user_id']);
						                  $company_name = get_company_details_by_id($id_array);
                              //debug($company_name);
                            ?>
                            <tr class="">
						
                                <td>
                                  <?php echo  $company_name['company_name']; ?>
                                </td>
                                <td>
                                    <?php echo $val['job_title']; ?>
                                </td>
                                <td>
                                    <?php echo $val['job_description']; ?>                                    
                                </td>
								 <td>
                                    <?php echo $val['job_required_skills']; ?>                                    
                                </td>
								<td>
                                    <?php echo $val['job_required_experience']; ?>                                    
                                </td>
								<td>
                                    <?php echo $val['job_required_education']; ?>                                    
                                </td>
								<td>
                                    <?php echo $val['job_type']; ?>                                    
                                </td>
								
								
								
								
						
						   
						   
						  
								<td>      
                                    <span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
                                        <?php echo ($val['status']==1)?'Active':'Inactive'; ?>
                                    </span>
                                </td>								

                                <td>
                                  <?php if($val['status']==1) { ?>
                                  <a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL."/jobs/changestatus/".$val['id'].'/?status=0'; ?>'><i class="fa fa-minus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } else if($val['status']==0 ) { ?>
                                  <a title="Activate" onclick="return confirm('Are you sure you want to activate the user')" href='<?php echo BASEURL."/jobs/changestatus/".$val['id'].'/?status=1'; ?>'><i class="fa fa-plus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } ?>
							  <a title="Edit"  href='<?php echo BASEURL."/jobs/edit_job/".$val['id']; ?>' ><i class="fa fa-pencil-square fa-2x" aria-hidden="true" style="color:#000;"></i></a>
                                  <a title="Delete" onclick="return confirm('Are you sire you want to delete the user')" href='<?php echo BASEURL."/jobs/delete_job/".$val['id']; ?>'><i class="fa fa-trash-o-o fa-2x" style="color:#DB4D4D;"></i></a></td>
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



<!-- END BODY -->