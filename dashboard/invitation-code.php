<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
//Create Topic Object
//$topic = new TopicModel;
//Create User Object
//$user = new User;
$ic = new InvitationCodeModel;
//Get Template and Assign Vars
$template = new Template('templates/invitation_code.php');
$template->invitationCodes = $ic->getAllInvitationCodes();
//Assign Variables to template object
/*
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
*/
//Display template
echo $template;

?>