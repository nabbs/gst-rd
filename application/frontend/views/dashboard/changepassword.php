
 <h3><?php echo $master_title; ?></h3>
<div class="well">
           <div class="col-sm6">  
           <?php echo $this->session->flashdata('msg'); ?>
<form id="changepassword" class="form-horizontal fv-form fv-form-bootstrap" method="post" action="#" role="form" novalidate="novalidate">
		<input type="hidden" name="email" value="<?php echo $userdata['email']; ?>"/>	                                   
		<div style="margin-bottom: 25px" class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input id="oldpassword" type="text" class="form-control" name="oldpassword" value="" placeholder="Old Password" data-fv-field="oldpassword">                                        
		</div>

		<div style="margin-bottom: 25px" class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input id="password" type="password" class="form-control" name="password" placeholder="password" data-fv-field="password">
		</div>

		<div style="margin-bottom: 25px" class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input id="repassword" type="password" class="form-control" name="re-password" placeholder="re-password" data-fv-field="password">
		</div>

                                
                            


        <div style="margin-top:10px" class="form-group">
            <!-- Button -->

            <div class="col-sm-12 controls"> 
              <button id="btn-change" type="button" class="btn btn-success">Submit</button>
              

            </div>
        </div>


           
    </form>
 </div>
            </div>