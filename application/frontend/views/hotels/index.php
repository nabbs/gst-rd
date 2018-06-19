		<!-- Section Content -->
		<section class="whiteSection g-py-90" id="hot-deals">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="sectionTitle">
							<div class="gp_height"></div>
							<script charset="utf-8" src="//www.travelpayouts.com/widgets/97b317f636806a09a2300defc208e489.js?v=1238" async></script>
							<!--<p class="mb-0">Ut facilisis facilisis metus quis semper</p>-->
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class=" g-py-90">			
			<div class="container">	
				<div class="row g-py-12">				
				<?php 
				if($results){
				foreach($results as $key=>$val){?>			
						<div class="col-sm-4 image" style="margin-bottom: 52px;">
							<script charset="utf-8" async src="//www.travelpayouts.com/chansey/iframe.js?hotel_id=3205&locale=en&host=hotels.gosearchtravel.com%2Fhotels&marker=129036.&currency=usd&width=350"></script>
						</div>					
				<?php } }else{ ?> 
				<div class="col-sm-4 image">
				<h5 class="text-center">Records Not Found!</h5>
				</div>
				<?php 
				}?>
				</div>	
			</div>
		</section>