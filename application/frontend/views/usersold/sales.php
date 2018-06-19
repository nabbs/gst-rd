<style>
	.btn-link:focus{
	color:white;
	text-decoration:none;
	 outline: unset;
	}
 
 .countdown {
    border: 8px solid #e4e4e4;
    border-radius: 3px;
    display: block;
    height: 520px ;
    margin: 0 auto;
    width: 950px ;
	padding-top:8%;
	background:#000 !important;
	color:#fff;
}

.videoEmbed_hangout {
    min-height: 250px !important;
}

#defaultCountdown {
    text-align: center;
    max-width: 410px;
    margin: auto;
}

.get-started:hover{
text-decoration:none !important;
cursor: pointer;
}
.modal-header {
    min-height: 16.43px;
    border-bottom: 1px solid #e5e5e5;
}
.close {
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    
}
#cross{ 
    padding-top: 6px; padding-right: 10px; padding-left: 11px;
border-radius: 40px;background-color:#333333;padding-bottom: 6px; color: #ffffff; opacity:1.0;margin-top: -20px; margin-right: -20px; border:2px solid #ffffff
}

.modal-dialog{
width:97%;
padding-left:30px;
height:600px;

}
.btn-tag{
color:#ffffff;
}

/*
.get-started{
font-size:22px !important;
font-weight:bold;
padding: 16px 25px 16px 25px !important;

}*/
@media only screen and (max-width: 767px){
.modal-dialog {
    height: 600px ;
    left: 0 !important;
    margin: 50px auto!important;
    right: 0 !important;
    width: 95% !important;
	padding:0px;
}
#cross{ 
   padding:2px 6px 1px !important;
border-radius: 40px;background-color:#333333;padding-bottom: 6px; color: #ffffff; opacity:1.0;margin-top: -12px!important; margin-right: -6px !important; border:2px solid #ffffff
}
	h3{text-align:center;}
h3, .h3 {
    font-size: 20px!important;
}
	.copy_right_gp{margin-top:20px;}

}
@media only screen and (max-width: 360px){
		.span_btn{display:none!important;}
}

@media only screen and (min-width:768px) and (max-width: 1024px)  {
.countdown { width: 100% !important;height: 340px !important;}}
@media only screen and (min-width:100px) and (max-width: 767px)  {
.countdown {width: 100% !important;height: 340px !important;}
.get-started{
font-size:25px !important;
}

}



 </style>
 
  <!---------------Modal Start--------------->
 
 
 <div class="full-container">
  
  <!-- Trigger the modal with a button -->
  

 
 <!--------Modal End ------->
 
 
 
 
 
 
 
 <div class="hangout">
  <div class="container container-bg">
   <div class="col-sm-12 col-md-8 col-md-offset-2">
  <div class="header">
     <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/sales/img/hangout-header-text.png" alt="" class="uopLogo"/>
  </div>
   <div class="video-iframe">
       <?php  echo htmlspecialchars_decode($hangouts['video']); ?>
       <div class="iframe-shadow">
         <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/sales/img/iframe-shadow.png" alt="" />
       </div>
    </div>
   <div class="timmer">
    <div id="defaultCountdown"></div>
     <div id="login-button" style="display:none ;">
      <a href="<?php echo BASEURL;?>/order/<?php echo isset($_GET['username'])?"?username=".$_GET['username']:''; ?>" ><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/sales/img/get-started_new.png" alt="" /></a>
     </div>
    

   </div>
  
 </div>  
 </div>
<div class="container" style="padding:0"> 
 <div class="footer-border"></div>
  <div class="footer">
    <div class="col-md-12"><p>DISCLAIMER: All Testimonials and income claims presented are not intended to serve as a guarantee of income via Easy Cash Code. Instead, they're designed to give you an idea of what's possible if you work your butt off consistently and share the benefits of our system.</p>
    </div>
   </div> 
   
   <div class="footer-bottom">
   
   
     <section>
   <div class="col-sm-12 text-center">
   <a href="<?php echo BASEURL;?>/terms_of_use/<?php echo ($username)?'?username='.$username:'';?>" type="button" class="btn btn-link btn-tag " >Terms Of Use </a>&nbsp;<span style="color:#ffffff" class="span_btn">&nbsp;|</span>
   <a  href="<?php echo BASEURL;?>/privacy_policy/<?php echo ($username)?'?username='.$username:'';?>" type="button" class="btn btn-link btn-tag " >Privacy Policy </a>&nbsp;<span style="color:#ffffff" class="span_btn">&nbsp;|</span>
   <!--ref="<?php// echo BASEURL;?>/results_disclosure/<?php //echo ($username)?'?username='.$username:'';?>" type="button" class="btn btn-link  btn-tag" >Results Disclosure</a>-->
	  <a href="<?php echo BASEURL;?>/affiliate_agreement/<?php echo ($username)?'?username='.$username:'';?>" type="button" class="btn btn-link  btn-tag" >Affiliate Agreement</a>
	   
	   &nbsp;<span style="color:#ffffff" class="span_btn">&nbsp;|</span>
   <a href="<?php echo BASEURL;?>/faq/<?php echo ($username)?'?username='.$username:'';?>" type="button" class="btn btn-link btn-tag" >FAQ</a>&nbsp;<span style="color:#ffffff" class="span_btn">&nbsp;|</span>
<a href="<?php echo BASEURL;?>/refund_policy/<?php echo ($username)?'?username='.$username:'';?>" type="button" class="btn btn-link btn-tag" >Refund Policy </a>&nbsp;<span style="color:#ffffff" class="span_btn">&nbsp;|</span>	   
   <a href="<?php echo BASEURL;?>/earnings_disclaimer/<?php echo ($username)?'?username='.$username:'';?>" type="button" class="btn btn-link btn-tag" >Earnings Disclaimer </a>&nbsp;<span style="color:#ffffff" class="span_btn">&nbsp;|</span>
   <a href="<?php echo BASEURL;?>/contact" class="btn btn-link btn-tag" style="color:#fff!important">Contact Us</a>&nbsp;<span style="color:#ffffff" class="span_btn">&nbsp;|</span>
   <a href="<?php echo BASEURL;?>/login" class="btn btn-link btn-tag" style="color:#fff!important">Member Login</a>
   
   
   </div>
		
   </section>

   
   
   
   
<div class="col-sm-8 copy_right_gp">
<p>Copyright &copy; 2016 Stinson Marketing Group LLC. All Rights Reserved.</p>
</div> 
<div class="col-sm-4 logo">
 <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/sales/img/hangout-footer-logo.png" alt="" class=""/>
</div>
</div>
</div>
 </div>
 <!--Start QualityClickControl.com Conversion Tracking Code-->
<img src="http://getnewsalesfast.com//tracking.php?type=conv" height="1" width="1" style="display:none;"/>
<!--End QualityClickControl.com Conversion Tracking Code-->

 <script>
		(function($){
			$(window).load(function(){
				
				$("#myModal .modal-body").mCustomScrollbar({
					setHeight:340,
					theme:"minimal-dark"
				});
				
				$("#myModal-privacy .modal-body-privacy").mCustomScrollbar({
					setHeight:300,
					theme:"dark-3"
				});
				
				$("#myModal-faq .modal-body-faq").mCustomScrollbar({
					setHeight:280,
					theme:"inset-2-dark"
				});
				$("#myModal-refund .modal-body-refund").mCustomScrollbar({
					setHeight:280,
					theme:"inset-2-dark"
				});
				$("#myModal-test .modal-body-test").mCustomScrollbar({
					setHeight:280,
					theme:"inset-2-dark"
				});
				$("#myModal-income .modal-body-income").mCustomScrollbar({
					setHeight:280,
					theme:"inset-2-dark"
				});
				$("#myModal-contact .modal-body-contact").mCustomScrollbar({
					setHeight:280,
					theme:"inset-2-dark"
				});
				
				
			});
		})(jQuery);
	</script>
 

