<?php $reference = $this->session->userdata('reference_data');
?>
<body id="landing-page">
<div id="content">
  <div class="container">
   <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offset-0 box">
    <div class="col-sm-12 video-and-iframe">
</div> 
<div >
    
    <div class="col-sm-12 join">
	<form action="<?php echo BASEURL;?>/users/stripe_payment/" method="post" id="payment">
          <div class="col-sm-12 notice">
		  <input type="radio" name="pay" value="stripe" id="r1">Pay With Stripe
		  <input type="radio" name="pay" value="paypal" id="r1">Pay With paypal
  </div>
     <button type="submit" name="payment">Pay</button>
	 </form>
	</div>
    </div>
  </div>
<div class="push"></div>
</div>


</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$( "#payment" ).submit(function() {
	     var value =  $('input[name="pay"]:checked').val();
		 if(value=='stripe'){
		 var stripeToken=$("#stripeToken").length;
		if(stripeToken==0){
			 var token = function(res){
				var $input = $("<input type='hidden' name='stripeToken' id='stripeToken' />").val(res.id);
				$('#payment').append($input).submit();
			 };
		
			 	StripeCheckout.open({
				key:         'pk_test_dHrg4pmsIlYnxewjnEfkgCX1',
				address:     false,
				amount:      1800,
				currency:    'usd',
				name:        'Pay with Stripe',
				description: 'Stinson Marketing Group',
				panelLabel:  'Checkout',
				token:      token,
			});
		  return false;
		} 
			 
			 }
		 
		});
	});


	
</script>	
