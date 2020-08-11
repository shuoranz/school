<?php
	$pre_position = "";
	require($pre_position.'core/init.php'); ?>
<?php 

//Create User Object
$user = new User;

//Create validate object
$validate = new Validator;

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/register_request_demo.php');
$template->registered = false;


if(isset($_POST['EmailAddress'])){
    $data = array();
    $data['EmailAddress'] = $_POST['EmailAddress'];
	$data['FirstName'] = $_POST['FirstName'];
    $data['LastName'] = $_POST['LastName'];
    $data['PhoneNumber'] = $_POST['PhoneNumber'];
    $data['SchoolDistrict'] = $_POST['SchoolDistrict'];
    $data['SchoolZipcode'] = $_POST['SchoolZipcode'];
    $data['ApplyRole'] = $_POST['ApplyRole'];
    
    //Required fields
    $field_array = array('EmailAddress');
    
    if ($validate->isRequired($field_array)){
        if($validate->isValidEmail($data['EmailAddress'])){
			if ($user->registerDemoUser($data)) {
				$template->registered = true;
			} else {
				redirect('/request_demo',"apply failed, please try again",'error');
			}
        } else {
            redirect('/request_demo',"Use a valid email address.",'error');
        }
    } else {
        redirect('/request_demo',"Please fill in All required fields",'error');
    }
    

}

//Display template
echo $template;

?>