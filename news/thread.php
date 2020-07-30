<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    $newsModel = new NewsModel;
    if(!isset($_GET['id'])||(!is_numeric($_GET['id']) || strpos($_GET['id'],"." ))) {
        redirect('/news/?p=1','Invalid URL!','error');
    } 
    $news_id = $_GET['id'];
    $cur_news = $newsModel->getNewsById($news_id);
    if ($cur_news == NULL) {
        redirect('/news/?p=1','Invalid URL!','error');
    }
    $template = new Template($pre_position.'templates/news.php');
    $cur_news['reply_num'] = $newsModel->getNewsReplyCount($news_id);
    $cur_date = $cur_news['create_date'];
    $complete_date = $cur_date;
    $cur_news['create_date'] = DateFormatter($cur_date);
    $cur_news['complete_date'] = $complete_date;
    $cur_news['liked'] = $newsModel->likedNews($news_id);

    // view_count + 1 as user/guest visit this page,
    $newsModel->addOneNewsViewCount($news_id, $cur_news['view_count']+1);
    $comments = $newsModel->getCommentsByNews_id($news_id);
    for($i = 0; $i < count($comments); $i++) {
        $comment = $comments[$i];
        if($comment["replyee_id"] != -1) {
            $replyee = $newsModel->getCommentById($comment["replyee_id"]);
            $comments[$i]["quote"] = array();
            foreach($replyee as $name=>$value) {
                $comments[$i]["quote"][$name] = $value;
            }
        }
    }
    
    $template->comments = $comments;
    $template->news = $cur_news;
    echo $template;
?>