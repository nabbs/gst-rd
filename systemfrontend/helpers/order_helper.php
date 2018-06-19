<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Date Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Get "now" time
 *
 * Returns time() or its GMT equivalent based on the config file preference
 *
 * @access	public
 * @return	integer
 */
//error_reporting(E_ALL);
//ini_set('display_errors', 0);

function authorized_net_data_onedata_payment($data){
			$auth_login = $data['authorizedLogin_id'];
			$trans_key = $data['authorizedTransaction_key'];
	
//**********************************************************************************	
			require_once 'Authorizeddotnet/vendor/autoload.php';
			define("AUTHORIZENET_LOG_FILE", "phplog");
	
			try
			{	
				$F_name = $data['bill_firstname'];
				$L_name = $data['bill_lastname'];
				$Email = $data['email'];
				$Address = $data['bill_address'];
				$State = $data['bill_state'];
				$Zipcode = $data['bill_zip'];
				$City = $data['bill_city'];
				$Company = $data['bill_company'];
				$Country = $data['bill_country'];
				$Cardnumber = $data['credit_card_no'];
				$Cvv = $data['cvc'];
				$exp_yr = $data['expiry_month'];
				$exp_month = $data['expiry_year'];
				$exp_str = $exp_month."-".$exp_yr;


				// Common setup for API credentials
				$merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($auth_login);
				$merchantAuthentication->setTransactionKey($trans_key);
				$refId = 'ref' . time();

				// Create the payment data for a credit card
				$creditCard = new net\authorize\api\contract\v1\CreditCardType();
				$creditCard->setCardNumber($Cardnumber);
				$creditCard->setExpirationDate($exp_str);
                                $creditCard->setCardCode($Cvv);
				$paymentOne = new net\authorize\api\contract\v1\PaymentType();
				$paymentOne->setCreditCard($creditCard);

				$billto = new net\authorize\api\contract\v1\CustomerAddressType();
				$billto->setFirstName($F_name);
				$billto->setLastName($L_name);
				$billto->setCompany($Company);
				$billto->setAddress($Address);
				$billto->setCity($City);
				$billto->setState($State);
				$billto->setZip($Zipcode);
				$billto->setCountry($Country);

				$paymentprofile = new net\authorize\api\contract\v1\CustomerPaymentProfileType();
				$paymentprofile->setCustomerType('individual');
				$paymentprofile->setBillTo($billto);
				$paymentprofile->setPayment($paymentOne);
				$paymentprofiles[] = $paymentprofile;

				$customerprofile = new net\authorize\api\contract\v1\CustomerProfileType();
				$customerprofile->setDescription("ECC Mobile Software Payment");
				$customerprofile->setMerchantCustomerId('NA');
				$customerprofile->setEmail($Email);
				$customerprofile->setPaymentProfiles($paymentprofiles);

				$customer = new net\authorize\api\contract\v1\CustomerDataType();
				$customer->setId('NA');
				$customer->setEmail($Email);	


				$user = new net\authorize\api\contract\v1\UserFieldType();
				$user->setname($F_name);
				$user->setvalue('NA');



				// Create a transaction
				$transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
				$transactionRequestType->setTransactionType( "authCaptureTransaction"); 
				$transactionRequestType->setAmount($data['amount']);
				$transactionRequestType->setPayment($paymentOne);
				$transactionRequestType->setbillTo($billto);
				$transactionRequestType->setCustomer($customer);


				$request = new net\authorize\api\contract\v1\CreateTransactionRequest();
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setTransactionRequest( $transactionRequestType);
				$request->setrefId($refId);


				$controller = new net\authorize\api\controller\CreateTransactionController($request);
				
				 $ip_address = $_SERVER['REMOTE_ADDR'];
				  if($ip_address=='122.180.85.226'){
					   $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
					} else {
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
				  }
			}catch (AuthnetARBException $e)
			{
				echo $e;
				echo $subscription;
			}
			if ($response != null){
				$tresponse = $response->getTransactionResponse();
				if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
					return "success";
				}else{
					return "Transaction Declined. Please check your Card details, if problem persist please contact admin";
				}
			}
			else{
				return "successwithwarning";
			}
		}

       		function authorized_net_data($data,$reference_data){
				$ci=& get_instance();
	          $authorize_gateway = $ci->config->item('authorize_payment_sandbox');
				if($authorize_gateway==1){
				  $authorize_payment = "SANDBOX";
				}else{
				 $authorize_payment = "PRODUCTION";
				}
				
			$auth_login = $reference_data['authorizedLogin_id'];
			$trans_key = $reference_data['authorizedTransaction_key'];
	
			//echo "<pre>";	
			//print_r($reference_data); 	die; 
//**********************************************************************************	
			require_once 'Authorizeddotnet/vendor/autoload.php';
			define("AUTHORIZENET_LOG_FILE", "phplog");
	
			try
			{	
				$F_name = $_POST['bill_firstname'];
				$L_name = $_POST['bill_lastname'];
				$Email = $_POST['email'];
				$Address = $_POST['bill_address'];
				$State = $_POST['bill_state'];
				$Zipcode = $_POST['bill_zip'];
				$City = $_POST['bill_city'];
				$Company = $_POST['bill_company'];
				$Country = $_POST['bill_country'];
				$Cardnumber = $_POST['credit_card_no'];
				$Cvv = $_POST['cvc'];
				$exp_yr = $_POST['expiry_month'];
				$exp_month = $_POST['expiry_year'];
				$exp_str = $exp_month."-".$exp_yr;


				// Common setup for API credentials
				$merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($auth_login);
				$merchantAuthentication->setTransactionKey($trans_key);
				$refId = 'ref' . time();

				// Create the payment data for a credit card
				$creditCard = new net\authorize\api\contract\v1\CreditCardType();
				$creditCard->setCardNumber($Cardnumber);
				$creditCard->setExpirationDate($exp_str);
                                $creditCard->setCardCode($Cvv);
				$paymentOne = new net\authorize\api\contract\v1\PaymentType();
				$paymentOne->setCreditCard($creditCard);

				$billto = new net\authorize\api\contract\v1\CustomerAddressType();
				$billto->setFirstName($F_name);
				$billto->setLastName($L_name);
				$billto->setCompany($Company);
				$billto->setAddress($Address);
				$billto->setCity($City);
				$billto->setState($State);
				$billto->setZip($Zipcode);
				$billto->setCountry($Country);

				$paymentprofile = new net\authorize\api\contract\v1\CustomerPaymentProfileType();
				$paymentprofile->setCustomerType('individual');
				$paymentprofile->setBillTo($billto);
				$paymentprofile->setPayment($paymentOne);
				$paymentprofiles[] = $paymentprofile;

				$customerprofile = new net\authorize\api\contract\v1\CustomerProfileType();
				$customerprofile->setDescription("ECC Onetime registration details");
				$customerprofile->setMerchantCustomerId('NA');
				$customerprofile->setEmail($Email);
				$customerprofile->setPaymentProfiles($paymentprofiles);

				$customer = new net\authorize\api\contract\v1\CustomerDataType();
				$customer->setId('NA');
				$customer->setEmail($Email);	


				$user = new net\authorize\api\contract\v1\UserFieldType();
				$user->setname($F_name);
				$user->setvalue('NA');



				// Create a transaction
				$transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
				$transactionRequestType->setTransactionType( "authCaptureTransaction"); 
				$transactionRequestType->setAmount(PAYPAL_AMT);
				$transactionRequestType->setPayment($paymentOne);
				$transactionRequestType->setbillTo($billto);
				$transactionRequestType->setCustomer($customer);


				$request = new net\authorize\api\contract\v1\CreateTransactionRequest();
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setTransactionRequest( $transactionRequestType);
				$request->setrefId($refId);


				$controller = new net\authorize\api\controller\CreateTransactionController($request);
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
			}catch (AuthnetARBException $e)
			{
				echo $e;
				echo $subscription;
			}
			if ($response != null){
				$tresponse = $response->getTransactionResponse();
				if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
					return "success";
				}else{
					return "Transaction Declined. Please check your Card details, if problem persist please contact admin";
				}
			}
			else{
				return "successwithwarning";
			}
		}


        function authorized_net_data_subscription($data){
	
	         
			$auth_login = $data['authorizedLogin_id'];
			$trans_key = $data['authorizedTransaction_key'];
	
//**********************************************************************************	
			require_once 'Authorizeddotnet/vendor/autoload.php';
			define("AUTHORIZENET_LOG_FILE", "phplog");
	
			try
			{	
				$F_name = $data['bill_firstname'];
				$L_name = $data['bill_lastname'];
				$Email = $data['email'];
				$Address = $data['bill_address'];
				$State = $data['bill_state'];
				$Zipcode = $data['bill_zip'];
				$City = $data['bill_city'];
				$Company = $data['bill_company'];
				$Country = $data['bill_country'];
				$Cardnumber = $data['credit_card_no'];
				$Cvv = $data['cvc'];
				$exp_yr = $data['expiry_month'];
				$exp_month = $data['expiry_year'];
				$exp_str = $exp_month."-".$exp_yr;


				// Common setup for API credentials
				$merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				
				$merchantAuthentication->setName($auth_login);
				$merchantAuthentication->setTransactionKey($trans_key);
				
				$refId = 'ref' . time();

				// Create the payment data for a credit card
				$creditCard = new net\authorize\api\contract\v1\CreditCardType();
				$creditCard->setCardNumber($Cardnumber);
				$creditCard->setExpirationDate($exp_str);
                $creditCard->setCardCode($Cvv);
				$paymentOne = new net\authorize\api\contract\v1\PaymentType();
				$paymentOne->setCreditCard($creditCard);

				$billto = new net\authorize\api\contract\v1\CustomerAddressType();
				$billto->setFirstName($F_name);
				$billto->setLastName($L_name);
				$billto->setCompany($Company);
				$billto->setAddress($Address);
				$billto->setCity($City);
				$billto->setState($State);
				$billto->setZip($Zipcode);
				$billto->setCountry($Country);

				$paymentprofile = new net\authorize\api\contract\v1\CustomerPaymentProfileType();
				$paymentprofile->setCustomerType('individual');
				$paymentprofile->setBillTo($billto);
				$paymentprofile->setPayment($paymentOne);
				$paymentprofiles[] = $paymentprofile;

				$customerprofile = new net\authorize\api\contract\v1\CustomerProfileType();
				$customerprofile->setDescription($data['description']);
				$customerprofile->setMerchantCustomerId('NA');
				$customerprofile->setEmail($Email);
				$customerprofile->setPaymentProfiles($paymentprofiles);

				$customer = new net\authorize\api\contract\v1\CustomerDataType();
				$customer->setId('NA');
				$customer->setEmail($Email);	


				$user = new net\authorize\api\contract\v1\UserFieldType();
				$user->setname($F_name);
				$user->setvalue('NA');



				// Create a transaction
				$transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
				$transactionRequestType->setTransactionType("authCaptureTransaction"); 
				$transactionRequestType->setAmount($data['amount']);
				$transactionRequestType->setPayment($paymentOne);
				$transactionRequestType->setbillTo($billto);
				$transactionRequestType->setCustomer($customer);


				$request = new net\authorize\api\contract\v1\CreateTransactionRequest();
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setTransactionRequest( $transactionRequestType);
				$request->setrefId($refId);

                 
				$controller = new net\authorize\api\controller\CreateTransactionController($request);
				$ip_address = $_SERVER['REMOTE_ADDR'];
				  if($ip_address=='122.180.85.226'){
					  $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
				  } else {
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
				  }
			}catch (AuthnetARBException $e)
			{
				echo $e;
				echo $subscription;
			}
			if ($response != null){
				$tresponse = $response->getTransactionResponse();
				if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
					return "success";
				}else{
					return "Transaction Declined. Please check your Card details, if problem persist please contact admin";
				}
			}
			else{
				return "successwithwarning";
			}
		}

        function authorized_net_data_one_time($data,$reference_data){
				
				
			$auth_login = $reference_data['authorizedLogin_id'];
			$trans_key = $reference_data['authorizedTransaction_key'];
	
			//echo "<pre>";	
			//print_r($reference_data); 	die; 
//**********************************************************************************	
			require_once 'Authorizeddotnet/vendor/autoload.php';
			define("AUTHORIZENET_LOG_FILE", "phplog");
	
			try
			{	
				$F_name = $_POST['bill_firstname'];
				$L_name = $_POST['bill_lastname'];
				$Email = $_POST['email'];
				$Address = $_POST['bill_address'];
				$State = $_POST['bill_state'];
				$Zipcode = $_POST['bill_zip'];
				$City = $_POST['bill_city'];
				$Company = $_POST['bill_company'];
				$Country = $_POST['bill_country'];
				$Cardnumber = $_POST['credit_card_no'];
				$Cvv = $_POST['cvc'];
				$exp_yr = $_POST['expiry_month'];
				$exp_month = $_POST['expiry_year'];
				$exp_str = $exp_month."-".$exp_yr;


				// Common setup for API credentials
				$merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($auth_login);
				$merchantAuthentication->setTransactionKey($trans_key);
				$refId = 'ref' . time();

				// Create the payment data for a credit card
				$creditCard = new net\authorize\api\contract\v1\CreditCardType();
				$creditCard->setCardNumber($Cardnumber);
				$creditCard->setExpirationDate($exp_str);
                                $creditCard->setCardCode($Cvv);
				$paymentOne = new net\authorize\api\contract\v1\PaymentType();
				$paymentOne->setCreditCard($creditCard);

				$billto = new net\authorize\api\contract\v1\CustomerAddressType();
				$billto->setFirstName($F_name);
				$billto->setLastName($L_name);
				$billto->setCompany($Company);
				$billto->setAddress($Address);
				$billto->setCity($City);
				$billto->setState($State);
				$billto->setZip($Zipcode);
				$billto->setCountry($Country);

				$paymentprofile = new net\authorize\api\contract\v1\CustomerPaymentProfileType();
				$paymentprofile->setCustomerType('individual');
				$paymentprofile->setBillTo($billto);
				$paymentprofile->setPayment($paymentOne);
				$paymentprofiles[] = $paymentprofile;

				$customerprofile = new net\authorize\api\contract\v1\CustomerProfileType();
				$customerprofile->setDescription("ECC Software Licensing Admin Fee");
				$customerprofile->setMerchantCustomerId('NA');
				$customerprofile->setEmail($Email);
				$customerprofile->setPaymentProfiles($paymentprofiles);

				$customer = new net\authorize\api\contract\v1\CustomerDataType();
				$customer->setId('NA');
				$customer->setEmail($Email);	


				$user = new net\authorize\api\contract\v1\UserFieldType();
				$user->setname($F_name);
				$user->setvalue('NA');



				// Create a transaction
				$transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
				$transactionRequestType->setTransactionType( "authCaptureTransaction"); 
				$amount = STRIP_ADMIN_ONE_TIME/100;
				$transactionRequestType->setAmount($amount);
				$transactionRequestType->setPayment($paymentOne);
				$transactionRequestType->setbillTo($billto);
				$transactionRequestType->setCustomer($customer);


				$request = new net\authorize\api\contract\v1\CreateTransactionRequest();
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setTransactionRequest( $transactionRequestType);
				$request->setrefId($refId);


				$controller = new net\authorize\api\controller\CreateTransactionController($request);
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
			}catch (AuthnetARBException $e)
			{
				echo $e;
				echo $subscription;
			}
			if ($response != null){
				$tresponse = $response->getTransactionResponse();
				if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
					return "success";
				}else{
					return "Transaction Declined. Please check your Card details, if problem persist please contact admin";
				}
			}
			else{
				return "successwithwarning";
			}
		}


            function authorized_net_data_onetime_product($data,$reference_data){
		     
		     $ci=& get_instance();
		     $ci->load->model('products_model');
		    $product_details=$ci->products_model->get_product_data($data['product_id']);
		     
		 
			$auth_login = $reference_data['authorizedLogin_id'];
			$trans_key = $reference_data['authorizedTransaction_key'];
	
			//echo "<pre>";	
			//print_r($reference_data); 	die; 
//**********************************************************************************	
			require_once 'Authorizeddotnet/vendor/autoload.php';
			define("AUTHORIZENET_LOG_FILE", "phplog");
	
			try
			{	
				$F_name = $data['bill_firstname'];
				$L_name = $data['bill_lastname'];
				$Email = $data['email'];
				$Address = $data['bill_address'];
				$State = $data['bill_state'];
				$Zipcode = $data['bill_zip'];
				$City = $data['bill_city'];
				$Company = $data['bill_company'];
				$Country = $data['bill_country'];
				$Cardnumber = $data['credit_card_no'];
				$Cvv = $data['cvc'];
				$exp_yr = $data['expiry_month'];
				$exp_month = $data['expiry_year'];
				$exp_str = $exp_month."-".$exp_yr;


				// Common setup for API credentials
				$merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
				$merchantAuthentication->setName($auth_login);
				$merchantAuthentication->setTransactionKey($trans_key);
				$refId = 'ref' . time();

				// Create the payment data for a credit card
				$creditCard = new net\authorize\api\contract\v1\CreditCardType();
				$creditCard->setCardNumber($Cardnumber);
				$creditCard->setExpirationDate($exp_str);
                                $creditCard->setCardCode($Cvv);
				$paymentOne = new net\authorize\api\contract\v1\PaymentType();
				$paymentOne->setCreditCard($creditCard);

				$billto = new net\authorize\api\contract\v1\CustomerAddressType();
				$billto->setFirstName($F_name);
				$billto->setLastName($L_name);
				$billto->setCompany($Company);
				$billto->setAddress($Address);
				$billto->setCity($City);
				$billto->setState($State);
				$billto->setZip($Zipcode);
				$billto->setCountry($Country);

				$paymentprofile = new net\authorize\api\contract\v1\CustomerPaymentProfileType();
				$paymentprofile->setCustomerType('individual');
				$paymentprofile->setBillTo($billto);
				$paymentprofile->setPayment($paymentOne);
				$paymentprofiles[] = $paymentprofile;

				$customerprofile = new net\authorize\api\contract\v1\CustomerProfileType();
				$customerprofile->setDescription($product_details['product_description']);
				$customerprofile->setMerchantCustomerId('NA');
				$customerprofile->setEmail($Email);
				$customerprofile->setPaymentProfiles($paymentprofiles);

				$customer = new net\authorize\api\contract\v1\CustomerDataType();
				$customer->setId('NA');
				$customer->setEmail($Email);	


				$user = new net\authorize\api\contract\v1\UserFieldType();
				$user->setname($F_name);
				$user->setvalue('NA');



				// Create a transaction
				$transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
				$transactionRequestType->setTransactionType( "authCaptureTransaction"); 
				$transactionRequestType->setAmount($product_details['product_amount']);
				$transactionRequestType->setPayment($paymentOne);
				$transactionRequestType->setbillTo($billto);
				$transactionRequestType->setCustomer($customer);


				$request = new net\authorize\api\contract\v1\CreateTransactionRequest();
				$request->setMerchantAuthentication($merchantAuthentication);
				$request->setTransactionRequest( $transactionRequestType);
				$request->setrefId($refId);


				$controller = new net\authorize\api\controller\CreateTransactionController($request);
				$response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
			}catch (AuthnetARBException $e)
			{
				echo $e;
				echo $subscription;
			}
			if ($response != null){
				$tresponse = $response->getTransactionResponse();
				if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
					return "success";
				}else{
					return "Transaction Declined. Please check your Card details, if problem persist please contact admin";
				}
			}
			else{
				return "successwithwarning";
			}
		}



