<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 

//Create Topic Object
$course = new CourseModel;
//Create User Object
$user = new User;

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/search_videos.php');

//Assign Variables to template object

/*
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
*/

$search_title = !isset($_GET["title"]) || $_GET["title"] == "" ? "" : $_GET["title"];
$search_teacher =  !isset($_GET["teacher"]) || $_GET["teacher"] == "" ? "" : $_GET["teacher"];

$template->videos = $course->searchVideosByAttribute($search_title, $search_teacher);


//Display template
echo $template;

?>