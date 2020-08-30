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

if(!isset($_GET['p']) || (!is_numeric($_GET['p']) || strpos($_GET['p'], "."))) {
	redirect("/course/search_video" . copyAndSetPageURI($_GET, 1), "invalid URL parameters","error");
}

//Assign Variables to template object

/*
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
*/
$search_title = !isset($_GET["title"]) || $_GET["title"] == "" ? "" : $_GET["title"];
$search_teacher =  !isset($_GET["teacher"]) || $_GET["teacher"] == "" ? "" : $_GET["teacher"];
$resultCount = count($course->searchVideosByAttribute($search_title, $search_teacher));
$perPage = 7;
$pages = pagination($_GET["p"], ceil($resultCount / $perPage), 5);
if ($_GET['p'] > ceil($resultCount / $perPage) && ceil($resultCount / $perPage) > 0) {
	redirect("/course/search_video" . copyAndSetPageURI($_GET, ceil($resultCount / $perPage)), "invalid URL parameters","error");
} else if ($_GET['p'] <= 0) {
	redirect("/course/search_video" . copyAndSetPageURI($_GET, 1), "invalid URL parameters","error");
} 
$template->videos = $course->searchVideosByAttributeByPage($search_title, $search_teacher, $_GET["p"], $perPage);
$template->pages = $pages;
$template->pageMax = ceil($resultCount / $perPage);

//Display template
echo $template;

?>