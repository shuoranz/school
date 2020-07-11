<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 

$topic = new TopicModel;
$data = array();
$data['body'] = $_POST['body'];
$data['topic_id'] = $_POST['topic_id'];
$data['user_id'] = getUser()['user_id'];
$data['replyee_id'] = $_POST['replyee_id'];
$data['comment_id'] = $_POST['comment_id'];
$validate = new Validator;
$field_array = array('body');
if (isset($_POST['comment_reply'])){
	if($validate->isRequired($field_array)){
		if($topic->postTopicComment($data)){
            redirect('/forum/thread/?id=' . $data['topic_id'], 'Your comments has been posted', 'success');
        } else {
            redirect('/forum/thread/?id=' . $data['topic_id'], 'Something went wrong whti your post.', 'error');
        }

	} else {
        redirect('/forum/thread/?id=' . $data['topic_id'], 'Please fill in all required fields', 'error');
    }
}
?>