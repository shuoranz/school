<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    $blog = new BlogModel; 
    if(!isset($_GET['id'])||(!is_numeric($_GET['id']) || strpos($_GET['id'],"." ))) {
        redirect('/blog/?p=1','Invalid URL!','error');
    }
    $blog_id = $_GET['id'];
    $cur_blog = $blog->getBlogById($blog_id);
    $template = new Template($pre_position.'templates/blog.php');
    $cur_blog['reply_num'] = $blog->getBlogReplyCount($blog_id);
    $cur_date = $cur_blog['create_date'];
    $cur_blog['create_date'] = DateFormatter($cur_date);
    $cur_blog['liked'] = $blog->likedBlog($blog_id);
    
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