<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isAdmin()) {
    redirect('/news/?p=1', 'You are not admin!','error');
}
//Create News object
$newsModel = new NewsModel;
if (isset($_POST['news_create'])){
    //Create Validator object
    $validate = new Validator;
    
    // //Create data array
    $data = array();
    $data['title'] = $_POST['title'];
    // //$data['slug'] = ucwords(str_replace(' ', '-', $_POST['slug']));
    $data['body'] = $_POST['body'];
	$data['category_id'] = $_POST['category_id'];
	$data['tag'] = $_POST['tags'];
    $data['user_id'] = getUser()['user_id'];
    $allowedExts = array("jpeg","jpg","png");
    if($_FILES["cover"]["error"] == 0) {
        $temp = explode(".", $_FILES["cover"]["name"]);
        $extension = end($temp);
        if(in_array($extension, $allowedExts)) {
            $timestampFileName = date("YmdHis") . "." . $extension;
            move_uploaded_file($_FILES["cover"]["tmp_name"], "cover/" . $timestampFileName);
            $data['cover'] = "/news/cover/" . $timestampFileName;
        } else {
            redirect('/news/create', 'Only jpeg jpg png are allowed for Cover image', 'error');
        }
    } else {
        redirect('/news/create', 'You must upload a cover image','error');
    }

    // //Required Fields
    $field_array = array('title','body','category_id');
    
    if($validate->isRequired($field_array)){
        //Create Topic
        $create_result = $newsModel->create($data);
        if($create_result >= 0){
            writeToSystemLog(getUser()['user_id'], "created", "news", $create_result, "");
            redirect('/news/?p=1', 'Your News has been posted', 'success');
        } else {
            redirect('create.php', 'Something went wrong with your post.', 'error');
        }
    } else {
        redirect('create.php', 'Please fill in all required fields', 'error');
    }
    
}
//Get Template and Assign Vars



$template = new Template($pre_position.'templates/news_create.php');
$news_categories = $newsModel->getNewsCategories();
$template->news_categories = $news_categories;

//Assign Vars

//Display template
echo $template;
function writeToSystemLog($user_id, $action, $item, $item_id, $content="") {
    $logModel = new LogModel;
    $logModel->writeToSystemLog($user_id, $action, $item, $item_id, $content);
    return;
}
?>