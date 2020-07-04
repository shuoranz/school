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
		'invitation_code_delete'
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
	