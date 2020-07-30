<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
$news = new NewsModel;
$data = array();
$validate = new Validator;
if (isset($_POST['comment_reply'])) {
    $data['body'] = $_POST['body'];
    $data['news_id'] = $_POST['news_id'];
    $data['user_id'] = getUser()['user_id'];
    $data['replyee_id'] = $_POST['replyee_id'];
    $data['comment_id'] = $_POST['comment_id'];
    $field_array = array('body');
	if($validate->isRequired($field_array)){
		if($news->postNewsComment($data)){
            redirect('/news/thread/?id=' . $data['news_id'], 'Your reply has been posted', 'success');
        } else {
            redirect('/news/thread/?id=' . $data['news_id'], 'Something went wrong whti your post.', 'error');
        }

	} else {
        redirect('/news/thread/?id=' . $data['news_id'], 'Please fill in all required fields', 'error');
    }
} else if (isset($_POST['reply-edit'])) {
    $id = $_POST['id'];
    $body = $_POST['body'];
    $news_id = $_POST['news_id'];
    $field_array = array('body');
    if($validate->isRequired($field_array)) {
        if($news->editNewsReply($id, $body)) {
            redirect('/news/thread/?id=' . $news_id, 'Your reply has been updated', 'success');
        } else {
            redirect('/news/thread/?id=' . $news_id, 'Something went wrong!', 'error');
        }
    }
} else if(isset($_POST['delete-reply'])) {
    $id = $_POST['id'];
    $news_id = $_POST['news_id'];
    $field_array = array('id');
    if($validate->isRequired($field_array)) {
        if($news->deleteNewsReply($id)) {
            redirect('/news/thread/?id=' . $news_id, 'Your reply has been deleted', 'success');
        } else {
            redirect('/news/thread/?id=' . $news_id, 'Something went wrong!', 'error');
        }
    }
}
?>