<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 


$topic_id = $_GET['id'];
//Create Topic object
$topic = new TopicModel;
if (isset($_POST['do_edit'])){
    //Create Validator object
    $validate = new Validator;
    
    //Create data array
    $data = array();
    $data['title'] = $_POST['title'];
    //$data['slug'] = ucwords(str_replace(' ', '-', $_POST['slug']));
    $data['body'] = $_POST['body'];
    $data['category_id'] = $_POST['category_id'];
    $data['user_id'] = getUser()['user_id'];
	$data['topic_id'] = $_POST['topic_id'];
	$data['top'] = isset($_POST['top']) ? $_POST['top'] : 0;
    
    //Required Fields
    $field_array = array('title','body','category_id');
    
    if($validate->isRequired($field_array)){
        //Create Topic
        if($topic->edit($data)){
            //redirect('index.php', 'Your topic has been posted', 'success');
            if(isAdmin()) {
                writeToSystemLog(getUser()['user_id'],"edited","forum",$topic_id);
            }
            redirect('/forum/thread/?id='.$topic_id, 'Your topic has been posted', 'success');
        } else {
            redirect('/forum/thread/?id='.$topic_id, 'Something went wrong whti your post.', 'error');
        }
    } else {
        redirect('edit/?id='.$topic_id, 'Please fill in all required fields', 'error');
    }
    
}

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/forum_edit.php');
$template->topic = $topic->getTopic($topic_id);
//Assign Vars

//Display template
echo $template;

function writeToSystemLog($user_id, $action, $item, $item_id, $content="") {
    $logModel = new LogModel;
    $logModel->writeToSystemLog($user_id, $action, $item, $item_id, $content);
    return;
}
?>