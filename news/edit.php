<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isAdmin()) {
    redirect('/news/?p=1', 'You are not admin!','error');
}
//Create News object
if(!isset($_GET['id'])||(!is_numeric($_GET['id']) || strpos($_GET['id'],"." ))) {
    redirect('/news/?p=1','Invalid URL!','error');
}
$news = new NewsModel;
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
            redirect('/news/edit/?id='.$_GET['id'], 'Only jpeg jpg png are allowed for Cover image', 'error');
        }
    } 

    //Required Fields
    $field_array = array('title','body','category_id');
    
    if($validate->isRequired($field_array)){
        if($news->edit($data, $_GET['id'])){
            redirect('/news/?p=1', 'Your news has been posted', 'success');
        } else {
            redirect('create.php', 'Something went wrong with your post.', 'error');
        }
    } else {
        redirect('create.php', 'Please fill in all required fields', 'error');
    }
    
}
//Get Template and Assign Vars
$news_id = $_GET['id'];
$cur_news = $news->getNewsById($news_id);
if($cur_news == NULL) {
    redirect('/news/?p=1','Invalid URL!','error');
}

$template = new Template($pre_position.'templates/news_edit.php');
$template->news = $cur_news;
//Assign Vars

//Display template
echo $template;

?>