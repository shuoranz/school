<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 

// for test
$_SESSION['user_id'] = 4;
$_SESSION['username'] = 'shuoran';
$_SESSION['name'] = 'Ian';

//Create Topic object
$blog = new BlogModel;
if (isset($_POST['do_create'])){
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
    
    //Required Fields
    $field_array = array('title','body','category_id');
    
    if($validate->isRequired($field_array)){
        //Create Topic
        if($blog->create($data)){
            redirect('index.php', 'Your topic has been posted', 'success');
        } else {
            redirect('blog.php?id='.$topic_id, 'Something went wrong whti your post.', 'error');
        }
    } else {
        redirect('create.php', 'Please fill in all required fields', 'error');
    }
    
}
//Get Template and Assign Vars
$template = new Template($pre_position.'templates/blog_create.php');

//Assign Vars

//Display template
echo $template;

?>