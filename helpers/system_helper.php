<?php

//Redirect to Page
function redirect($page=FALSE, $message=NULL, $message_type=NULL){
    if(is_string($page)){
        $location = $page;
    } else{
        $location=$_SERVER['SCRIPT_NAME'];
    }
    
    //Check for message
    if($message != NULL){
        //set message
        $_SESSION['message'] = $message;
    }
    
    //Check for message type
    if($message_type != NULL){
        //set message type
        $_SESSION['message_type'] = $message_type;
    }
    
    //Redirect
    header('Location: '.$location);
    exit();
}

//Display Message
function displayMessage(){
    if(!empty($_SESSION['message'])){
        $message = $_SESSION['message'];
        if(!empty($_SESSION['message_type'])){
            $message_type = $_SESSION['message_type'];
            //create output
            if ($message_type == 'error'){
                echo '<div class="alert alert-danger">'.$message.'</div>';
            } else {
                echo '<div class="alert alert-success">'.$message.'</div>';
            }
            //Unset Message
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        } else {
            echo '';
        }
    }
}

//Check whether user is logged in
function isLoggedIn(){
    if(isset($_SESSION['is_logged_in'])){
        return true;
    } else {
        return false;
    }
}

//Get Logged in user information
function getUser(){
    $userArray=array();
    $userArray['user_id'] = $_SESSION['user_id'];
    $userArray['username'] = $_SESSION['username'];
    $userArray['name'] = $_SESSION['name'];
    return $userArray;
}

//check whether user is admin (top)
function isAdmin(){
	if (!isLoggedIn()){
		return false;
	}
	if (!isset($_SESSION['role']) || empty($_SESSION['role'])){
		return false;
	}
	return $_SESSION['role'] === "admin" ? true : false;
}

//check whether user is teacher or above
function isTeacherOrAbove(){
	if (!isLoggedIn()){
		return false;
	}
	if (!isset($_SESSION['role']) || empty($_SESSION['role'])){
		return false;
	}
	return $_SESSION['role'] === "teacher" || isAdmin() ? true : false;
}

//check whether user is teacher or above
function isStudentOrAbove(){
	if (!isLoggedIn()){
		return false;
	}
	if (!isset($_SESSION['role']) || empty($_SESSION['role'])){
		return false;
	}
	return $_SESSION['role'] === "student" || isTeacherOrAbove() ? true : false;
}

//check whether user is guest or above
function isGuestOrAbove(){
	if (!isLoggedIn()){
		return false;
	}
	if (!isset($_SESSION['role']) || empty($_SESSION['role'])){
		return false;
	}
	return strpos($_SESSION['role'], 'guest') !== false || isStudentOrAbove() ? true : false;
}



?>