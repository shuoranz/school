<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 

$template = new Template('templates/manage_student.php');

//Create User Object
$user = new User;

$searchArray = isset($_GET["search"]) ? json_decode($_GET["search"]) : null;
if (empty($searchArray))
{
	$template->students = $user->getAllStudentUsers();
} else {
	$searchCondtions = array();
	$searchOptions = array('id','first_name','last_name','email','username');
	foreach($searchArray as $key => $searchValue){
		if (in_array($key, $searchOptions) && !empty($searchValue)) {
			$searchCondtions[$key] = $searchValue;
		}
	}
	$template->students = empty($searchCondtions) ? $user->getAllStudentUsers() : $user->getAllStudentUsersWithCondition($searchCondtions);

}

//Display template
echo $template;

?>