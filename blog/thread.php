<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php
    $blog = new BlogModel; 
    $blog_id = $_GET['id'];
    $template = new Template($pre_position.'templates/blog.php');
    $template->blog = $blog->getBlogById($blog_id);
    $template->replies = $blog->getRepliesByBlog_id($blog_id);
    echo $template;
?>