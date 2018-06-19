<div style="text-align:center;font-size: 30px;font-size: 30px;font-size: 30px;">Please do not close or refresh the browser window</div>
<div class="img" style="text-align:center;">
<img src='<?php echo FRONT_END_LAYOUT; ?>/assets/images/ajax-load.gif' style="margin:auto !important" />
</div>
<?php 
  $paypal_url = PAYPAL_URL;
  
if($paypal_url == 1)
{ 
	$url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	
}
else{
	
	$url = 'https://www.paypal.com/cgi-bin/webscr';
		
} 

  ?>

<?php
$custom_variable['fname']=$post_data['fname'];
$custom_variable['lname']=$post_data['lname'];
$custom_variable['email']=$post_data['email'];
$custom_variable['phone_no']=$post_data['phone_no'];
$custom_variable['display_name']=$post_data['display_name'];
$custom_variable['password']=$post_data['password'];
$custom_variable['reference_by']=$post_data['reference_by'];
$custom_variable['reference_name']=$post_data['reference_name'];
$custom_variable['direct_referal']=$post_data['direct_referal'];

$custom_data="";
foreach($custom_variable as $key=>$val){

$custom_data.=$key."=".base64_encode($val)."&";

}
$custom_data=substr($custom_data,0,strlen($custom_data)-1);
?>

<!-- fname=<?php echo $post_data['fname']; ?>&lname=<?php echo $post_data['lname']; ?>&email=<?php echo $post_data['email']; ?>&phone_no=<?php echo $post_data['phone_no'];?>&display_name=<?php echo $post_data['display_name']; ?>&password=<?php echo $post_data['password']; ?>&reference_by=<?php echo $post_data['reference_by']; ?>&reference_name=<?php echo $post_data['reference_name']; ?> -->
<form class="form" id="paypal-form" method="post" action="<?php echo $url; ?>">
   
   
	<input type="hidden" name="business" value="<?php echo $referal_data['paypal_email'];?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php echo PAYPAL_ITEM_NAME;  ?>">
    <input type="hidden" name="amount" value="<?php echo PAYPAL_AMT;  ?>">
    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY_CODE;  ?>">
	
<input type="hidden" name="custom" value="<?php echo $custom_data; ?>">

   <input type="hidden" name="return" value="<?php echo BASEURL;?>/users/paypal_success_return">
    <input type="hidden" name="notify_url" value="<?php echo BASEURL;?>/users/paypal_success/">	
     
</form>	
 
<script type="text/javascript">
   
   document.getElementById('paypal-form').submit();
  
</script>
