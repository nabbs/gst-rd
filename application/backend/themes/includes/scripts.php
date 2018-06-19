<!-- jQuery 3 -->
<script src="<?php echo THEME_URL;?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo THEME_URL;?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo THEME_URL;?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Morris.js charts -->
<!--script src="<?php echo THEME_URL;?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo THEME_URL;?>assets/bower_components/morris.js/morris.min.js"></script-->
<!-- Sparkline -->
<script src="<?php echo THEME_URL;?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo THEME_URL;?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo THEME_URL;?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo THEME_URL;?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo THEME_URL;?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo THEME_URL;?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo THEME_URL;?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo THEME_URL;?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo THEME_URL;?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo THEME_URL;?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo THEME_URL;?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo THEME_URL;?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo THEME_URL;?>assets/dist/js/demo.js"></script>
<!-- Select2 -->
    <script src="<?php echo THEME_URL;?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
	
	<!-- data table -->
	<script src="<?php echo THEME_URL;?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"></script>
	<script src="<?php echo THEME_URL;?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo THEME_URL;?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo THEME_URL;?>assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo THEME_URL;?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- fore drope zone file upload-->
 <link href="<?php echo THEME_URL;?>assets/dropzone.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo THEME_URL;?>assets/dropzone.js" type="text/javascript"></script> 

<script>

$(document).ready(function(){
 $(".select2").select2();
 $('#sample_1').DataTable();
  $('#example2').DataTable();
 
	<?php if($master_body=='add_new' && $this->router->class=='hajj'){ ?>
	$("#gallery_img").html('<div class="overlay text-center"><i class="fa fa-refresh fa-spin"></i></div>');
	setTimeout(function(){  
		$("#gallery_img").load("/admin/library/view_gallery	");
	}, 3000);
	<?php }else { ?>	
		$("#gallery_img").html('<div class="overlay text-center"><i class="fa fa-refresh fa-spin"></i></div>');
	setTimeout(function(){  
		$("#gallery_img").load("/admin/library/gallery_load");
	}, 3000);
	<?php } ?>
	
    $("#gallery_load").on('click',function(){
		$("#gallery_img").html('<div class="overlay text-center"><i class="fa fa-refresh fa-spin"></i></div>');
	setTimeout(function(){  
		$("#gallery_img").load("/admin/library/gallery_load");
	}, 3000);
		
	});

	
	$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
		e.preventDefault();
		$(this).siblings('a.active').removeClass("active");
		$(this).addClass("active");
		var index = $(this).index();
		$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
	});
	
	   // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
});
</script>

<script>
$("#open_gallery").on('click',function(){
	$("#open-gallery-box").modal();	
	$("#gallery_img").html('<div class="overlay text-center"><i class="fa fa-refresh fa-spin"></i></div>');
	setTimeout(function(){  
		$("#gallery_img").load("/admin/library/view_gallery	");
	}, 3000);
    $("#gallery_load").on('click',function(){
		$("#gallery_img").html('<div class="overlay text-center"><i class="fa fa-refresh fa-spin"></i></div>');
	setTimeout(function(){  
		$("#gallery_img").load("/admin/library/view_gallery");
	}, 3000);
	}) ; 

	
	
	$("#open-gallery-box").on("hidden.bs.modal", function () {
		$.ajax({
		type: "POST",
		url: "/admin/settings/get_save_image",
		dataType: 'json',
		success: function(result){ 
 if(result.image_name){		
		$(".col-sm-4").html('<img class="img-responsive image_selected" src="/../assets/files/'+result.image_name+'" alt="Photo" data-src="/../assets/files/'+result.image_name+'"><input type="hidden" id="package_logo" name="logo" value="'+result.image_name+'">');
		  }
		}
		});
	});
	
  
	
	
});
</script>
