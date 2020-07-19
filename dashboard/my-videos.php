<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
//Create Topic Object
//$topic = new TopicModel;
//Create User Object
//$user = new User;


$courseModel = new CourseModel;
//Get Template and Assign Vars
$template = new Template('templates/manage_video.php');

$categroyId = !isset($_GET["category"]) || $_GET["category"] == 0 ? "" : (int)$_GET["category"];
$courseId = !isset($_GET["course"]) || $_GET["course"] == 0 ? "" : (int)$_GET["course"];

$template->course = $courseModel->getCourseById($courseId);

$videos = array();
//foreach($template->courses as $oneCourse){
	//$courseId = $oneCourse["id"];
	$videos[$courseId] = $courseModel->getCourseVideosByCourseId($courseId);
//}
$template->videos = $videos;

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