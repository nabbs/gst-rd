  <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll logo" href="<?php echo BASEURL; ?>/"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/logo_243.png" alt="Chandigarh Recruiters"/ style=""></a>
            </div>
		

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li> 
					
					  <li>
                        <a class="page-scroll" href="<?php echo BASEURL; ?>/dashboard/">Dashboard</a>
                    </li>
				
                    <li>
                        <a class="page-scroll" href="<?php echo BASEURL; ?>/search/">Jobs</a>
                    </li>
                   <!-- <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="<?php echo BASEURL; ?>/about/">About</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="<?php echo BASEURL; ?>/contact/">Contact</a>
                    </li>
					<?php 
					
					//$ip=$_SERVER["REMOTE_ADDR"]; 
 //if($ip=="103.54.100.18"){ ?>
				    <li>
                        <a class="page-scroll" href="<?php echo BASEURL; ?>/logout/">Logout</a>
                    </li>
						
	
					<?php // } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
