<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
//Create Topic Object
//$topic = new TopicModel;
//Create User Object
//$user = new User;

if(!isTeacherOrAbove()){
	redirect('/login/','You need to log in', 'success');
}

if (!isset($_GET["c"]) || (int)$_GET["c"] >= 5 || (int)$_GET["c"] <= 0) {
	$template = new Template('templates/manage_category_default.php');
} else {
	$template = new Template('templates/manage_category_admin.php');
	$type = $_GET["c"];
	if ($type == 1) {
		$template->categoryName = "Course";
		$template->categories = getAllCourseCategories(1);
	} else if ($type == 2) {
		$template->categoryName = "Forum";
		$template->categories = getCategories(1);
	} else if ($type == 3) {
		$template->categoryName = "Blog";
		$template->categories = getBlogCategories(1);
	} else if ($type == 4) {
		$template->categoryName = "News";
		$template->categories = getNewsCategories(1);
	} else {
		$template->categoryName = "error";
	}
}	

//Get Template and Assign Vars


//$categroyId = !isset($_GET["category"]) || $_GET["category"] == 0 ? "" : (int)$_GET["category"];




//Display template
echo $template;

?>