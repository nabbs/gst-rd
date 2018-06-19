
			
			  <!-- Header -->
	<div class="page-header parallax-window" data-parallax="scroll" data-image-src="<?php echo FRONT_END_LAYOUT ?>/assets/img/aboutus.jpg">
			<h2 class="page-title">
			<?php echo $page_title; ?> <meta itemprop="title" content="<?php echo $page_title; ?>">
			</h2>
			</div>
		<section class="job-item-description">
			<div class="row">
			<div class="container">
			 <h2 class="section-heading text-left">Chandigarh Recruiters</h2>
			 <?php if(empty($error)){?>
			<div class="col-sm-12 col-xs-12 col-md-12  alert alert-success">
				<h2 style="text-align: center;" class="">Thankyou ! Job Application Submitted Successful.</h2>
				<p class="section-heading text-left" style="text-align: center;font-size: 20px;padding: 24px;">We Will Contact You shortly.</p>
			</div>
			 <?php }else{?> .
			 <div class="col-sm-12 col-xs-12 col-md-12  alert-danger">
				<h2 style="text-align: center;" class="">Sorry ! Resubmit your application .</h2>
				<p class="section-heading text-left" style="text-align: center;font-size: 20px;padding: 24px;">Keep Remember These File Extensions When Apply Application docx|rtf|doc|pdf .</p>
			</div>
			 <?php } ?>
			</div>
			</div>
		</section>
		
		
<script>

 window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "<?php echo (!empty($error))?$_SERVER['HTTP_REFERER']:BASEURL; ?>";

    }, 5000);
</script>
	
	
 
