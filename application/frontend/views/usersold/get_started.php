<?php
 $reference = $this->session->userdata('reference_data');
$setcookie="123"; 

redirect(BASEURL.'/four_ca/?username='.$reference['reference_by']);	
die;

?>

<body id="landing-page">
<div id="header">
 <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/img/header-bg_landing1.png" class="img-responsive" style="margin:auto;" />
</div>
<div id="content">
  <div class="container">
   <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offset-0 box">
    <div class="col-sm-12 video-and-iframe">
<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="//fast.wistia.net/embed/iframe/k00eyf26bd?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>

<!--<iframe src="//videos.sproutvideo.com/embed/4c9bddb21e1be2c0c4/0a720f9a477898b6?type=hd&amp;autoPlay=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" oallowfullscreen="" msallowfullscreen="" width="640" height="360"></iframe>-->
<!-- <iframe src="https://player.vimeo.com/video/151916623?autoplay=1&title=0&byline=0&portrait=0"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
    </div> 
<?php if(empty($setcookie)){ ?>
    <div class="col-sm-12 counter">
     <h1>OFFER EXPIRES IN</h1>     
     <div id="defaultCountdown"></div> 
     <div class="clearfix"></div>
    </div>
<?php } ?>
<?php if(!empty($setcookie)) {
$show="style='display:block'";
}else{
$show="style='display:none'";
} ?>
<div id="get_started" <?php echo $show; ?>>
    <div class="col-sm-12 get-started">
     <h1>GET STARTED <u>TODAY</u> FOR <span>ONLY $25</span></h1>
    </div>
    <div class="col-sm-12 join">
     <h1>STEP 1: JOIN NATIONAL WEALTH CENTER</h1>
	 <?php $get_NWC_Link =  get_NWC_Link($reference['reference_by']) ;  ?>
     <a href="<?php if(!empty($get_NWC_Link)){ echo "https://nationalwealthcenter.com/?id=".$get_NWC_Link; } ?>" target="_blank" class="btn btn-block">Click Here Now<br />To Get Started</a>
 	 <?php $refered_by=trim($reference['reference_name']); ?>
     <h4>Referred By: <?php echo (!isset($refered_by) || empty($refered_by))?"No reference":$reference['reference_name'] ; ?></h4>
	 
    </div>
    
    <div class="col-sm-12 notice">
      <p><strong><u>NOTE:</u></strong><strong>After you complete Step 1</strong> and you have set up your <strong><u>National Wealth Center</u></strong> account, continue onto <strong>Step 2</strong> so that you can register for instant access to the <strong>Easy Cash Code System </strong>and get on your way to earning <strong>$100-$500</strong> per day!</p>
    </div>
    
    <div class="col-sm-12 account">
      <h1>STEP 2: CREATE YOUR ECC ACCOUNT BELOW</h1>
	  
	  
    <form id="get_startedForm" action="<?php echo BASEURL ; ?>/users/link_nwc" method="post"  novalidate="novalidate">

      <input type="hidden" name="reference_by" value="<?php echo $reference['reference_by'] ?>">	  
      <input type="hidden" name="reference_name" value="<?php echo $reference['reference_name'] ?>">
       <div class="row"><div class="col-sm-6">
        <div class="form-group">
         <label>First Name:</label>
         <input  type="text"  name="fname" id="fname" class="form-control" />
        </div>
       </div>
       <div class="col-sm-6">
        <div class="form-group">
         <label>Last Name:</label>
         <input  type="text"  name="lname" id="lname" class="form-control" />
        </div>
       </div></div>
        <div class="row"><div class="col-sm-6">
        <div class="form-group">
         <label>Email Address:</label>
         <input  type="email"  name="email" id="email"  class="form-control" />
        </div>
       </div>
        <div class="col-sm-6">
        <div class="form-group">
         <label>Phone Number:</label>
         <input  type="text" name="phone_no" id="phone_no" class="form-control" />
        </div>
       </div></div>
        <div class="row"><div class="col-sm-6">
        <div class="form-group">
         <label>Username:</label>
         <input  type="text"  name="display_name" id="display_name"   class="form-control" />
        </div>
       </div>
        <div class="col-sm-6">
        <div class="form-group">
         <label>Password:</label>
         <input  type="password" name="password" id="password"  class="form-control" />
        </div>
       </div></div>
         <div class="row"><div class="col-sm-8 col-sm-offset-2 col-xs-offset-0 ">
        <div class="form-group text-center">
         <label>Enter National Wealth Center Username:</label>
         <input name="step_one_username"  type="text" class="form-control" />
        </div>
       </div></div>
        <div class="col-sm-10 col-sm-offset-1 col-xs-offset-0 ">
         <button type="submit" class="btn btn-block">Click Here To Get<br />INSTANT ACCESS</button>
         <div id="registervalidating"  class="text-center"></div>
       </div>
      </form>
  
    </div>

   </div>
  
   </div>
  </div>
<div class="push"></div>
</div>

<footer>
<div class="container">
<p>DISCLAIMER: All Testimonials and income claims presented are not intended to serve as a guarantee of income via Easy Cash Code. Instead, they're designed to    give you an idea of what's possible if you work your butt off consistently and share the benefits of our system.</p>
<p class="copy-right">COPYRIGHT © 2016 Stinson Marketing Group LLC. All Rights Reserved.</p>
<br/>
<div class="text-center" >

<a href="<?php echo BASEURL; ?>/users/login/" style="margin-top:37px;color:rgb(203, 10, 10) !important"  >Existing Members Login Here</a></div>
  
</div>
<br/>
</footer>
</body>
<?php if(empty($setcookie)) { ?>
<?php setcookie("showtimer", "Offer has been viewed", time()+(3600*12)); ?>
<?php } ?>
<SCRIPT language="javascript">
<!--
document.write('<img src="http://www.hypertracker.com/count.php?user=smgroup&name=Lead+Optins&sales=0&description=Lead+Optins&value=0&protection=default&rand='+Math.random()+'" BORDER="0" HEIGHT="1" WIDTH="1" ALT="">')
//-->
</SCRIPT>
