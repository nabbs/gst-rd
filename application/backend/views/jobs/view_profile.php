
<div class="page-content">
    <div class ="col-md-12">
      <div class="row">
       <div class="col-sm-8 col-xs-9">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
      </div>
      
      
      <div class="row header-btn">
		<div class="col-sm-2">
            <a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
	    </div> 
       <div class="col-sm-4">
        <a href="<?php echo BASEURL ?>/users" class="btn green">Go back to users list</a>   
        </div>
		<div class="col-sm-6 text-right">
  User  Joining Date: <b><?php echo date('m-d-Y',$user_details['created']);?></b>       </div>
	</div>
	   
      
<!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">
<div class="row">
<!--  --------------------------------------------USER DETAILS STARTS--------------------------------------------- -->	
<form method='post'  action='<?php echo BASEURL; ?>/users/update_user_profile_data' id="update_advance_form" name="update_advance_form"  >
<input type="hidden" name="user_id" value="<?php echo $user_details['id'] ; ?>" />
<input type="hidden" name="stepdata_id" value="<?php echo $user_broker_info['id'] ; ?>" />
<input type="hidden" name="submit_profile" value="update_profile" />

		<div class="col-md-12">
		  <h3 class="text-left"><strong style="color:#000;"><?php echo $user_details['display_name']."'s " ; ?> profile details</strong></h3>
		  <hr/>
		</div>
		
 <div class="col-md-4 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>First name</strong></label>
                <input type="text" name="fname" id="fname" class="form-control" value="<?php  if(!empty($user_details)) echo $user_details['fname'] ;   ?>"   />
			</div>
		</div>
          <div class="col-md-4 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Last name</strong></label>
                <input type="text" name="lname" id="lname" class="form-control" value="<?php  if(!empty($user_details)) echo $user_details['lname'] ;  ?>"   />
			</div>
		  </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Email address</strong></label>
                <input type="text" name="email" id="email" class="form-control" value="<?php  if(!empty($user_details)) echo $user_details['email'] ;   ?>"   />
			</div>
		  </div>
		<div class="col-md-6 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Date of registration (m/d/Y)</strong></label>
                <input readonly type="text" name="created" id="broker_phone" class="form-control" value="<?php  if(!empty($user_details)) echo date("m/d/Y",$user_details['created']) ;   ?>"   />
			</div>
		  </div>
          <div class="col-md-6 col-sm-4 col-xs-12">
		    <div class="form-group">
			<label><strong>Ip Address</strong></label>
                <input readonly type="text" class="form-control" value="<?php echo $user_details['ip_address'];?>" />
			</div>
		  </div>
		
			 
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div id="loader1" class="text-center" ></div>
       </div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group " >			
			<button type="submit" name="submit_profile" class="btn green"><i class="fa fa-send"></i> Confirm Details</button>
           <a href="<?php echo BASEURL; ?>/users" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>			 
</form>			 
</div>
<div class="row">		 
			 
  <form method='post'  action='<?php echo BASEURL; ?>/users/update_user_profile_data/<?php echo $recored_id ; ?>/<?php echo $ID ; ?>' id="change_password" name="change_password"  >
  <input type="hidden" name="user_id" value="<?php echo $user_details['id'] ; ?>">
  <input type="hidden" name="submit_password" value="update_password" />
	
		<div class="col-md-12">	
		 <h3 class="text-left"><strong style="color:#000;">Change password for <?php echo $user_details['display_name'] ; ?></strong></h3>
		  <hr/>
		</div>	
		<div class="col-md-6 col-sm-6 col-xs-12">
		    <div class="form-group">
             <label><strong>Password</strong></label>
                <input type="password" name="password" id="password" class="form-control "   />
			</div>
		</div>	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div id="loader2" class="text-center" ></div>
		<div id="loader3" class="text-center" ></div>
        </div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >			
			<button type="submit" name="submit_password" class="btn green"><i class="fa fa-send"></i> Change Password</button>
           <a href="<?php echo BASEURL; ?>/users" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>	
	</form>
    </div>
<!--  --------------------------------------------USER DETAILS ENDS--------------------------------------------- -->
			  
			  
	<div class="row">
		<div class="col-md-12">	
		  <h3 class="text-left"><strong style="color:#000;">User Logs Details Of <?php echo $user_details['display_name'] ; ?></strong></h3>
		  <hr/>
		</div>	
		<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
		     <table class="table table-striped table-bordered table-hover " id="sample_1">
                    <thead>
                        <tr class="text-center">
                           <th>Device Name</th>
					  <th>Section</th>
                           <th>Action</th>
                           <th>Url</th>
                           <th>Ip Address</th>
					  <th>Time</th>
                           <th>Date</th>
                           
                        </tr>
                    </thead>
                    <tbody class="text-center">
					
                       <?php 
					if(!empty($user_logs)){
					foreach($user_logs as $val){?>
					<tr class="text-left">
						<td><?php echo $val['device_type'];?></td>
						<td><?php echo $val['section'];?></td>
						<td><?php echo $val['action'];?></td>
						<td><?php echo $val['url'];?></td>
						<td><?php echo $val['ip_address'];?></td>
						<td><?php echo date('m-d-y',$val['created']);?></td>
						<td><?php echo date('H:i A',$val['created']);?></td>
					<tr>
					<?php
						}
					}else{
					?>
					<td colspan="8"><h4>No data available </h4></td>
					<?php 
					}	
						?>
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
			  
			  
			  
			  
			  <!--  --------------------------------------------USER login details--------------------------------------------- -->
			  
			  
	<div class="row">
		<div class="col-md-12">	
		  <h3 class="text-left"><strong style="color:#000;">Login Track For <?php echo $user_details['display_name'] ; ?></strong></h3>
		  <hr/>
		</div>	
		<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
		     <div id="example_wrapper" class="dataTables_wrapper">

			<table width="100%" cellspacing="0" class="table table-striped table-bordered dataTable" id="example_one" role="grid" aria-describedby="example_info" style="width: 100%;">
                    <thead>
                        <tr class="text-center">
                           <th>Ip Address</th>
					  <th>Login Time</th>
                           <th>Login Date</th>
                           <th>LogOut Time</th>
                           <th>LogOut Date</th>
                           
                        </tr>
                    </thead>
                    <tbody>
					
                       <?php 
					if(!empty($logins_details)){
					foreach($logins_details as $val){?>
					<tr class="text-left">
						<td><?php echo $val['ip_address'];?></td>
						
						<td><?php echo date('H:i A',$val['login_time']);?></td>
						<td><?php echo date('m-d-y',$val['login_time']);?></td>
						
						<td ><?php echo (empty($val['logout_time']))?'-----':date('H:i A',$val['logout_time']);?></td>
						<td><?php echo (empty($val['logout_time']))?'-----':date('m-d-y',$val['logout_time']);?></td>
					</tr>
					<?php
						}
					}else{
					?>
					<tr class="text-left">
					<td colspan="5"><h4>No data available </h4></td>
						</tr>
					<?php 
					}	
						?>
                    </tbody>
                </table>
		</div>
		</div>
			
        </div>
 
        <!-- END login details-->
			  
			  
	
       
			
  
<script>			  
		
$(document).ready(function() {
    $('#example_one').DataTable();
} );	
</script>			  
			  
    </div>
</div>
</div>
</div>

