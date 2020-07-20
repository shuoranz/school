<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    $blog = new BlogModel; 
    $blog_id = $_GET['id'];
    $cur_blog = $blog->getBlogById($blog_id);
    $template = new Template($pre_position.'templates/blog.php');
    $cur_blog['reply_num'] = $blog->getBlogReplyCount($blog_id);
    $cur_date = $cur_blog['create_date'];
    $ymd = preg_split("/[\s]+/", $cur_date)[0];
	$hms = preg_split("/[\s]+/", $cur_date)[1];
	$y = preg_split("/-/", $ymd)[0];
	$mo = preg_split("/-/", $ymd)[1];
	$d = preg_split("/-/", $ymd)[2];
	$h = preg_split("/:/", $hms)[0];
	$m = preg_split("/:/", $hms)[1];
	if (strcmp($ymd, date("Y-m-d") )==0) {
		$cur_blog['create_date'] = $h . ":" . $m;
	} else if (strcmp($y, date("Y") )== 0) {
		$cur_blog['create_date'] = $mo . "-" . $d;
	} else {
		$cur_blog['create_date'] = $ymd;
    }
    // view_count + 1 as user/guest visit this page,
    $blog->addOneBlogViewCount($blog_id, $cur_blog['view_count'] + 1);
    
    $template->blog = $cur_blog;
    $comments = $blog->getCommentsByBlog_id($blog_id);
    
    for($i = 0; $i < count($comments); $i++) {
        $comments[$i]['replies'] = array();
        $replies = $blog->getAllRepliesUnderComment($blog_id, $comments[$i]['id']);
        for($j = 0; $j < count($replies); $j++) {
            $comments[$i]['replies'][] = array();
            foreach($replies[$j] as $key=>$value) {
                $comments[$i]['replies'][$j][$key] = $value;
            }
        }
    }
    $template->comments = $comments;
    
    echo $template;
?>