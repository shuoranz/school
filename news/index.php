<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
	require($pre_position."/html-parser-master/src/ParserDom.php");	
?>
<?php 
	//Create BlogModel Object
	$newsModel = new NewsModel;
	//Create User Object
	$user = new User;
	//Get Template and Assign Vars
	$template = new Template($pre_position.'templates/news_list.php');
	// how many rows shown in one page
	$perPage = 20;
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
	$top_news = $newsModel->getTopNews($conditions, $_GET['p'], $perPage);
	
	$all_news = array_merge($top_news, $all_news);
	
	// get necessary tag info for all news, assign to $tags
	$tags = array();
	for ($i = 0; $i < count($all_news);$i++) {
		// get necessary tag info for all news, return to $tags
		$tagsStr = $all_news[$i]['tag'];
		$tagsArr = preg_split('/,/',$tagsStr);
		$tags[] = array();
		for ($j = 0; $j < count($tagsArr);$j++) {
			if(strcmp($tagsArr[$j],"") != 0) {
				$tag_info = $newsModel->getTagNameById($tagsArr[$j]);
				$tags[$i][$tag_info['tag']] = $tag_info['tag_color'];
			}
		}

		// formatting displayed date time
		$cur_date = $all_news[$i]["create_date"];
		$all_news[$i]['create_date'] = DateFormatter($cur_date);

		// if currently logged user liked each news
		$all_news[$i]['liked'] = $newsModel->likedNews($all_news[$i]['id']);

		// parse body html so only text is shown
		$html = $all_news[$i]['body'];
		$html = removeEmptyLinesAndReturnHtml($html);
		$html_dom = new \HtmlParser\ParserDom($html);
		$bodyContent = "";
		if ( count($html_dom->find('h1')) > 0 ) {
			$h1_array = $html_dom->find('h1');
			$h1_text = $h1_array[0]->getPlainText();
			$bodyContent = $h1_text;
		} else if (count($html_dom->find('h2')) > 0) {
			$h2_array = $html_dom->find('h2');
			$h2_text = $h2_array[0]->getPlainText();
			$bodyContent = $h2_text;
		} else if (count($html_dom->find('h3')) > 0) {
			$h3_array = $html_dom->find('h3');
			$h3_text = $h3_array[0]->getPlainText();
			$bodyContent = $h3_text;
		} else if (count($html_dom->find('p')) > 0 ) {
			$p_array = $html_dom->find('p');
			$p_text = $p_array[0]->getPlainText();
			$bodyContent = $p_text;
		} else {
			$bodyContent = "Read details...";
		}
		$all_news[$i]['body'] = $bodyContent;
	}

	// assign $tags back to $news['tag']
	for ($i = 0; $i < count($all_news);$i++) {
		$all_news[$i]['tag'] = array();
		foreach($tags[$i] as $tagName=>$tagColor) {
			$all_news[$i]['tag'][$tagName] = $tagColor;
		}
	}
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