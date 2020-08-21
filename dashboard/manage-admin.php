<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 

$template = new Template('templates/manage_admin.php');

//Create User Object
$user = new User;



$template->administrator = $user->getAllAdministrator();


//Display template
echo $template;

?>