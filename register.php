<?php
	$pre_position = "";
	require($pre_position.'core/init.php'); ?>
<?php 
//Create Topic Object
$topic = new TopicModel;
//Create User Object
$user = new User;
//Create validate object
$validate = new Validator;
if(isset($_POST['register'])){
    $data = array();
    $data['first_name'] = $_POST['first_name'];
	$data['last_name'] = $_POST['last_name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $data['password2'] = md5($_POST['password2']);
    $data['role'] = $_POST['role'];
	$data['invitation_code'] = $_POST['invitation_code'];
    $data['last_activity'] = date("Y-m-d H:i:s");
    
    //Required fields
    $field_array = array('first_name','last_name','email','username','password','password2');
    
    if ($validate->isRequired($field_array)){
        if($validate->isValidEmail($data['email'])){
            if($validate->passwordsMatch($data['password'],$data['password2'])){
                /*
				//Upload Avatar image
                if ($user->uploadAvatar()){
                    $data['avatar'] = $_FILES["avatar"]["name"];
                } else {
                    $data['avatar'] = 'noimage.png';
                }
				*/
				$data['avatar'] = 'noimage.png';
				if ($data['role'] == "student") {
					$data['role'] = 'student(guest)';		
				} else if ($data['role'] == "teacher") {
					$data['role'] = 'teacher(guest)';	
				} else {
					redirect('register.php', 'Something went wrong with registration role','error');
				}
                //Register User
				$register_result = $user->register($data);
                if ($register_result === "duplicate_username"){
                    redirect('register.php', 'This username is occupied, please choose another username.','error');
                } else if ($register_result === "duplicate_email") {
					redirect('register.php', 'This email is occupied, please choose another','error');
				} else if ($register_result === 'invitation_code_error') {
					redirect('register.php', 'invitation code has some issue','error');
				} else if ($register_result === true) {
					redirect('login.php', 'You are registered and can now log in','success');
				} else {
                    redirect('register.php', 'Something went wrong with your registration'.$register_result,'error');
                }
            } else {
                redirect('register.php',"Your Passwords do not match.",'error');
            }
        } else {
            redirect('register.php',"Use a valid email address.",'error');
        }
    } else {
        redirect('register.php',"Please fill in All required fields",'error');
    }
    

}

//Get Template and Assign Vars
$template = new Template($pre_position.'templates/register_student.php');

//Assign Vars

//Display template
echo $template;

?>