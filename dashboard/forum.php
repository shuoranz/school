<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
	//Create TopicModel Object
	$forum = new TopicModel;
	//Create User Object
	$user = new User;
	//Get Template and Assign Vars
	$template = new Template('templates/manage_forum.php');
	// how many rows shown in one page
	$perPage = 12;
	// max pagination links
	$paginationNum = 5;
	// get all categories
	$all_categories = $forum->getAllCategories();
	
	// validate all get request parameters
	$getParameters = $_GET;
	$isURIValid = TRUE;
	$conditions = array("c"=>"","ob"=>"cd","desc"=>1); 
	// redirect if page is invalid
	$topicCount = $forum->getTotalTopics();
	
	
	$redirectURI = $forum->buildRedirectURI($conditions);
	if(!isset($_GET['p']) || (!is_numeric($_GET['p']) || strpos($_GET['p'], "."))) {
		redirect("/dashboard/forum" . $redirectURI . "p=1", "invalid URL parameters","error");
	} else if ($_GET['p'] > ceil($topicCount / $perPage) && ceil($topicCount / $perPage) > 0) {
		redirect("/dashboard/forum" . $redirectURI . "p=" . ceil($topicCount / $perPage), "invalid URL parameters","error");
	} else if ($_GET['p'] <= 0) {
		redirect("/dashboard/forum" . $redirectURI . "p=1","invalid URL parameters","error");
	} else if(!$isURIValid) {
		redirect("/dashboard/forum" . $redirectURI . "p=" . $_GET['p'], "invalid URL parameters","error");
	}
	
    // get all topics on current page
    $all_topics = $forum->getPageTopics($conditions, $_GET['p'], $perPage);


	


	// prepare pagination
	$pageMax = ceil($topicCount / $perPage);
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

	$template->isAdmin = isAdmin();
	$template->topics = $all_topics;
	$template->pageMax = $pageMax;
	$template->pages = $pages;
    $template->categories = $all_categories;
	echo $template;
?>