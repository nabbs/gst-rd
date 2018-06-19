  <div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>

 
  <div class=" box light-grey">       
   <div class="portlet-body">
       <div id="edit-profile">
       <hr>
	<div class="row">
      <!-- left column -->
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          <strong style="font-size:16px;padding-left:20px">Personal info</strong>
        </div>
       
      <form id='form_admin_edit_profile' name='form_admin_edit_profile' method="post" action='<?php echo BASEURL; ?>/profile' class="form-horizontal" role="form" />

	 <div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="row">   	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>First Name</label>
		   <input type="hidden" id="userimage" name="image"/> 
		   <input type="text" name="first_name" class="form-control" value="<?php echo $admin_info['first_name'] ?>" />
	  </div>
	 </div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Last Name</label>
		   <input type="text" name="last_name" class="form-control"  value="<?php echo $admin_info['last_name'] ?>"/>
	  </div>
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Display Name</label>
		   <input type="text" name="display_name" class="form-control" value="<?php echo $admin_info['display_name'] ?>" />
	  </div>	
	</div>	

		<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>email</label>
		   <input type="text" name="email" class="form-control" value="<?php echo $admin_info['email'] ?>" />
	  </div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>about_myself</label>
		    <textarea name="about_myself" class="form-control" ><?php echo $admin_info['about_myself'] ?></textarea>
	  </div>
	 </div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Facebook Link</label>
		   <input type="text" name="fb_link" class="form-control" value="<?php echo $admin_info['fb_link'] ?>"/>
	  </div>
	</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Twitter link</label>
		   <input type="text" name="tw_link" class="form-control" value="<?php echo $admin_info['tw_link'] ?>"/>
	  </div>
	</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Linked In link</label>
		   <input type="text" name="linked_in_link" class="form-control" value="<?php echo $admin_info['linked_in_link'] ?>"/>
	  </div>
	</div>
</div>
</div>


</div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
			<p id="updateprofilevalidating" class="text-center"></p>  
              <input class="btn green" value="Save Changes" type="submit" />
              <span></span>
              <input class="btn btn-primary" style= value="Cancel" type="reset" />
            </div>
          </div>
        </form>
      </div>
   </div>
            </div> <!-- /.row (main row) -->

       </div>
    </form>
   </div>
  </div>
<script>
    $(document).ready(function () {
		
		
		$('#upload_pics').change(function (e) {

        e.preventDefault();
  
        var formcontent = $("#upload_post_pic");
        var formcontentFiles = new FormData(formcontent[0]);

        $.ajax({
            url: formcontent.attr('action'), // Url to which the request is send
            type: formcontent.attr('method'), // Type of request to be send, called as method
            data: formcontentFiles, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            beforeSend: function () {
            $("#loader").show();
                $("#loader").html("<img src='" + THEME_URL + "/assets/img/loader.gif' />");
            },
            success: function (data)   // A function to be called if request succeeds
            {

                data = eval("(" + data + ")");
				$("#loader").hide();
				//$("#show_image").val("<img   src='" + data.image + "' />");
				$('#userimage').val(data.image);
                $("#show_image").html($("<img   src='" + data.image + "' class='avatar img-responsive img-circle' alt='avatar' />"));
				$("#show_image").fadeOut(1000);
                $("#show_image").fadeIn(4000);
            }
        });


    });
	
	
	

	 


	
});
</script>