<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
if(!isAdmin()) {
    redirect('/blog', 'You are not admin!','error');
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
            redirect("/blog","The blog has successfully deleted!", "success");
        } else {
            redirect("/blog/thread/?id="+$data[id],"Something went wrong, didn't delete the blog","error");
        }
    }

}
?>