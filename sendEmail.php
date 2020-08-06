<?php 
	$pre_position = "";
	include('core/init.php');
	
	$phpMail = new MailModel();
	echo $phpMail->sendEmail();
?>