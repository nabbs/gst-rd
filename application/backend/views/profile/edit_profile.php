
 <div class="page-content">
    <div class ="col-md-12">
      <div class="row">
       <div class="col-sm-8 col-xs-8">
         <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        </div>
        <div class=" col-sm-4 col-xs-4">
          <a class="btn_reload" href="<?php echo BASEURL; ?>/profile/edit_profile" title="Reload"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        </div>
      </div> 
	    
	<div class="row header-btn">
		<div class="col-sm-2">
            <a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
	    </div>
		
	</div>   
 
  <div class=" box light-grey">       
   <div class="portlet-body">
	   <div class="gp_empty"></div>
       <div id="edit-profile">
	<div class="row">     
      <!-- edit form column -->
      <div class=" ">     
      <form id='form_admin_edit_profile' name='form_admin_edit_profile' method="post" action='<?php echo BASEURL; ?>/profile'  role="form"/>
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
		   <label>About Myself</label>
		    <textarea name="about_myself" class="form-control" rows="7" ><?php echo $admin_info['about_myself'] ?></textarea>
	  </div>
	 </div>

</div>


</div>

		  
		<div id="updateprofilevalidating" class="text-center" ></div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group pull-right" >
				<br/>
			<button type="submit" name="submit_video" class="btn green"><i class="fa fa-send"></i> Submit</button>
           <a href="<?php echo BASEURL; ?>/videos" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
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