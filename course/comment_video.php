<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php

//Create Blog object
$course = new CourseModel;
if (isset($_POST['post_comment'])){
    //Create Validator object
    $validate = new Validator;
    
    //Create data array
    $data = array();
    //$data['slug'] = ucwords(str_replace(' ', '-', $_POST['slug']));
    $data['body'] = $_POST['body'];
	$data['video_id'] = $_POST['video_id'];
    $data['created_by'] = getUser()['user_id'];
    $data['replyee_id'] = $_POST['replyee_id'];
    $data['comment_id'] = $_POST['comment_id'];
    
    //Required Fields
    $field_array = array('body');
    if($validate->isRequired($field_array)){
        if($course->postVideoComment($data)){
            redirect('/course/video/?vid=' . $data['video_id'], 'Your comment has been posted', 'success');
        } else {
            redirect('/course/video/?vid=' . $data['video_id'], 'Something went wrong whti your post.', 'error');
        }
    } else {
        redirect('/course/video/?vid=' . $data['video_id'], 'Please fill in all required fields', 'error');
    }
}

?>