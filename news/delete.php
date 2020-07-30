<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isAdmin()) {
    redirect('/news/?p=1', 'You are not admin!','error');
}
$news = new NewsModel;
if (isset($_POST['delete-post'])){
    $validate = new Validator;
    //Create data array
    $data = array();
    $data['id'] = $_POST['news_id'];
    
    $field_array = array('news_id');
    if($validate->isRequired($field_array)){
        if($news->delete($data)){
            redirect("/news/?p=1","The news has successfully deleted!", "success");
        } else {
            redirect("/news/?p=1","Something went wrong, didn't delete the news","error");
        }
    }

}
?>