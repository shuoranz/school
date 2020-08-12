<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 

//Create Topic Object
$course = new CourseModel;
//Create User Object
$user = new User;

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/course_category_page.php');

//Assign Variables to template object


//$categroyId = !isset($_GET["category"]) || $_GET["category"] == 0 ? "" : (int)$_GET["category"];



//Display template
echo $template;

?>