<?php include('core/init.php'); ?>
<?php
      
	//Create user object
	$user = new User;
	
	if($user->logout()){
		redirect('/','You have been logged out.', 'success');
	} else {
		redirect('/','Something went wrong.', 'error');
	}

?>