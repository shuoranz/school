<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 

$blog = new BlogModel;
$data = array();
$data['body'] = $_POST['body'];
$data['blog_id'] = $_POST['blog_id'];
$data['user_id'] = getUser()['user_id'];
$data['replyee_id'] = $_POST['replyee_id'];
$data['comment_id'] = $_POST['comment_id'];
$validate = new Validator;
$field_array = array('body');
if (isset($_POST['comment_reply'])){
	if($validate->isRequired($field_array)){
		if($blog->postBlogComment($data)){
            redirect('/blog/thread/?id=' . $data['blog_id'], 'Your topic has been posted', 'success');
        } else {
            redirect('/blog/thread/?id=' . $data['blog_id'], 'Something went wrong whti your post.', 'error');
        }

	} else {
        redirect('/blog/thread/?id=' . $data['blog_id'], 'Please fill in all required fields', 'error');
    }
}
?>