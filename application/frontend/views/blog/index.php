		<!-- Section Content -->
		<section class="whiteSection g-py-90" id="hot-deals">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="sectionTitle">
							<h2 class="text-uppercase u-heading-v8__title  g-font-size-27 mb-25"><span><?php echo $page_title; ?></span></h2>
							<!--<p class="mb-0">Ut facilisis facilisis metus quis semper</p>-->
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class=" g-py-90">
			<div class="container">
				<?php 
				
				foreach($results as $key=>$val){ ?>
				<div class="row g-py-12">	
				<div class="col-sm-4 image">
						<div class="card card-inverse">
							<img class="card-img card-img-top" src="/../assets/files/300X300/<?=$val->post_attachment_name; ?>" alt="Card image">						
						</div>
					</div>
					<div class="col-sm-8 content">
							<h4 class="card-title "><a href="/blog/view/<?php echo $val->post_slug; ?>" ><?php echo $val->post_title; ?></a></h4>			
							<p class=""><?php echo substr($val->post_description,0,500); ?> <a href="/blog/view/<?php echo $val->post_slug; ?>" >Read More</a></p>							
					</div>
				</div>
				<div class="row">
				<div class="col-sm-4 image">
				</div>
					<div class="col-sm-8 content">
				 <!-- Facebook -->
	<a href="http://www.facebook.com/sharer.php?u=<?php echo BASEURL; ?>/blog/view/<?php echo $val->post_slug; ?>" target="_blank">
		<img src="https://simplesharebuttons.com/images/somacro/facebook.png" height='30px' alt="Facebook" />
	</a>
	<!-- Google+ -->
	<a href="https://plus.google.com/share?url=<?php echo BASEURL; ?>blog/view/<?php echo $val->post_slug; ?>" target="_blank">
		<img src="https://simplesharebuttons.com/images/somacro/google.png" height='30px' alt="Google" />
	</a>
		</div>
				</div>
				<?php } ?>
			</div>
		</section>