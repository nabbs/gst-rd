  <!-- Hot Deals-->
  <section class="whiteSection g-py-90" id="hot-deals">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="sectionTitle wow fadeInUp">
            <h2 class="text-uppercase u-heading-v8__title g-font-size-27 mb-25"><span>Hot Deals</span></h2>
          </div>
        </div>
      </div>
      <div class="row wow fadeInUp">
       <?php foreach($hotdeals as $key=>$val){
	   ?>
          <div class="col-sm-4 content">
            <div class="card card-inverse">
              <img class="card-img card-img-top" src="<?php echo base_url ?>/../assets/files/300X300/<?php echo $val['package_logo']; ?>" alt="Card image">
              <div class="card-img-overlay text-center">
                <h4 class="card-title g-font-size-22"><?php echo $val['title']; ?></h4>               
                <div class="gp_height"><?php echo $val['description']; ?></div> <div class=""></div> <a href="<?php echo $val['link']; ?>" class="thm-btn">Explore Now</a>
              </div>
              <div class="card-block">
                <h4 class="g-font-size-14"><?php echo $val['title']; ?></h4>
                <p class="card-text"><small class="text-muted"> from </small><strong style="color:red"> $<?php echo $val['price']; ?> </strong><small class="text-muted">/ <?php echo $val['after_from_text_two']; ?></small>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End Hot Deals-->