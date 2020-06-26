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
    $template->blog = $cur_blog;
    $template->replies = $blog->getRepliesByBlog_id($blog_id);
    
    echo $template;
?>