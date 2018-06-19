  <?php @$res= $this->db->select('*')->from('gp_settings')->where('id',4)->get()->result_array();
   echo @$res[0]['analytic_code'];  
  ?>
<footer><div class="copyRight clearfix">

<div class="container">	<div class="row">	
<div class="col-sm-6  p-2 order-2 order-lg-1   col-12">			<div class="text-right">				<p style="margin: 0;"><b>Subscribe in Our Newsletter</b></p>				<strong><h2 style="color: #fff; font-weight:900;">for the hottest deals</h2></strong>			</div>		</div>

	<div class="col-sm-6 p-2 order-1 order-lg-2 col-12 newsletter">			<div class="input-group" style="height: 50px; border: 2px solid #000;">	<input type="text" class="form-control" placeholder="Enter your email" aria-describedby="basic-addon21" style="height:46px;  border-right: 2px solid #000;" id="sub_id"><a href="javascript:void(0)" id="subscription"> <span class="input-group-addon" id="basic-addon21" ><i class="fa fa-send-o" aria-hidden="true" ></i>&nbsp;Subscribe</span></a>				</div>				<div id="sub_mess" class="text-center msg_alert"></div>		</div>								</div>
	
	</div> 
	<div class="footer clearfix">   
	<div class="container">      
	
	<div class="row wow fadeInUp">        <div class="col-sm-4 col-12">    

      <div class="footerContent">            
	  <p><?php echo @$res[0]['meta_description'];  ?></p>         
	  </div>      


	  </div>        <div class="col-sm-4 col-12">          <div class="footerContent">            <h5>contact us</h5>            <p>Please contact us on E-mail.</p>            <ul class="list-unstyled">                       <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailTo:info@gosearchtravel.com">info@gosearchtravel.com</a> </li>            </ul>						<ul class="list-inline ">              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>              <li><a href="https://twitter.com/GoSearchTravelC"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>              <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a> </li>              <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a> </li>            </ul>			          </div>        </div>        <div class="col-sm-4 col-12">         

	  <div class="footerContent imgGallery">            <h5>Popular cities</h5>            <div class="row">   
  <?php $query = $this->db->select('*');
		$this->db->from('gp_topdestinations');
		$this->db->where('popular',1);
		$query = $this->db->get();
		$destinations = $query->result_array(); 
		foreach($destinations as $key=>$val){ 
				 ?>
	  <div class="col-4 pd-5"> <a class="fancybox-pop" href="/../assets/files/<?=$val['package_logo']; ?>"> <img class="img-responsive image_selected" src="/../assets/files/100X100/<?=$val['package_logo']; ?>"> </a> </div>              
	    <?php } ?>
	  <!--div class="col-4 pd-5"> <a class="fancybox-pop" href="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg"> <img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg" alt="image"> </a> </div>              <div class="col-4 pd-5"> <a class="fancybox-pop" href="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg"> <img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg" alt="image"> </a> </div>              
	  <div class="col-4 pd-5"> <a class="fancybox-pop" href="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg"> <img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg" alt="image"> </a> </div>             
	  <div class="col-4 pd-5"> <a class="fancybox-pop" href="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg"> <img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg" alt="image"> </a> </div>             
	  <div class="col-4 pd-5"> <a class="fancybox-pop" href="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg"> <img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/hodka2.jpg" alt="image"> </a> </div-->  
	  
	  </div>          </div>        </div>              </div>    </div>  </div>  
<div class="copyRight clearfix">    <div class="container">      <div class="row wow fadeInUp">        <div class="col-sm-6 p-2 order-1 order-lg-2 col-12">          <ul class="list-inline text-right">		  <li><a href="/about-us">About Us</a> </li>		  <li><a href="/blog">Blog</a> </li>		   <li><a href="/cookies-policy">Coookie</a> </li>           <li><a href="/privacy-policy">Privacy Policy</a> </li>                        <li><a href="/support">Support</a> </li>                      </ul>        </div>        <div class="col-sm-6  p-2 order-2 order-lg-1   col-12">        
  <div class="copyRightText">         
  <p>© GoSearchTravel.com 2016-<?php echo date('Y'); ?>. All Rights Reserved</p>         
  </div></div> </div></div></div></footer>
  