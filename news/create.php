<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isAdmin()) {
    redirect('/news', 'You are not admin!','error');
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
    
    // //Required Fields
    $field_array = array('title','body','category_id');
    
    if($validate->isRequired($field_array)){
        //Create Topic
        if($newsModel->create($data)){
            redirect('index.php', 'Your topic has been posted', 'success');
        } else {
            redirect('index.php', 'Something went wrong with your post.', 'error');
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

?>