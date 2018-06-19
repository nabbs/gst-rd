<?php
include("PHPMailerAutoload.php");
$mail = new PHPMailer();



if(!empty($_REQUEST["message"])){
	if(!empty($_REQUEST["token"]) && $_REQUEST["token"]=="email_pdf" ){
		$body = $_REQUEST["message"] ;
   }else{
        $body = $_REQUEST["message"] ;}
}else{
	
	
   $body = " Note : " . $_REQUEST["Note"] ."<br/>". " Note Date : " . $_REQUEST["NoteDate"] ."<br/>"." Note Added By : " . $_REQUEST["NoteAdded"] ."";
}


 // And the absolute required configurations for sending HTML with attachement
$mail->IsHTML(true);
//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.office365.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "krishna@patientfundingalternatives.com";

//Password to use for SMTP authentication
$mail->Password = "determined@123";

//Set who the message is to be sent from
$mail->setFrom('krishna@patientfundingalternatives.com', 'Admin-RevMax');


foreach(explode(",",$_REQUEST["email"]) as $key=>$val){
	$mail->AddAddress($val);
}
	$mail->Subject = "Encrypted email from Revmax: ".nl2br(strip_tags(stripslashes($_REQUEST["subject"])));
	$mail->MsgHTML($body);
	$mail->AddAttachment("../case/upload/file/application/".$_REQUEST["attachments"]);
if(!$mail->Send()) {
	echo "There was an error sending the message";
	exit;
}
	echo "Message was sent successfully";
?>
