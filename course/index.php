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

$template->courses = $course->getAllCourses();

$videos = array();
foreach($template->courses as $oneCourse){
	$courseId = $oneCourse["id"];
	$videos[$courseId] = $course->getCourseVideosByCourseId($courseId);
}
$template->videos = $videos;

//Display template
echo $template;

?>