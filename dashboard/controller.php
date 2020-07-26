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
		'course_video_create'
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
		
	}
	
	function manage_teacher_create()
	{
		
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
	