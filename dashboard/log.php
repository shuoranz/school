<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); 
?>
<?php 
$logModel = new LogModel;
$date = $_GET["d"];
$dateLogs = $logModel->getLogsOnDate($date);
//Get Template and Assign Varlogss
$template = new Template('templates/log.php');
$template->logs = $dateLogs;
echo $template;
?>