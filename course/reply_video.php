<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 

$video = new CourseModel;
$data = array();
$data['body'] = $_POST['body'];
$data['video_id'] = $_POST['video_id'];
$data['created_by'] = getUser()['user_id'];
$data['replyee_id'] = $_POST['replyee_id'];
$data['comment_id'] = $_POST['comment_id'];
$validate = new Validator;
$field_array = array('body');
if (isset($_POST['comment_reply'])){
	if($validate->isRequired($field_array)){
		if($video->postVideoComment($data)){
            redirect('/course/video/?vid=' . $data['video_id'], 'Your comments has been posted', 'success');
        } else {
            redirect('/course/video/?vid=' . $data['video_id'], 'Something went wrong whti your post.', 'error');
        }

	} else {
        redirect('/course/video/?vid=' . $data['video_id'], 'Please fill in all required fields', 'error');
    }
}
?>