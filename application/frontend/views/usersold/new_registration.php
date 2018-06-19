<style>
	.btn.disabled, .btn[disabled], fieldset[disabled] .btn {
   opacity: 1.65 !important;
}
p {
    margin: 0 0 3px !important;
}	
.right_sign h6 {
    font-size: 21px;
    line-height: 26px;
	color:1c1c1c;
}
.acc_ess2 {
    font-family: "MyriadPro-Regular";
    font-size: 22px;
    font-weight: 800;
    padding: 30px 0 10px !important;
}	
.income-content .income-sidebar .member-ship-check {
    margin-top: -15px;
}	
</style>
<div class="income-content">
	  <div class="container">
		 <div class="col-sm-5 col-order">
			  <div class="income-sidebar">
			<form id="new_registration" action="<?php echo BASEURL; ?>/users/new_registration" method="post">
			   <div class="col-sm-12">
			  <h3><i class="fa fa-check" aria-hidden="true"></i> <strong>STEP 1:</strong> Enter Account Information</h3>
              </div>
			  <div class="col-sm-12">
				   <?php
				 $msg =  $this->session->flashdata('msg');
				  echo (isset($msg) && !empty($msg))? '<span style="color:red !important;">'.$msg.'</span>':'';?>
			  <div class="form-group">
			   <input type="text" class="form-control" name="fname" placeholder="Enter Your First Name" />	  
			   <input type="hidden" name="reference_by" value="<?php echo $reference_by;?>"/>
				  <input type="hidden" name="direct_referal" value="<?php echo $direct_referal;?>"/>
			   
			 </div>
			  </div>
			 <div class="col-sm-12">
			  <div class="form-group">
			   <input type="text" class="form-control" name="lname" placeholder="Enter Your Last Name" />	  
			 </div>
			 </div>
			 <div class="col-sm-12">
			  <div class="form-group">
			   <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" />	  
			 </div>
			 </div>
			 <div class="col-sm-12">
			  <div class="form-group">
			   <input type="text" class="form-control"  name="phone" placeholder="Enter Your Phone Number " />	  
			 </div>
			  <div class="form-group">
			   <input type="text" class="form-control" name="username"  placeholder="Create Your Username" />	  
			 </div>
			 </div>
			 <div class="col-sm-12">
			 <div class="form-group">
			   <input type="password" class="form-control" name="password" placeholder="Enter Your New Password" />	  
			 </div>
			 </div>
			 <div class="col-sm-12">
			  <h3><i class="fa fa-check" aria-hidden="true"></i> <strong>STEP 2:</strong> Enter Billing Address</h3>
			  </div>
			 <div class="col-sm-12">
			  <div class="form-group">
			   <input type="text" class="form-control" name="street_address" placeholder="Street Address" />	  
			 </div>
			 </div>
			 <div class="col-sm-12">
			  <div class="form-group">
			   <input type="text" class="form-control"  name="city_name" placeholder="City Name" />	  
			 </div>
			 </div>
			 <div class="col-sm-8">
			  <div class="form-group">
			   <input type="text" class="form-control" name="state" id="billing_state" placeholder="State / Province" data-stripe="address_state"/>	  
			 </div>
			 </div>
			 <div class="col-sm-4">
			  <div class="form-group">
			   <input type="text" class="form-control" name="zip_code" id="billing_zip" placeholder="Zip Code" data-stripe="address_zip"/>	  
			 </div>
			 </div>
			 <div class="col-sm-12">
			  <div class="form-group">
			   <input type="text" class="form-control" name="country"  placeholder="Country" />	  
			 </div>
			 </div>
			 <div class="col-sm-12">
			  <h3><i class="fa fa-check" aria-hidden="true"></i> <strong>STEP 3:</strong> Enter Payment Information</h3>
			  </div>
			  <div class="col-sm-8">
			  <div class="form-group">
			   <input type="text" class="form-control" name="credit_card_no" data-stripe="number" id="credit_card_number" placeholder="Credit Card Number" />	  
			 </div>
			 </div>
			 <div class="col-sm-4">
			  <div class="form-group">
			   <input type="text" class="form-control" name="cvc" placeholder="CVC Code" data-stripe="cvc" id="cvc" />	  
			 </div>
			 </div>
			 
			 <div class="col-sm-6">
			  <div class="form-group">
			   <input type="text" class="form-control" name="expiry_month" placeholder="MM" data-stripe="exp-month" />	  
			 </div>
			 </div>
			 <div class="col-sm-6">
			  <div class="form-group">
			   <input type="text" class="form-control" name="expiry_year" data-stripe="exp-year" placeholder="YYYY" />	  
			 </div>
			 </div>
			 <div class="col-sm-6">
			  <div class="form-group visa-img">
			    <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/payment-method-img.png" /> 
			 </div>
			 </div>
			 
			 <div class="col-sm-12">
			   <h2>Order Summary</h2>	 
		     </div>
			 <div class="col-sm-12 ">
			  <div class="form-group">
			  <div class="member-ship">
			   <h4 style="font-weight:bold"> Easy Cash Code Membership <Span class="price">Price: <span style="color:#d50300">$18.00</span></span></h4>
			  </div>
			   </div>
			  <div class="form-group">
			    <div class="checkbox member-ship-check">
				<label style="font-size: 13px;">
					<input type="checkbox" name="terms"/>
					<span class="cr" style="background:white;"><i class="cr-icon fa fa-check"></i></span>
					        I understand that I’m signing up for the Easy Cash Code system for a one-time fee of $18.<strong> All sales are non-refundable.</strong>  By checking this, I am agreeing to this purchase agreement.
				</label>
				</div>
			  </div>
			 
			 </div> 
			
			 <div class="col-sm-12 ">
			  <div id="registervalidating"></div>
			  <div class="form-group">
			   <button type="submit" class="btn btn-success btn-block" name="sbtbtn"><span id="get_access_now_icon"></span>&nbsp;Complete My Order</button>
			  </div> 
			  
			  
			   
			  <?php  if($total_sale==1){ ?>
				    <?php  if(!empty($direct_referal)){  ?>
			 <h4 style="font-weight:bold;text-align:center;">Referred By : <?php $name= payment_referal_name($direct_referal); 
				 echo $name['fname'].' '.$name['lname'];
				 ?></h4>
			   <?php  } ?>
				 
				 
				<?php } else { ?>
			 <?php  if(!empty($reference_by)){  ?>
			 <h4 style="font-weight:bold;text-align:center;">Referred By : <?php echo $reference_name; ?></h4>
			   <?php  } } ?>
			 </div>
			 

			</form> 
				  <div class="clearfix"></div>
			</div>	  
			 	
			  <section>
			  <div class="col-sm-12 patner" style="margin-top:15px">
			  <img class="img-responsive" src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/safe-img.png" />	
		   </div>
		</section>
	     </div>
		 
		 <div class="col-sm-7 income-right-side">
		   <div class="col-sm-12 text-center">
			 <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/income-earn.png" />   
			</div>	
			 
			<section>
				<div class="col-sm-12 acc_ess2">
					<p style="text-indent: 40px;">Today you will get access to:</p>  
				</div>
			</section>  
			 
			<div class="row">
			
			<div class="col-sm-12 ">
			<ul class="right_sign padding">
			<li><h6>A Funded Proposal System That Will Help You Rake In
Leads for Your Primary Business.</h6></li>
			</ul>
			    
			</div>
		
			</div>
			<div class="row">
			
			<div class="col-sm-12 ">
			<ul class="right_sign padding">
			<li><h6>30 Day Pre-Written Email Marketing Series That Will
Sell for You on Complete Auto-Pilot.</h6></li>
			</ul>
			    
			</div>
			
			</div>
			
			<div class="row">
			<div class="col-sm-12 ">
			<ul class="right_sign padding">
			<li><h6>10+ Hours of Training That Will Help You Become A
Marketing Expert and Make Money Online.</h6></li>
			</ul>
			    
			</div>
			
			
			</div>
			<div class="row">
			<div class="col-sm-12 ">
			<ul class="right_sign padding">
			<li><h6>Access to Our Private Mastermind Group to Shorten
Your Learning Curve.</h6></li>
			</ul>
			    
			</div>
			
			
			
			</div>
			<div class="row">
			<div class="col-sm-12">
			<ul class="right_sign  padding">
			<li><h6>Rights to Resell This System and Earn 100% Commissions
On Unlimited $18 Payments and More.</h6></li>
			</ul>
			    
			</div>
			
		
			</div>
			 
			 
		   <div class="testimonials">	
			<div class="col-sm-12 heading-img">
			 <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/testimonials-text-img.png"  style="margin-top: 10%;"/>
		    </div>			
			<div class="col-sm-12">
			 <div class="media">
			  <a class="media-left" href="#">
				<img class="media-object" src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/jay-img.png" >
			  </a>
			  <div class="media-body">				
				 <p>“I can't believe how simple it is to earn money with the Easy Cash Code System. I was able to generate $243 in commissions my first 3 days just by sharing my referral link on Facebook.” </p>			    <h4 class="media-heading">~ Jay Hafling</h4>
			  </div>
			 </div>			 	
			</div>
			<div class="col-sm-12">
			 <div class="media">
			  <a class="media-left" href="#">
				<img class="media-object" src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/Lauren-pic.png" >
			  </a>
			  <div class="media-body">				
				 <p>“Being a stay at home mom, I was able to earn an extra $900 my first month. This is so much fun and now I'm able to add another revenue stream in our household.” </p>			    <h4 class="media-heading">~ Lauren Williams</h4>
			  </div>
			 </div>			 	
			</div>
			<div class="col-sm-12">
			 <div class="media">
			  <a class="media-left" href="#">
				<img class="media-object" src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/yvonne-pic.png" >
			  </a>
			  <div class="media-body">				
				 <p>“This system is like nothing I've ever seen in the 16 years that I've been in the home business industry. Easy Cash Code really makes it simple to build multiple income streams simultaneously! It's brilliant.” </p>			    <h4 class="media-heading">~ Yvonne Anderson</h4>
			  </div>
			 </div>			 	
			</div>
			<div class="col-sm-12">
			 <div class="media">
			  <a class="media-left" href="#">
				<img class="media-object" src="<?php echo FRONT_END_LAYOUT; ?>/assets/new_registration/images/jason-pic.png" >
			  </a>
			  <div class="media-body">				
				 <p>“I struggled for years in different home businesses. Now I'm earning more money than I ever have with the Easy Cash Code System. My residual income is already up to $3560 in 3 months. I'm so excited that I can't sleep lol.” </p>			    <h4 class="media-heading">~ Jason Martinez</h4>
			  </div>
			 </div>			 	
			</div>
			
			
		   </div>
		 </div>
		 </div>
	 <div class="ip_address col-sm-12 ip_address text-center" style="color:red;">Your ip address is : &nbsp; <b><?php echo $_SERVER['REMOTE_ADDR'];?></b> </div>
	  </div>