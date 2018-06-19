<?php 
	class email_model extends CI_Model { 
		function __construct()
		{
			parent::__construct();
			//$this->load->model("store_model");
			//$this->load->model("user_model");
		}
		/************************************************* Email functions starts **************************************************/	
		public function sendIndividualEmail($emailarr=array())
		{	
	        $this->load->model('profile_model');
			$response = $this->profile_model->default_settings(2);
			if($response['system_settings'] == 'Amazon')
			{
				//$this->send_email_amazon($emailarr);
				$this->send_Mail_amazon($emailarr);
			}
			else if($response['system_settings'] == 'SendGrid'){
				$this->send_email_sendgrid($emailarr);
			}
			else if($response['system_settings'] == 'Sparkpost'){
				$this->send_Mail_sparkpost($emailarr);
			}
			else if($response['system_settings'] == 'Mandrill'){
					
				$this->mandrill_send_mail($emailarr);
			}
		}
		public function mandrill_send_mail($emailarr=array()){
			try{
				//ini_set("include_path", '/home/easycashcode/php:' . ini_get("include_path") );
				include_once('php_mailer/PHPmailer/class.phpmailer.php');

			    $from = $this->config->item("adminemail");
				$mail = new PHPMailer();
			    
				$mail->IsSMTP(true); // SMTP
				$mail->SMTPAuth   = true;  // SMTP authentication
				$mail->Mailer = "mail";
				$mail->Host= "smtp.mandrillapp.com"; // Amazon SES
				$mail->Port = 587;  // SMTP Port
				$mail->Username =  mandrill_username;  // SMTP  Username
				$mail->Password = mandrill_password;  // SMTP Password
				
				$mail->SetFrom($from, $this->config->item("adminname"));
				$mail->AddReplyTo($from, $this->config->item("adminname"));
				$mail->Subject = $emailarr["subject"];
				$mail->MsgHTML($emailarr["message"]);
				$address = $emailarr['to'];
				$mail->AddAddress($address, $address);
			    if(!$mail->Send()){
					return false;
				}
				else{
					return true;
				}
				
				
				
			  }catch(Exception $e){
			    echo $e->getMessage();die;
			     
			  }
		
		}
		
		function send_Mail_sparkpost($emailarr=array())
				{
				
				ini_set("include_path", '/home/easycashcode/php:' . ini_get("include_path") );
				
				include_once ('php_mailer/PHPmailer/class.phpmailer.php');
				 
				$from = $this->config->item("adminemail");
				$mail = new PHPMailer();
				$mail->IsSMTP(true); // SMTP
				$mail->SMTPAuth   = true;  // SMTP authentication
				$mail->Mailer = "mail";
				$mail->Host= "smtp.sparkpostmail.com"; // Amazon SES
				$mail->Port = 587;  // SMTP Port
				$mail->Username =  sparkpost_username;  // SMTP  Username
				$mail->Password = sparkpost_password;  // SMTP Password
				
				$mail->SetFrom($from, $this->config->item("adminname"));
				$mail->AddReplyTo($from, $this->config->item("adminname"));
				$mail->Subject = $emailarr["subject"];
				$mail->MsgHTML($emailarr["message"]);
				$address = $emailarr["to"];
				$mail->AddAddress($address, $emailarr["to"]);
              
				if(!$mail->Send())
				{
			       
				return false;
				}
				else{
				 
				  return true;
				  
				 }
				}

		public function send_email_sendgrid($emailarr=array()){
		    if(!($emailarr['email_by']=='')){
			       
			        $reply_to = $emailarr['email_by'];
				   }else{
				   $reply_to = $this->config->item("adminemail");
				   }
			$url = 'https://api.sendgrid.com/';
			$user = sendgrid_username;
			$pass = sendgrid_password;
			$json_string = array(
			'to' => array(
			$emailarr["to"]
			)
			);
			$params = array(
			'api_user'  => $user,
			'api_key'   => $pass,
			'x-smtpapi' => json_encode($json_string),
			'to'        => $emailarr["to"],
			'subject'   => $emailarr["subject"],
			'html'      => $emailarr["message"],
			//'text'    => 'testing body',
			'from'      => $this->config->item("adminemail"),
			'fromname' => $this->config->item("adminname"),
			'replyto' => $reply_to
			);
			$request =  $url.'api/mail.send.json';
			// Generate curl request
			$session = curl_init($request);
			// Tell curl to use HTTP POST
			curl_setopt ($session, CURLOPT_POST, true);
			// Tell curl that this is the body of the POST
			curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
			// Tell curl not to return headers, but do return the response
			curl_setopt($session, CURLOPT_HEADER, false);
			// Tell PHP not to use SSLv3 (instead opting for TLS)
			curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
			// obtain response
			$response = curl_exec($session);
			curl_close($session);
			// print everything out
			//print_r($response);
		}
		public function sendIndividualEmail_mandrill($emailarr=array())
		{	
			$apikey = 'UebUpShDlB1LvuidQIBIZA';
			$mandrill = new Mandrill($apikey);
			$message = array(
			'html' => str_replace(array("\r\n","\n"),"<br />",$emailarr["message"]),
			'subject' => $emailarr["subject"],
			'from_email' => $this->config->item("adminemail"),
			'from_name' => $this->config->item("adminname"),
			'track_opens'=>true,		
			'important' => false,
			'track_clicks' => null,
			'auto_text' => null,
			'auto_html' => null,
			'inline_css' => null,
			'url_strip_qs' => null,
			'preserve_recipients' => null,
			'view_content_link' => null,						
			'to' => array(
			array('email' => $emailarr["to"],'type' => 'to')
			),
			'headers' => array('Reply-To' => $emailarr['email_by'])				
			);
			if(!empty($emailarr['backend']) && $emailarr['backend']=='backend'){
				$res =  $mandrill->messages->send($message);
				}else{
				$mandrill->messages->send($message);
			}
		}
		function send_Mail_amazon($emailarr=array()){
		  
			   
				 
				ini_set("include_path", '/home/easycashcode/php:' . ini_get("include_path") );
				include_once('php_mailer/PHPmailer/class.phpmailer.php');
				$from = $this->config->item("adminemail");
				$mail = new PHPMailer();
				$mail->IsSMTP(true); // SMTP
				$mail->SMTPAuth   = true;  // SMTP authentication
				$mail->Mailer = "mail";
				$mail->Host= "tls://email-smtp.us-east.amazonaws.com"; // Amazon SES
				$mail->Port = 465;  // SMTP Port
				$mail->Username = amazon_username;  // SMTP  Username
				$mail->Password = amazon_password;  // SMTP Password
				$mail->AddReplyTo($emailarr['email_by'], $emailarr['email_by_name']);
				$mail->SetFrom($from, $this->config->item("adminname"));
				//$mail->SetReturnPath('karamjeet301@gmail.com');
				$mail->Subject = $emailarr["subject"];
				// $mail->MsgHTML(str_replace(array("\r\n","\n"),"<br />",$emailarr["message"]));
				$mail->MsgHTML($emailarr["message"]);
				$address = $emailarr["to"];
				$mail->AddAddress($address, $emailarr["to"]);				
				$mail->Sender = $this->config->item('bounce_email');
				if(!$mail->Send())
				{
				return false;
				}
				else{
				return true;
				}
				
			   
		}

		public function sendDatabaseEmail($emailarr=array()){	
			$attachment = file_get_contents($emailarr['file_path']);
			$attachment_encoded = base64_encode($attachment); 
			$apikey = 'UebUpShDlB1LvuidQIBIZA';
			$mandrill = new Mandrill($apikey);
			$message = array(
			'html' => str_replace(array("\r\n","\n"),"<br />",$emailarr["message"]),
			'subject' => $emailarr["subject"],
			'from_email' => $this->config->item("adminemail"),
			'from_name' => $this->config->item("adminname"),
			'track_opens'=>true,		
			'important' => false,
			'track_clicks' => null,
			'auto_text' => null,
			'auto_html' => null,
			'inline_css' => null,
			'url_strip_qs' => null,
			'preserve_recipients' => null,
			'view_content_link' => null,						
			'to' => array(
			array('email' => $emailarr["to"],'type' => 'to')
			),
			'attachments' => array(
			array('content' => $attachment_encoded,'name' => $emailarr['file_name'])
		    ),
            'headers' => array('Reply-To' => $emailarr['email_by'])				
			);

			$mandrill->messages->send($message);	
		}
	}	