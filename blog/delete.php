<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isAdmin()) {
    redirect('/blog/?p=1', 'You are not admin!','error');
}
$blog = new BlogModel;
if (isset($_POST['delete-post'])){
    $validate = new Validator;
    //Create data array
    $data = array();
    $data['id'] = $_POST['blog_id'];
    
    $field_array = array('blog_id');
    if($validate->isRequired($field_array)){
        if($blog->delete($data)){
            redirect("/blog/?p=1","The blog has successfully deleted!", "success");
        } else {
            redirect("/blog/?p=1","Something went wrong, didn't delete the blog","error");
        }
    }

}
?>