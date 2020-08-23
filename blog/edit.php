<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isAdmin()) {
    redirect('/blog/?p=1', 'You are not admin!','error');
}
//Create Blog object
if(!isset($_GET['id'])||(!is_numeric($_GET['id']) || strpos($_GET['id'],"." ))) {
    redirect('/blog/?p=1','Invalid URL!','error');
}
$blog = new BlogModel;
if (isset($_POST['post_edit'])){
    //Create Validator object
    $validate = new Validator;
    //Create data array
    $data = array();
    $data['title'] = $_POST['title'];
    //$data['slug'] = ucwords(str_replace(' ', '-', $_POST['slug']));
    $data['body'] = $_POST['body'];
	$data['category_id'] = $_POST['category_id'];
	$data['tag'] = $_POST['tags'];
	$data['top'] = isset($_POST['top']) ? $_POST['top'] : 0;
    $data['user_id'] = getUser()['user_id'];
    $allowedExts = array("jpeg","jpg","png");
    if($_FILES["cover"]["error"] == 0) {
        $temp = explode(".", $_FILES["cover"]["name"]);
        $extension = end($temp);
        if(in_array($extension, $allowedExts)) {
            $timestampFileName = date("YmdHis") . "." . $extension;
            move_uploaded_file($_FILES["cover"]["tmp_name"], "cover/" . $timestampFileName);
            $data['cover'] = "/blog/cover/" . $timestampFileName;
        } else {
            redirect('/blog/edit/?id='.$_GET['id'], 'Only jpeg jpg png are allowed for Cover image', 'error');
        }
    } 

    //Required Fields
    $field_array = array('title','body','category_id');
    
    if($validate->isRequired($field_array)){
        if($blog->edit($data, $_GET['id'])){
            writeToSystemLog(getUser()['user_id'], "edit", "blog", $_GET['id'], "");
            redirect('/dashboard/blog?p=1', 'Your blog change has been saved', 'success');
        } else {
            redirect('/blog/edit/?id='.$_GET['id'], 'Something went wrong with your edit.', 'error');
        }
    } else {
        redirect('/blog/edit/?id='.$_GET['id'], 'Please fill in all required fields', 'error');
    }
    
}
//Get Template and Assign Vars
$blog_id = $_GET['id'];
$cur_blog = $blog->getBlogById($blog_id);
if($cur_blog == NULL) {
    redirect('/blog/?p=1','Invalid URL!','error');
}

$template = new Template($pre_position.'templates/blog_edit.php');
$template->blog = $cur_blog;
//Assign Vars

//Display template
echo $template;

function writeToSystemLog($user_id, $action, $item, $item_id, $content="") {
    $logModel = new LogModel;
    $logModel->writeToSystemLog($user_id, $action, $item, $item_id, $content);
    return;
}
?>