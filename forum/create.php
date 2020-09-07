<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
// TODO: permission
if(!isLoggedIn()) {
    redirect('/login', 'You did not login!','error');
}
//Create Topic object
$topic = new TopicModel;
if (isset($_POST['do_create'])){
    //Create Validator object
    $validate = new Validator;
    
    //Create data array
    $data = array();
    $data['title'] = $_POST['title'];
    //$data['slug'] = ucwords(str_replace(' ', '-', $_POST['slug']));
    $data['body'] = $_POST['body'];
    $data['category_id'] = $_POST['category_id'];
    $data['user_id'] = getUser()['user_id'];
    $data['imgs'] = "";
    $counter = $_POST['counter'];
	$data['top'] = isset($_POST['top']) ? $_POST['top'] : 0;
    echo $counter;
    for($i = 0; $i < $counter; $i++) {
        $name = "img-" . $i;
        if($_FILES[$name]["error"] == 0) {
            $temp = explode(".", $_FILES[$name]["name"]);
            $extension = end($temp);
            list($msec, $sec) = explode(" ", microtime()); 
            $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
            $timestampFileName = $msectime . "." . $extension;
            move_uploaded_file($_FILES[$name]["tmp_name"], "topic-imgs/" . $timestampFileName);
            $data['imgs'] .= ($data['imgs'] == "" ? "/forum/topic-imgs/" . $timestampFileName :
                                                    ",/forum/topic-imgs/". $timestampFileName); 
        }
    }
    //Required Fields
    $field_array = array('title','body','category_id');
    if($validate->isRequired($field_array)){
        //Create Topic
        $result = $topic->create($data);
        if( $result >= 0){
            if(isAdmin()) {
                writeToSystemLog(getUser()['user_id'],"created","forum",$result);
            }
            redirect('/forum/?p=1', 'Your topic has been posted', 'success');
        } else {
            redirect('/forum/create', 'Something went wrong with your post.', 'error');
        }
    } else {
        redirect('/forum/create', 'Please fill in all required fields', 'error');
    }
    
}

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/forum_create.php');

//Assign Vars

//Display template
echo $template;

function writeToSystemLog($user_id, $action, $item, $item_id, $content="") {
    $logModel = new LogModel;
    $logModel->writeToSystemLog($user_id, $action, $item, $item_id, $content);
    return;
}
?>