<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>

<?php

	if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])){
		exit("method failed 1");
	}
	$action_input = $_REQUEST['action'];
	$actions_default = array(
		'invitation_code_create',
		'invitation_code_delete',
		'manage_student_create',
		'manage_teacher_create',
		'course_category_create',
		'course_course_create',
		'course_video_create',
		'publish',
		'revoke',
		'restore',
		'delete'
	);
	if (in_array($action_input, $actions_default)) {
		call_user_func($action_input); 
	} else {
		exit("method failed 2");
	}
	
?>

<?php
	function invitation_code_create()
	{
		//$user = new User;
		if (!isset($_REQUEST['role']) || !isset($_REQUEST['type']) || !isset($_REQUEST['amnt'])){
			exit("wrong parameter");
		}
		$role_id = (int)$_REQUEST['role'];
		$type_id = (int)$_REQUEST['type'];
		$amnt_id = (int)$_REQUEST['amnt'];
		
		switch ($role_id) {
			case 1:
				$role = "student";
				break;
			case 2:
				$role = "teacher";
				break;
			default:
				exit("wrong role type");
		}
		
		switch ($type_id) {
			case 1:
				$type = "365";
				break;
			case 2:
				$type = "7";
				break;
			default:
				exit("wrong account type");
		}
		
		if ($amnt_id <= 0 || $amnt_id > 1000) {
			exit("wrong code request amount");
		}
		
		$ic = new InvitationCodeModel;
		
		$code = array(
			'active_duration' => $type,
			'code_type' => $role
		);
		for ($i = 0; $i < $amnt_id; $i++) {
			$ic->create($code);
		}
		echo "success";
	}
	
	function manage_student_create()
	{
		if (!isset($_REQUEST['create_teacher_username'])
		|| !isset($_REQUEST['create_teacher_emailaddress'])
		|| !isset($_REQUEST['create_teacher_password'])
		|| !isset($_REQUEST['create_teacher_password_confirm'])
		|| !isset($_REQUEST['create_teacher_firstname'])
		|| !isset($_REQUEST['create_teacher_lastname'])
		|| !isset($_REQUEST['create_teacher_duration'])
		){
			exit("wrong parameter");
		}
		
		$data["first_name"] = $_REQUEST['create_teacher_firstname'];
		$data["last_name"] = $_REQUEST['create_teacher_lastname'];
		$data["email"] = $_REQUEST['create_teacher_emailaddress'];
		$data["avatar"] = '';
		$data["username"] = $_REQUEST['create_teacher_username'];
		$data["password"] = $_REQUEST['create_teacher_password'];
		$data["last_activity"] = date("Y-m-d H:i:s");
		$data["expiration_date"] = date("Y-m-d H:i:s", strtotime("+".$_REQUEST['create_teacher_duration']." days"));
		$data["role"] = 'student';
		
		$userModel = new User;
		$userModel->registerByAdmin($data);
		echo "success";
	}
	
	function manage_teacher_create()
	{
		if (!isset($_REQUEST['create_teacher_username'])
		|| !isset($_REQUEST['create_teacher_emailaddress'])
		|| !isset($_REQUEST['create_teacher_password'])
		|| !isset($_REQUEST['create_teacher_password_confirm'])
		|| !isset($_REQUEST['create_teacher_firstname'])
		|| !isset($_REQUEST['create_teacher_lastname'])
		|| !isset($_REQUEST['create_teacher_duration'])
		){
			exit("wrong parameter");
		}
		
		$data["first_name"] = $_REQUEST['create_teacher_firstname'];
		$data["last_name"] = $_REQUEST['create_teacher_lastname'];
		$data["email"] = $_REQUEST['create_teacher_emailaddress'];
		$data["avatar"] = '';
		$data["username"] = $_REQUEST['create_teacher_username'];
		$data["password"] = $_REQUEST['create_teacher_password'];
		$data["last_activity"] = date("Y-m-d H:i:s");
		$data["expiration_date"] = date("Y-m-d H:i:s", strtotime("+".(int)$_REQUEST['create_teacher_duration']." days"));
		$data["role"] = 'teacher';
		
		$userModel = new User;
		$userModel->registerByAdmin($data);
		echo "success";
	}
	
	function course_category_create()
	{
		if (!isset($_REQUEST['category']))
		{
			exit("wrong parameter");
		}
		$courseModel = new CourseModel;
		$data['create_category'] = $_REQUEST['category'];
		$courseModel->createCategory($data);
		echo "success";
	}
	
	function course_course_create()
	{
		if (!isset($_REQUEST['course_title'])
			|| !isset($_REQUEST['user_id'])
			|| !isset($_REQUEST['course_description'])
			|| !isset($_REQUEST['category_id']))
		{
			exit("wrong parameter");
		}
		$courseModel = new CourseModel;
		$data['course_title'] = $_REQUEST['course_title'];
		$data['user_id'] = $_REQUEST['user_id'];
		$data['course_description'] = $_REQUEST['course_description'];
		$data['category_id'] = $_REQUEST['category_id'];
		$courseModel->createCourse($data);
		echo "success";
	}
	
	function course_video_create()
	{
		if (!isset($_REQUEST['video_title'])
			|| !isset($_REQUEST['vimeo_id'])
			|| !isset($_REQUEST['user_id'])
			|| !isset($_REQUEST['video_description'])
			|| !isset($_REQUEST['course_id']))
		{
			exit("wrong parameter");
		}
		$courseModel = new CourseModel;
		$data['video_title'] = $_REQUEST['video_title'];
		$data['vimeo_id'] = $_REQUEST['vimeo_id'];
		$data['user_id'] = $_REQUEST['user_id'];
		$data['video_description'] = $_REQUEST['video_description'];
		$data['course_id'] = $_REQUEST['course_id'];
		$courseModel->createVideo($data);
		echo "success";
	}
	function publish() {
		$responseObj = array();
		if(!isset($_REQUEST['table']) || !isset($_REQUEST['id']) ) {
			$responseObj['success'] = FALSE;
			$responseObj['message'] = "Something went wrong!";
		} else {
			$table = $_REQUEST['table'];
			$allowedTable = array("course","course_video","forum","blog","news");
			if(!in_array($table, $allowedTable)) {
				$responseObj['success'] = FALSE;
				$responseObj['message'] = "Something went wrong!";
			} else {
				$model = new DataModel;
				$id = $_REQUEST['id'];
				if($model->publish($table, $id)) {
					$responseObj['success'] = TRUE;
					$responseObj['message'] = "Successfully published ". $table . ": " . $id;
					writeToSystemLog(getUser()['user_id'], "published", $table, $id);
				} else {
					$responseObj['success'] = FALSE;
					$responseObj['message'] = "Couldn't publish ". $table . ": " . $id;
				}
			}
		}
		exit(json_encode($responseObj));
	}
	function revoke() {
		$responseObj = array();
		if(!isset($_REQUEST['table']) || !isset($_REQUEST['id']) ) {
			$responseObj['success'] = FALSE;
			$responseObj['message'] = "Something went wrong!";
		} else {
			$table = $_REQUEST['table'];
			$allowedTable = array("course","course_video","forum","blog","news");
			if(!in_array($table, $allowedTable)) {
				$responseObj['success'] = FALSE;
				$responseObj['message'] = "Something went wrong!";
			} else {
				$model = new DataModel;
				$id = $_REQUEST['id'];
				if($model->revoke($table, $id)) {
					$responseObj['success'] = TRUE;
					$responseObj['message'] = "Successfully revoked ". $table . ": " . $id;
					writeToSystemLog(getUser()['user_id'], "revoked", $table, $id);
				} else {
					$responseObj['success'] = FALSE;
					$responseObj['message'] = "Couldn't revoke ". $table . ": " . $id;
				}
			}
		}
		exit(json_encode($responseObj));
	}
	function restore() {
		$responseObj = array();
		if(!isset($_REQUEST['table']) || !isset($_REQUEST['id'])) {
			$responseObj['success'] = FALSE;
			$responseObj['message'] = "Something went wrong!";
		} else {
			$table = $_REQUEST['table'];
			$allowedTable = array("course","course_video","forum","blog","news","users");
			if(!in_array($table, $allowedTable)) {
				$responseObj['success'] = FALSE;
				$responseObj['message'] = "Something went wrong!";
			} else {
				if($table == "users") {
					simpleRestore();
					return;
				}	
				$model = new DataModel;
				$id = $_REQUEST['id'];
				if($model->restore($table, $id)) {
					$responseObj['success'] = TRUE;
					$responseObj['message'] = "Successfully restored ". $table . ": " . $id;
					writeToSystemLog(getUser()['user_id'], "restored", $table, $id);
				} else {
					$responseObj['success'] = FALSE;
					$responseObj['message'] = "Couldn't restore ". $table . ": " . $id;
				}
			}
		}
		exit(json_encode($responseObj));
	}
	function delete() {
		$responseObj = array();
		if(!isset($_REQUEST['table']) || !isset($_REQUEST['id'])) {
			$responseObj['success'] = FALSE;
			$responseObj['message'] = "Something went wrong!";
		} else {
			$table = $_REQUEST['table'];
			$allowedTable = array("course","course_video","forum","blog","news","users");
			if(!in_array($table, $allowedTable)) {
				$responseObj['success'] = FALSE;
				$responseObj['message'] = "No such table!";
			} else {
				if ($table == "users") {
					simpleDelete();
					return;
				}
				$model = new DataModel;
				$id = $_REQUEST['id'];
				if($model->delete($table, $id)) {
					$responseObj['success'] = TRUE;
					$responseObj['message'] = "Successfully deleted ". $table . ": " . $id;
					writeToSystemLog(getUser()['user_id'], "deleted", $table, $id);
				} else {
					$responseObj['success'] = FALSE;
					$responseObj['message'] = "Couldn't delete ". $table . ": " . $id;
				}
			}
		}
		exit(json_encode($responseObj));
	}
	function simpleDelete() {
		$model = new DataModel;
		$table = $_REQUEST['table'];
		$id = $_REQUEST['id'];
		$responseObj = array();
		if($model->simpleDelete($table, $id)) {
			$responseObj['success'] = TRUE;
			$responseObj['message'] = "Successfully deleted ". $table . ": " . $id;
			writeToSystemLog(getUser()['user_id'], "deleted", $table, $id);
		} else {
			$responseObj['success'] = FALSE;
			$responseObj['message'] = "Couldn't delete ". $table . ": " . $id;
		}
		exit(json_encode($responseObj));
	}
	function simpleRestore() {
		$model = new DataModel;
		$table = $_REQUEST['table'];
		$id = $_REQUEST['id'];
		$responseObj = array();
		if($model->simpleRestore($table, $id)) {
			$responseObj['success'] = TRUE;
			$responseObj['message'] = "Successfully restored ". $table . ": " . $id;
			writeToSystemLog(getUser()['user_id'], "restored", $table, $id);
		} else {
			$responseObj['success'] = FALSE;
			$responseObj['message'] = "Couldn't restore ". $table . ": " . $id;
		}
		exit(json_encode($responseObj));
	}
	function writeToSystemLog($user_id, $action, $item, $item_id, $content="") {
		$logModel = new LogModel;
		$logModel->writeToSystemLog($user_id, $action, $item, $item_id, $content);
		return;
	}