<?php
function request($requestdata)
{		
	$host = "api.demo.globalgatewaye4.firstdata.com";
	$protocol = "https://";
	$uri = "/transaction/v12";
	extract($requestdata);
	$location = $protocol . $host . $uri;
	$request = array(
			'transaction_type' => $transaction_type,
			'amount' => $amount,
			'cc_expiry' => $cc_expiry,
			'cc_number' => $cc_number,
			'cardholder_name' => $cardholder_name,
			'reference_no' => $reference_no,
			'customer_ref' => $customer_ref,
			'reference_3' =>$reference_3,
			'gateway_id' => $gatewayid,
			'password' => $password,
	);

	$content = json_encode($request);


	$gge4Date = strftime("%Y-%m-%dT%H:%M:%S", time()) . 'Z';
	$contentType = "application/json";
	$contentDigest = sha1($content);
	$contentSize = sizeof($content);
	$method = "POST";

	$hashstr = "$method\n$contentType\n$contentDigest\n$gge4Date\n$uri";

	$authstr = 'GGE4_API ' . $keyid . ':' . base64_encode(hash_hmac("sha1", $hashstr, $hmackey, true));


	$headers = array( 
			"Content-Type: $contentType",
			"X-GGe4-Content-SHA1: $contentDigest",
			"X-GGe4-Date: $gge4Date",
			"Authorization: $authstr",
			"Accept: $contentType"
	);

	//Print the headers we area sending
   // var_dump($headers);


	//CURL stuff
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_URL, $location);

	//Warning ->>>>>>>>>>>>>>>>>>>>
	/*Hardcoded for easier implementation, DO NOT USE THIS ON PRODUCTION!!*/
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	//Warning ->>>>>>>>>>>>>>>>>>>>

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_HEADER, 1);

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

	//This guy does the job
	$output = curl_exec($ch);

	//echo curl_error($ch); 
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	$header = parseHeader(substr($output, 0, $header_size));
	$body = substr($output, $header_size);

	curl_close($ch);
	//Print the response header

	/* If we get any of this X-GGe4-Content-SHA1 X-GGe4-Date Authorization
	 * then the API call is valid */
	if (isset($header['authorization']))
	{
			//Ovbiously before we do anything we should validate the hash
		echo "<pre>";
			print_r(json_decode($body));
		echo "</pre>";
	}
	//Otherwise just debug the error response, which is just plain text
	else
	{
			echo $body;
	}
}

function parseHeader($rawHeader)
{
	$header = array();

	//http://blog.motane.lu/2009/02/16/exploding-new-lines-in-php/
	$lines = preg_split('/\r\n|\r|\n/', $rawHeader);

	foreach ($lines as $key => $line)
	{
			$keyval = explode(': ', $line, 2);

			if (isset($keyval[0]) && isset($keyval[1]))
			{
					$header[strtolower($keyval[0])] = $keyval[1];
			}
	}

	return $header;
}


/*Modify this acording to your firstdata api stuff*/
$firstdata['cc_number']='4111111111111111';   
$firstdata['cardholder_name']='Sumeesh Chawla';
$firstdata['reference_no']='23';
$firstdata['cc_expiry']='0418';   // in format mmyy
$firstdata['reference_3']='234';
$firstdata['amount']='20';
$firstdata['transaction_type']='00';
$firstdata['customer_ref']='11';
$firstdata['hmackey'] = "161Wwk_C03GyVE7~EBRVeyusUmPPPEwg";
$firstdata['keyid'] = "422411";
$firstdata['gatewayid'] = "SE9131-03";
$firstdata['password'] = "UsMdl4L9nIhlFi7WxsYWE6eGAPBIyDZi";		
request($firstdata);
