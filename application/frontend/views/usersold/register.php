<style>
body { 
  background: url(<?php echo FRONT_END_LAYOUT; ?>/assets/img/signup-bg.jpg) no-repeat center center fixed  !important;
  -webkit-background-size: cover !important;
  -moz-background-size: cover !important;
  -o-background-size: cover !important; 
  background-size: cover !important;
  font-family: 'Titillium Web', sans-serif;
}
</style>
<div id="signup">
 <div class="container">
   <div class="col-sm-8 col-sm-offset-2">
    <div class=" signup">
	 <div class="signup-logo"><a href="<?php echo BASEURL; ?>/account/dashboard"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/login-logo.png" class="img-responsive" alt="Login Logo" /></a> </div>
     <div class="signup-video">
      <!-- <iframe src="https://player.vimeo.com/video/151916623?autoplay=1&title=0&byline=0&portrait=0" width="740" height="416" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
<iframe src="//videos.sproutvideo.com/embed/709bddb71c1beccaf8/4d67d921007ff33a?type=hd&autoPlay=true" width="740" height="416" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <!--<img src="img/signup-video.png" />-->
     </div>
     <div class="signup-form">
	       <h2>Create Free Account Below :</h2>
      <form action="<?php echo BASEURL ; ?>/users/register" method="post" id="registerForm" novalidate="novalidate">
	  <?php $reference = $this->session->userdata('reference_data'); ?>
      <input type="hidden" name="reference_by" value="<?php echo $reference['reference_by'] ?>">	  
      <input type="hidden" name="reference_name" value="<?php echo $reference['reference_name'] ?>">	
     <div class="col-sm-12"> 
	  <div class="col-sm-6 col">
        <div class=" form-group">
        <input type="text" class=" form-control" name="fname" id="fname" placeholder="First Name" />
       </div>
      </div>
      <div class="col-sm-6 col">
        <div class=" form-group">
        <input type="text" class=" form-control" name="lname" id="lname" placeholder="Last Name" />
       </div>
      </div>
      </div>
	  
	 <div class="col-sm-12"> 
      <div class="col-sm-6 col">
        <div class=" form-group">
        <input type="email" class=" form-control" name="email" id="email" placeholder="Email Address" />
       </div>
      </div>
      <div class="col-sm-6 col">
        <div class=" form-group">
        <input type="text" class=" form-control" name="display_name" id="display_name" placeholder="Username" />
       </div>
      </div>
      </div>
	<div class="col-sm-12"> 
      <div class="col-sm-6 col">
        <div class=" form-group">
        <input type="text" class=" form-control" name="phone_no" id="phone_no"  placeholder="Phone Number" />
       </div>
      </div>
      <div class="col-sm-6 col">
        <div class=" form-group">
        <input type="password" class=" form-control" name="password" id="password" placeholder="Password" />
       </div>
      </div>
      </div>
      <div class="col-sm-12 text-center">

        <div class=" form-group">

         <button type="submit" class="btn btn-warning">CREATE ACCOUNT</button>
		 <div id="registervalidating"  class="text-center"></div>
       </div>
      </div>
      
      </form>
     
     </div>
	</div>
   </div>                 
 </div>
</div>

