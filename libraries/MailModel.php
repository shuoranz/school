<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class MailModel {
	private $mail;
    public function __construct()
	{
        $this->mail = new PHPMailer();
		$this->mail->IsSMTP();
		$this->mail->Mailer = "smtp";
    }
	public function sendEmail($subject, $content, $recipent_email, $recipent_name="")
	{
		if (empty($subject) || empty($content) ||  empty($recipent_email)) {
			return false;
		}
		$email_address = "shuorancompandsavetestacct@gmail.com";
		$password = "School13579!";
		$sender_name = "school test";
		
		$this->mail->SMTPDebug  = 0;  
		$this->mail->SMTPAuth   = TRUE;
		$this->mail->SMTPSecure = "tls";
		$this->mail->Port       = 587;
		$this->mail->Host       = "smtp.gmail.com";
		$this->mail->Username   = $email_address;
		$this->mail->Password   = $password;
		
		$this->mail->IsHTML(true);
		$this->mail->AddAddress($recipent_email, $recipent_name);
		$this->mail->SetFrom($email_address, $sender_name);
		$this->mail->AddReplyTo($email_address, $sender_name);
		//$this->mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
		$this->mail->Subject = $subject;
		//$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
		$this->mail->MsgHTML($content);
		
		if(!$this->mail->Send()) {
			//echo "Error while sending Email.";
			//var_dump($this->mail);
			return true;
		} else {
			return true;
		}
	}
}