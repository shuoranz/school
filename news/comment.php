<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php

//Create Blog object
$newsModel = new NewsModel;
if (isset($_POST['post_comment'])){
    //Create Validator object
    $validate = new Validator;
    
    //Create data array
    $data = array();
    //$data['slug'] = ucwords(str_replace(' ', '-', $_POST['slug']));
    $data['body'] = $_POST['body'];
	$data['news_id'] = $_POST['news_id'];
    $data['user_id'] = getUser()['user_id'];
    $data['replyee_id'] = $_POST['replyee_id'];
    $data['comment_id'] = $_POST['comment_id'];
    
    //Required Fields
    $field_array = array('body');
    if($validate->isRequired($field_array)){
        if($newsModel->postNewsComment($data)){
            redirect('/news/thread/?id=' . $data['news_id'], 'Your blog has been posted', 'success');
        } else {
            redirect('/news/thread/?id=' . $data['news_id'], 'Something went wrong whti your post.', 'error');
        }
    } else {
        redirect('/news/thread/?id=' . $data['news_id'], 'Please fill in all required fields', 'error');
    }
}

?>