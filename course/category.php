<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 
//Create Topic Object
$course = new CourseModel;
//Create User Object
$user = new User;

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/course_list.php');

//Assign Variables to template object

/*
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
*/

$categroyId = !isset($_GET["category"]) || $_GET["category"] == 0 ? "" : (int)$_GET["category"];
$perPage = 5;
if(!isset($_GET['p']) || (!is_numeric($_GET['p']) || strpos($_GET['p'], "."))) {
	redirect("/course/category/" . buildQueryStringExcept($_GET, "p") . "&p=1", "invalid URL parameters","error");
}
$courseCount = count($course->getAllCourses($categroyId,""));
if ($_GET['p'] > ceil($courseCount / $perPage) && ceil($courseCount / $perPage) > 0) {
	redirect("/course/category/" . buildQueryStringExcept($_GET, "p") . "&p=" . ceil($courseCount / $perPage), "invalid URL parameters","error");
} else if ($_GET['p'] <= 0) {
	redirect("/course/category/" . buildQueryStringExcept($_GET, "p") . "&p=1", "invalid URL parameters","error");
} 
$template->courses = $course->getPageCourses($categroyId,"", $_GET["p"], $perPage);
$pages = pagination($_GET["p"], ceil($courseCount / $perPage), 5);
$videos = array();
foreach($template->courses as $oneCourse){
	$courseId = $oneCourse["id"];
	$videos[$courseId] = $course->getCourseVideosByCourseId($courseId);
}
$template->videos = $videos;
$template->pages = $pages;
$template->pageMax = ceil($courseCount / $perPage);
//Display template
echo $template;

?>