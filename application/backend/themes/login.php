<!DOCTYPE html>
<html>
<?php include('includes/loginhead.php');?>
<body class="hold-transition login-page">
<?php
foreach ($this->_ci_view_paths as $key => $val) {
	$view_path = $key;
}
?>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<?php if (isset($master_body) && $master_body != "") { ?>
                <?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
<?php } ?>
<!-- END LOGIN -->

<!-- jQuery 3 -->
<?php include('includes/login_scripts.php'); ?>
</body>
</html>





