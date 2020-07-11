<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 
	//Create BlogModel Object
	$blog = new BlogModel;
	//Create User Object
	$user = new User;
	//Get Template and Assign Vars
	$template = new Template($pre_position.'templates/blog_list.php');
	// how many rows shown in one page
	$perPage = 5;
	// max pagination links
	$paginationNum = 5;

	// get necessary tag info for all blogs
	$all_blogs = $blog->getPageBlogs($_GET['p'], $perPage);
	$tags = array();
	$temp = preg_split('/,/', "");
	for ($i = 0; $i < count($all_blogs);$i++) {
		$tagsStr = $all_blogs[$i]['tag'];
		$tagsArr = preg_split('/,/',$tagsStr);
		$tags[] = array();
		for ($j = 0; $j < count($tagsArr);$j++) {
			if(strcmp($tagsArr[$j],"") != 0) {
				$tag_info = $blog->getTagNameById($tagsArr[$j]);
				$tags[$i][$tag_info['tag']] = $tag_info['tag_color'];
			}
		}
	}
	// formatting displayed date time
	date_default_timezone_set("Asia/Shanghai");
	for ($i = 0; $i < count($all_blogs);$i++) {
		$all_blogs[$i]['reply_num'] = $blog->getBlogReplyCount($all_blogs[$i]['id']);
		$cur_date = $all_blogs[$i];
		$ymd = preg_split("/[\s]+/", $cur_date["create_date"])[0];
		$hms = preg_split("/[\s]+/", $cur_date["create_date"])[1];
		$y = preg_split("/-/", $ymd)[0];
		$mo = preg_split("/-/", $ymd)[1];
		$d = preg_split("/-/", $ymd)[2];
		$h = preg_split("/:/", $hms)[0];
		$m = preg_split("/:/", $hms)[1];
		if (strcmp($ymd, date("Y-m-d") )==0) {
			$all_blogs[$i]['create_date'] = $h . ":" . $m;
		} else if (strcmp($y, date("Y") )== 0) {
			$all_blogs[$i]['create_date'] = $mo . "-" . $d;
		} else {
			$all_blogs[$i]['create_date'] = $ymd;
		}
	}

	// prepare pagination

	$pageMax = ceil($blog->getBlogCount() / $perPage);
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
	$template->tags = $tags;
	echo $template;
?>