<!-- Top Destinations -->
<section id="top-destination" class="destination g-py-90">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="sectionTitle wow fadeInUp" data-wow-delay="0.2s">
          <h2 class="text-uppercase u-heading-v8__title g-font-size-27 mb-0"><span>Top Destinations</span></h2>
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
            <li class="active"><a href="#" data-filter="*">All Places</a> </li>
            <?php foreach($topdestinationscity as $val){ 
			   $c=strtolower($val['city']);
				if(strpos($c, '.')){ $c=str_replace('.', '_',$c );}
			 ?>
            <li><a href="#" data-filter="<?= '.'.$c;?>">
              <?= $val['city'];?>
              </a> </li>
            <?php  $city=$val['city']; } ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="row isotopeContainer wow fadeInUp" data-wow-delay="0.4s" style="post">
      <div class="row">
        <?php foreach($topdestinations as $val){ 
		$c=strtolower($val['city']);
		if(strpos($c, '.')){ $c=str_replace('.', '_',$c );}
		?>
        <div class="col-md-3 col-sm-4 g-mb-30 isotopeSelector <?php echo $c; ?>"> 
          <!-- Article -->
          <div class="destination-grid"> <a href="<?php echo $val['link']; ?>"> <img src="<?php echo base_url ?>/../assets/files/300X300/<?php echo $val['package_logo']; ?>" alt="Image description" > </a> 
            <!-- Article Content -->
            <div class="mask">
              <h2><?php echo $val['city']; ?></h2>
              <p><?php echo $val['description']; ?></p>
              <!-- <a href="#" class="thm-btn">Read More</a>--> 
            </div>
            <div class="dest-name">
              <h5><?php echo $val['title']; ?></h5>
              <h4><?php echo $val['city']; ?></h4>
            </div>
            <div class="dest-icon"> <a href="<?php echo @$val['tours_url']; ?>"><i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title="" data-original-title="Find Holidays"></i></a> <a href="<?php echo @$val['criuses_url']; ?>"> <i class="fa fa-ship" data-toggle="tooltip" data-placement="top" title="" data-original-title="Find Cruises"></i></a> <a href="<?php echo @$val['flight_url']; ?>"><i class="fa fa-plane" data-toggle="tooltip" data-placement="top" title="" data-original-title="Find Flights"></i></a> <a href="<?php echo @$val['hotel_url']; ?>"> <i class="fa fa-building-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Find Hotels"></i></a> </div>
            <!-- End Article Content --> 
          </div>
          <!-- End Article --> 
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- End Top Destinations-->