<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
$blog = new BlogModel;
$data = array();
$validate = new Validator;
if (isset($_POST['comment_reply'])) {
    $data['body'] = $_POST['body'];
    $data['blog_id'] = $_POST['blog_id'];
    $data['user_id'] = getUser()['user_id'];
    $data['replyee_id'] = $_POST['replyee_id'];
    $data['comment_id'] = $_POST['comment_id'];
    $field_array = array('body');
	if($validate->isRequired($field_array)){
		if($blog->postBlogComment($data)){
            redirect('/blog/thread/?id=' . $data['blog_id'], 'Your reply has been posted', 'success');
        } else {
            redirect('/blog/thread/?id=' . $data['blog_id'], 'Something went wrong whti your post.', 'error');
        }

	} else {
        redirect('/blog/thread/?id=' . $data['blog_id'], 'Please fill in all required fields', 'error');
    }
} else if (isset($_POST['reply-edit'])) {
    $id = $_POST['id'];
    $body = $_POST['body'];
    $blog_id = $_POST['blog_id'];
    $field_array = array('body');
    if($validate->isRequired($field_array)) {
        if($blog->editBlogReply($id, $body)) {
            redirect('/blog/thread/?id=' . $blog_id, 'Your reply has been updated', 'success');
        } else {
            redirect('/blog/thread/?id=' . $blog_id, 'Something went wrong!', 'error');
        }
    }
} else if(isset($_POST['delete-reply'])) {
    $id = $_POST['id'];
    $blog_id = $_POST['blog_id'];
    $field_array = array('id');
    if($validate->isRequired($field_array)) {
        if($blog->deleteBlogReply($id)) {
            redirect('/blog/thread/?id=' . $blog_id, 'Your reply has been deleted', 'success');
        } else {
            redirect('/blog/thread/?id=' . $blog_id, 'Something went wrong!', 'error');
        }
    }
}
?>