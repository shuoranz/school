<?php 
	$pre_position = "";
	include('core/init.php');
?>
<?php

    if(isset($_POST['do_forgot_password'])){
		
        $loginEmail = $_POST['emailaddress'];
        //Create user object
        $user = new User;
        
		if ($user->isEmailAddressExist($loginEmail)){
			$user->sendResetPasswordEmail($loginEmail);
			exit();
		} else {
			redirect('/forgot_password/','we cannot find your email address', 'error');
		}
		
    } else {
        //redirect('index.php');
		//redirect('/forgot_password/','wrong parameters', 'error');
    }
	$template = new Template('templates/login_forgot_password.php');
	echo $template;
?>