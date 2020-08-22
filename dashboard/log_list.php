<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
$logModel = new LogModel;
$logDates = $logModel->getLogsByDate();
//Get Template and Assign Vars
$template = new Template('templates/log_list.php');
$template->dates = $logDates;
echo $template;
?>