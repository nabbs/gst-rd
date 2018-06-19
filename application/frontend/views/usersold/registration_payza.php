<div style="text-align:center;font-size: 30px;font-size: 30px;font-size: 30px;">Please do not close or refresh the browser window</div>
<div class="img" style="text-align:center;">
<img src='<?php echo FRONT_END_LAYOUT; ?>/assets/images/ajax-load.gif' style="margin:auto !important" />
</div>
<?php 
  $paypal_url = PAYPAL_URL;
if($paypal_url == 1)
{ 
	$url = 'https://secure.payza.com/checkout';
	
}
else{
	
	$url = 'https://secure.payza.com/checkout';
		
} 

  ?>
<form method="post" id="payzaa-form" action="<?php echo $url; ?>">
    <input type="hidden" name="ap_merchant" value="<?php echo $referal_data['payzaa_email'];?>"/>
    <input type="hidden" name="ap_purchasetype" value="item"/>
    <input type="hidden" name="ap_itemname" value="<?php echo $this->config->item('payzaa_description');?>"/>
    <input type="hidden" name="ap_amount" value="<?php echo $this->config->item('payzaa_reg_amount');?>"/>
    <input type="hidden" name="ap_currency" value="<?php echo $this->config->item('payzaa_currency');?>"/>
    <input type="hidden" name="ap_quantity" value="1"/>
    <input type="hidden" name="ap_description" value="<?php echo $this->config->item('payzaa_description');?>"/>
	
	<input type="hidden" name="apc_1" value="fname=<?php echo $post_data['fname']; ?>&lname=<?php echo $post_data['lname']; ?>&email=<?php echo $post_data['email']; ?>&phone_no=<?php echo $post_data['phone_no'];?>&display_name=<?php echo $post_data['display_name']; ?>&password=<?php echo $post_data['password']; ?>&reference_by=<?php echo $post_data['reference_by']; ?>&reference_name=<?php echo $post_data['reference_name']; ?>&direct_referal=<?php echo $post_data['direct_referal']; ?>">
	
     <input type="hidden" name="ap_returnurl" value="<?php echo BASEURL; ?>/users/pazaa_success_return"/>
	 <input type="hidden" name="ap_alerturl" value="<?php echo BASEURL; ?>/users/payzaa_success" />
    <input type="hidden" name="ap_cancelurl" value="<?php echo BASEURL; ?>/users/pazaa_success_return"/>
     
</form>

 
<script type="text/javascript">
   
   document.getElementById('payzaa-form').submit();
  
</script>
