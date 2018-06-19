
<html lang="en">
   
    <?php include("includes/head.php"); ?>
	
    <body id="page-top" class="index">
	
	  <?php include("includes/mb_encode_mimeheader(str).php"); ?>
        <?php
        foreach ($this->_ci_view_paths as $key => $val) {
            $view_path = $key;
        }
        ?>
        <!-- BEGIN CONTENT -->
        <?php 
		
		if (isset($master_body) && $master_body != "") { ?>
            <?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
        <?php } ?>
        <!-- END CONTENT -->
        
        <?php include("includes/dashboard/scripts.php"); ?>

    </body></html>