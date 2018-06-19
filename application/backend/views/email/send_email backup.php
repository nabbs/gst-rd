<style>
.ui-tooltip-content{display:none;}	
</style>	
    <script src="<?php echo THEME_URL; ?>assets/ckeditor/ckeditor.js"></script>
	<script src="<?php echo THEME_URL; ?>assets/ckeditor/samples/js/sample.js"></script>
	<!--<link rel="stylesheet" href="<?php echo THEME_URL; ?>assets/ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">-->
	
<div class="page-content">
    <div class ="col-md-12 col-sm-12 col-xs-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        <div class=" pull-right" style="margin-top:-40px">

        </div>
		<div class=" pull-left">
           <a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
	     <div class="clearfix"></div>
        </div>
        <form action='<?php echo BASEURL; ?>/email/send_email' name="form_send_email" id="form_send_email"  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">

			<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group pull-left" >
					<h4 class=""><b>Users List</b></h4>
						<select id="state_id" name="email[]" multiple="multiple" size="10" class="form-control" style="width:300px">
					<?php  foreach($user_data as $key=>$val){ ?>	
						<option name="<?php echo $val['id'] ; ?>" value="<?php echo $val['email'] ; ?>"><?php echo $val['fname'].' '.$val['lname'].'  ('.$val['display_name'].')' ?></option>
                    <?php } ?>
						</select>

				</div>	

			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-12 col">
			<div class="row">
				   <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					 <label><strong>Subject</strong></label>
	                  <input type="text" name="subject" id="subject" class="form-control"   / >
					</div>
				  </div>
			 </div>		 
			<div class="row">
				   <div class="col-md-12 col-sm-12 col-xs-12">
					 <div class="form-group">
					  <label for="comment"><strong>Description:</strong></label>
					  <textarea class="form-control" rows="5" id="editor" name="description" ></textarea>
					</div>
				  </div>
			 </div>			 

			</div>
						
			</div>
			



 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group pull-left" >
				<br/>
						<button type="button" name="select_all" id="select_all_state" name="select_all_state" class="btn green">Select All</button>
						
						<button type="button" name="unselect_all" id="unselect_all_state"  name="unselect_all_state" class="btn green">Unselect All</button>    
		</div>
	</div>
<div id="loader" class="text-center" ></div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group pull-right" >
				<br/>
			<button type="submit" name="submit" class="btn green"><i class="fa fa-send"></i> Confirm Details</button>
           <a href="<?php echo BASEURL; ?>" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>


            </div>
        </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

</body>
<script>

$(document).ready(function(){

$('#select_all_state').click(function() {
    $('#state_id option').prop('selected', true);
});


$('#unselect_all_state').click(function() {
    $('#state_id option').prop('selected', false);
});


});
</script>
<script>
	CKEDITOR.replace( 'description' , {
	enterMode: CKEDITOR.ENTER_BR
});
</script>
<!-- END BODY -->