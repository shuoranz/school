<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
//Create Topic Object
//$topic = new TopicModel;
//Create User Object
//$user = new User;

if(!isTeacherOrAbove()){
	redirect('/login/','You need to log in', 'success');
}
$courseModel = new CourseModel;
//Get Template and Assign Vars
$template = new Template('templates/manage_video.php');

$categroyId = !isset($_GET["category"]) || $_GET["category"] == 0 ? "" : (int)$_GET["category"];
$courseId = !isset($_GET["course"]) || $_GET["course"] == 0 ? "" : (int)$_GET["course"];

$userRole = isAdmin() ? "admin" : getUser()["user_id"];
$template->course = $courseModel->getCourseById($courseId);

$template->currentUser = getUser();
$videos = array();
//foreach($template->courses as $oneCourse){
	//$courseId = $oneCourse["id"];
	$videos[$courseId] = $courseModel->getCourseVideosByCourseId($courseId, $userRole);
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