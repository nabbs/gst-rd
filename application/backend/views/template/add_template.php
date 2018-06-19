<style>
.ui-tooltip-content{display:none;}	
</style>	
<script src="<?php echo THEME_URL; ?>assets/bower_components/ckeditor/ckeditor.js"></script>
	<script src="<?php echo THEME_URL; ?>assets/bower_components/ckeditor/samples/js/sample.js"></script>
<div class="page-content">
  <div class ="col-md-12">
	   
     <div class="gp_empty" style="height:10px;" ></div>
  <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/" class="btn btn-primary">
		Back	
		</a>
		<div class="gp_empty" style="height:32px;" ></div>
		   
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">

<!--  --------------------------------------------USER DETAILS STARTS--------------------------------------------- -->	
<form method='POST' id="form_update_template_edit" name="form_update_template_edit" action='<?php echo BASEURL.'/template/add_template/'; ?>'   >

<div class="row">
		<div class="col-md-12">

		  <br/>
		</div>	
 <div class="col-md-12 col-sm-12 col-xs-12">
 		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="row">
				   <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					 <label><strong>Name</strong></label>
	                  <input type="text" name="template_name" id="template_name" class="form-control"  value="" / >
					</div>
				  </div>
			 </div>		
		</div>		

 		<div class="col-md-6 col-sm-6 col-xs-6">		
			 <div class="row">
				   <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					 <label><strong>Subject</strong></label>
	                  <input type="text" name="subject" id="subject" class="form-control" value="<?php  if(!empty($template_data)) echo $template_data['subject'] ;   ?>"  / >
					</div>
				  </div>
			 </div>
			</div>
</div>
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				   <div class="col-md-12 col-sm-12 col-xs-12 pull-left">
					 <div class="form-group"  style="width:99%;padding-left:1%;">
					  <label for="comment"><strong>Message:</strong></label>
					  <textarea class="form-control" rows="5" id="description" name="description" ><?php  if(!empty($template_data)) echo $template_data['description'] ;   ?></textarea>
					</div>
				  </div>
			 </div>				
			 </div>				


		<div id="loader" class="text-center" ></div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			
			<button type="submit"  class="btn green"><i class="fa fa-send"></i>Submit</button>
           <a href="<?php echo BASEURL; ?>/template" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>			 
</form>			 
			 

<!--  --------------------------------------------USER DETAILS ENDS--------------------------------------------- -->

	
 
	

            </div>
        </div>
 
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
 </div>
</div>
</div>
<script>
	CKEDITOR.replace( 'description'  , {
	enterMode: CKEDITOR.ENTER_BR
});
</script>