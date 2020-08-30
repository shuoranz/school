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
$template = new Template('templates/manage_video_search.php');

$userRole = isAdmin() ? "admin" : getUser()["user_id"];

$search_title = !isset($_GET["title"]) || $_GET["title"] == "" ? "" : $_GET["title"];
$search_teacher =  !isset($_GET["teacher"]) || $_GET["teacher"] == "" ? "" : $_GET["teacher"];
$search_category =  !isset($_GET["category"]) || $_GET["category"] == "" ? "" : $_GET["category"];

$template->videos = $courseModel->searchVideosByAttributeAdmin($search_title, $search_teacher, $search_category, $userRole);

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