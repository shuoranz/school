<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    $newsModel = new NewsModel; 
    $news_id = $_GET['id'];
    $cur_news = $newsModel->getNewsById($news_id);

    $template = new Template($pre_position.'templates/news.php');

    // $cur_blog['reply_num'] = $blog->getBlogReplyCount($blog_id);
    // $template->blog = $cur_blog;
    
    $comments = $newsModel->getCommentsByNews_id($news_id);
    
    for($i = 0; $i < count($comments); $i++) {
        $comments[$i]['replies'] = array();
        $replies = $newsModel->getAllRepliesUnderComment($news_id, $comments[$i]['id']);
        for($j = 0; $j < count($replies); $j++) {
            $comments[$i]['replies'][] = array();
            foreach($replies[$j] as $key=>$value) {
                $comments[$i]['replies'][$j][$key] = $value;
            }
        }
    }
    $template->comments = $comments;
    $template->news = $cur_news;
    echo $template;
?>