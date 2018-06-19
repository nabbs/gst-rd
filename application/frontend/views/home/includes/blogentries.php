<!-- Blog Entries-->
<section id="latest-blog" class="blog g-py-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="sectionTitle wow fadeInUp" data-wow-delay="0.2s">
          <h2 class="text-uppercase u-heading-v8__title g-font-size-27"><span>Latest Blog</span></h2>
          <p class="mb-0">Checkout our Latest Blogs and News</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="owl-carousel wow fadeInUp" data-wow-delay="0.4s">
	  <?php 
	  //count($blogs);
	  foreach($blogs as $blog){ ?>
        <div class="item">
          <div class="card card-inverse"> <img class="card-img card-img-top" src="<?php echo base_url ?>/../assets/files/300X300/<?=$blog['post_attachment_name']; ?>"  alt="Card image">
            <div class="card-img-overlay">
              <h4 class="card-title mb-0"><?=date('d M Y', $blog['created']); ?></h4>
            </div>
          </div>
           <a href="/blog/view/<?php echo $blog['post_slug']; ?>" ><h4 class="g-font-size-24 fw"><?php echo $blog['post_title']; ?></h4></a>
          <p class="item-text"><?php echo substr(strip_tags($blog['post_description']),0,100); ?>..</p>
        </div>
		<?php  } ?>
      
      </div>
    </div>
  </div>
</section>
<!-- End Blog Entries -->