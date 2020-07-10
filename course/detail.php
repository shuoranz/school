<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 

//Create Topic Object
$course = new CourseModel;
//Create User Object
$user = new User;

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/course_detail.php');

//Assign Variables to template object
if (!isset($_GET["cid"]) || empty($_GET["cid"])) {
	//redirect
	echo "no cid, TODO: redirect";
} else {
	$courseId = (int)$_GET["cid"];
}

$template->course = $course->getCourseById($courseId);
$template->videos = $course->getCourseVideosByCourseId($courseId);

//Display template
echo $template;

?>