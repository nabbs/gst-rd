		<!-- Section Content -->
		<section class="whiteSection g-py-90" id="hot-deals">
			<div class="container blog">
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
				  <?php foreach($recent_posts as $key=>$val){ 
				 
				 ?>
                    <li>
                      <a href="/blog/view/<?php echo $val['post_slug']; ?>"><?php echo $val['post_title']; ?></a>
                    </li>
                    <?php 
					
					}  ?>
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
		<section>		
		<div class="container ">
		<form action="/blog/comment" method="post">
			<input type="hidden" name="comment-type" value="main">
			<input type="hidden" name="blog_id" value="<?php echo $results['id']; ?>">
			<div class="box-body">
			  <div class="box-header row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="your-name">Your Name*</label>
                  <input type="text" class="form-control" name="your-name" id="your-name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                   <label for="email">Email*</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
               
			    <div class="form-group">
                   <label for="comment-area">Comment*</label>
                  <textarea class="form-control" name="comment-area" id="comment-area" required placeholder="Type Comments"></textarea>
                </div>
				  <div class="form-group">
                   <input type="submit" value="Submit">
                </div>
                </div>
                </div>
                </div>
		</form>
		</div>
		<div class="container comment">
			<div class="row">
			<div class="col-sm-12">
			<h3>Leave Comments</h3>
			</div><!-- /col-sm-12 -->
			</div><!-- /row -->
			<div class="row">
				<!--div class="col-sm-1">
					<div class="thumbnail">
					<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
					</div>
				</div--><!-- /col-sm-1 -->
				<?php if(isset($comments)){ 
				foreach($comments as $val){
				//print_r($val);
				//print_r($config[]);
				?>
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><?php echo $val['name']; ?> </strong>  <span class="text-muted"><?php echo date("F j, Y, g:i a",$val['created']);  ?></span>
						</div>
						<div class="panel-body">
						<?php echo $val['comment']; ?>
						</div><!-- /panel-body -->
					</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
				<?php } } ?>
			</div><!-- /row -->

		</div><!-- /container -->
		</section>
