	<!-- Section Content -->
	<section class="whiteSection g-py-90" id="hot-deals">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sectionTitle">
						<div class="gp_height"></div>
						<script charset="utf-8" src="//www.travelpayouts.com/widgets/70d87b6b6129e9ad4befe1f25fe3e949.js?v=1114" async></script>
						<!--<p class="mb-0">Ut facilisis facilisis metus quis semper</p>-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--<section class=" g-py-90">			
		<div class="container">	
			<div class="row g-py-12">				
			<?php 
			if($results){
			foreach($results as $key=>$val){?>					
					<div class="col-sm-4 image" style="margin-bottom: 52px;">
						<script async src="//www.travelpayouts.com/weedle/widget.js?marker=129036&host=flights.gosearchtravel.com&locale=en&currency=gbp&destination=<?php echo trim($val->country_code); ?>&destination_name=<?php echo trim($val->country); ?>" charset="UTF-8"></script>
					</div>								
			<?php } }else{ ?> 
			<div class="col-sm-4 image">
			<h5 class="text-center">Records Not Found!</h5>
			</div>
			<?php 
			}?>
			</div>	
		</div>
	</section>-->
	<!-- Section Content -->
	<section id="top-destination" class="destination g-py-90">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sectionTitle">
						<h2 class="text-uppercase u-heading-v8__title g-font-size-27 mb-0"><span>Flights</span></h2>
						<!-- <p class="mb-0">This is Amazing Travel Agency !</p>-->
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<!-- Product Blocks -->
			<div class="row">
				<div class="col-12">
					<div class="filter-container isotopeFilters">
						<ul class="list-inline filter">
							<li class="active"><a href="#" data-filter="*">All Places</a>
							</li>
							<?php								
							foreach($results as $val){ 
							?>
							<li><a href="#" data-filter="<?= '.'.strtolower($val->destination_name);?>"><?= $val->destination_name;?></a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row isotopeContainer" style="post">
			<?php foreach($results as $val){ ?>
				<div class="col-lg-3 col-md-6 g-mb-30 isotopeSelector <?php echo strtolower($val->destination_name); ?>">
					<!-- Article -->
					<script async src="//www.travelpayouts.com/weedle/widget.js?marker=129036&host=flights.gosearchtravel.com&locale=en&currency=gbp&destination=<?php echo trim($val->country_code); ?>&destination_name=<?php echo trim($val->country); ?>" charset="UTF-8"></script>
					<!-- End Article -->
				</div>
				<?php } ?>
			<!-- End Product Blocks -->
		</div>
	</section>
	<!--------------------End section---------------->