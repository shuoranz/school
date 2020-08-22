<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
	//Create BlogModel Object
	$blog = new BlogModel;
	//Create User Object
	$user = new User;
	//Get Template and Assign Vars
	$template = new Template('templates/manage_blog.php');
	// how many rows shown in one page
	$perPage = 12;
	// max pagination links
	$paginationNum = 5;
	// get all categories
	$all_categories = $blog->getAllCategories();
	
	// validate all get request parameters
	$getParameters = $_GET;
	$isURIValid = TRUE;
	$conditions = array("c"=>"","ob"=>"cd","desc"=>1); 
	// redirect if page is invalid
	
	if (isAdminNormal()) {
		// get this admin news on current page
		$blogCount = $blog->getBlogCount(getUser()["user_id"]);
	} else {
		// get all blogs on current page
		$blogCount = $blog->getBlogCount();
	}
	
	$redirectURI = $blog->buildRedirectURI($conditions);
	if(!isset($_GET['p']) || (!is_numeric($_GET['p']) || strpos($_GET['p'], "."))) {
		redirect("/dashboard/blog" . $redirectURI . "p=1", "invalid URL parameters","error");
	} else if ($_GET['p'] > ceil($blogCount / $perPage) && ceil($blogCount / $perPage) > 0) {
		redirect("/dashboard/blog" . $redirectURI . "p=" . ceil($blogCount / $perPage), "invalid URL parameters","error");
	} else if ($_GET['p'] <= 0) {
		redirect("/dashboard/blog" . $redirectURI . "p=1","invalid URL parameters","error");
	} else if(!$isURIValid) {
		redirect("/dashboard/blog" . $redirectURI . "p=" . $_GET['p'], "invalid URL parameters","error");
	}
	
	if (isAdminNormal()) {
		// get this admin news on current page
		$all_blogs = $blog->getAllBlogs($conditions, $_GET['p'], $perPage, getUser()["user_id"]);
	} else {
		// get all blogs on current page
		$all_blogs = $blog->getAllBlogs($conditions, $_GET['p'], $perPage);
	}
	
	


	// prepare pagination
	$pageMax = ceil($blogCount / $perPage);
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
	$template->blogs = $all_blogs;
	$template->pageMax = $pageMax;
	$template->pages = $pages;
	$template->categories = $all_categories;
	echo $template;
?>