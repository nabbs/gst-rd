<style>
.ui-tooltip-content{display:none;}	
</style>	
<script src="<?php echo THEME_URL; ?>assets/bower_components/ckeditor/ckeditor.js"></script>
	<script src="<?php echo THEME_URL; ?>assets/bower_components/ckeditor/samples/js/sample.js"></script>
<div class="page-content">
  <div class ="col-md-12">
	   
     <div class="gp_empty" style="height:10px;" ></div>
  <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/view_email_list" class="btn btn-primary">
		View Mailing list	
		</a>
		<div class="gp_empty" style="height:32px;" ></div>
		   
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">

<!--  --------------------------------------------USER DETAILS STARTS--------------------------------------------- -->	
<form method='POST' id="form_update_template_edit" name="form_update_template_edit" action='<?php echo BASEURL.'/template/edit_email_list/'.$sub_mail['id'];?>'   >

<div class="row">
			
 <div class="col-md-12 col-sm-12 col-xs-12">
 
 <br>
  <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					 <label><strong>List name</strong></label>
	                  <input type="text" name="list_name" id="template_name" class="form-control"  value="<?php  if(!empty($sub_mail)) echo $sub_mail['name'] ;   ?>" / >
					</div>
				  </div>
 
  <div class="col-md-12 col-sm-12 col-xs-12">

   <?php $alrdy=explode (',',$sub_mail['subscritption_emails']);?>
   <div class="form-group">
                  <label>Subscriber</label>
                  <select class="form-control select2" multiple name='subscriber_mail[]' required>
                    <option value=''>Choose option</option>
					<?php  foreach($subscribers as $key => $val){ ?>
                    <option <?php if (in_array(trim($val['email']),$alrdy)){ echo "selected";} ?> value='<?php echo $val['email'];?>'><?php echo $val['email']; ?></option>
					<?php } ?>
                   
                  </select>
                </div>

 </div>
 		
				  
				

 		


		<div id="loader" class="text-center" ></div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			
			<button type="submit"  class="btn green"><i class="fa fa-send"></i>Create</button>
           <a href="<?php echo BASEURL; ?>/template/view_email_list" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>			 
</form>			 


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