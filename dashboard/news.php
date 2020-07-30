<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
	//Create BlogModel Object
	$newsModel = new NewsModel;
	//Create User Object
	$user = new User;
	//Get Template and Assign Vars
	$template = new Template('templates/manage_news.php');
	// how many rows shown in one page
	$perPage = 7;
	// max pagination links
	$paginationNum = 5;
	// get all categories
	$all_categories = $newsModel->getAllCategories();
	
	// validate all get request parameters
	$getParameters = $_GET;
	$isURIValid = TRUE;
	// name/value code: 
	//'c'=> category, "" => all
	//'ob' => order_by: 'cd'(default) => create_date, 'lc' => like_count, 'vc' => view_count, 'rc' => reply_count
	//'desc' => 1(default) or 0(asc)
	$conditions = array("c"=>"","ob"=>"cd","desc"=>1); 


	// redirect if page is invalid
	$newsCount = $newsModel->getNewsCountByConditions($conditions);
	$redirectURI = $newsModel->buildRedirectURI($conditions);
	if(!isset($_GET['p']) || (!is_numeric($_GET['p']) || strpos($_GET['p'], "."))) {
		redirect("/news/" . $redirectURI . "p=1", "invalid URL parameters","error");
	} else if ($_GET['p'] > ceil($newsCount / $perPage) && ceil($newsCount / $perPage) > 0) {
		redirect("/news/" . $redirectURI . "p=" . ceil($newsCount / $perPage), "invalid URL parameters","error");
	} else if ($_GET['p'] <= 0) {
		redirect("/news/" . $redirectURI . "p=1","invalid URL parameters","error");
	} else if(!$isURIValid) {
		redirect("/news/" . $redirectURI . "p=" . $_GET['p'], "invalid URL parameters","error");
	}

	// get all news on current page
	$all_news = $newsModel->getPageNews($conditions, $_GET['p'], $perPage);


	// prepare pagination
	$pageMax = ceil($newsCount / $perPage);
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
	$template->all_news = $all_news;
	$template->pageMax = $pageMax;
	$template->pages = $pages;
	$template->categories = $all_categories;
	echo $template;
	

?>