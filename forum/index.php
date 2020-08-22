<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 
if(!isLoggedIn()) {
	redirect("/login","Please login to view forum topics","error");
}
//Create Topic Object
$topic = new TopicModel;
//Create User Object
$user = new User;
//Get Template and Assign Vars
$template = new Template($pre_position.'templates/forum_list.php');
// how many rows shown in one page
$perPage = 20;
// max pagination links
$paginationNum = 5;
//Assign Variables to template object
$all_categories = $topic->getAllCategories();
// validate all get request parameters
$getParameters = $_GET;
$isURIValid = TRUE;
// name/value code: 
//'c'=> category, "" => all
//'ob' => order_by: 'cd'(default) => create_date, 'lc' => like_count, 'vc' => view_count, 'rc' => reply_count
//'desc' => 1(default) or 0(asc)
$conditions = array("c"=>"","ob"=>"cd","desc"=>1); 
// validate all parameters except 'page'...
foreach($getParameters as $name=>$value) {
	if(strcmp($name, "c") == 0) {
		$isCategoryValid = FALSE;
		foreach($all_categories as $category) {
			if ($category['id'] == $value) {
				$isCategoryValid = TRUE;
				break;
			}
		}
		if(!$isCategoryValid) {
			$isURIValid = FALSE;
		} else {
			$conditions["c"] = $value;
		}
	} else if (strcmp($name, "ob") == 0) {
		$obValues = array("cd", "lc","vc","rc");
		if(in_array($value, $obValues)) {
			$conditions["ob"] = $value;
		} else {
			$isURIValid = FALSE;
		}
	} else if (strcmp($name, "desc" ) == 0) {
		if($value == 1 || $value == 0) {
			$conditions["desc"] = $value;
		} else {
			$isURIValid = FALSE;
		}
	} else if (strcmp($name, "p") != 0) {
		$isURIValid = FALSE;
	}
}
// redirect if page is invalid
$topicCount = $topic->getTopicCountByConditions($conditions);
$redirectURI = $topic->buildRedirectURI($conditions);
if(!isset($_GET['p']) || (!is_numeric($_GET['p']) || strpos($_GET['p'], "."))) {
	redirect("/forum/" . $redirectURI . "p=1", "invalid URL parameters","error");
} else if ($_GET['p'] > ceil($topicCount / $perPage) && ceil($newsCount / $perPage) > 0) {
	redirect("/forum/" . $redirectURI . "p=" . ceil($topicCount / $perPage), "invalid URL parameters","error");
} else if ($_GET['p'] <= 0) {
	redirect("/forum/" . $redirectURI . "p=1","invalid URL parameters","error");
} else if(!$isURIValid) {
	redirect("/forum/" . $redirectURI . "p=" . $_GET['p'], "invalid URL parameters","error");
}
// get all topics on current page
$topics = $topic->getPageTopics($conditions, $_GET['p'], $perPage);
$topTopics = $topic->getTopTopics($conditions, $_GET['p'], $perPage);

$topics = array_merge($topTopics, $topics);

for ($i = 0; $i < count($topics);$i++) {
	// if currently logged user liked each topic
	$topics[$i]['liked'] = $topic->likedTopic($topics[$i]['id']);
	// formatting displayed date time
	$cur_date = $topics[$i]["create_date"];
	$topics[$i]['create_date'] = $cur_date; // DateFormatter($cur_date);
}
//Display template
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
$template->topics = $topics;
$template->pageMax = $pageMax;
$template->pages = $pages;
$template->categories = $all_categories;
echo $template;

?>