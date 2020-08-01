<?php 
	$pre_position = "";
	include('core/init.php');
?>
<?php
	$returnUrl = isset($_GET['url']) ? $_GET['url'] : "";
    if(isset($_POST['do_login'])){
        //get username and password
        //$username = $_POST['username'];
        $loginEmail = $_POST['emailaddress'];
		$password = md5($_POST['password']);
        //Create user object
        $user = new User;
        
        if($user->login($loginEmail, $password)){
            //echo('index.php You have been logged in. success');
			if ($returnUrl != "") {
				redirect('/'.$returnUrl,'You have been logged in', 'success');
			}
			if(isTeacherOrAbove()){
				redirect('/dashboard/','You have been logged in', 'success');
			} else {
				redirect('/course/','You have been logged in', 'success');
			}
        } else {
			redirect('/login','Invalid login', 'error');
        }
    } else {
        //redirect('index.php');
    }
	$template = new Template('templates/login_student.php');
	echo $template;
?>