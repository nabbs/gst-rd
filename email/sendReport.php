<?php
define("DIR_UPLOAD_SITE", dirname(dirname(__FILE__)).'/south-carolina-cts/',true);
include("class.phpmailer.php");
$mail = new PHPMailer();
$body ='This is a reporting mail' ;
$mail->IsHTML(true);

$mail->AddAddress($_REQUEST["to"]);
$mail->Subject =  (strip_tags(stripslashes($_REQUEST["subject"])));
$mail->MsgHTML($body);

$mail->AddAttachment("../case/upload/file/reports/".$_REQUEST['filename']);

if(!$mail->Send()) {
	echo "There was an error sending the message";
	exit;
}
	echo "Message was sent successfully"; die;
?>
