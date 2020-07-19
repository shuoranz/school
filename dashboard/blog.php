<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
//Create Topic Object
$blogModel = new BlogModel;
//Create User Object
$user = new User;
//Get Template and Assign Vars
$template = new Template('templates/manage_blog.php');

//$template->invitationCodes = $ic->getAllInvitationCodes();
//Assign Variables to template object
/*
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
*/

// how many rows shown in one page
$perPage = 5;
// max pagination links
$paginationNum = 5;



$pageMax = ceil($blogModel->getBlogCount() / $perPage);
$pages = array($_GET['p']);
$left = $_GET['p'];
$right = $_GET['p'];
while( ($left - 1 > 0 || $right + 1 <= $pageMax) && ($right - $left + 1) < $paginationNum) {
	if($left - 1 > 0) {
		array_unshift($pages, $left - 1);
		$left--;
	}
	if($right + 1 <= $pageMax) {
		array_push($pages, $right + 1);
		$right++;
	}
}

$template->pageMax = $pageMax;
$template->pages = $pages;
$template->Blog = $blogModel->getPageBlogs($_GET['p'], $perPage);
//Display template
echo $template;

?>