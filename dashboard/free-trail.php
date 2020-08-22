<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 

$template = new Template('templates/free_trail.php');

//Create User Object
$user = new User;



$template->users = $user->getAllDemoUsers();


//Display template
echo $template;

?>