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
    <!-- Content Header (Page header) --

		<?php
		foreach ($this->_ci_view_paths as $key => $val) {
			$view_path = $key;
		}
		
		 $view_path . $this->router->class . "/" . $master_body . ".php";
		
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
	  <?php //include("includes/flash.php"); ?>	
			 <?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
	  <?php } ?>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	<?php include("includes/footer.php");
		include("includes/scripts.php");
	?>
	
</body>
</html>

