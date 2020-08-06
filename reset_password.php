<?php 
	$pre_position = "";
	include('core/init.php');
?>
<?php
	$template = new Template('templates/login_reset_password.php');
	if (!isset($_REQUEST["token"]) || empty($_REQUEST["token"])){
		$template->error_msg = "error 504, wrong parameter, please contact the administrator";
		echo $template;
		exit();
	}
	$user = new User;
	$token = $_REQUEST["token"];
	if(isset($_POST['do_reset_password']))
	{
		if(!isset($_POST['emailaddress']) || !isset($_POST['password']) || !isset($_POST['password2']) || !isset($_POST['token'])){
			$template->error_msg = "error 504, wrong parameter, please contact the administrator";
		} else if (empty($_POST['emailaddress']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['token'])){
			$template->error_msg = "error 504, wrong parameter, please contact the administrator";
		} else if ($_POST['password'] != $_POST['password2']) {
			$template->error_msg = "error, password not match, please contact the administrator";
		} else {
			$result = $user->resetUserByToken($token, $_POST['emailaddress'], md5($_POST['password']));
			if ($result) {
				$template->error_msg = "we have reset your password, please click <a href='/login/'>here</a> to login.";
			} else {
				$template->error_msg = "error 504, wrong parameter, please contact the administrator";
			}
		}
	} else {
		$result = $user->validToken($token);
		if ($result){
			$template->token = $token;
		} else {
			$template->error_msg = "error 504, wrong token, please contact the administrator";
		}
	}
	
	
	echo $template;
?>