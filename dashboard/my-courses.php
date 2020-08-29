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
$template = new Template('templates/manage_course.php');

$categroyId = !isset($_GET["category"]) || $_GET["category"] == 0 ? "" : (int)$_GET["category"];
$template->courses = $courseModel->getAllCourses($categroyId, isAdmin()?"admin":getUser()['user_id']);
//$template->category = $courseModel->getCategoryById($categroyId);

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