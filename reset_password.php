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
	if(isset($_POST['do_reset_password'])){
		$result = $user->resetUserByToken($token, $_POST['emailaddress'], md5($_POST['password']));
		if ($result) {
			$template->error_msg = "we have reset your password, please click <a href='/login/'>here</a> to login.";
		} else {
			$template->error_msg = "error 504, wrong parameter, please contact the administrator";
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