<?php 
	$pre_position = "";
	include('core/init.php');
?>
<?php
    if(isset($_POST['do_login'])){
        //get username and password
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        //Create user object
        $user = new User;
        
        if($user->login($username, $password)){
            echo('index.php You have been logged in. success');
        } else {
			redirect('login.php','Invalid login', 'error');
        }
    } else {
        //redirect('index.php');
    }
	$template = new Template('templates/login_student.php');
	echo $template;
?>