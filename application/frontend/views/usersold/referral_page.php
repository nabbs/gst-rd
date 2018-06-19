<div id="landing-page">
<div id="header-inner">

<div class="container">
    <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/earning-header-bg.png" style="width:100%" /> 
</div>

</div>
<div id="content-inner">
  <div class="container">
   <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offset-0 box">
    <div class="col-sm-12 video-and-iframe">
        <iframe src="//videos.sproutvideo.com/embed/4c9bddb21e1be2c0c4/0a720f9a477898b6?type=hd&autoPlay=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
    </div> 
    <div class="col-sm-12 counter">
     <h1><span>TRIPLE</span> YOUR <u>EARNING</u> POTENTIAL</h1>     
    </div>
    
     <div class="col-sm-12 income">
     
     <div class="col-md-2 col-sm-2 col-xs-12">
     	  <div class="pull-left">
     	<img src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/arrow-left.png" />
     </div>
     </div>
     <div class="col-md-8 col-sm-8 col-xs-12">	
        <?php
	
		$ref_username3 = ckeck_step_username_ref('step_four_username',$userdata['reference_by']); 
		?>	 
		<a href="https://nationalwealthcenter.com/?id=<?php echo (!empty($userdata['reference_by']) && !empty($ref_username3))? $ref_username3 :"smgroup"; ?>" target="_blank" class="btn btn-block">YES I WANT TO<BR /> TRIPLE MY INCOME</a>
		
     </div>
     <div class="col-md-2 col-sm-2 col-xs-12">
     	 <div class="pull-right">
     	<img src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/arrow-right.png" />
     </div>
     </div>
     
   
    
     
    </div>     
    
    <div class="col-sm-12 join">
	
<form id="referral_pageForm" action="<?php echo BASEURL ; ?>/users/save_username" method="post"  novalidate="novalidate">
    <h1>SAVE YOUR NWC USERNAME BELOW:</h1>
    <div class="form-group">
       <input type="text" class="form-control" id="step_four_username" name="step_four_username"  >
    </div>
    <button type="submit" class="btn btn-block">SAVE</button>
	<div id="registervalidating" class="text-center"></div>
</form>	
	
 	 <?php $reference_name=trim($userdata['reference_name']); ?>
     <h4>Referred By: <?php echo (!isset($reference_name) || empty($reference_name))?"No reference": $reference_name ; ?></h4>
    </div>
    
   <div class="col-sm-12 notice text-center">
      <p ><a href="<?php echo BASEURL; ?>/thankyou" style="text-decoration:none;color:#000">No I'll Pass On this offer-Please Log Me Into Members Area</a></p>
    </div>
   
   </div>
   
  </div>
</div>
 
<footer>
<div class="container">
 <p>DISCLAIMER: All Testimonials and income claims presented are not intended to serve as a guarantee of income via Easy Cash Code. Instead, they're designed to    give you an idea of what's possible if you work your butt off consistently and share the benefits of our system.</p>
<p class="copy-right">COPYRIGHT © 2016 Stinson Marketing Group LLC. All Rights Reserved.</p>
</div>
</footer>
</div>

