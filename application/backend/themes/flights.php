<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("includes/header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <?php include("includes/sidebar.php"); ?>	
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<?php
		foreach ($this->_ci_view_paths as $key => $val) {
			$view_path = $key;
		}
		?>
    <!-- Content Header (Page header) -->
	 <section class="content-header">
      <h1>
        <?php echo $master_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo $this->router->class; ?>"><?php echo ucfirst($this->router->class); ?></a></li>
      </ol>
    </section>
	  <?php if (isset($master_body) && $master_body != "") { ?>
			 <?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
	  <?php } ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	<?php include("includes/footer.php"); ?>
	<!-- jQuery 3 -->
<script src="<?php echo THEME_URL;?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo THEME_URL;?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo THEME_URL;?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"></script>
<script src="<?php echo THEME_URL;?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo THEME_URL;?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo THEME_URL;?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo THEME_URL;?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- SlimScroll -->
<script src="<?php echo THEME_URL;?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo THEME_URL;?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo THEME_URL;?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo THEME_URL;?>assets/dist/js/demo.js"></script>
<!-- page script -->

<script>
$('#example1').DataTable();
$("#destination_name").on('change',function(){
	
	var postdata = {name: $(this).val()}
	 $.post("/destination.php",postdata, function(data, status){
       $("#added_selected").append(data);
    });
});
</script>
</body>
</html>