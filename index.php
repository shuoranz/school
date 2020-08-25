<?php
	$pre_position = '';
	require('core/init.php'); 
?>
<?php 
//Create Topic Object
//$topic = new TopicModel;
//Create User Object
//$user = new User;

//Get Template and Assign Vars
$template = new Template('templates/frontpage.php');

//Assign Variables to template object
/*
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
*/
//Display template

$newsModel = new NewsModel;
$template->all_news = $newsModel->getHomepageNews(5);

$forumModel = new TopicModel;


$blogModel = new BlogModel;
$template->all_blog = $blogModel->getHomepageBlog(5);

echo $template;

?>