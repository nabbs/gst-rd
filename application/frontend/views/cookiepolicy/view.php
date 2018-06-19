		<!-- Section Content -->
		<section class="whiteSection g-py-90" id="hot-deals">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="heading text-cemter">
							<h2 class="text-uppercase u-heading-v8__title  g-font-size-27 "><span><?php echo $page_title; ?></span></h2>
							<!--<p class="mb-0">Ut facilisis facilisis metus quis semper</p>-->
						</div>
					</div>
				</div>				
			</div>
		</section>	
		<section class=" g-py-90">
			<div class="container">
      <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
          <!-- Title -->
          <h1 class="mt-4"><?php echo $results['post_title']; ?></h1>
          <!-- Author -->
          <p class="lead">
            by
            <a href="#">Go Search Travel</a>
          </p>
          <hr>
          <!-- Date/Time -->
          <p>Posted on <?=date('l Y/m/d', $results['created']); ?></p>
          <hr>
          <!-- Preview Image -->
          <img class="img-fluid rounded" src="/../assets/files/<?php echo $results['post_attachment_name']; ?>" alt="">
          <hr>
          <!-- Post Content -->
          <?php echo $results['post_description']; ?>
          <hr>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <!-- Search Widget -->
          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Recent Posts</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
				  <?php foreach($recent_posts as $key=>$val){ ?>
                    <li>
                      <a href="blog/view/<?php echo $val['post_slug']; ?>"><?php echo $val['post_title']; ?></a>
                    </li>
                    <?php }?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side bar</h5>
            <div class="card-body">
              Add Banner
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
		</section>