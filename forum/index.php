<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 
//Create Topic Object
$topic = new TopicModel;
//Create User Object
$user = new User;
//Get Template and Assign Vars
$template = new Template($pre_position.'templates/forum_list.php');
// how many rows shown in one page
$perPage = 7;
// max pagination links
$paginationNum = 5;
//Assign Variables to template object
$topics = $topic->getAllTopics();

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
for ($i = 0; $i < count($topics);$i++) {
	$topics[$i]['liked'] = $topic->likedTopic($topics[$i]['id']);
	$cur_date = $topics[$i]["create_date"];
	$topics[$i]['create_date'] = DateFormatter($cur_date);
}
//Display template
$template->topics = $topics;
echo $template;

?>